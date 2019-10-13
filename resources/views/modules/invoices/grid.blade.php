@extends('template.app-frame')

<?php
use App\Partner;use App\Charity;
/**
 * Variables used in this view file.
 * @var $module_name string 'superheroes'
 * @var $mod         \App\Module
 * @var $uuid        string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>

@section('sidebar-left')
    @include('modules.base.include.sidebar-left')
@endsection

@section('title')

    <span style="padding-right: 20px">{{$mod->title}}</span>
    @if(hasModulePermission($module_name,"create"))
        <a class="btn btn-xs btn-success" href="{{route("$module_name.create")}}" data-toggle="tooltip"
           title="Create a new {{lcfirst(Str::singular($mod->title))}}"><i class="fa fa-plus"></i> &nbsp;CREATE NEW </a>
    @endif

    {{--@if(hasModulePermission($module_name,"view-list"))--}}
    {{--<a class="btn btn-xs" href="{{route("$module_name.index")}}" data-toggle="tooltip"--}}
    {{--title="View list of {{lcfirst(str_plural($mod->title))}}"><i class="fa fa-list"></i></a>--}}
    {{--@endif--}}

    @if(hasModulePermission($module_name,"report"))
        <a href="{{\App\Report::defaultForModule($mod->id)}}" class="btn btn-default btn-xs"
           title="View advanced report with filters, excel export etc."
           target="_blank">
            <i class="fa fa-file-excel-o"></i> &nbsp;VIEW ADVANCED REPORT
        </a>
    @endif

@endsection


@section('content-top')
    <?php
    $name = "Partner Invoice Batch ".today()->format('Y-m-d');
    $beneficiary_type = "partner";
    $invoice_date = Partner::lastCycle()->format('Y-m-d');
    $purchases_till = $invoice_date;

    $url = route('batchinvoices.create')."?name={$name}&beneficiary_type={$beneficiary_type}&invoice_date={$invoice_date}&purchases_till={$purchases_till}";
    ?>
    <a target="_blank" href="{{$url}}" class="btn btn-default"><i class="fa fa-plus"></i> Create Batch Invoices for <strong>Partners ({{$invoice_date}})</strong></a>

    <?php
    /** @noinspection SuspiciousAssignmentsInspection */
    $name = "Charity Invoice Batch ".today()->format('Y-m-d');
    $beneficiary_type = "charity";
    $invoice_date = Charity::nextCycle()->subDays(3)->format('Y-m-d');
    $purchases_till = Charity::qualifyingPurchaseDate(Charity::nextCycle())->format('Y-m-d');



    $url = route('batchinvoices.create')."?name={$name}&beneficiary_type={$beneficiary_type}&invoice_date={$invoice_date}&purchases_till={$purchases_till}";
    ?>
    <a target="_blank" href="{{$url}}" class="btn btn-default"><i class="fa fa-plus"></i> Create Batch Invoices for <strong>Charities ({{$invoice_date}})</strong></a>

    <?php
    /** @noinspection SuspiciousAssignmentsInspection */
    $name = "User Invoice Batch ".today()->format('Y-m-d');
    $beneficiary_type = "recommender";
    $invoice_date = now()->format('Y-m-d');
    $url = route('batchinvoices.create')."?name={$name}&beneficiary_type={$beneficiary_type}&invoice_date={$invoice_date}";
    ?>
    <a target="_blank" href="{{$url}}" class="btn btn-default"><i class="fa fa-plus"></i> Create Batch Invoices for <strong>Users (Today's payment)</strong></a>
@endsection


@section('content')
    {{--<a href="{{\App\Report::defaultForModule($mod->id)}}" title="Report" class="btn btn-default">--}}
    {{--<i class="fa fa-file-excel-o"></i>  &nbsp;&nbsp;ADVANCED REPORT--}}
    {{--</a>--}}
    {{--<div class="clearfix"></div>--}}
    @include('modules.base.include.datatable')
@endsection
