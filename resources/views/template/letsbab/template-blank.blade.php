<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{setting('app-name')}}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('template.css')
    @section('head')
        {{-- head section --}}
    @show
</head>
<body class=" lb-bg">
<div class="row">
    @section('content')

    @show
</div>
@include('template.js')
@section('js')
    {{-- js section   --}}
@show
<script type="text/javascript">
    {{-- Write your Js here--}}
</script>
</body>
</html>
