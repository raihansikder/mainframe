<?php
/*
 * Documentation :
 * https://developers.google.com/chart/interactive/docs/gallery/barchart
 */

?>

<div class="row">
    <div class="col-md-12">
        <h4>Top recommended brands</h4>
        <div id="chart_div"></div>
    </div>
</div>

@section('js')
    @parent

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawStacked);

        function drawStacked() {
            var data = google.visualization.arrayToDataTable([
                ['City', '2010 Population'],
                ['New York City, NY', 8175000],
                ['Los Angeles, CA', 3792000],
                ['Chicago, IL', 2695000],
                ['Houston, TX', 2099000],
                ['Philadelphia, PA', 1526000]
            ]);

            var options = {
                // title: 'Population of Largest U.S. Cities',
                chartArea: {width: '75%'},
                // isStacked: true,
                hAxis: {
                    title: 'Total recommendations',
                    minValue: 0,
                },
                vAxis: {
                    title: 'Brands'
                }
            };
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@endsection