@extends('projects.my-project.layouts.module.form.template')
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Projects\MphMarket\Modules\ScheduleEntries\ScheduleEntry $element
 */
?>

@section('content-top')
    @parent
    @if($element->schedule_id)
        <a class="btn btn-default" href="{{route('schedules.edit',$element->schedule_id)}}">
            <i class="fa fa-angle-left"></i> Schedule #{{$element->schedule_id}}
        </a>
    @endif
@endsection


@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********** --}}
        {{-- **************************************** --}}
        @include('form.text',['var'=>['name'=>'name','label'=>'Name']])
        @include('form.date',['var'=>['name'=>'execute_at','label'=>'Execute at']])
        @include('form.plain-text',['var'=>['name'=>'status','label'=>'Status']])
        @include('form.is-active')
        {{--  ******** Form inputs: ends ************ --}}

        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    {{-- <div class="col-md-6 no-padding-l"><h5>File upload</h5><small>Upload one or more files</small>@include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])</div>--}}
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.schedule-entries.form.js')
@endsection