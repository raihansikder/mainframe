<?php
/*
 * Documentation :
 * https://developers.google.com/chart/interactive/docs/gallery/barchart
 */
/** @var \App\Partner $partner */
$show = 5; // Top five entries will be show
/* Get top earned charities on the bases of donation in lb currency */
$top_products = [['Product', 'Purchases']]; //Define bar chart Axis
$purchases = \App\Purchase::remember(cacheTime('short'))
    ->select(DB::Raw('product_name, COUNT(*) as count'))
    ->where('is_test', 0)
    ->where("created_at","<", \Carbon\Carbon::now()->startOfMonth())
    ->whereNotNull('product_name')
    ->where('partner_id', $partner->id)
    ->groupBy('product_name')
    ->orderBy('count', 'DESC')
    ->take($show)
    ->get();
/*
* Re-arrange data for bar graph
*/
foreach($purchases AS $purchase){
    if(isset($purchase->product_name, $purchase->count) && $purchase->count != 0){
        array_push($top_products,[substr($purchase->product_name,0,15), $purchase->count]);
    }
}
$top_products = json_encode($top_products);
?>

<div class="row">
    <div class="col-md-12">
        <b style="padding-left:5%;">Top {{ $show }} Purchased Products: Cumulative*</b>
        <div id="top_purchases_cumulative_chart_div"></div>
    </div>
</div>

@section('js')
    @parent

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawStacked);
        function drawStacked() {
            var data = google.visualization.arrayToDataTable(
                {!!  $top_products !!} // assign the data here
            );
            var options = {
                title: 'Purchases',
                titleTextStyle: {
                    color: '#FFFFFF'
                },
                chartArea: {width: '50%', height: '80%'},
                // isStacked: true,
                hAxis: {
                    title: 'Purchases',
                    minValue: 0
                },
                vAxis: {
                    title: 'Products'
                },
                bar: {groupWidth: '61%'},
                legend: {position: 'top'},
                colors: ['#906ce0'],
                // is3D:true

            };
            var chart = new google.visualization.BarChart(document.getElementById('top_purchases_cumulative_chart_div'));
            //chart.draw(data, options);
            // listen for error
            google.visualization.events.addListener(chart, 'error', function (err) {
                // check error
                console.log(err.id, err.message);

                // remove error
                google.visualization.errors.removeError(err.id);

                // remove all errors
                google.visualization.errors.removeAll(document.getElementById('top_purchases_cumulative_chart_div'));
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection