@extends('mainframe.layouts.module.form.layout')

@section('content')
    <div class="col-md-12 no-padding">

        @if(($formState === 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState === 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--    Form inputs: starts    --}}
        {{--   --------------------    --}}

        @include('mainframe.form-elements.text.input-text',['var'=>['name'=>'name','label'=>'Name','container_class'=>'col-sm-3']])
        @include('mainframe.form-elements.text.input-text',['var'=>['name'=>'title','label'=>'Title','container_class'=>'col-sm-3']])
        <div class="clearfix"></div>

        @include('mainframe.form-elements.select.select-array',['var'=>['name'=>'type','label'=>'type', 'options'=>\App\Setting::$types,'container_class'=>'col-sm-3']])
        <div class="clearfix"></div>

        @include('mainframe.form-elements.text.textarea',['var'=>['name'=>'value','label'=>'Value', 'container_class'=>'col-sm-6']])
        <div class="clearfix"></div>

        @include('mainframe.form-elements.text.textarea',['var'=>['name'=>'description','label'=>'Description', 'container_class'=>'col-sm-6','params'=>['class'=>'ckeditor']]])
        @include('mainframe.form-elements.custom.is_active')

        {{--    Form inputs: ends    --}}

        @include('mainframe.layouts.module.form.includes.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <div class="col-md-6 no-padding-l">
        <h5>File upload</h5>
        <small>Upload one or more files</small>
        @include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])
    </div>
@endsection

@section('js')
    @parent
    @include('mainframe.modules.settings.form.js')
@endsection