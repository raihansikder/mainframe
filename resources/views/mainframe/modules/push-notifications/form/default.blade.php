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
 * @var \App\Mainframe\Modules\PushNotifications\PushNotification $element
 * @var \App\Mainframe\Modules\PushNotifications\PushNotification $pushNotification
 * @var \App\Mainframe\Modules\PushNotifications\PushNotificationViewProcessor $view
 */
$pushNotification = $element;
?>

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{---------------|  Form input start |-----------------------}}
        @include('form.select-model',['var'=>['name'=>'user_id','label'=>'User','table'=>'users','class'=>'col-md-4']])
        @include('form.text',['var'=>['name'=>'device_token','label'=>'Device Token (FCM Token)']])

        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'name','label'=>'Name(Message Title)']])
        <div class="clearfix"></div>
        @include('form.textarea',['var'=>['name'=>'body','label'=>'Body','div'=>'col-md-6']])
        <div class="clearfix"></div>
        @include('form.textarea',['var'=>['name'=>'data','label'=>'Data']])
        <div class="clearfix"></div>
        {{--@include('form.text',['var'=>['name'=>'in_app_notification_id','label'=>'In-App Notification Id']])--}}

        @include('form.text',['var'=>['name'=>'order','label'=>'Order']])
        @include('form.text',['var'=>['name'=>'type','label'=>'Type']])
        @include('form.text',['var'=>['name'=>'event','label'=>'Event']])

        <div class="clearfix"></div>
        <div class="col-md-6 no-padding-l">
            <code>API Response</code>
            @dump($element->api_response_json)

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
    @include('mainframe.modules.push-notifications.form.js')
@endsection