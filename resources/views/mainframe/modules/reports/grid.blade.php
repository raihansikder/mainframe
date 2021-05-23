@extends('template.app-frame')

<?php
/**
 * Variables
 * @var $moduleName string 'superheroes'
 * @var $currentModule         \App\Mainframe\Modules\Modules\Module
 * @var $uuid        string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>

@section('sidebar-left')
    @include('mainframe.modules.base.include.sidebar-left')
@endsection

@section('title')
    <span style="padding-right: 20px">{{$module->title}}</span>
    @if($user->can('create',$element))
        <a class="btn btn-xs btn-success" href="{{route("$moduleName.create")}}" data-toggle="tooltip"
           title="Create a new {{lcfirst(Str::singular($module->title))}}"><i class="fa fa-plus"></i> &nbsp;CREATE NEW </a>
    @endif



    @if(hasModulePermission($moduleName,"report"))
        <a href="{{\App\Report::defaultForModule($module->id)}}" class="btn btn-default btn-xs"
           title="View advanced report with filters, excel export etc."
           target="_blank"><i class="fa fa-file-excel-o"></i> &nbsp;VIEW ADVANCED REPORT
        </a>
    @endif
@endsection

@section('content-bottom')
    @include('mainframe.modules.reports.analytics-list')
@endsection

@section('content')
    {{--<a href="{{\App\Report::defaultForModule($currentModule->id)}}" title="Report" class="btn btn-default">--}}
    {{--<i class="fa fa-file-excel-o"></i>  &nbsp;&nbsp;ADVANCED REPORT--}}
    {{--</a>--}}
    {{--<div class="clearfix"></div>--}}
    @include('mainframe.modules.base.include.datatable')
@endsection
