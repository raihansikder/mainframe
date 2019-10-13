<?php
/*
 * Documentation :
 * https://developers.google.com/chart/interactive/docs/gallery/barchart
 */
$show = 5; // Top five entries will be show
/* Get most selected charities */
$most_selected_charities = [['Charity', 'Recommendations']]; //Define bar chart Axis
$recommendations = \App\Recommendurl::remember(cacheTime('short'))
    ->leftJoin('charities', 'charities.id', 'recommendurls.charity_id')
    ->select(DB::Raw('charity_id, charity_name, COUNT(*) as count'))
    ->where('recommendurls.is_test', 0)
    ->where('is_shared', 1)
    ->whereNotNull('charity_id')
    ->groupBy('charity_id', 'charity_name')
    ->orderBy('count', 'DESC')
    ->take($show)
    ->get();

/*
* Re-arrange data for bar graph
*/
foreach($recommendations AS $recommendation){
    if(isset($recommendation->charity_name, $recommendation->count) && $recommendation->count != 0){
        array_push($most_selected_charities,[$recommendation->charity_name, $recommendation->count]);
    }
}
$most_selected_charities = json_encode($most_selected_charities);
?>

<div class="row">
    <div class="col-md-12">
        <b>Most selected charity of {{date('Y')}}</b>
        <div id="most_selected_charities_chart_div"></div>
    </div>
</div>

@section('js')
    @parent

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawStacked);


        function drawStacked() {
            var data = google.visualization.arrayToDataTable(
                    {!!  $most_selected_charities !!} // assign the data here
            );

            var options = {
                title: 'Recommendations',
                titleTextStyle: {
                    color: '#FFFFF'
                },
                chartArea: {width: '50%', height: '80%'},
                // isStacked: true,
                hAxis: {
                    title: 'Recommendations by users',
                    minValue: 0
                },
                vAxis: {
                    title: 'Charity'
                },
                bar: {groupWidth: '100%'},
                legend: {position: 'top'},
                colors: ['#906ce0'],
            };
            var chart = new google.visualization.BarChart(document.getElementById('most_selected_charities_chart_div'));
            //chart.draw(data, options);
            // listen for error
            google.visualization.events.addListener(chart, 'error', function (err) {
                // check error
                console.log(err.id, err.message);

                // remove error
                google.visualization.errors.removeError(err.id);

                // remove all errors
                google.visualization.errors.removeAll(document.getElementById('most_selected_charities_chart_div'));
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection