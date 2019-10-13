<?php
/** @var $user \App\User */
?>
<h4>User Stats</h4>
<table class="table table-bordered">
    <tr>
        <td>
            <code>stat_total_commission_to_date_in_user_currency_formatted</code>
            Includes all commissions earned till today included what earned via split.
        </td>
        <td>{{$user->stat_total_commission_to_date_in_user_currency_formatted}}</td>
    </tr>

    <tr>
        <td>
            <code>stat_total_amounts_paid_to_date_in_user_currency_formatted</code>
            Total invoiced amount till today.(Irrespective to invoice status)
        </td>
        <td>{{$user->stat_total_amounts_paid_to_date_in_user_currency_formatted}}</td>
    </tr>

    <tr>
        <td>
            <code>stat_amount_due_in_user_currency_formatted</code>

        </td>
        <td>{{$user->stat_amount_due_in_user_currency_formatted}}</td>
    </tr>

    <tr>
        <td>
            <code>stat_total_donation_to_date_in_user_currency_formatted</code>
            Total donation till now. This also includes the donation a user made from his split earning
            portion.
        </td>
        <td>{{$user->stat_total_donation_to_date_in_user_currency_formatted}}</td>
    </tr>


    <tr>
        <td>
            <code>stat_donation_due_in_user_currency_formatted</code>
            Amount of donation till today that has not been invoiced for charity.This also includes the
            donation this user made from his split
            earning.
            This amount is from all the purchases made prior to or on date:
            @if($user->purchaseDateQualifyingForNextCharityDonation())
                <b>{{$user->purchaseDateQualifyingForNextCharityDonation()->format('Y-m-d')}}</b>
            @endif

        </td>
        <td>{{$user->stat_donation_due_in_user_currency_formatted}}</td>
    </tr>

    <tr>
        <td>
            <code>stat_total_split_shared_to_date_in_user_currency_formatted</code>
            Amount of total split shares of this user
        </td>
        <td>{{$user->stat_total_split_shared_to_date_in_user_currency_formatted}}</td>
    </tr>

    <tr>
        <td>
            <code>stat_total_split_earned_to_date_in_user_currency_formatted</code>
            Amount of total earned by this user(B) from another users(A) split amount. This amount
            doesn't
            include the charity portion that is further donated by this user(B). This is solely this
            users
            earning and amount goes to this user without any further share/deduction.
        </td>
        <td>{{$user->stat_total_split_earned_to_date_in_user_currency_formatted}}</td>
    </tr>
    @if($user->next_payment_on)
        <tr>
            <td>
                <code>next_payment_on</code>
                Next payment date
            </td>
            <td>{{$user->next_payment_on->format('Y-m-d')}}</td>
        </tr>
    @endif


    <tr>
        <td>
            <code>next_payment_in_user_currency_formatted</code>
            Total amount that user might get paid in next payment date
            @if($user->nextBillingDate()) {{$user->nextBillingDate()->format('Y-m-d')}}@endif if
            the total meets the payment criteria(>=10). This amounts comes from all the unpaid
            earnings(includes earnings from split)
            from purchases that were made
            till
            @if($user->nextBillablePurchaseTillDate())
                {{$user->nextBillablePurchaseTillDate()->format('Y-m-d')}} .
            @endif
        </td>
        <td>{{$user->next_payment_in_user_currency_formatted}}</td>
    </tr>
</table>