@extends('mainframe.layouts.module.form.template')
<?php
/**
 * @var \App\User $element
 * @var string $formState create|edit
 * @var \App\User $formState
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
        @include('form.datetime',['var'=>['name'=>'email_verified_at','label'=>'Email verified at']])

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

        <div class='clearfix'></div>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <a data-toggle="collapse" href="#other_info">
                            <span class="fa fa-plus" aria-hidden="true"></span> &nbsp; &nbsp; Token
                        </a>
                    </h5>
                </div>
                <div id="other_info" class="panel-collapse collapse" style="margin:15px 0;">
                    <div class="col-md-12">
                        <div class="col-md-12 no-padding">
                            {{--auth_token--}}
                            @include('form.text',['var'=>['name'=>'api_token','label'=>'API token', 'container_class'=>'col-sm-8']])
                            <br>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="form-group">
                                        {{--@include('form.checkbox',['var'=>['name'=>'api_token_generate','label'=>'New token (Check and save)','value'=>"yes"]])--}}
                                        <button id="api_token_generate" name="api_token_generate" class="btn btn-default">
                                            <i class="fa fa-refresh"></i> Re-generate
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--auth_token--}}
                        @include('form.plain-text',['var'=>['name'=>'auth_token','label'=>'Auth token', 'container_class'=>'col-sm-6']])
                        {{--api_token_generated_at--}}
                        @include('form.plain-text',['var'=>['name'=>'api_token_generated_at','label'=>'Api token generated at', 'container_class'=>'col-sm-6']])
                        {{--device_name--}}
                        @include('form.plain-text',['var'=>['name'=>'device_token','label'=>'Device token', 'container_class'=>'col-sm-12']])
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

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
        @include('form.uploads',['var'=>['type'=>'profile-pic','limit'=>1]])
    </div>
@endsection

@section('js')
    @parent
    @include('mainframe.modules.users.form.js')
    <script>
        //Make the api_token readonly
        $("input[name=api_token]").attr('readonly', true);

        //JS based api_token re-generator
        function randomString(len, charSet) {
            charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var randomString = '';
            for (var i = 0; i < len; i++) {
                var randomPoz = Math.floor(Math.random() * charSet.length);
                randomString += charSet.substring(randomPoz, randomPoz + 1);
            }
            return randomString;
        }

        $("#api_token_generate").click(function (e) {
            event.preventDefault(e);
            $("input[name=api_token]").val(randomString(64));
            console.log(randomString(64));
        });
    </script>
@endsection