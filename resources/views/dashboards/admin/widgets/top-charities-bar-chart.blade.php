<?php
/*
 * Documentation :
 * https://developers.google.com/chart/interactive/docs/gallery/barchart
 */
$show = 5; // Top five entries will be show
/* Get top earned charities on the bases of donation in lb currency */
$top_earned_charities = [['Charity', 'Earnings']]; //Define bar chart Axis
$purchases = \App\Purchase::remember(cacheTime('short'))
    ->leftJoin('charities', 'charities.id', 'purchases.charity_id')
    ->select(DB::Raw('charity_id, charity_name, SUM(charity_donation_in_lb_currency) as charity_earning'))
    ->where('purchases.is_test', 0)
    ->whereNotNull('charity_id')
    ->groupBy('charity_id', 'charity_name')
    ->orderBy('charity_earning', 'DESC')
    ->take($show)
    ->get();

/*
* Re-arrange data for bar graph
*/
foreach($purchases AS $purchase){
    if(isset($purchase->charity_name, $purchase->charity_earning) && $purchase->charity_earning != 0){
        array_push($top_earned_charities,[$purchase->charity_name, $purchase->charity_earning]);
    }
}
$top_earned_charities = json_encode($top_earned_charities);
?>

<div class="row">
    <div class="col-md-12">
        <b>Top earned charities of {{date('Y')}}</b>
        <div id="top_charities_chart_div"></div>
    </div>
</div>

@section('js')
    @parent

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawStacked);


        function drawStacked() {
            var data = google.visualization.arrayToDataTable(
                    {!!  $top_earned_charities !!} // assign the data here
            );

            var options = {
                title: 'Earnings',
                titleTextStyle: {
                    color: '#FFFFF'
                },
                chartArea: {width: '50%', height: '80%'},
                // isStacked: true,
                hAxis: {
                    title: 'Earnings',
                    minValue: 0
                },
                vAxis: {
                    title: 'Charity'
                },
                bar: {groupWidth: '100%'},
                legend: {position: 'top'},
                colors: ['#68BEE4'],
                // is3D:true

            };
            var chart = new google.visualization.BarChart(document.getElementById('top_charities_chart_div'));
            //chart.draw(data, options);
            // listen for error
            google.visualization.events.addListener(chart, 'error', function (err) {
                // check error
                console.log(err.id, err.message);

                // remove error
                google.visualization.errors.removeError(err.id);

                // remove all errors
                google.visualization.errors.removeAll(document.getElementById('top_charities_chart_div'));
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection