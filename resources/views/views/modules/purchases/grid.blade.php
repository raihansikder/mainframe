@extends('template.app-frame')

<?php
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


    <?php
    //
    // if (user()->ofPartner()) {
    //
    //     $report_excel_link = route('download-conversion-excel',user()->partner_id);
    //
    //     // $report_excel_link = route('home')."/purchases/report?submit=Run&report_name=&rows_per_page=25&pur_partner_id%5B%5D=66&pur_partner_env=+&is_approved=+&from_date=&to_date=&route=&show_columns_csv=purchase_id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2CSTATUS%2Crecommendurl_short_code&alias_columns_csv=ID%2CCreated+at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity+Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort+Code&order_by=";
    //         }
    // echo $report_excel_link;
    ?>


    @if(user()->ofPartner())
        <a href="{{route('download-conversion-excel')}}" class="btn btn-default btn-xs"
           title="Download excel"
           target="_blank">
            <i class="fa fa-file-excel-o"></i> &nbsp;DOWNLOAD EXCEL
        </a>
    @elseif(hasModulePermission($module_name,"report"))
        <a href="{{\App\Report::defaultForModule($mod->id)}}" class="btn btn-default btn-xs"
           title="View advanced report with filters, excel export etc."
           target="_blank">
            <i class="fa fa-file-excel-o"></i> &nbsp;VIEW ADVANCED REPORT
        </a>
    @endif

@endsection

@section('content')
    {{--<a href="{{\App\Report::defaultForModule($mod->id)}}" title="Report" class="btn btn-default">--}}
    {{--<i class="fa fa-file-excel-o"></i>  &nbsp;&nbsp;ADVANCED REPORT--}}
    {{--</a>--}}
    {{--<div class="clearfix"></div>--}}
    @include('modules.base.include.datatable')
@endsection
