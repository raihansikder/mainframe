@extends('mainframe.layouts.module.form.layout')

@section('content')
    <div class="col-md-12 col-lg-10 no-padding">

        @if(($formState === 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState === 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--    Form inputs: starts    --}}
        {{--   --------------------    --}}
        @include('mainframe.form.input.text',['var'=>['name'=>'email','label'=>'Email']])
        {{-- show password only for editable--}}
        @if($elementIsEditable)
            <div class="clearfix"></div>
            <h3>Reset password</h3>
{{--            @include('mainframe.form.input.text',['var'=>['name'=>'password','type'=>'password','label'=>'New password','value'=>'']])--}}
{{--            @include('mainframe.form.input.text',['var'=>['name'=>'password_confirmation','type'=>'password','label'=>'Confirm new password']])--}}
        @endif

        <div class="clearfix"></div>
        @include('mainframe.form.input.text',['var'=>['name'=>'email_verified_at','label'=>'Email verified at', 'container_class'=>'col-sm-3','editable'=>false]])
        @include('mainframe.form.select.select-array',['var'=>['name'=>'is_active','label'=>'Active', 'options'=>['1'=>'Yes','0'=>'No']]])

        <div class="clearfix"></div>
        <?php
                // myprint_r($element->group_ids);
        $var = [
            'name' => 'group_ids',
            'label' => 'Group',
            'value' => (isset($user)) ? $element->group_ids : [],
            'query' => new \App\Group,
            'name_field' => 'title',
            'params' => ['multiple', 'id' => 'groups'],
            'container_class' => 'col-sm-3'
        ];
        ?>
        @include('mainframe.form.select.select-model-multiple', compact('var'))

        @include('mainframe.form.custom.is_active')
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
    @include('mainframe.modules.users.form.js')
@endsection