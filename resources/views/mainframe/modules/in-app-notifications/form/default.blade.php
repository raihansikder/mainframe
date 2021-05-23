@extends('mainframe.layouts.module.form.template')
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Mainframe\Modules\InAppNotifications\InAppNotification $element
 * @var \App\Mainframe\Modules\InAppNotifications\InAppNotification $inAppNotification
 * @var \App\Mainframe\Modules\InAppNotifications\InAppNotificationViewProcessor $view
 */
$inAppNotification = $element;
?>

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{---------------|  Form input start |-----------------------}}
        <div class="col-md-6 no-padding-l">

            @include('form.text',['var'=>['name'=>'user_id','label'=>'User Id.', 'div'=>'col-md-4']])
            @include('form.text',['var'=>['name'=>'type','label'=>'Type', 'div'=>'col-md-4']])
            @include('form.text',['var'=>['name'=>'event','label'=>'Created on Event', 'div'=>'col-md-4']])

            <div class="clearfix"></div>

            @include('form.text',['var'=>['name'=>'name','label'=>'Name/Title', 'div'=>'col-md-12']])
            @include('form.text',['var'=>['name'=>'subtitle','label'=>'Subtitle', 'div'=>'col-md-12']])

            <div class="clearfix"></div>
            @include('form.textarea',['var'=>['name'=>'body','label'=>'Body', 'div'=>'col-md-12']])
            <div class="clearfix"></div>

            @include('form.text',['var'=>['name'=>'order','label'=>'Order']])
            @include('form.select-array',['var'=>['name'=>'is_visible','label'=>'Visible', 'options'=>[ 0 => 'No', 1 => 'Yes']]])

            {{--@include('form.text',['var'=>['name'=>'announcement_id','label'=>'Announcement Id']])--}}
            @include('form.select-array',['var'=>['name'=>'accepts_response','label'=>'Accepts Response', 'options'=>[ 0 => 'No', 1 => 'Yes']]])
            @include('form.text',['var'=>['name'=>'response_options','label'=>'Response Options', 'div'=>'col-md-12']])
            @include('form.text',['var'=>['name'=>'response','label'=>'Response']])
            @include('form.datetime',['var'=>['name'=>'responded_at','label'=>'Responded at']])
            @include('form.datetime',['var'=>['name'=>'read_at','label'=>'Read at']])

            <div class="clearfix"></div>
            @include('form.text',['var'=>['name'=>'images','label'=>'Images', 'div'=>'col-md-12']])
            @include('form.textarea',['var'=>['name'=>'data','label'=>'Additional Data/Payload', 'div'=>'col-md-12']])

            <div class="clearfix"></div>

            @include('form.is-active')
        </div>
        <div class="col-md-6 no-padding-l">
            <h3>Object</h3>
            @dump(json_decode($element->toJson()))
        </div>
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
    @include('mainframe.modules.in-app-notifications.form.js')
@endsection