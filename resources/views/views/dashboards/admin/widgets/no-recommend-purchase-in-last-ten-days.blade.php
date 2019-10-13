<?php
/** @noinspection PhpUndefinedMethodInspection */
$no_purchases_recommends_last_ten_days = [];//define blank array
/* get all published brands order by name in ascending*/
// $brands = \App\Partner::where('is_published', 1)->where('is_test', 0)->remember(cacheTime('long'))->orderBy('name', 'ASC')->get();

$brands = Cache::remember('partner_list', cacheTime('long'), function () {
    return App\Partner::where('is_published', 1)->where('is_test', 0)->orderBy('name', 'ASC')->get();
});

/* change no Recommendion Purchase Last Days  value from @var $days_before */
$days_before = 10;
$date = \Carbon\Carbon::today()->subDays($days_before);

foreach ($brands as $brand) {

    $recommendations = Cache::remember('recommendation_count_of_partner_'.$brand->id, cacheTime('long'), function () use ($brand, $date) {
        return \App\Recommendurl::where('partner_id', $brand->id)
            ->where('created_at', '>=', $date)
            ->where('is_test', 0)
            ->count();
    });

    // check if Recommenation done or not in last X days
    if ($recommendations == 0) {

        $purchases = Cache::remember('purchase_count_of_partner_'.$brand->id, cacheTime('long'), function () use ($brand, $date) {
            return \App\Purchase::where('partner_id', $brand->id)
                ->where('created_at', '>=', $date)
                ->count();
        });

        if ($purchases == 0) { // check if Purchase done or not in last X days

            $last_recommendation = \App\Recommendurl::where('partner_id', $brand->id)
                ->orderBy('created_at', 'DESC')
                ->remember(cacheTime('long'))
                ->first();

            $last_purchase = \App\Purchase::where('partner_id', $brand->id)
                ->orderBy('created_at', 'DESC')
                ->remember(cacheTime('long'))
                ->first();

            $no_purchases_recommends_last_ten_days[] = array(
                'brand' => $brand->name,
                'last_recommendation' => $last_recommendation->created_at ?? 'No Recommendation',
                'last_purchase' => $last_purchase->created_at ?? 'No Purchase',
            );

        }
    }
}
?>
<hr/>
<div class="row">
    <div class="col-md-12">
        <b>No purchase/recommend for last {{$days_before}} days</b>
        <table class="table datatable-min">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Brand</th>
                <th scope="col">Last Recommendation</th>
                <th scope="col">Last Purchase</th>
            </tr>
            </thead>
            <tbody>
            <!--  loop through array for creating rows in a table -->
            @forelse($no_purchases_recommends_last_ten_days as $key => $no_p_r_l_ten_days)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $no_p_r_l_ten_days['brand'] }}</td>
                    <td>{{ $no_p_r_l_ten_days['last_recommendation'] }}</td>
                    <td>{{ $no_p_r_l_ten_days['last_purchase'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <center>No Data Found</center>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>