@extends('mainframe.layouts.centered.template')

@section('content')

    <h4>Business Registration</h4>

    <div class="card-body">

        {{ Form::open(['route' => 'tenant.register','class'=>"tenant-registration-form", 'name'=>'tenant_registration_form']) }}

        @include('mainframe.form.text',['var'=>['name'=>'tenant_name','label'=>'Business Name', 'container_class'=>'col-sm-12']])
        @include('mainframe.form.text',['var'=>['name'=>'first_name','label'=>'Contact first Name', 'container_class'=>'col-sm-12']])
        @include('mainframe.form.text',['var'=>['name'=>'last_name','label'=>'Contact last Name', 'container_class'=>'col-sm-12']])
        @include('mainframe.form.text',['var'=>['name'=>'email','label'=>'Email Address', 'container_class'=>'col-sm-12']])
        @include('mainframe.form.text',['var'=>['name'=>'password','type'=>'password','label'=>'Password','value'=>'', 'container_class'=>'col-sm-12']])
        @include('mainframe.form.text',['var'=>['name'=>'password_confirmation','type'=>'password','label'=>'Confirm Password', 'container_class'=>'col-sm-12']])

        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block lb-bg">{{ __('Register Business') }}</button>
            </div>
        </div>

        {{ Form::close() }}

    </div>

@endsection
