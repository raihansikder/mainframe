@extends('template.app-frame')

<?php
/**
 * Variables used in this view file.
 * @var $module_name string 'superheroes'
 * @var $mod         \App\Module
 * @var $uuid        string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
 if(Request::has('date_range_from')){
    $yesterday_date = Request::get('date_range_to');
    $from_date = Request::get('date_range_from').' 00:00:00';
    $to_date = Request::get('date_range_to').' 23:59:59';
 }else{
    $yesterday_date = date("Y-m-d", strtotime("-1 Days"));
    $from_date = '2019-03-06 00:00:00';
    $to_date = $yesterday_date.' 23:59:59';
 }
 $users_register_login = \App\Classes\Analytics\Analytics::comulativeRegistrationsAndLogins($from_date, $to_date);
 ?>

@section('sidebar-left')
    @include('modules.base.include.sidebar-left')
@endsection

@section('title')
    <span style="padding-right: 20px">Cumulative Registrations & Logins</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('dashboards.daterange-picker')
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Users</th>
                    <th>Registrations</th>
                    <th>Logins</th>
                    <th>Downloads</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users_register_login['registrations'] AS $date=>$registrations)
                <tr>
                    <td>{{ $date }}</td>
                    <td>{{ isset($users_register_login['firebase'][$date]['daily_user']) ? $users_register_login['firebase'][$date]['daily_user'] : 0 }}</td>
                    <td>{{ array_sum($registrations) }}</td>
                    <td>{{ isset($users_register_login['logins'][$date]) ? array_sum($users_register_login['logins'][$date]) : 0 }}</td>
                    <td>{{ isset($users_register_login['firebase'][$date]['download']) ? $users_register_login['firebase'][$date]['download'] : 0 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
