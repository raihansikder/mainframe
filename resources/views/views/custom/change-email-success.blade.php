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
        <h1 class="etsbab-verify-heading">It's You!</h1>
        <h1 class="etsbab-verify-heading2">Please login to your LetsBab account.</h1>
        <div class="email-verify-login-btn">
            <a href="letsbab://letsbab.co/login" href="letsbab://letsbab.co/login" style="background: rgb(198,180,238); background: -moz-linear-gradient(left, rgba(198,180,238,1) 0%, rgba(148,209,237,1) 100%); background: -webkit-linear-gradient(left, rgba(198,180,238,1) 0%,rgba(148,209,237,1) 100%); background: linear-gradient(to right, rgba(198,180,238,1) 0%,rgba(148,209,237,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c6b4ee', endColorstr='#94d1ed',GradientType=1 ); border:none; text-decoration:none; color:#fff; min-width:240px; padding:10px 0; border-radius:5px; display:inline-block; text-align:center;">Login</a>
        </div>
    </div>
</body>
</html>

