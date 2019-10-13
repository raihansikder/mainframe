<?php
/*
 * Documentation :
 * https://developers.google.com/chart/interactive/docs/gallery/barchart
 */
/** @var \App\Partner $partner */
$show = 5; // Top five entries will be show
/* Get top earned charities on the bases of donation in lb currency */
$top_products = [['Product', 'Recommendations']]; //Define bar chart Axis
$purchases = \App\Recommendurl::remember(cacheTime('short'))
    ->select(DB::Raw('product_name, COUNT(*) as count'))
    ->where('is_test', 0)
    ->where('partner_id', $partner->id)
    ->where("created_at","<", \Carbon\Carbon::now()->startOfMonth())
    ->whereNotNull('product_name')
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
        <b style="padding-left:5%;">Top {{ $show }} Recommended Products: Cumulative*</b>
        <div id="top_recommends_cumulative_chart_div"></div>
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
                title: 'Recommendations',
                titleTextStyle: {
                    color: '#FFFFFF'
                },
                chartArea: {left: '25%', width: '50%', height: '80%'},
                // isStacked: true,
                hAxis: {
                    title: 'Recommendations',
                    minValue: 0
                },
                vAxis: {
                    title: 'Products',
                },
                bar: {groupWidth: '61%'},
                legend: {position: 'top'}

            };
            var container = document.getElementById('top_recommends_cumulative_chart_div');
            var chart = new google.visualization.BarChart(container);
            //chart.draw(data, options);
            // listen for error
            google.visualization.events.addListener(chart, 'error', function (err) {
                // check error
                console.log(err.id, err.message);

                // remove error
                google.visualization.errors.removeError(err.id);

                // remove all errors
                google.visualization.errors.removeAll(container);
                $("#top_recommends_cumulative_chart_div").parent().remove();
            });

            google.visualization.events.addListener(chart, 'ready', function () {
                var chartLayout = chart.getChartLayoutInterface();
                var labelIndex = -1;
                var labelWidth;
                var windowWidth = $(window).width();

                var axisLabels = container.getElementsByTagName('text');
                Array.prototype.forEach.call(axisLabels, function(label) {
                if (label.getAttribute('text-anchor') === 'end') {
                    labelIndex++;
                    labelWidth = chartLayout.getBoundingBox('vAxis#0#label#' + labelIndex).width;
                    if(parseInt(windowWidth) < 1720){
                        label.setAttribute('x', labelWidth+50);
                    }else if(parseInt(windowWidth) < 2050){
                        label.setAttribute('x', labelWidth+70);
                    }else{
                        label.setAttribute('x', labelWidth+110);
                    }
                }
                });
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection