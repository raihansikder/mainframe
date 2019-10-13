<?php
/** @noinspection PhpUndefinedMethodInspection */

/* change value of day from @var today() */

use App\Conversionrate;
use App\Partner;
use App\Purchase;

$get_purchases = \App\Purchase::remember(cacheTime('short'))
    ->select(DB::Raw('sum(lb_commission_in_partner_currency) as lb_commission, COUNT(*) as conversions'))
    ->where('is_test', 0);

$get_recommendation = \App\Recommendurl::remember(cacheTime('short'))
    ->where('is_shared', 1)
    ->where('is_test', 0);

$get_downloads = \App\User::remember(cacheTime('short'))
    ->where('is_test', 0);

$recommendations = $get_recommendation->count(); // Get Total Recommendations
$downloads = $get_downloads->count(); // Get Total Users
$purchases = $get_purchases->first(); // Get Purchase Count and LB Commission

/* get conversion percentage of purchase count over recommendation count */
$conversion_rate = ($recommendations != 0) ? round((($purchases->conversions * 100) / $recommendations), 2) : 0;

//Todo: Need to check the calculation
$average_buzz_off_rate = 0;

$invoices_due_letsbab = \App\Invoice::remember(cacheTime('short'))->where('beneficiary_type', 'partner')->where('status', 'Due')->where('is_test', 0)->count();
$invoices_due_user = \App\Invoice::remember(cacheTime('short'))->where('beneficiary_type', 'recommender')->where('status', 'Due')->where('is_test', 0)->count();
$invoices_due_charity = \App\Invoice::remember(cacheTime('short'))->where('beneficiary_type', 'charity')->where('status', 'Due')->where('is_test', 0)->count();

$direct_sale = \App\Purchase::whereHas('partner', function ($query) {
    $query->where('route', 'Direct');

})->where('is_test', 0)->count();
?>

<div class="row">
    <div class="col-md-12">
        <b>Today's statistics</b>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green lb-bg">
            <div class="inner">
                {{--<h3>53<sup style="font-size: 20px">%</sup></h3>--}}
                <h3>{{ $purchases->conversions ?? 0 }}</h3>
                <p>Conversions</p>
            </div>
            <div class="icon">
                <i class="{{\App\Module::byName('purchases')->icon_css}}"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{ money($purchases->lb_commission ?? 0) }}</h3>
                <p>LetsBab Commission</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{$direct_sale}}</h3>
                <p>Direct Sales</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{$conversion_rate . '%'}}</h3>
                <p>Conversion Rate</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="" class="small-box-footer">View all</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{$invoices_due_letsbab}}</h3>
                <p>Amounts due to LetsBab</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="{{route('invoices.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{$invoices_due_user}}</h3>
                <p>Amounts due to users</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="{{route('invoices.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{$invoices_due_charity}}</h3>
                <p>Amounts due to Charities</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="{{route('invoices.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>

</div>