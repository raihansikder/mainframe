@extends('mainframe.layouts.email.template')

@section('title')
    Reset password
@endsection

@section('content')
    <div class="center">{{__('You are receiving this email because we received a password reset request for your account.')}}</div>

    <a class="button button-blue action" href="{{$url}}"> {{__('Reset Password')}}</a>
    <div></div>
    <a href="{{$url}}">{{$url}}</a>
    <div></div>
    <div class="center">{{__('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')])}}</div>
    <div class="center">{{__('If you did not request a password reset, no further action is required.')}}</div>
@endsection


