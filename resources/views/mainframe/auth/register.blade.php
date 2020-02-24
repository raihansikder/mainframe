@extends('mainframe.layouts.centered.template')
<?php
/** @var \App\Mainframe\Modules\Groups\Group $group */
?>

@section('content')

    <h4>{{ $group->title }} Registration </h4>

    <div class="card-body">

        {{ Form::open(['route' => ['register',$group->name],'class'=>"user-registration-form", 'name'=>'user_registration_form']) }}

        {{-- <input type="hidden" name="group_ids[]" value="{{$group->id}}"> --}}
        @include('form.text',['var'=>['name'=>'first_name','label'=>'First Name', 'container_class'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'last_name','label'=>'Last Name', 'container_class'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'email','label'=>'Email Address', 'container_class'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'password','type'=>'password','label'=>'Password','value'=>'', 'container_class'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'password_confirmation','type'=>'password','label'=>'Confirm Password', 'container_class'=>'col-sm-12']])

        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block lb-bg">{{ __('Register') }}</button>
            </div>
        </div>

        {{ Form::close() }}

    </div>

@endsection
