@extends('mainframe.layouts.centered.template')

@section('content')

    <h4>Password reset</h4>

    <div class="card-body">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                A password link has been sent to your email address.
            </div>
        @endif


        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            @include('mainframe.form.input.text',['var'=>['name'=>'email','label'=>'Email','container_class'=>'col-sm-12']])

            @include('mainframe.form.input.text',['var'=>['name'=>'password','type'=>'password','label'=>'New password','value'=>'','container_class'=>'col-sm-12']])
            @include('mainframe.form.input.text',['var'=>['name'=>'password_confirmation','type'=>'password','label'=>'Confirm new password','container_class'=>'col-sm-12']])
            <input type="submit" value="Reset Password">
        </form>
    </div>

@endsection
