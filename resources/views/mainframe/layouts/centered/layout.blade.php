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
        {{conf('app.name')}}
    </div>
    <div class="login-box-body">
        @include('template.include.messages-top')
        @section('content-top')
            {{-- +++++++++++++++++++ --}}
            {{-- content-top section --}}
            {{-- +++++++++++++++++++ --}}
        @show
        @section('content')
            {{-- +++++++++++++++ --}}
            {{-- content section --}}
            {{-- +++++++++++++++ --}}

        @show
        @section('content-bottom')
            {{-- ++++++++++++++++++++++ --}}
            {{-- content-bottom section --}}
            {{-- ++++++++++++++++++++++ --}}
        @show
    </div>
</div>

@include('template.js')
@section('js')
    {{-- js section   --}}
@show
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
