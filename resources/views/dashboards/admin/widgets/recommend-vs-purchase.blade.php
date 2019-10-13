<?php
/** @noinspection ALL */

use App\Purchase;
use App\Recommendurl;

/* get no of month data by changing the @var $month  */
$month = 2;
/* Query to get recommendations count according to months and year */
$recommendations_count = Recommendurl::where('is_test', 0)->remember(cacheTime('short'))
    ->select(
        DB::raw('count(id) as recommend_count'), DB::raw('extract(year from created_at) as year'),
        DB::raw('extract(month from created_at) as month'),
        DB::raw('CONCAT(extract(year from created_at), extract(month from created_at)) as yearmonth'))
    ->groupBy('month', 'year')->orderBy('yearmonth')
    ->where("created_at", ">", \Carbon\Carbon::now()->subMonths($month))->get()->toArray();

/* Query to get purchases count according to months and year */
$purchases_count = Purchase::where('is_test', 0)->remember(cacheTime('short'))
    ->select(DB::raw('count(id) as purchase_count'),
        DB::raw('extract(year from created_at) as year'),
        DB::raw('extract(month from created_at) as month'),
        DB::raw('CONCAT(extract(year from created_at), extract(month from created_at)) as yearmonth'))
    ->groupBy('month', 'year')->orderBy('yearmonth')->where("created_at", ">", \Carbon\Carbon::now()->subMonths($month))
    ->get()->toArray();

$merge_recommendations_purchases = array();
/*  merge recommendations_count and purchases_count array into new array */
foreach ($recommendations_count as $key => $value) {
    if (isset($purchases_count[$key])) {
        $merge_recommendations_purchases[$key] = array_merge($purchases_count[$key], $value);
    } else {
        $value['purchase_count']               = 0;
        $merge_recommendations_purchases[$key] = $value;
    }
}

$recommendations_or_purchases = json_encode($merge_recommendations_purchases);
?>
<hr/>
<div class="row">
    <div class="col-md-12">
        <h5>Recommendations vs purchases (Last {{ $month }} months)</h5>
        <div class="chart" id="recommend_vs_purchase_chart_div">
        </div>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['line', 'corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Month');
            data.addColumn('number', "Recommendations");
            data.addColumn('number', "Purchases");
            var recommendations_or_purchases = {!!  $recommendations_or_purchases !!}; // assign json into javascript variable 
            var graph_figures = []; // assign blank array into variable
            // loop through recommendations_or_purchases for changing the data according to data type 
            $.each(recommendations_or_purchases, function (key, value) {
                var temp = [];
                temp.push(new Date(value.year, --value.month), parseFloat(value.recommend_count), parseFloat(value.purchase_count));
                graph_figures.push(temp);
            });
            data.addRows(graph_figures); // assign all data to addRows method
            var materialOptions = {
                width: '100%',
                height: 300,
                series: {
                    // Gives each series an axis name that matches the Y-axis below.
                    0: {axis: 'Recommendations'},
                    1: {axis: 'Purchases'}
                },
                axes: {
                    // Adds labels to each axis; they don't have to match the axis names.
                    y: {
                        Recommendations: {label: 'Recommendations'},
                        Purchases: {label: 'Purchases'}
                    }
                }
            };
            var materialChart = new google.charts.Line(document.getElementById('recommend_vs_purchase_chart_div'));
            materialChart.draw(data, materialOptions);
        }
    </script>
@endsection