<?php
/** @var \App\Partner $partner */
$show = 5; // Top five entries will be show

$from = \Carbon\Carbon::now()->subMonth()->startOfMonth(); // previous month start date
$till = \Carbon\Carbon::now()->subMonth()->endOfMonth(); // previous month end date

/* Get total recommendations according to products */
$recommendations = \App\Recommendurl::remember(cacheTime('short'))
    ->select(DB::Raw('product_name, COUNT(*) as count'))
    ->where('partner_id', $partner->id)
    ->whereBetween("created_at", [$from, $till])
    ->whereNotNull("product_name")
    ->where('is_test', 0)
    ->where('is_shared', 1)
    ->groupBy('product_name')
    ->orderBy('count', 'DESC')
    ->take($show)
    ->get();
?>

<div class="row">
    <div class="col-md-12">
        @if(count($recommendations))
            <b>Top Recommended Products: Prior Month*</b>
            <table class="table">
                @foreach($recommendations as $recommendation)
                    <tr>
                        <td>{{$recommendation->product_name}}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>
