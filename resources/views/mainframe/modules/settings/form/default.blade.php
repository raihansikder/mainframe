@extends('mainframe.layouts.module.form.template')

<?php
use App\Mainframe\Modules\Settings\Setting;
$types = Setting::$types;
?>

@section('content')
    <div class="col-md-12 col-lg-10 no-padding">

        @if(($formState === 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState === 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif
        {{--    Form inputs: starts    --}}
        {{--   --------------------    --}}
        @include('mainframe.form.text',['var'=>['name'=>'name','label'=>'Name']])
        @include('mainframe.form.text',['var'=>['name'=>'title','label'=>'Title']])
        <div class="clearfix"></div>

        @include('mainframe.form.select-array',['var'=>['name'=>'type','label'=>'type', 'options'=>$types]])
        <div class="clearfix"></div>

        @include('mainframe.form.textarea',['var'=>['name'=>'value','label'=>'Value']])
        <div class="clearfix"></div>

        @include('mainframe.form.textarea',['var'=>['name'=>'description','label'=>'Description', 'params'=>['class'=>'ckeditor']]])
        @include('mainframe.form.is-active')

        {{--    Form inputs: ends    --}}
        @include('mainframe.form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <div class="col-md-6 no-padding-l">
        <h5>File upload</h5>
        <small>Upload one or more files</small>

        @include('mainframe.form.uploads',['var'=>['limit'=>99]])
    </div>
@endsection

@section('js')
    @parent
    @include('mainframe.modules.settings.form.js')
@endsection