<?php
/*
 * Documentation :
 * https://developers.google.com/chart/interactive/docs/gallery/barchart
 */
$show = 5;
$most_recommended_brand_categories = [['Brand Categories', 'Recommendations']]; //Define bar chart Axis
/* Get total recommendations according to partners */
/** @noinspection PhpUndefinedMethodInspection */

$recommendations = \App\Recommendurl::remember(cacheTime('short'))
    ->leftJoin('partners', 'partners.id', 'recommendurls.partner_id')
    ->select(DB::Raw('partnercategory_id, partnercategory_name, COUNT(*) as count'))
    ->where('is_shared', 1)
    ->where('recommendurls.is_test', 0)
    ->whereNotNull('partnercategory_id')
    ->groupBy('partnercategory_id', 'partnercategory_name')
    ->orderBy('count', 'DESC')
    ->take($show)
    ->get();
/*
* Re-arrange data for bar graph
*/
foreach ($recommendations AS $recommendation) {
    if (isset($recommendation->partnercategory_name, $recommendation->count) && $recommendation->count != 0) {
        $most_recommended_brand_categories[] = [$recommendation->partnercategory_name, $recommendation->count];
    }
}
$most_recommended_brand_categories = json_encode($most_recommended_brand_categories);
?>
<div class="row">
    <div class="col-md-12">
        <b>Most Recommended Brand Categories of {{date('Y')}}</b>
        <div id="most_recommended_brand_categories_chart_div"></div>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawStacked);

        function drawStacked() {
            var data = google.visualization.arrayToDataTable(
                    {!!  $most_recommended_brand_categories !!} // assign the data here
            );
            var options = {
                title: 'Recommendations',
                titleTextStyle: {
                    color: '#FFFFF'
                },
                chartArea: {width: '50%', height: '80%'},
                hAxis: {
                    title: 'Recommendations by users',
                    minValue: 0
                },
                vAxis: {
                    title: 'Brand Categories'
                },
                bar: {groupWidth: '100%'},
                legend: {position: 'top'},
                colors: ['#28a3d9'],
            };
            var chart = new google.visualization.BarChart(document.getElementById('most_recommended_brand_categories_chart_div'));
            //chart.draw(data, options);
            // listen for error
            google.visualization.events.addListener(chart, 'error', function (err) {
                // check error
                console.log(err.id, err.message);

                // remove error
                google.visualization.errors.removeError(err.id);

                // remove all errors
                google.visualization.errors.removeAll(document.getElementById('most_recommended_brand_categories_chart_div'));
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection