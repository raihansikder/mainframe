@extends('mainframe.layouts.email.template')

@section('title')
    Verify Email Address
@endsection

@section('content')
    <div class="center">{{__('Please click the button below to verify your email address.')}}</div>

    <a class="button button-blue action" href="{{$url}}"> {{__('Verify Email Address')}}</a>
    <div></div>
    <a href="{{$url}}">{{$url}}</a>
    <div></div>
    <div class="center">{{__('If you did not create an account, no further action is required.')}}</div>
@endsection


