<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @section('head-title')
            {{config('app.name')}}
        @show
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @section('head')
    @show
    @include('mainframe.layouts.default.includes.css')
</head>
<body class="hold-transition login-page lb-bg">
<div class="login-box shadow">
    <div class="login-logo">
        {{config('app.name')}}
    </div>
    <div class="login-box-body">
        @include('mainframe.layouts.default.includes.alerts.messages-top')

        @section('content-top')
        @show

        @section('content')
        @show

        @section('content-bottom')
        @show
    </div>
    @include('mainframe.layouts.default.includes.modals.messages')
    @include('mainframe.layouts.default.includes.modals.delete')
</div>

@include('mainframe.layouts.default.includes..js')
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
