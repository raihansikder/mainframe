<?php
/** @var \App\Purchase $purchases */
/** @var \App\Charity $charity */

if(\Carbon\Carbon::now()->format("d") > 20){
    $last_month = new \Carbon\Carbon('last day of this month');
}else{
    $last_month = new \Carbon\Carbon('last day of last month');
}
$purchased_end_date = $last_month->subDays(30)->format("Y-m-d 23:59:59");

$get_donations = \App\Purchase::remember(cacheTime('none'))
    ->select(DB::raw('SUM(charity_donation_in_charity_currency) as total_donation, SUM(charity_share_percentage) as total_share_percentage, COUNT(*) as count'))
    ->where('is_test', 0)
    ->where('charity_id', $charity->id);

$get_commission_due = \App\Purchase::remember(cacheTime('none'))
    ->where('charity_id', $charity->id)
    ->where('is_test', 0)
    ->whereNull('charity_invoice_id');

if(Request::get('date_range_from') != "" && Request::get('date_range_to') != ""){
    $start_date = date('Y-m-d 00:00:00',strtotime(Request::get('date_range_from')));
    $end_date   = date('Y-m-d 23:59:59',strtotime(Request::get('date_range_to')));
    $get_donations->whereBetween('purchased_at', [$start_date, $end_date]);
    $get_commission_due->whereBetween('purchased_at', [$start_date, $end_date]);
}else{
    $get_commission_due->where('purchased_at', '<=', $purchased_end_date);
}

$donations = $get_donations->first();
$average_amount_donated = ($donations->count) ? ($donations->total_share_percentage/$donations->count) : 0;
$commission_due = $get_commission_due->sum('charity_donation_in_charity_currency');
?>

<div class="row">
    <div class="col-md-12">
        <b>Statistics</b>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box lb-bg">
            <div class="inner">
                {{--<h3>53<sup style="font-size: 20px">%</sup></h3>--}}
                <h3>{{$donations->count}}</h3>
                <p>Donations</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{symbol($charity->currency)}}{{money($donations->total_donation)}}</h3>
                <p>Donation amount</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{symbol($charity->currency)}}{{money($commission_due)}}</h3>
                <p>Next payment: {{ (date("d") <= 20) ? date("20/m/Y") : date("20/m/Y", strtotime("+1 Month")) }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{money($average_amount_donated)}}%</h3>
                <p>Average percentage donated</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>