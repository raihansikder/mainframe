<?php
$registration_by_todate = 0;
$registration_by_previous_day_of_todate = 0;
$count = 1;
foreach ($users_register_login['registrations'] AS $usersregisterlogin) {
    $registration_by_todate += array_sum($usersregisterlogin);
    if ($count < count($users_register_login['registrations'])) {
        $registration_by_previous_day_of_todate += array_sum($usersregisterlogin);
    }
    $count++;
}
$increment_registration = $registration_by_todate - $registration_by_previous_day_of_todate;
if ($registration_by_todate != 0) {
    $increment_registration_percentage = ($increment_registration * 100) / $registration_by_todate;
} else {
    $increment_registration_percentage = 0;
}

$login_by_todate = 0;
$login_by_previous_day_of_todate = 0;
$count = 1;
foreach ($users_register_login['logins'] AS $usersregisterlogin) {
    $login_by_todate += array_sum($usersregisterlogin);
    if ($count < count($users_register_login['logins'])) {
        $login_by_previous_day_of_todate += array_sum($usersregisterlogin);
    }
    $count++;
}
$increment_login = $login_by_todate - $login_by_previous_day_of_todate;
if ($login_by_todate != 0) {
    $increment_login_percentage = ($increment_login * 100) / $login_by_todate;
} else {
    $increment_login_percentage = 0;
}
//actual calculation starts after this
$previous_date = date("Y-m-d", strtotime("-1 Days", strtotime($to_date)));
$current_date = date("Y-m-d", strtotime($to_date));

$previous_date_daily_time_spent_on_app = isset($users_register_login['firebase'][$previous_date]['daily_time_spent_on_app']) ? $users_register_login['firebase'][$previous_date]['daily_time_spent_on_app'] : 0;

$previous_date_monthly_time_spent_on_app = isset($users_register_login['firebase'][$previous_date]['monthly_time_spent_on_app']) ? $users_register_login['firebase'][$previous_date]['monthly_time_spent_on_app'] : 0;

$current_date_daily_time_spent_on_app = isset($users_register_login['firebase'][$current_date]['daily_time_spent_on_app']) ? $users_register_login['firebase'][$current_date]['daily_time_spent_on_app'] : 0;

$current_date_monthly_time_spent_on_app = isset($users_register_login['firebase'][$current_date]['monthly_time_spent_on_app']) ? $users_register_login['firebase'][$current_date]['monthly_time_spent_on_app'] : 0;

?>
<div class='clearfix'></div>
<div>
    <b>Firebase Time on App</b>
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
            <td>Daily</td>
            <td>{{ gmdate('H:i:s', $previous_date_daily_time_spent_on_app) }}</td>
            <td>{{ gmdate('H:i:s',$current_date_daily_time_spent_on_app) }}</td>
        </tr>
        <tr>
            <td>Monthly</td>
            <td>{{ gmdate('H:i:s',$previous_date_monthly_time_spent_on_app) }}</td>
            <td>{{ gmdate('H:i:s',$current_date_monthly_time_spent_on_app) }}</td>
        </tr>
        </tbody>
    </table>
</div>