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
 }else{
    $yesterday_date = date("Y-m-d", strtotime("-1 Days"));
    $from_date = '2019-03-02 00:00:00';
 }
?>

@section('sidebar-left')
    @include('modules.base.include.sidebar-left')
@endsection

@section('title')
    <span style="padding-right: 20px">Launch Matrix - Full details of recommendations & conversions</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('dashboards.daterange-picker')
    </div>
    <div class="col-md-6">
        <?php 
            $heading = "Cumulative Recommendations & Conversions"; 
            $to_date = $yesterday_date.' 23:59:59';
            $top = 0;
        ?>
        @include('custom.analytics.launch-matrix.widgets.cumulative-recommendation-conversion-brands')
    </div>
    <div class="col-md-6">
        <?php 
            $heading = "Recommendatoins & Conversions – ".date("d F", strtotime($yesterday_date));
            $from_date = $yesterday_date.' 00:00:00';
            $to_date = $yesterday_date.' 23:59:59';
            $top = 0;
        ?>
        @include('custom.analytics.launch-matrix.widgets.cumulative-recommendation-conversion-brands')
    </div>
</div>
@endsection
