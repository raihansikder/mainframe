<?php
/*
 * Documentation :
 * https://developers.google.com/chart/interactive/docs/gallery/barchart
 */

$show = 5; // Top five entries will be show
$top_brands = [['Brand', 'Recommendations']]; //Define bar chart Axis

/* Get total recommendations according to partners */
$recommendations = \App\Recommendurl::remember(cacheTime('short'))
    ->leftJoin('partners', 'partners.id', 'recommendurls.partner_id')
    ->select(DB::Raw('partner_id, partner_name, COUNT(*) as count'))
    ->where('is_shared', 1)
    ->where('recommendurls.is_test', 0)
    ->whereNotNull('partner_id')
    ->groupBy('partner_id', 'partner_name')
    ->orderBy('count', 'DESC')
    ->take($show)
    ->get();

/*
* Re-arrange data for bar graph
*/
foreach($recommendations AS $recommendation){
    if(isset($recommendation->partner_name, $recommendation->count) && $recommendation->count != 0){
        array_push($top_brands,[$recommendation->partner_name, $recommendation->count]);
    }
}
$top_brands = json_encode($top_brands);
?>

<div class="row">
    <div class="col-md-12">
        <b>Top recommended brands of {{date('Y')}}</b>
        <div id="top_brands_chart_div"></div>
    </div>
</div>

@section('js')
    @parent
    <!--suppress JSUnresolvedVariable, JSUnresolvedFunction -->
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawStacked);


        function drawStacked() {
            var data = google.visualization.arrayToDataTable(
                {!!  $top_brands !!} // assign the data here
            );
            var options = {
                title: 'Recommendations',
                titleTextStyle: {
                    color: '#FFFFF'
                },
                chartArea: {width: '50%', height: '80%'},
                // isStacked: true,
                hAxis: {
                    title: 'Recommendations',
                    minValue: 0
                },
                vAxis: {
                    title: 'Brand'
                },
                bar: {groupWidth: '100%'},
                legend: {position: 'top'},
                colors: ['#B198E9'],

            };
            var chart = new google.visualization.BarChart(document.getElementById('top_brands_chart_div'));
            //chart.draw(data, options);
            // listen for error
            google.visualization.events.addListener(chart, 'error', function (err) {
                // check error
                console.log(err.id, err.message);

                // remove error
                google.visualization.errors.removeError(err.id);

                // remove all errors
                google.visualization.errors.removeAll(document.getElementById('top_brands_chart_div'));
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection