<?php
    $graph_data = array();
    $graph_data = [['Date', 'Logins', 'Registrations']]; //Define bar chart Axis
    foreach($users_register_login['registrations'] AS $date => $usersregister){
        if(isset($users_register_login['logins'][$date])){
            array_push($graph_data, [$date, array_sum($usersregister), array_sum($users_register_login['logins'][$date])]);
        }else{
            array_push($graph_data, [$date, array_sum($usersregister), 0]);
        }
    }
    //echo "<pre>"; print_r($graph_data); die;
    $json_graph_data = json_encode($graph_data);
?>
<div class='clearfix'></div>
<div>
    <b>Graph Cumulative Registrations & Logins</b>
    <div id="users-cumulative-registration-login"></div>
</div>
@section('js')
    @parent
    <!--suppress JSUnresolvedVariable, JSUnresolvedFunction -->
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawStacked);


        function drawStacked() {
            var data = google.visualization.arrayToDataTable(
                {!!  $json_graph_data !!} // assign the data here
            );
            var options = {
                //chartArea: {width: '90%', height: '80%'},
                // isStacked: true,
                hAxis: {
                    title: 'Date',
                    minValue: 0
                },
                vAxis: {
                    title: 'Logins/Registrations'
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('users-cumulative-registration-login'));
            //chart.draw(data, options);
            // listen for error
            google.visualization.events.addListener(chart, 'error', function (err) {
                // check error
                console.log(err.id, err.message);

                // remove error
                google.visualization.errors.removeError(err.id);

                // remove all errors
                google.visualization.errors.removeAll(document.getElementById('users-cumulative-registration-login'));
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection