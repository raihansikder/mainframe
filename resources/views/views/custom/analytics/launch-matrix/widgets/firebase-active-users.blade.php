<?php
    $previous_date = date("Y-m-d", strtotime("-1 Days", strtotime($to_date)));
    $current_date = date("Y-m-d", strtotime($to_date));
    $previous_daily_user = isset($users_register_login['firebase'][$previous_date]['daily_user']) ? $users_register_login['firebase'][$previous_date]['daily_user'] : 0;
    $previous_monthly_user = isset($users_register_login['firebase'][$previous_date]['monthly_user']) ? $users_register_login['firebase'][$previous_date]['monthly_user'] : 0;


    $daily_user = isset($users_register_login['firebase'][$current_date]['daily_user']) ? $users_register_login['firebase'][$current_date]['daily_user'] : 0;
    $monthly_user = isset($users_register_login['firebase'][$current_date]['monthly_user']) ? $users_register_login['firebase'][$current_date]['monthly_user'] : 0;

    $previous_stikness = ($previous_monthly_user != 0) ? ($previous_daily_user*100/$previous_monthly_user) : 0;
    $current_stikness = ($monthly_user != 0) ? ($daily_user*100/$monthly_user) : 0;
?>
<div class='clearfix'></div>
<div>
    <b>Firebase Active Users</b>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th></th>
                <th>{{ date("l, F d, Y", strtotime("-1 Days", strtotime($to_date))) }}</th>
                <th>{{ date("l, F d, Y", strtotime($to_date)) }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Daily Active Users</td>
                <td>{{ $previous_daily_user }}</td>
                <td>{{ $daily_user }}</td>
            </tr>
            <tr>
                <td>Monthly Active Users</td>
                <td>{{ $previous_monthly_user }}</td>
                <td>{{ $monthly_user }}</td>
            </tr>
            <tr>
                <td>Stickiness (Rolling 30 day)</td>
                <td>{{ round($previous_stikness, 2)}}</td>
                <td>{{ round($current_stikness, 2)}}</td>
            </tr>
        </tbody>
    </table>
</div>