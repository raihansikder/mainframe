@extends('template.auth-frame')

@section('css')
    @parent
    {{--<style>--}}
    {{--.login-box, .register-box {--}}
    {{--width: 60%--}}
    {{--}--}}
    {{--</style>--}}
@endsection

@section('content')
    <h4>Partner Registration</h4>
    <div class="card-body">
        {{ Form::open(['route' => 'post.partner-registration','class'=>"partner-registration-form", 'name'=>'partner_registration_form', 'files'=>true]) }}
        @include('form.input-text',['var'=>['name'=>'name','label'=>'Brand Name', 'container_class'=>'col-sm-12']])
        @include('form.input-text',['var'=>['name'=>'contact_first_name','label'=>'Contact first Name', 'container_class'=>'col-sm-12']])
        @include('form.input-text',['var'=>['name'=>'contact_last_name','label'=>'Contact last Name', 'container_class'=>'col-sm-12']])
        @include('form.input-text',['var'=>['name'=>'email','label'=>'Email Address', 'container_class'=>'col-sm-12']])
        @include('form.input-text',['var'=>['name'=>'password','type'=>'password','label'=>'Password', 'container_class'=>'col-sm-12','value'=>'']])
        @include('form.input-text',['var'=>['name'=>'password_confirmation','type'=>'password','label'=>'Confirm Password', 'container_class'=>'col-sm-12']])
        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block lb-bg">{{ __('Register New Brand') }}</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
