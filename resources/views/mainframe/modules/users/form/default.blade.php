@extends('mainframe.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Users\User $element
 * @var string $formState create|edit
 * @var \App\Mainframe\Modules\Users\User $formState
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var \App\Mainframe\Modules\Modules\Module $module
 */
?>

@section('content')
    <div class="col-md-12 col-lg-10 no-padding">

        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--    Form inputs: starts    --}}
        {{--   --------------------    --}}
        @include('form.text',['var'=>['name'=>'email','label'=>'Email']])

        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'first_name','label'=>'First Name']])
        @include('form.text',['var'=>['name'=>'last_name','label'=>'Last Name']])

        {{-- show password only for editable--}}
        @if($editable)
            <div class="clearfix"></div>
            <h3>Password</h3>
            @include('form.text',['var'=>['name'=>'password','type'=>'password','label'=>'New password','value'=>'']])
            @include('form.text',['var'=>['name'=>'password_confirmation','type'=>'password','label'=>'Confirm new password']])
        @endif


        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'email_verified_at','label'=>'Email verified at', 'editable'=>false]])

        <div class="clearfix"></div>
        <?php
        // myprint_r($element->group_ids);
        $var = [
            'name' => 'group_ids',
            'label' => 'Group',
            'value' => (isset($element)) ? $element->group_ids : [],
            'query' => new \App\Group,
            'name_field' => 'title',
            'params' => ['multiple', 'id' => 'groups'],
            'container_class' => 'col-sm-3'
        ];
        ?>
        @include('form.select-model-multiple', compact('var'))

        @include('form.is-active')
        {{--    Form inputs: ends    --}}

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <div class="col-md-6 no-padding-l">
        <h5>File upload</h5>
        <small>Upload one or more files</small>
        @include('form.uploads',['var'=>['limit'=>99]])
    </div>
@endsection

@section('js')
    @parent
    @include('mainframe.modules.users.form.js')
@endsection