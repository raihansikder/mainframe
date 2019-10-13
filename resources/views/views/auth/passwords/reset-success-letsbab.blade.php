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
        <h1 class="etsbab-verify-heading">Your password has been successfully changed</h1>
    </div>
</body>
</html>

