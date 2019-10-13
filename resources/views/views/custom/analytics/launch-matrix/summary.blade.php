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
    <span style="padding-right: 20px">Launch Matrix - Summary</span>

@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('dashboards.daterange-picker')
            @include('custom.analytics.launch-matrix.widgets.graph-cumulative-registration-login')
            @include('custom.analytics.launch-matrix.widgets.total-recommend-conversion-by-route')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('custom.analytics.launch-matrix.widgets.total-cumulative-registration-login')
        </div>
        <div class="col-md-6">
            @include('custom.analytics.launch-matrix.widgets.total-users-login-by-region')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('custom.analytics.launch-matrix.widgets.firebase-active-users')
        </div>
        <div class="col-md-6">
            @include('custom.analytics.launch-matrix.widgets.time-spent-on-app')
        </div>
    </div>
@endsection
