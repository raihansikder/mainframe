@extends('projects.my-project.layouts.centered.template')

@section('content')

   <h4>Partner Registration</h4>

    <div class="card-body">

        {{ Form::open(['route' => 'register.reseller','class'=>"reseller-registration-form", 'name'=>'reseller_registration_form']) }}

        @include('form.text',['var'=>['name'=>'reseller_name','label'=>'Business Name', 'div'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'first_name','label'=>'First Name', 'div'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'last_name','label'=>'Surname', 'div'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'contact1_first_name','label'=>'Contact First Name', 'div'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'contact1_last_name','label'=>'Contact Surname', 'div'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'email','label'=>'Email Address', 'div'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'password','type'=>'password','label'=>'Password','value'=>'', 'div'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'password_confirmation','type'=>'password','label'=>'Confirm Password', 'div'=>'col-sm-12']])

        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block lb-bg">{{ __('Register') }}</button>
            </div>
        </div>

        {{ Form::close() }}

    </div>

@endsection
