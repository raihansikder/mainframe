@extends('mainframe.layouts.email.template')

@section('title')
    Verify Email Address
@endsection

@section('content')
    Please click the button below to verify your email address.

    <a class="btn btn-lg" href="{{$url}}">Verify Email Address</a>
@endsection


