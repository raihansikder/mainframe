<?php
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Traits;

use DB;
use App\User;
use App\Charity;
use App\Country;
use App\Invoice;
use App\Purchase;
use App\Recommendurl;
use GuzzleHttp\Client;
use App\Splitselection;
use App\Aiddeclaration;
use App\Isonotification;
use App\Charityselection;
use Illuminate\Support\Arr;
use App\Classes\Transferwise;
use GuzzleHttp\Exception\GuzzleException;

trait LbUserTrait
{

    /**
     * Billing cycle days
     * @var int
     */
    public static $first_billing_cycle = 45;
    public static $next_billing_cycle  = 30;
    /**
     * Relations
     ***********************************************************************/
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country() { return $this->belongsTo(Country::class); }

    /**
     * @return mixed
     */
    public function recommendations()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasMany(Recommendurl::class, 'recommender_user_id')
            ->where('is_shared', 1);
    }

    /**
     * @return mixed
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'recommender_user_id');
    }

    /**
     * @return mixed|Purchase
     */
    public function firstConversion()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasOne(Purchase::class, 'recommender_user_id')
            ->where('partner_env', 'Live')
            ->where('is_approved', 1)
            ->where('status', 'Confirmed')
            ->where('is_test', 0)
            ->orderBy('purchased_at', 'asc');
    }

    /**
     * @return mixed|Purchase
     */
    public function firstSplitEarning()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasOne(Purchase::class, 'split_user_id')
            ->where('partner_env', 'Live')
            ->where('is_approved', 1)
            ->where('status', 'Confirmed')
            ->where('is_test', 0)
            ->orderBy('purchased_at', 'asc');
    }

    /**
     * @return mixed|Invoice
     */
    public function lastInvoice()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasOne(Invoice::class, 'recommender_user_id')->orderBy('created_at', 'desc');
    }

    /**
     * @return mixed|Invoice
     */
    public function firstInvoice()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasOne(Invoice::class, 'recommender_user_id')->orderBy('created_at', 'asc');
    }

    /**
     * @return mixed
     */
    public function purchases()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasMany(Purchase::class, 'recommender_user_id')->where('is_test', 0);
    }

    /**
     * @return mixed
     */
    public function livePurchases()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasMany(Purchase::class, 'recommender_user_id')->where('partner_env', 'Live')->where('is_test', 0);

    }

    /**
     * Valid purchases that are not test, approved and was conducted in
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billablePurchases()
    {
        return $this->hasMany(Purchase::class, 'recommender_user_id')
            ->where('partner_env', 'Live')
            ->where('status', 'Confirmed')
            ->where('is_approved', 1)
            ->where('is_test', 0);

    }

    /**
     * Split user's valid purchases that are not test, approved and was conducted in
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function splitPurchases()
    {
        return $this->hasMany(Purchase::class, 'split_user_id')
            ->where('partner_env', 'Live')
            ->where('status', 'Confirmed')
            ->where('is_approved', 1)
            ->where('is_test', 0);

    }

    /**
     * List of purchases from where user earned money. This includes both direct and split earnings.
     * @param  null  $till_date
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function invoicablePurchases($till_date = null)
    {
        $user = $this;

        if (! $till_date) {
            $till_date = now();
        }

        return Purchase::with(['recommender', 'partner'])
            ->where(function ($query) use ($user) {
                /** @var $query \Illuminate\Database\Query\Builder */
                $query->where(function ($query) use ($user) {
                    /** @var $query \Illuminate\Database\Query\Builder */
                    $query->where('recommender_user_id', $user->id)
                        ->where('user_commission_in_user_currency', '>', 0)
                        ->whereNull('recommender_invoice_id');

                })->orWhere(function ($query) use ($user) {
                    /** @var $query \Illuminate\Database\Query\Builder */
                    $query->where('split_user_id', $user->id)
                        ->where('split_user_amount_in_split_user_currency', '>', 0)
                        ->whereNull('split_user_invoice_id');
                });
            })
            ->where('partner_env', 'Live')
            ->where('is_approved', 1)
            ->where('status', 'Confirmed')
            ->where('is_test', 0)
            ->where('purchased_at', '<=', $till_date)
            ->orderBy('purchased_at', 'asc')
            ->get();
    }

    /**
     * Get purchase ids
     * @param  null  $till_date
     * @return array
     */
    public function invoicablePurchasesIds($till_date = null)
    {
        return $this->invoicablePurchases($till_date)->pluck('id')->toArray();
    }

    /**
     * Get a list of recent/all charity selections of this user.
     * @return mixed|Charityselection
     */
    public function charityselctions()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasMany(Charityselection::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get current charity selection of this user
     * @return mixed|Charityselection
     */
    public function currentCharityselection()
    {
        return $this->hasOne(Charityselection::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get a list of recent/all split selections of this user.
     * @return mixed|Charityselection
     */
    public function splitselections()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasMany(Splitselection::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get current split selection of this user
     * @return mixed|Charityselection
     */
    public function currentSplitselection()
    {
        return $this->hasOne(Splitselection::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get a list of recent/all aid-declarations of this user
     * @return mixed|Aiddeclaration
     */
    public function aiddeclarations()
    {
        return $this->hasMany(Aiddeclaration::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get current aid-declaration of this user
     * @return mixed|Aiddeclaration
     */
    public function currentAiddeclaration()
    {
        return $this->hasOne(Aiddeclaration::class)->orderBy('created_at', 'desc');
    }

    /************************************************************************/

    /**
     * Calculate stats and fill in user table.
     */
    public function updateStats()
    {

        $stat_total_split_earned_to_date_in_user_currency = money($this->totalSplitEarnedToDateInUserCurrency());
        $stat_total_split_earned_to_date_in_user_currency_formatted = symbol($this->currency).$stat_total_split_earned_to_date_in_user_currency;
        $stat_total_split_earned_to_date_in_lb_currency = money($this->totalSplitEarnedToDateInLbCurrency());
        $stat_total_split_earned_to_date_in_lb_currency_formatted = '£'.$stat_total_split_earned_to_date_in_lb_currency;

        $stat_total_commission_to_date_in_user_currency = money($this->totalCommissionToDateInUserCurrency());
        $stat_total_commission_to_date_in_user_currency_formatted = symbol($this->currency).$stat_total_commission_to_date_in_user_currency;
        $stat_total_commission_to_date_in_lb_currency = money($this->totalCommissionToDateInLbCurrency());
        $stat_total_commission_to_date_in_lb_currency_formatted = '£'.$stat_total_commission_to_date_in_lb_currency;

        $stat_total_amounts_paid_to_date_in_user_currency = money($this->totalAmountsPaidToDateInUserCurrency());
        $stat_total_amounts_paid_to_date_in_user_currency_formatted = symbol($this->currency).$stat_total_amounts_paid_to_date_in_user_currency;

        // $stat_amount_due_in_user_currency           = money($this->amountDueInUserCurrency());
        $stat_amount_due_in_user_currency = money($this->nextPaymentInUserCurrency());
        $stat_amount_due_in_user_currency_formatted = symbol($this->currency).$stat_amount_due_in_user_currency;
        $stat_amount_due_in_lb_currency = money($this->amountDueInLbCurrency());
        $stat_amount_due_in_lb_currency_formatted = '£'.$stat_amount_due_in_lb_currency;

        $stat_total_donation_to_date_in_user_currency = money($this->totalDonationToDateInUserCurrency());
        $stat_total_donation_to_date_in_user_currency_formatted = symbol($this->currency).$stat_total_donation_to_date_in_user_currency;
        $stat_total_donation_to_date_in_lb_currency = money($this->totalDonationToDateInLbCurrency());
        $stat_total_donation_to_date_in_lb_currency_formatted = '£'.$stat_total_donation_to_date_in_lb_currency;

        $stat_donation_due_in_user_currency = money($this->donationDueInUserCurrency());
        $stat_donation_due_in_user_currency_formatted = symbol($this->currency).$stat_donation_due_in_user_currency;
        $stat_donation_due_in_lb_currency = money($this->donationDueInLbCurrency());
        $stat_donation_due_in_lb_currency_formatted = '£'.$stat_donation_due_in_lb_currency;

        $stat_total_split_shared_to_date_in_user_currency = money($this->totalSplitSharedToDateInUserCurrency());
        $stat_total_split_shared_to_date_in_user_currency_formatted = symbol($this->currency).$stat_total_split_shared_to_date_in_user_currency;
        $stat_total_split_shared_to_date_in_lb_currency = money($this->totalSplitSharedToDateInLbCurrency());
        $stat_total_split_shared_to_date_in_lb_currency_formatted = '£'.$stat_total_split_shared_to_date_in_lb_currency;

        $stat_no_of_recommendations = $this->recommendations()->count();
        $stat_no_of_successful_recommendations = $this->noOfSuccessfulRecommendations();
        $stat_no_of_conversions = $this->billablePurchases()->count();
        $stat_avg_buzz_of_rate = $this->avgBuzzOfRate();

        $next_payment_in_user_currency = money($this->nextPaymentInUserCurrency());
        $next_payment_in_user_currency_formatted = symbol($this->currency).$next_payment_in_user_currency;
        $next_payment_in_lb_currency = $this->nextPaymentInLbCurrency();
        $next_payment_lb_currency_formatted = '£'.$next_payment_in_lb_currency;

        DB::table('users')->where('id', $this->id)->update([
            'stat_total_commission_to_date_in_user_currency' => $stat_total_commission_to_date_in_user_currency,
            'stat_total_commission_to_date_in_user_currency_formatted' => $stat_total_commission_to_date_in_user_currency_formatted,
            'stat_total_commission_to_date_in_lb_currency' => $stat_total_commission_to_date_in_lb_currency,
            'stat_total_commission_to_date_in_lb_currency_formatted' => $stat_total_commission_to_date_in_lb_currency_formatted,
            'stat_total_amounts_paid_to_date_in_user_currency' => $stat_total_amounts_paid_to_date_in_user_currency,
            'stat_total_amounts_paid_to_date_in_user_currency_formatted' => $stat_total_amounts_paid_to_date_in_user_currency_formatted,
            'stat_amount_due_in_user_currency' => $stat_amount_due_in_user_currency,
            'stat_amount_due_in_user_currency_formatted' => $stat_amount_due_in_user_currency_formatted,
            'stat_amount_due_in_lb_currency' => $stat_amount_due_in_lb_currency,
            'stat_amount_due_in_lb_currency_formatted' => $stat_amount_due_in_lb_currency_formatted,
            'stat_total_donation_to_date_in_user_currency' => $stat_total_donation_to_date_in_user_currency,
            'stat_total_donation_to_date_in_user_currency_formatted' => $stat_total_donation_to_date_in_user_currency_formatted,
            'stat_total_donation_to_date_in_lb_currency' => $stat_total_donation_to_date_in_lb_currency,
            'stat_total_donation_to_date_in_lb_currency_formatted' => $stat_total_donation_to_date_in_lb_currency_formatted,
            'stat_donation_due_in_user_currency' => $stat_donation_due_in_user_currency,
            'stat_donation_due_in_user_currency_formatted' => $stat_donation_due_in_user_currency_formatted,
            'stat_donation_due_in_lb_currency' => $stat_donation_due_in_lb_currency,
            'stat_donation_due_in_lb_currency_formatted' => $stat_donation_due_in_lb_currency_formatted,

            'stat_total_split_shared_to_date_in_user_currency' => $stat_total_split_shared_to_date_in_user_currency,
            'stat_total_split_shared_to_date_in_user_currency_formatted' => $stat_total_split_shared_to_date_in_user_currency_formatted,
            'stat_total_split_shared_to_date_in_lb_currency' => $stat_total_split_shared_to_date_in_lb_currency,
            'stat_total_split_shared_to_date_in_lb_currency_formatted' => $stat_total_split_shared_to_date_in_lb_currency_formatted,
            'stat_total_split_earned_to_date_in_user_currency' => $stat_total_split_earned_to_date_in_user_currency,
            'stat_total_split_earned_to_date_in_user_currency_formatted' => $stat_total_split_earned_to_date_in_user_currency_formatted,
            'stat_total_split_earned_to_date_in_lb_currency' => $stat_total_split_earned_to_date_in_lb_currency,
            'stat_total_split_earned_to_date_in_lb_currency_formatted' => $stat_total_split_earned_to_date_in_lb_currency_formatted,

            'stat_no_of_recommendations' => $stat_no_of_recommendations,
            'stat_no_of_successful_recommendations' => $stat_no_of_successful_recommendations,
            'stat_no_of_conversions' => $stat_no_of_conversions,
            'stat_avg_buzz_of_rate' => $stat_avg_buzz_of_rate,
            'next_payment_in_user_currency' => $next_payment_in_user_currency,
            'next_payment_in_user_currency_formatted' => $next_payment_in_user_currency_formatted,
            'next_payment_in_lb_currency' => $next_payment_in_lb_currency,
            'next_payment_lb_currency_formatted' => $next_payment_lb_currency_formatted,
            'next_payment_on' => $this->nextBillingDate(),
            'last_payment_on' => $this->lastBillingDate(),
            'stat_generated_at' => now(),
        ]);

    }

    /**
     * Get recommender summary of earnings and donations.
     * @return array
     */
    public function recommenderSummary()
    {
        /** @var \App\User $this */
        $total_commission_earned = $this->totalCommissionEarned();
        $total_donated = $this->totalDonation();
        $total_recommendation_count = $this->totalRecommendationCount();
        $total_purchase_count = $this->totalPurchaseCount();
        $conversion_rate = $this->conversionRate();
        $next_user_billing = $this->nextBilling();
        $next_donation = $this->nextDonation();

        /*************************************/
        //         Stat force fix old App
        /*************************************/
        $total_donated['amount'] = $this->stat_total_donation_to_date_in_user_currency;
        $next_donation['amount'] = $this->stat_donation_due_in_user_currency;
        /*************************************/

        $summary = [
            'total_commission_earned' => $total_commission_earned,
            'total_donated' => $total_donated,
            'total_recommendation_count' => $total_recommendation_count,
            'total_purchase_count' => $total_purchase_count,
            'conversion_rate' => $conversion_rate,
            'next_user_billing' => $next_user_billing,
            'next_donation' => $next_donation,
            'user' => $this,
        ];

        return $summary;
    }

    /**
     * Total commission earned by a user till today. (User currency)
     * @return mixed
     */
    public function totalCommissionToDateInUserCurrency()
    {
        return $this->billablePurchases()->sum('user_commission_in_user_currency')
            + $this->splitPurchases()->sum('split_user_amount_in_split_user_currency');
    }

    /**
     * Total commission earned by a user till today. (LB currency)
     * @return mixed
     */

    public function totalCommissionToDateInLbCurrency()
    {
        return $this->billablePurchases()->sum('user_commission_in_lb_currency')
            + $this->splitPurchases()->sum('split_user_amount_in_lb_currency');
    }

    /**
     * Total sum of amount paid till today.
     * @return mixed
     */
    public function totalAmountsPaidToDateInUserCurrency()
    {
        return $this->invoices()->sum('subtotal');
    }

    /**
     * Amount due in user currency.
     * @return mixed
     */
    public function amountDueInUserCurrency()
    {
        return $this->billablePurchases()->whereNull('recommender_invoice_id')
                ->sum('user_commission_in_user_currency')
            + $this->splitPurchases()->whereNull('split_user_invoice_id')
                ->sum('split_user_amount_in_split_user_currency');
    }

    public function amountDueInLbCurrency()
    {
        return $this->billablePurchases()->whereNull('recommender_invoice_id')
                ->sum('user_commission_in_lb_currency')
            + $this->splitPurchases()->whereNull('split_user_invoice_id')
                ->sum('split_user_amount_in_lb_currency');
    }

    /**
     * Total donations amount till today (User currency)
     * @return mixed
     */
    public function totalDonationToDateInUserCurrency()
    {
        return $this->billablePurchases()->sum('charity_donation_in_user_currency')
            + $this->splitPurchases()->sum('split_charity_amount_in_split_user_currency');
    }

    /**
     * Total donations amount till today (LB currency)
     * @return mixed
     */
    public function totalDonationToDateInLbCurrency()
    {
        return $this->billablePurchases()->sum('charity_donation_in_lb_currency')
            + $this->splitPurchases()->sum('split_charity_amount_in_lb_currency');
    }

    /**
     * Total donation due to charity(user currency)
     * @return int
     */
    public function donationDueInUserCurrency()
    {

        $purchases_till = $this->purchaseDateQualifyingForNextCharityDonation();

        return $this->billablePurchases()->whereNull('charity_invoice_id')->where('purchased_at', '<=', $purchases_till)
                ->sum('charity_donation_in_user_currency')
            + $this->splitPurchases()->whereNull('split_charity_invoice_id')->where('purchased_at', '<=', $purchases_till)
                ->sum('split_charity_amount_in_split_user_currency');

    }

    /**
     * Find the qualifying purchase date that will be included in next charity payment.
     * They payment can happen in the immediate next cycle or the cycle after that.
     * @return \Carbon\Carbon
     */
    public function purchaseDateQualifyingForNextCharityDonation()
    {

        $next_charity_payment_cycle = Charity::nextCycle();

        // Check for charity payment amount for next two cycles
        for ($i = 1; $i <= 3; $i++) {
            $purchases_till = Charity::qualifyingPurchaseDate($next_charity_payment_cycle->copy());

            $total = $this->billablePurchases()->whereNull('charity_invoice_id')->where('purchased_at', '<=', $purchases_till)
                    ->sum('charity_donation_in_user_currency')
                + $this->splitPurchases()->whereNull('split_charity_invoice_id')->where('purchased_at', '<=', $purchases_till)
                    ->sum('split_charity_amount_in_split_user_currency');

            if ($total) {
                return $purchases_till;
            }
            $next_charity_payment_cycle = Charity::nextCycleAfter($next_charity_payment_cycle);
        }

        /** @noinspection PhpUndefinedVariableInspection */
        return $purchases_till;
    }

    /**
     * Checks if there is donation due
     * @return bool
     */
    public function hasDonationDue()
    {
        return $this->billablePurchases()->where(function ($query) {
            $query->whereNull('charity_invoice_id')
                ->orWhereNull('split_charity_invoice_id');
        })->exists();

    }

    /**
     * Total donation due to charity(LB currency)
     * @return mixed
     */
    public function donationDueInLbCurrency()
    {
        $purchases_till = $this->purchaseDateQualifyingForNextCharityDonation();

        return $this->billablePurchases()
                ->whereNull('charity_invoice_id')
                ->where('purchased_at', '<', $purchases_till)
                ->sum('charity_donation_in_lb_currency')
            + $this->splitPurchases()
                ->whereNull('split_charity_invoice_id')
                ->where('purchased_at', '<', $purchases_till)
                ->sum('split_charity_amount_in_lb_currency');
    }

    /**
     * Total shared split amount in user's currency
     * @return mixed
     */
    public function totalSplitSharedToDateInUserCurrency()
    {
        return $this->billablePurchases()->sum('split_amount_in_user_currency');
    }

    /**
     * Total shared split amount in LB currency
     * @return mixed
     */
    public function totalSplitSharedToDateInLbCurrency()
    {
        return $this->billablePurchases()->sum('split_amount_in_lb_currency');
    }

    /**
     * Total earned amount from split in user's currency
     * @return mixed
     */
    public function totalSplitEarnedToDateInUserCurrency()
    {
        return $this->splitPurchases()->sum('split_user_amount_in_split_user_currency');
    }

    /**
     * Total earned amount from split in LB currency
     * @return mixed
     */
    public function totalSplitEarnedToDateInLbCurrency()
    {
        return $this->splitPurchases()->sum('split_user_amount_in_lb_currency');
    }

    /**
     * Get the number of successful recommendations
     * @return mixed
     */
    public function noOfSuccessfulRecommendations()
    {
        return $this->purchases()->distinct('recommendurl_id')->count();
    }

    /**
     * Calculate avg buzz off rate.
     * @return int
     */
    public function avgBuzzOfRate()
    {
        return 0;
    }

    /**
     * Get next billing details of the user with (possible)amount and date.
     * @param  null  $currency
     * @return array
     */
    public function nextBilling($currency = null)
    {
        /** @var \App\User $this */
        // Auto-resolve user currency if not set
        if (! $currency) {
            $currency = $this->currency;
        }

        $amount = $this->nextBillingAmount($currency);
        $date = $this->nextBillingDate();

        $ret = [
            'currency' => $amount['currency'],
            'currency_symbol' => currencySymbol($amount['currency']),
            'amount' => $amount['amount'],
            'date' => $date->toDateString(),
        ];

        return $ret;
    }

    /**
     * Calculate users last billing date. If user(recommender) has an invoice then the take
     * the last invoice date.If not then consider user->created_at to be the last billing
     * date (theoretically) for the sake of calculation.
     * @return string
     */
    public function lastBillingDate()
    {
        /** @var \App\User $this */
        if ($this->lastInvoice()->exists()) {
            $date = $this->lastInvoice->invoice_date;

        } else {
            $date = $this->created_at; // Update calculation

        }

        return $date->toDateString(); // Return a date Not datetime
    }

    public function billingCycles()
    {

        $i = 0;
        $dates = [];
        /**
         * If no invoice exists (no previous payment made)then the billing cycle will start from
         * the first conversion date and add 45 days(as per cycle interval) and show a
         * future date.
         */

        $first_conversion = null;
        if ($this->firstConversion()->exists()) {
            /** @var Purchase $first_conversion */
            $first_conversion = $this->firstConversion;
            //$first_conversion_date = $first_conversion->purchased_at;
        }

        if ($this->firstSplitEarning()->exists()) {

            /** @var Purchase $first_conversion */
            if ($this->firstConversion()->exists()) {
                if ($this->firstSplitEarning->purchased_at < $this->firstConversion->purchased_at) {
                    $first_conversion = $this->firstSplitEarning;
                }
            } else {
                $first_conversion = $this->firstSplitEarning;
            }
        }

        if ($first_conversion) {

            /** @var Purchase $first_conversion */
            /**
             * First billing cycle of 45 days
             ********************************************/
            $first_cycle_date = $first_conversion->purchased_at->addDays($this::$first_billing_cycle);

            $dates[++$i] = [
                'cycle' => $i,
                'date' => $first_conversion->purchased_at->addDays($this::$first_billing_cycle)->startOfDay(),
                'conversions_from' => $first_conversion->purchased_at->startOfDay(),
                'conversions_till' => $first_conversion->purchased_at->endOfDay(),
            ];

            /**
             * Second and on-ward billing
             *******************************************/
            $second_cycle_date = $first_cycle_date->addDays($this::$next_billing_cycle);
            $from = $first_conversion->purchased_at->addDay();
            $till = $from->copy()->addMonth();

            /** @noinspection CallableInLoopTerminationConditionInspection */
            /** @var \Illuminate\Support\Carbon $next */
            /** @noinspection PhpExpressionResultUnusedInspection */

            for ($next = $second_cycle_date; $next < today()->addMonth();) {

                $dates[++$i] = [
                    'cycle' => $i,
                    'date' => $next->startOfDay(),
                    'conversions_from' => $from->startOfDay(),
                    'conversions_till' => $till->subDay()->endOfDay(),
                ];

                $from = $till->copy()->addDay();
                $till = $from->copy()->addMonth();
                $next = $next->copy()->addMonth();
            }

        } else {
            $dates[++$i] = [
                'cycle' => $i,
                'date' => today()->addDays($this::$first_billing_cycle)->startOfDay(),
                'conversions_from' => today()->startOfDay(),
                'conversions_till' => today()->endOfDay(),
            ];
        }

        return $dates;
    }

    /**
     * Get the next billing cycle.
     * @return mixed|array
     */
    public function nextBillingCycle()
    {
        return Arr::last($this->billingCycles());
    }

    /**
     * @return mixed|\Carbon\Carbon
     */
    public function nextBillingDate()
    {
        $next_billing_cycle = $this->nextBillingCycle();
        return $next_billing_cycle['date'];
    }

    /**
     * invoice_date
     * @return \Carbon\Carbon|mixed
     */
    public function nextInvoiceDate()
    {
        return $this->nextBillingDate();
    }

    /**
     * @return mixed|\Carbon\Carbon
     */
    public function nextBillablePurchaseTillDate()
    {
        $next_billing_cycle = $this->nextBillingCycle();
        return $next_billing_cycle['conversions_till'];
    }

    /**
     * @return mixed|\Carbon\Carbon
     */
    public function nextBillablePurchaseFromDate()
    {
        $next_billing_cycle = $this->nextBillingCycle();
        return $next_billing_cycle['conversions_from'];
    }

    /**
     * @return mixed|int
     */
    public function nextBillingCycleNumber()
    {
        $next_billing_cycle = $this->nextBillingCycle();
        return $next_billing_cycle['cycle'];
    }

    /**
     * Calculate users next billing date.
     * @param  bool  $log
     * @return string| \Carbon\Carbon
     */
    public function nextBillingDateOld($log = false)
    {

        /** @var $this \App\User */

        /**
         * If there already exists (payment made once) an invoice then the billing cycle will start
         * From the invoice_date and add 45 days(as per cycle interval)
         * and show a future date in the cycle.
         */

        // if ($this->lastInvoice()->exists()) {
        //
        //     $last_invoice = $this->lastInvoice;
        //
        //     if ($log) {
        //         echo "- An invoice #".$last_invoice->id." exists. invoice_date = ".$last_invoice->invoice_date."<br/>";
        //     }
        //
        //     $last = $last_invoice->invoice_date;
        //     $billing_cycle = $this::$next_billing_cycle;
        //     for ($next = $last; $next = $next->addDays($billing_cycle);) {
        //
        //         if ($log) {
        //             echo "- Billing cycle ($billing_cycle)d -  ".$next;
        //         }
        //         if ($next > today()) {
        //             break;
        //         }
        //         if ($log) {
        //             echo " (Past date) ... skipped <br/>";
        //         }
        //
        //     }
        //     if ($log) {
        //         echo "- Billing cycle  ".$next."<br/>";
        //     }
        //     return $next;
        // }
        //
        // if ($log) {
        //     echo "- No previous invoice exists.<br/>";
        // }

        /**
         * If no invoice exists (no previous payment made)then the billing cycle will start from
         * the first conversion date and add 45 days(as per cycle interval) and show a
         * future date.
         */
        if ($this->firstConversion()->exists()) {

            /** @var Purchase $first_conversion */
            $first_conversion = $this->firstConversion;
            $first_conversion_date = $first_conversion->purchased_at;

            if ($log) {
                echo "- A conversion #".$first_conversion->id." exists. purchase_date = ".$first_conversion_date->format('Y-m-d')."<br/>";
            }

            /**
             * First billing cycle of 45 days
             */
            $first_cycle_date = $first_conversion_date->addDays($this::$first_billing_cycle); // Add 45
            if ($log) {
                echo "- First Billing cycle (".$this::$first_billing_cycle.")d -  ".$first_cycle_date->format('Y-m-d');
            }
            if ($first_cycle_date > today()) {
                return $first_cycle_date;
            }
            if ($log) {
                echo " (Past date) ... skipped <br/>";
            }

            /**
             * Second and on-ward billing
             */
            $second_cycle_date = $first_cycle_date->addDays($this::$next_billing_cycle);
            //$bill_on_date = $second_cycle_date->format('d'); // Add another 30. Didn't need this $next->addMonth() did the trick for me.

            // echo "- Bill on $bill_on_date of every month <br/>";

            /** @noinspection CallableInLoopTerminationConditionInspection */
            for ($next = $second_cycle_date; $next < today();) {

                if ($log) {
                    echo "- Billing cycle (".$this::$next_billing_cycle.")d -  ".$next->format('Y-m-d');
                }

                if ($log) {
                    echo "  (Past date) ... skipped <br/>";
                }
                // 45 days
                /** @var \Illuminate\Support\Carbon $next */
                $next = $next->addMonth();

            }
            return $next;
        }

        if ($log) {
            echo "- No conversion invoice exists.<br/>";
        }

        /**
         * Default :If there is no payment and no existing conversion then the next payment
         * date will just show by adding 45 days after user sign up. This will
         * be automatically updated and a new date will be set on his first
         * conversion.
         */
        return today()->addDays($this::$first_billing_cycle);

        /*
         * Note: Payment date doesn't assure payment unless amount meets the payment criteria
         * (i.e. greater than or equal to amount 10).
         */
    }

    /**
     * Next billing amount (Total earning for next billing)
     * @param  null  $currency
     * @return array
     */
    public function nextBillingAmount($currency = null)
    {
        /** @var \App\User $this */
        // If no currency is set then set to user currency
        if (! $currency) {
            $currency = $this->currency;
        }

        //$amount = 99.99; // Complete calculation.
        //$amount = $this->amountDueInUserCurrency();
        $amount = $this->billablePurchases()
            ->whereNull('recommender_invoice_id')// Un-invoiced
            ->where('purchased_at', '<=', $this->nextBillingDate()->subDays($this::$first_billing_cycle))
            ->sum('user_commission_in_user_currency');

        $total = [
            'currency' => $currency,
            'currency_symbol' => currencySymbol($currency),
            'amount' => money($amount),
        ];

        return $total;
    }

    /**
     * Get next payment amount in user currency. This amount should be the sum of billable
     * purchases that are 45 days old and not paid.
     * @return mixed
     */
    public function nextPaymentInUserCurrency()
    {
        $amount = $this->billablePurchases()
            ->whereNull('recommender_invoice_id')// Un-invoiced
            ->where('purchased_at', '<=', $this->nextBillablePurchaseTillDate())
            ->sum('user_commission_in_user_currency');

        $amount += $this->splitPurchases()
            ->whereNull('split_user_invoice_id')// Un-invoiced
            ->where('purchased_at', '<=', $this->nextBillablePurchaseTillDate())
            ->sum('split_user_amount_in_split_user_currency');

        //return ($amount >= 10) ? $amount : 0;
        return $amount;
    }

    /**
     * Get next payment amount in LB currency(GBP). This amount should be the sum of billable
     * purchases that are 45 days old and not paid.
     * @return int
     */
    public function nextPaymentInLbCurrency()
    {
        $amount = $this->billablePurchases()
            ->whereNull('recommender_invoice_id')// Un-invoiced
            ->where('purchased_at', '<=', $this->nextBillablePurchaseTillDate())
            ->sum('user_commission_in_lb_currency');

        $amount += $this->splitPurchases()
            ->whereNull('split_user_invoice_id')// Un-invoiced
            ->where('purchased_at', '<=', $this->nextBillablePurchaseTillDate())
            ->sum('split_user_amount_in_lb_currency');

        // return ($amount >= 10) ? $amount : 0;
        return $amount;
    }

    /**
     * details of the users next donation to charity
     * @param  null  $currency
     * @return array
     */
    public function nextDonation($currency = null)
    {
        /** @var \App\User $this */
        $amount = $this->nextDonationAmount($currency);
        $date = $this->nextDonationDate();

        $ret = [
            'currency' => $amount['currency'],
            'currency_symbol' => currencySymbol($amount['currency']),
            'amount' => $amount['amount'],
            'date' => $date->toDateString(),
        ];

        return $ret;
    }

    /**
     * Calculate users last donation date
     * @return \Carbon\Carbon|string
     */
    public function lastDonationDate()
    {
        /** @var \App\User $this */
        $date = $this->lastBillingDate(); // Update calculation
        return $date; // Return a date Not datetime
    }

    /**
     * Calculate users next billing date
     * @return \Carbon\Carbon|string
     */
    public function nextDonationDate()
    {
        /** @var \App\User $this */
        $date = $this->nextBillingDate(); // Update calculation
        return $date; // Return a date Not datetime
    }

    /**
     * Next Donation amount (Total earning for next billing)
     * @param  null  $currency
     * @return array
     */
    public function nextDonationAmount($currency = null)
    {
        /** @var \App\User $this */
        // If no currency is set then set to user currency
        if (! $currency) {
            $currency = $this->currency;
        }

        //$amount = 99.99; // Complete calculation.
        $amount = Purchase::where('recommender_user_id', $this->id)
            ->where('purchased_at', '>=', $this->lastDonationDate())
            ->where('purchased_at', '<=', $this->nextDonationDate())
            ->where('partner_env', 'Live')
            ->sum('charity_donation_in_user_currency');

        $total = [
            'currency' => $currency,
            'currency_symbol' => currencySymbol($currency),
            'amount' => money($amount),
        ];

        return $total;
    }

    /**
     * Calculate total commission earned by a user till today. This amount includes
     * user commission of current billing cycle also which is not yet paid(transferred)
     * but will be paid(probably) on the upcoming billing date of user (if the minimum
     * required amount is earned).
     * @param  null  $currency
     * @return array
     */
    public function totalCommissionEarned($currency = null)
    {
        /** @var \App\User $this */
        return $this->totalCommissionEarnedDuring(null, null, $currency);
    }

    /**
     * Calculate total commission earned by a user on a specific day.
     * @param  null  $date
     * @param  null  $currency
     * @return array
     */
    public function totalCommissionEarnedOn($date = null, $currency = null)
    {
        /** @var \App\User $this */
        // If no currency is set then set to user currency
        if (! $currency) {
            $currency = $this->currency;
        }
        if (! $date) {
            $date = today()->toDateString();
        }

        //$amount = 99.99; // Complete calculation.
        $amount = Purchase::where('recommender_user_id', $this->id)
            ->where('purchased_at', $date)
            ->where('partner_env', 'Live')
            ->sum('user_commission_in_user_currency');

        $ret = [
            'currency' => $currency,
            'currency_symbol' => currencySymbol($currency),
            'amount' => money($amount),
            'date' => $date
        ];

        return $ret;
    }

    /**
     * Calculate total commission earned by a user on a date range.
     * @param  null  $start_date
     * @param  null  $end_date
     * @param  null  $currency
     * @return array
     */
    public function totalCommissionEarnedDuring($start_date = null, $end_date = null, $currency = null)
    {
        /** @var \App\User $this */
        // If no currency is set then set to user currency
        if (! $currency) {
            $currency = $this->currency;
        }
        if (! $start_date) {
            $start_date = $this->created_at->format('Y-m-d');
        } // By default set $start_date to user creation date.
        if (! $end_date) {
            $end_date = today()->toDateString();
        }
        // By default set end date to today.
        $amount = $this->totalCommissionToDateInUserCurrency();

        $ret = [
            'currency' => $currency,
            'currency_symbol' => currencySymbol($currency),
            'amount' => money($amount),
            'start_date' => $start_date,
            'end_date' => $end_date
        ];

        return $ret;
    }

    /**
     * Calculate total donation earned by a user till today. This amount includes
     * donation amount of current billing cycle also which is not yet paid(transferred)
     * to charity but will be paid(probably) on the upcoming billing date of charity.
     * @param  null  $currency
     * @return array
     */
    public function totalDonation($currency = null)
    {
        /** @var \App\User $this */
        return $this->totalDonationDuring(null, null, $currency);
    }

    /**
     * Calculate total donation given by a user on a specific day.
     * @param  null  $date
     * @param  null  $currency
     * @return array
     */
    public function totalDonationOn($date = null, $currency = null)
    {
        /** @var \App\User $this */
        // If no currency is set then set to user currency
        if (! $currency) {
            $currency = $this->currency;
        }
        if (! $date) {
            $date = today()->toDateString();
        }

        //$amount = 99.99; // Complete calculation.
        $amount = $this->billablePurchases()
            ->where('purchased_at', $date)
            ->where('partner_env', 'Live')
            ->sum('charity_donation_in_user_currency');

        $ret = [
            'currency' => $currency,
            'currency_symbol' => currencySymbol($currency),
            'amount' => money($amount),
            'date' => $date
        ];

        return $ret;
    }

    /**
     * Calculate total donation given by a user on a range of days.
     * @param  null  $start_date
     * @param  null  $end_date
     * @param  null  $currency
     * @return array
     */
    public function totalDonationDuring($start_date = null, $end_date = null, $currency = null)
    {
        /** @var \App\User $this */
        // If no currency is set then set to user currency
        if (! $currency) {
            $currency = $this->currency;
        }
        if (! $start_date) {
            $start_date = $this->created_at->format('Y-m-d');
        } // By default set $start_date to user creation date.
        if (! $end_date) {
            $end_date = today()->toDateString();
        } // By default set end date to today.
        //$end_date_plus_one = Carbon::createFromFormat('Y-m-d', $end_date)->addDays(1)->toDateString();

        //$amount = 99.99; // Complete calculation.
        $amount = $this->billablePurchases()
            ->where('purchased_at', '>=', $start_date)
            ->where('purchased_at', '<=', $end_date)
            ->sum('charity_donation_in_user_currency');

        $ret = [
            'currency' => $currency,
            'currency_symbol' => currencySymbol($currency),
            'amount' => money($amount),
            'start_date' => $start_date,
            'end_date' => $end_date
        ];

        return $ret;
    }

    /**
     * Count total number of recommendations by a user till now.
     * @return array
     */
    public function totalRecommendationCount()
    {
        /** @var \App\User $this */
        return $this->totalRecommendationCountDuring();
    }

    /**
     * Count total recommendations made by a user on a specific day.
     * @param  null  $date
     * @return array
     */
    public function totalRecommendationCountOn($date = null)
    {
        /** @var \App\User $this */
        if (! $date) {
            $date = today()->toDateString();
        }

        //$count = 999; // Complete calculation.
        $count = Recommendurl::where('recommender_user_id', $this->id)
            ->where('created_at', $date)
            ->where('is_test', 0)
            ->where('is_shared', 1)
            ->count();

        $ret = [
            'count' => $count,
            'date' => $date
        ];

        return $ret;
    }

    /**
     * Count total recommendations made by a user on a range of days.
     * @param  null  $start_date
     * @param  null  $end_date
     * @return array
     */
    public function totalRecommendationCountDuring($start_date = null, $end_date = null)
    {
        /** @var \App\User $this */
        if (! $start_date) {
            $start_date = $this->created_at->format('Y-m-d');
        } // By default set $start_date to user creation date.
        if (! $end_date) {
            $end_date = today()->toDateString();
        } // By default set end date to today.

        $count = $this->recommendations()
            ->where('created_at', '>=', $start_date)
            ->where('created_at', '<=', $end_date)
            ->where('is_test', 0)->count();

        $ret = [
            'count' => $count,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];

        return $ret;
    }

    /**
     * Count total number of purchases made through this user.
     * @return array
     */
    public function totalPurchaseCount()
    {
        /** @var \App\User $this */
        return $this->totalPurchaseCountDuring();
    }

    /**
     * Count total number of purchases made through this user on a specific day.
     * @param  null  $date
     * @return array
     */
    public function totalPurchaseCountOn($date = null)
    {
        /** @var \App\User $this */
        if (! $date) {
            $date = today()->toDateString();
        }

        //$count = 9999; // Complete calculation.
        $count = Purchase::where('recommender_user_id', $this->id)
            ->where('purchased_at', $date)
            ->where('partner_env', 'Live')
            ->where('is_test', 0)
            ->count();

        $ret = [
            'count' => $count,
            'date' => $date
        ];

        return $ret;
    }

    /**
     * Count total number of purchases made through this user on a range of days.
     * @param  null  $start_date
     * @param  null  $end_date
     * @return array
     */
    public function totalPurchaseCountDuring($start_date = null, $end_date = null)
    {
        /** @var \App\User $this */
        if (! $start_date) {
            $start_date = $this->created_at->format('Y-m-d');
        } // By default set $start_date to user creation date.
        if (! $end_date) {
            $end_date = today()->toDateString();
        } // By default set end date to today.
        //$end_date_plus_one = Carbon::createFromFormat('Y-m-d', $end_date)->addDays(1)->toDateString();

        //$count = 999; // Complete calculation.
        $count = $this->billablePurchases()
            ->where('purchased_at', '>=', $start_date)
            ->where('purchased_at', '<=', $end_date)
            ->count();

        $ret = [
            'count' => $count,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];

        return $ret;
    }

    /**
     * Calculate users conversion rate.
     * @return float|int
     */
    public function conversionRate()
    {

        $total_recommendation_count = $this->totalRecommendationCount();
        $total_purchase_count = $this->totalPurchaseCount();

        $conversion_rate = 0;
        if ($total_recommendation_count['count'] > 0) {
            if ((($total_purchase_count['count'] * 100) / $total_recommendation_count['count']) > 100) {
                $conversion_rate = 100;
            } else {
                $conversion_rate = floor(($total_purchase_count['count'] * 100) / $total_recommendation_count['count']);
            }
        }

        return $conversion_rate;

    }

    /**
     * Creates a Transferwise account
     * @param  string  $legal_type
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createTransferwiseAccount($legal_type = 'PRIVATE')
    {
        $transferwise = new Transferwise;
        /** @var $this \App\User */
        return $transferwise->createAccount($this, $legal_type);
    }

    /**
     * Creates a Transferwise account and store in DB.
     * @return $this User
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createAndStoreTransferwiseAccount()
    {
        /** @var \App\User $this */
        $this->transferwise_account = $this->createTransferwiseAccount();

        if ($this->transferwise_account) {
            $transferwise_account = json_decode($this->transferwise_account);
            $this->transferwise_account_id = $transferwise_account->id ?? null;
        }

        DB::table('users')->where('id', $this->id)->update([
            'transferwise_account_id' => $this->transferwise_account_id,
            'transferwise_account' => $this->transferwise_account
        ]);

        return $this;
    }

    // Encrypt/Decrypt bank information.

    /**
     * @param $value
     * @return mixed
     */
    // public function getAccountNumberAttribute($value)
    // {
    //     try {
    //         if (strlen($value) > 36) {
    //             $value = decrypt($value);
    //         }
    //     } catch (DecryptException $e) {
    //         //
    //     }
    //     return $value;
    // }

    /**
     * @param $value
     */
    // public function setAccountNumberAttribute($value)
    // {
    //     try {
    //         if (strlen($value) < 36) {
    //             $value = encrypt($value);
    //         }
    //     } catch (EncryptException $e) {
    //         //
    //     }
    //     $this->attributes['account_number'] = $value;
    // }

    /**
     * Create SendBird account
     * Link to documentation: https://docs.sendbird.com/platform/user#3_create_a_user
     */
    public function createSendBirdAccount()
    {
        // 1. First Create an account https://docs.sendbird.com/platform/user#3_create_a_user
        $client = new Client();
        try {
            $response = $client->request("POST", "https://api-".env("SENDBIRD_APPLICATION_ID").".sendbird.com/v3/users", [
                "headers" => [
                    "Content-Type" => "application/json, charset=utf8",
                    "Api-Token" => env("SENDBIRD_TOKEN")
                ],
                "body" => json_encode([
                    "user_id" => $this->uuid,
                    "nickname" => $this->name,
                    "profile_url" => $this->avatar
                ])
            ]);
        } catch (GuzzleException $e) {
            return setError($e->getMessage());
        }

        // 2. Then Use the function below to fill the meta data        
        if ($response->getStatusCode() == 200) {
            // Update has_sendbird_account as 1, which show that user have sendbird account
            DB::table('users')->where('id', $this->id)->update([
                'has_sendbird_account' => 1
            ]);
            $meta_data_response = $this->fillSendBirdMetaData();
            if ($meta_data_response == 200) {
                // Update has_sendbird_account as 2, which show that user meta updated in sendbird
                DB::table('users')->where('id', $this->id)->update([
                    'has_sendbird_account' => 2
                ]);
                setSuccess('Sendbird account created');
            } else {
                setError($meta_data_response);
            }
        } else {
            setError('Something went wrong, Please try again!');
        }

        return true;
    }

    /**
     * Create SendBird meta-data
     * Link to documentation: https://docs.sendbird.com/platform/user_metadata#3_create_a_user_metadata
     */
    public function fillSendBirdMetaData()
    {
        $client = new Client();
        try {
            $response = $client->request("POST", "https://api-".env("SENDBIRD_APPLICATION_ID").".sendbird.com/v3/users/".$this->uuid."/metadata", [
                "headers" => [
                    "Content-Type" => "application/json, charset=utf8",
                    "Api-Token" => env("SENDBIRD_TOKEN")
                ],
                "body" => json_encode([
                    "metadata" => [
                        "firstName" => $this->first_name,
                        "lastName" => $this->last_name,
                        "email" => $this->email,
                        "phone" => $this->phone ?? ""
                    ]
                ])
            ]);
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }
        return $response->getStatusCode();
    }

    /**
     * Get unique referral event names as one-dimensional array
     * @return array
     */
    public static function uniqueRefEvents()
    {
        $results = User::select('ref_event')
            ->whereNotNull('ref_event')
            ->groupBy('ref_event')
            ->remember(cacheTime('long'))
            ->get()
            ->toArray();
        $events = array_column($results, 'ref_event');
        return $events;
    }

    public function deleteCharityAlerts()
    {
        $user = $this;
        Isonotification::where('module_id', 4)->where('element_id', $this->id)->where('type', 'Commission alert')->delete();
    }
}