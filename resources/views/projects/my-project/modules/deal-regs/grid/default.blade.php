@extends('mainframe.layouts.module.grid.template')
@section('title')
    <span style="padding-right: 20px">{{$module->title}}</span>
    @if($user->can('view-report',$model))
        <a href="{{\App\Mainframe\Modules\Reports\Report::defaultForModule($module->id)}}"
           class="pull-right module-list-btn {{$module->name.'-module-list-btn'}}"
           title="View advanced report with filters, excel export etc."
           data-toggle="tooltip"
           target="_blank">
            <i class="fa fa-file-text"></i> &nbsp;
        </a>
    @endif
@endsection
