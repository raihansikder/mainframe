<?php
    $from_date = '2019-03-06 00:00:00';
    $to_date = $yesterday_date.' 23:59:59';
    $login_by_region = \App\Classes\Analytics\Analytics::loginByRegion($from_date, $to_date);
?>
<div class='clearfix'></div>
<div>
    <b>Total Users Login By Region</b>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th></th>
                <th>UK</th>
                <th>US</th>
                <th>Other</th>
                <th>Total</th>
            </tr>
        </thead>
            <tr>
                <td>Logins</td>
                <td>{{ $login_by_region['count']['uk'] }}</td>
                <td>{{ $login_by_region['count']['us'] }}</td>
                <td>{{ $login_by_region['count']['other'] }}</td>
                <td>{{ array_sum($login_by_region['count']) }}</td>
            </tr>
            <tr>
                <td>Percentage</td>
                <td>{{ $login_by_region['percentage']['uk'] }}%</td>
                <td>{{ $login_by_region['percentage']['us'] }}%</td>
                <td>{{ $login_by_region['percentage']['other'] }}%</td>
                <td>{{ array_sum($login_by_region['percentage']) }}%</td>
            </tr>
        <tbody>
        </tbody>
    </table>
</div>