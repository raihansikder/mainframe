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
<body class="hold-transition login-page lb-bg">
<div class="login-box shadow">
    <div class="login-logo">
        <a href="{{route('home')}}">
            <img style="width: 300px; padding-top: 20px;" src="{{asset("letsbab/images/logo.png")}}"
                 alt="{{setting('app-name')}}" title="{{setting('app-name')}}"/>
        </a>
    </div>
    <div class="login-box-body">
        @include('template.include.messages-top')
        <div class="card-body">

            <div class="card-body text-center">
                Your email has been verified.
            </div>

        </div>
    </div>
</div>
</body>
</html>

