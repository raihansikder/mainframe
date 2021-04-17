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
 * @var \App\Spread $element
 * @var \App\Spread $spread
 * @var \App\Mainframe\Modules\Spreads\SpreadViewProcessor $view
 */
$spread = $element;
?>

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{---------------|  Form input start |-----------------------}}
        @include('form.text',['var'=>['name'=>'name','label'=>'Name']])
        @include('form.is-active')
        {{---------------|  Form input start |-----------------------}}

        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    {{--<div class="col-md-6 no-padding-l">
        <h5>File upload</h5><small>Upload one or more files</small>
        @include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])
    </div>--}}
@endsection

@section('js')
    @parent
    @include('mainframe.modules.spreads.form.js')
@endsection