<?php
/** @noinspection PhpUndefinedMethodInspection */
/**
 * filter Data according to date range
 *****************************************/
$start_date = date('Y-m-d 00:00:00');
$end_date = date('Y-m-d 23:59:59');
if (strlen(Request::get('date_range_from'))) {
    $start_date = Request::get('date_range_from');
}
if (strlen(Request::get('date_range_to'))) {
    $end_date = Request::get('date_range_to');
}
/** **************************************/

/** Build recommendations query */
$recommendations = \App\Recommendurl::remember(cacheTime('short'))
    ->where('is_shared', 1)
    ->where('is_test',0)
    ->whereBetween('created_at', [$start_date, $end_date]);

/* change value of day from @var today() */
/** Build purchases query */
$purchases = \App\Purchase::remember(cacheTime('short'))
    ->select(DB::Raw('  sum(lb_commission_in_partner_currency) as lb_commission,
                        COUNT(*) as total'))
    ->where('is_test', 0)
    ->whereBetween('created_at', [$start_date, $end_date]);

/** Build installations query */
$users = \App\User::remember(cacheTime('short'))
    ->where('is_test',0)
    ->whereBetween('created_at', [$start_date, $end_date]);

$recommendations_count = $recommendations->count(); // Get Total Recommendations
$installations_count = $users->count(); // Get Total Users
$purchase_stat = $purchases->first(); // Get Purchase Count and LB Commission

/* get conversion percentage of purchase count over recommendation count */
$conversion_percentage = ($recommendations_count != 0) ? round((($purchase_stat->total * 100) / $recommendations_count), 2) : 0;

?>

<div class="row">
    <div class="col-md-12">
        <b>Today's statistics</b>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua lb-bg">
            <div class="inner">
                <h3>{{$recommendations_count}}</h3>
                <p>Recommendations</p>
            </div>
            <div class="icon">
                <i class="{{\App\Module::byName('recommendurls')->icon_css}}"></i>
            </div>
            <a href="{{route('recommendurls.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green lb-bg">
            <div class="inner">
                {{--<h3>53<sup style="font-size: 20px">%</sup></h3>--}}
                <h3>{{ $purchase_stat->total ?? 0 }}</h3>
                <p>Conversions</p>
            </div>
            <div class="icon">
                <i class="{{\App\Module::byName('purchases')->icon_css}}"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow lb-bg">
            <div class="inner">
                <h3>{{ $installations_count }}</h3>
                <p>Downloads</p>
            </div>
            <div class="icon">
                <i class="{{\App\Module::byName('users')->icon_css}}"></i>
            </div>
            <a href="{{route('users.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{ money($purchase_stat->lb_commission ?? 0) }}</h3>
                <p>LetsBab Commission</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
    <div class="col-md-12">
        <b>Analytics</b>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>Web</h3>
                <p>Analytics</p>
            </div>
            <div class="icon">
                <i class="fa fa-chart-line"></i>
            </div>
            <a target="_blank" href="https://marketingplatform.google.com/about/analytics/" class="small-box-footer">
                Go to site <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>App</h3>
                <p>Analytics</p>
            </div>
            <div class="icon">
                <i class="fa fa-chart-area"></i>
            </div>
            <a target="_blank" href="https://console.firebase.google.com/" class="small-box-footer">Go to site
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{ $conversion_percentage.'%' }}</h3>
                <p>Conversion percentage</p>
            </div>
            <div class="icon">
                <i class="fa fa-chart-area"></i>
            </div>
            <a href="#" class="small-box-footer">&nbsp;</a>
        </div>
    </div>
</div>