@extends('template.auth-frame')

@section('content')

    <div class="card-body">
        {{ Form::open(['route' => 'mf.register','class'=>"registration-form", 'name'=>'registration_form', 'files'=>true]) }}
        <?php
        $groups = [
            // '' => "",
            // 2 => "Brand Admin",
            // 5 => "Charity Admin",
            8 => "Recommender (App user)",
        ]
        ?>

        @include('mainframe.form.select.select-array',['var'=>['name'=>'group_id','label'=>'User type', 'options'=>$types]])
        @include('form.input-text',['var'=>['name'=>'first_name','label'=>'First Name', 'container_class'=>'col-sm-12']])
        @include('form.input-text',['var'=>['name'=>'last_name','label'=>'Last Name', 'container_class'=>'col-sm-12']])
        @include('form.input-text',['var'=>['name'=>'email','label'=>'email', 'container_class'=>'col-sm-12']])
        @include('form.input-text',['var'=>['name'=>'password','type'=>'password','label'=>'Password', 'container_class'=>'col-sm-12','value'=>'']])
        @include('form.input-text',['var'=>['name'=>'password_confirmation','type'=>'password','label'=>'Confirm password', 'container_class'=>'col-sm-12']])
        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block lb-bg">{{ __('Register') }}</button>
            </div>
        </div>

        {{ Form::close() }}
    </div>
@endsection
