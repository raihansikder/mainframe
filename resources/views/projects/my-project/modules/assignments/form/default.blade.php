@extends('projects.my-project.layouts.module.form.template')
{{--@extends('mainframe.layouts.module.form.template')--}}
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Projects\MphMarket\Modules\Assignments\Assignment $element
 */
use App\Projects\MphMarket\Modules\Assignments\Assignment;
$types = kv(Assignment::$types);
?>

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********** --}}
        {{-- **************************************** --}}
        @include('form.text',['var'=>['name'=>'title','label'=>'Name','div'=>'col-md-10']])
        {{--assigned_to--}}
        @include('form.select-model', ['var'=>['name'=>'assigned_to','label'=>'Assigned to','table'=>'users','div'=>'col-md-3']])
        {{--assigned_by--}}
        @include('form.select-model', ['var'=>['name'=>'assigned_by','label'=>'Assigned by','table'=>'users','div'=>'col-md-3']])
        {{--assigned_for_days--}}
        @include('form.text',['var'=>['name'=>'assigned_for_days','label'=>'Assigned For Days', 'container_class'=>'col-md-3']])
        @include('form.select-array',['var'=>['name'=>'type','label'=>'Type', 'options'=>$types]])
        <div class="clearfix"></div>
        {{--note--}}
        @include('form.textarea',['var'=>['name'=>'note','label'=>'Note','container_class'=>'col-md-6']])
        @include('form.checkbox',['var'=>['name'=>'is_closed','label'=>'Closed','div'=>'col-sm-12']])

        {{--@include('form.is-active')--}}
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
    @include('projects.my-project.modules.assignments.form.js')
@endsection