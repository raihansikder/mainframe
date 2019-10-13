<?php
/** @noinspection PhpUndefinedMethodInspection */
/** @var int $installations_count */
/** @var int $split_installations_count */

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
/**
 * Build queries
 *********************/
/** Build split recommendations query */
$recommendations = \App\Recommendurl::remember(cacheTime('short'))
    ->where('is_shared', 1)
    ->where('is_test', 0)
    ->whereBetween('created_at', [$start_date, $end_date])
    ->where(function (\Illuminate\Database\Eloquent\Builder $q) {
        return $q->whereNull('splitselection_share_percentage')
            ->orWhere('splitselection_share_percentage', 0);
    });

/** Build split purchases query */
$purchases = \App\Purchase::remember(cacheTime('short'))
    ->select(DB::Raw('sum(lb_commission_in_partner_currency) as lb_commission, COUNT(*) as total'))
    ->where('is_test', 0)
    ->whereBetween('created_at', [$start_date, $end_date])
    ->where(function (\Illuminate\Database\Eloquent\Builder $q) {
        return $q->whereNull('split_share_percentage')
            ->orWhere('split_share_percentage', 0);
    });

$installations_count = \App\User::remember(cacheTime('short'))
    ->where('is_test', 0)
    ->whereBetween('created_at', [$start_date, $end_date])->count();

$split_installations_count = \App\Installation::remember(cacheTime('short'))
    ->where('name', 'revSplit')
    ->whereBetween('created_at', [$start_date, $end_date])->count();

$non_split_recommendations_count = $recommendations->count();
$non_split_purchase_stat = $purchases->first();
$non_split_installations_count = $installations_count - $split_installations_count;

/* get conversion percentage of purchase count over recommendation count */
$conversion_percentage = ($non_split_recommendations_count != 0) ? round((($non_split_purchase_stat->total * 100) / $non_split_recommendations_count), 2) : 0;
?>
<div class="row">
    <div class="col-md-12">
        <b>Without Revenue Split</b>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua lb-bg">
            <div class="inner">
                <h3>{{$non_split_recommendations_count}}</h3>
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
                <h3>{{ $non_split_purchase_stat->total ?? 0 }}</h3>
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
                <h3>{{ $non_split_installations_count }}</h3>
                <p>Downloads</p>
            </div>
            <div class="icon">
                <i class="{{\App\Module::byName('users')->icon_css}}"></i>
            </div>
            <a href="{{route('users.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
    {{--    <div class="col-lg-3 col-xs-6">--}}
    {{--        <div class="small-box bg-red lb-bg">--}}
    {{--            <div class="inner">--}}
    {{--                <h3>{{ money($non_split_purchase_stat->lb_commission ?? 0) }}</h3>--}}
    {{--                <p>LetsBab Commission</p>--}}
    {{--            </div>--}}
    {{--            <div class="icon">--}}
    {{--                <i class="fa fa-money"></i>--}}
    {{--            </div>--}}
    {{--            <a href="{{route('purchases.index')}}" class="small-box-footer">View all</a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red lb-bg">
            <div class="inner">
                <h3>{{ $conversion_percentage }} %</h3>
                <p>Conversion %</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="{{route('purchases.index')}}" class="small-box-footer">View all</a>
        </div>
    </div>
</div>