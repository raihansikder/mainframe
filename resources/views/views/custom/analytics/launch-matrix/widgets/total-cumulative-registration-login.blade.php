<?php
    $registration_by_todate = 0;
    $registration_by_previous_day_of_todate = 0;
    $count = 1;
    foreach($users_register_login['registrations'] AS $usersregisterlogin){
        $registration_by_todate += array_sum($usersregisterlogin);
        if($count < count($users_register_login['registrations'])){
            $registration_by_previous_day_of_todate += array_sum($usersregisterlogin);
        }
        $count++;
    }
    $increment_registration = $registration_by_todate-$registration_by_previous_day_of_todate;
    if($registration_by_todate != 0){
        $increment_registration_percentage = ($increment_registration*100)/$registration_by_todate;
    }else{
        $increment_registration_percentage = 0;
    }

    $login_by_todate = 0;
    $login_by_previous_day_of_todate = 0;
    $count = 1;
    foreach($users_register_login['logins'] AS $usersregisterlogin){
        $login_by_todate += array_sum($usersregisterlogin);
        if($count < count($users_register_login['logins'])){
            $login_by_previous_day_of_todate += array_sum($usersregisterlogin);
        }
        $count++;
    }
    $increment_login = $login_by_todate-$login_by_previous_day_of_todate;
    if($login_by_todate != 0){
        $increment_login_percentage = ($increment_login*100)/$login_by_todate;
    }else{
        $increment_login_percentage = 0;
    }

    $download_by_todate = 0;
    $download_by_previous_day_of_todate = 0;
    $count = 1;
    foreach($users_register_login['firebase'] AS $usersregisterlogin){
        $download_by_todate += isset($usersregisterlogin['download']) ? $usersregisterlogin['download'] : 0;
        if($count < count($users_register_login['firebase'])){
            $download_by_previous_day_of_todate += isset($usersregisterlogin['download']) ? $usersregisterlogin['download'] : 0;
        }
        $count++;
    }

    $increment_download = $download_by_todate-$download_by_previous_day_of_todate;
    if($download_by_todate != 0){
        $increment_download_percentage = ($increment_download*100)/$download_by_todate;
    }else{
        $increment_download_percentage = 0;
    }
?>
<div class='clearfix'></div>
<div>
    <b>Cumulative Registrations & Logins</b>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th rowspan=2></th>
                <th colspan=2 class="text-center">Cumulative</th>
                <th colspan=2 class="text-center">Increase</th>
            </tr>
            <tr>
                <th>{{ date("l, F d, Y", strtotime("-1 Days", strtotime($to_date))) }}</th>
                <th>{{ date("l, F d, Y", strtotime($to_date)) }}</th>
                <th>Total</th>
                <th>% age</th>
            </tr>
        </thead>
            <tr>
                <td>Downloads</td>
                <td>{{ $download_by_previous_day_of_todate }}</td>
                <td>{{ $download_by_todate }}</td>
                <td>{{ $increment_download }}</td>
                <td>{{ round($increment_download_percentage) }}%</td>
            </tr>
            <tr>
                <td>Registrations</td>
                <td>{{ $registration_by_previous_day_of_todate }}</td>
                <td>{{ $registration_by_todate }}</td>
                <td>{{ $increment_registration }}</td>
                <td>{{ round($increment_registration_percentage) }}%</td>
            </tr>
            <tr>
                <td>Logins</td>
                <td>{{ $login_by_previous_day_of_todate }}</td>
                <td>{{ $login_by_todate }}</td>
                <td>{{ $increment_login }}</td>
                <td>{{ round($increment_login_percentage) }}%</td>
            </tr>
        <tbody>
        </tbody>
    </table>
</div>