<?php
/*
 * Documentation :
 * https://developers.google.com/chart/interactive/docs/gallery/barchart
 */
/** @var \App\Partner $partner */
$show = 5; // Top five entries will be show

// $from = \Carbon\Carbon::now()->subMonth()->startOfMonth(); // previous month start date
// $till = \Carbon\Carbon::now()->subMonth()->endOfMonth(); // previous month end date

$start = new \Carbon\Carbon('first day of last month');
$from = $start->startOfMonth();
$end = new \Carbon\Carbon('last day of last month');
$till = $end->endOfMonth();

$most_selected_charities = [['Charity', 'Recommendations']]; //Define bar chart Axis
/* Get total recommendations according to charity */
$recommendations = \App\Recommendurl::remember(cacheTime('short'))
    ->leftJoin('charities', 'charities.id', 'recommendurls.charity_id')
    ->select(DB::Raw('charity_id, charity_name, COUNT(*) as count'))
    ->where('partner_id', $partner->id)
    ->where('is_shared', 1)
    ->whereBetween("recommendurls.created_at", [$from, $till])
    ->where('recommendurls.is_test', 0)
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
        array_push($most_selected_charities,[substr($recommendation->charity_name,0,15), $recommendation->count]);
    }
}
$most_selected_charities = json_encode($most_selected_charities);
?>

<div class="row">
    <div class="col-md-12">
        <b style="padding-left:5%;">Most selected charity: Prior Month*</b>
        <div id="most_selected_charities_chart_div" ></div>
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
                    color: '#FFFFFF'
                },
                chartArea: {left: '25%', width: '50%', height: '80%'},
                // isStacked: true,
                hAxis: {
                    title: 'Recommendations by users',
                    minValue: 0
                },
                vAxis: {
                    title: 'Charity'
                },
                bar: {groupWidth: '61%'},
                legend: {position: 'top'},
                colors: ['#68BEE4'],
            };
            var container = document.getElementById('most_selected_charities_chart_div');
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
                $("#most_selected_charities_chart_div").parent().remove();
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