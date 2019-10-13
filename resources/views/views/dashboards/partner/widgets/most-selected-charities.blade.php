<?php
/** @var \App\Partner $partner */
$show = 5; // Top five entries will be show

$from = \Carbon\Carbon::now()->subMonth()->startOfMonth(); // previous month start date
$till = \Carbon\Carbon::now()->subMonth()->endOfMonth(); // previous month end date

/* Get total recommendations according to products */
$recommendations = \App\Recommendurl::remember(cacheTime('short'))
    ->leftJoin('charities', 'charities.id', 'recommendurls.charity_id')
    ->select(DB::Raw('charity_id, charity_name, COUNT(*) as count'))
    ->where('partner_id', $partner->id)
    ->where('is_shared', 1)
    // ->whereNotNull("product_name") // This is not required in this case.
    ->whereBetween("recommendurls.created_at", [$from, $till])
    ->where('recommendurls.is_test', 0)
    ->whereNotNull('charity_id')
    ->groupBy('charity_id', 'charity_name')
    ->orderBy('count', 'DESC')
    ->take($show)
    ->get();
?>

<div class="row">
    <div class="col-md-12">
        @if(count($recommendations))
            <b>Most selected charity: Prior Month*</b>
            <table class="table">
                @foreach($recommendations as $recommendation)
                    <tr>
                        <td>{{$recommendation->charity_name}}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>
