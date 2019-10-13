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
    $from_date = $yesterday_date.' 00:00:00';
    $to_date = $yesterday_date.' 23:59:59';
 }
 $new_users = \App\Classes\Analytics\Analytics::newUsers($from_date, $to_date);
 ?>

@section('sidebar-left')
    @include('modules.base.include.sidebar-left')
@endsection

@section('title')
    <span style="padding-right: 20px">New Users</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('dashboards.daterange-picker')
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($new_users AS $new_user)
                <tr>
                    <td>{{ $new_user['name'] }}</td>
                    <td>{{ $new_user['email'] }}</td>
                    <td>{{ $new_user['country'] }}</td>
                    <td>{{ $new_user['action'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
