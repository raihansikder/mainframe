<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{setting('app-name')}}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('head')
        {{-- head section --}}
    @show
    @include('template.css')
</head>
<body>
<div class="letsbab-verify-header">
    <div class="letsbab-verify-logo">
        <img src="{{ asset('letsbab/images/logo.png') }}">
    </div>
</div>
<div class="letsbab-verify-login">
    @include('template.include.messages-top')
    <h1 class="etsbab-verify-heading">Please enter and confirm your new email below</h1>
    <div class="letsbab-verify-login-form">
        <form method="POST" action="{{ route('post.change-email') }}" aria-label="{{ __('Change email') }}">
            @csrf
            <label>Old email/Login</label>
            <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                   value="{{ $email ?? old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
            @endif

            <label>Password</label>
            <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                   name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
            @endif

            <label>New Email</label>
            <input id="new_email" type="text" name="new_email" required>
            @if ($errors->has('new_email'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('new_email') }}</strong></span>
            @endif

            <label>Confirm new email</label>
            <input id="new_email-confirm" type="text" name="new_email_confirmation" required>

            <div class="letsbab-verify-submitbtn"><input type="submit" value="Update Email"></div>
        </form>
    </div>
</div>
</body>
</html>

