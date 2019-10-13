<?php /** @noinspection PhpUndefinedMethodInspection */
/** @var \App\Purchase $purchases */
/** @var \App\Partner $partner */

$purchases = \App\Purchase::remember(cacheTime('short'))
    ->select(DB::Raw('sum(product_price_in_partner_currency) as sales_amount, sum(user_commission_in_partner_currency+charity_donation_in_partner_currency+lb_commission_in_partner_currency) as commission_due, COUNT(*) as count'))
    ->where('is_test', 0)
    ->where('partner_id', $partner->id);

if (Request::get('date_range_from') != "" && Request::get('date_range_to') != "") {
    $start_date = date('Y-m-d 00:00:00', strtotime(Request::get('date_range_from')));
    $end_date = date('Y-m-d 23:59:59', strtotime(Request::get('date_range_to')));
    $purchases->whereBetween('created_at', [$start_date, $end_date]);
}
$count_cards = $purchases->first();

$due_purchases = \App\Purchase::remember(cacheTime('short'))
    ->select(DB::Raw('sum(product_price_in_partner_currency) as sales_amount, sum(user_commission_in_partner_currency+charity_donation_in_partner_currency+lb_commission_in_partner_currency) as commission_due, COUNT(*) as count'))
    ->where('is_test', 0)
    ->where('partner_id', $partner->id)
    ->where('partner_invoice_status', 'Due')//invoice status is due only
    ->whereNotNull('partner_invoice_id');//invoice id should be not null

if (Request::get('date_range_from') != "" && Request::get('date_range_to') != "") {
    $start_date = date('Y-m-d 00:00:00', strtotime(Request::get('date_range_from')));
    $end_date = date('Y-m-d 23:59:59', strtotime(Request::get('date_range_to')));
    $due_purchases->whereBetween('created_at', [$start_date, $end_date]);
}
$due_purchase = $due_purchases->first();
?>

<div class="row">
    <div class="col-md-12">
        <b>Statistics</b>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box lb-bg">
            <div class="inner">
                {{--<h3>53<sup style="font-size: 20px">%</sup></h3>--}}
                <h3>{{ isset($count_cards->count) ? $count_cards->count : 0 }}</h3>
                <p>Purchases</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all <i
                        class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{symbol($partner->currency)}}{{number_format((isset($count_cards->sales_amount) ? $count_cards->sales_amount : 0),2)}}</h3>
                <p>Sale amount</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all <i
                        class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
            <!--h3>{{symbol($partner->currency)}}{{money(isset($count_cards->commission_due) ? $count_cards->commission_due : 0)}}</h3-->
                <h3>{{symbol($partner->currency)}}
                    {{number_format((isset($due_purchase->sales_amount) ? ($due_purchase->sales_amount*6/100) : 0),2)}}</h3>
                <p>Commission Due</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all <i
                        class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>