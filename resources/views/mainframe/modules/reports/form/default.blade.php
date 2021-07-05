@extends('mainframe.layouts.module.form.template')
<?php
/**
 * @var \App\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Report $element
 * @var \App\Report $report
 * @var \App\Tenant $tenant
 * @var \App\Mainframe\Modules\SuperHeroes\SuperHeroViewProcessor $view
 */
$report = $element;
?>

@section('content-top')
    @parent
    @if($element->isCreated())
        <a href="{!! $element->url() !!}" class="btn btn-default bg-smart-blue" target="_blank">Run Report</a>
    @endif
    <div class="clearfix margin"></div>
@endsection

@section('content')
    <div class="col-md-12 col-lg-10 no-padding">

        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--    Form inputs: starts    --}}
        {{--   --------------------    --}}
        @include('form.text',['var'=>['name'=>'name','label'=>'Name']])
        @include('form.text',['var'=>['name'=>'code','label'=>'Code']])
        {{-- @include('form.text',['var'=>['name'=>'title','label'=>'Title']])--}}
        @include('form.textarea',['var'=>['name'=>'description','label'=>'Description']])
        @include('form.textarea',['var'=>['name'=>'parameters','label'=>'Parameters']])
        @include('form.text',['var'=>['name'=>'type','label'=>'type']])
        @include('form.text',['var'=>['name'=>'version','label'=>'Version']])
        @include('form.text',['var'=>['name'=>'module_id','label'=>'Module ID']])
        {{-- is_module_default--}}
        @include('form.tags',['var'=>['name'=>'tags','label'=>'Tags']])
        @include('form.is-active')
        {{-- Form inputs: ends    --}}
        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    {{--<div class="col-md-6 no-padding-l"><h5>File upload</h5><small>Upload one or more files</small>@include('form.uploads',['var'=>['limit'=>99]])</div>--}}
@endsection

@section('js')
    @parent
    @include('mainframe.modules.reports.form.js')
@endsection