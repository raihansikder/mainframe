<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    @include('mainframe.layouts.default.includes.css')
{{--    <link rel="stylesheet" href="{{asset('projects/vscript/css/print-pdf.css')}}" type="text/css"/>--}}
    <title>
        @section('head-title')
            {{setting('app-name')}}
        @show
    </title>

    @section('head')
    @show

    @section('css')
    @show
    @include('projects.vscript.layouts.default.includes.analytics')
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12" align="center">
            <div class="header-line-up"></div>
            <table class="no-border no-padding" width="100%">
                <tr>
                    <td width="50%" align="left" style="vertical-align: middle">
                        @section('title')
                            <h1 class="pull-left">{{config('app.name')}}</h1>
                        @show
                        {{--<img class="image img-responsive"--}}
                        {{--src="{{asset('projects/vscript/images/logo.png')}}" alt=""/>--}}
                    </td>
                    <td width="50%" align="right" style="vertical-align: middle">
                        @section('title-right')
                        @show
                    </td>
                </tr>
            </table>
            <hr>
        </div>
    </div>
    <div class="row">
        {{--top table--}}
        @section('top')
        @show
    </div>
    <div class="row">
        {{--middle table--}}
        @section('content-top')
        @show
    </div>
    <div class="row">
        {{--middle table--}}
        @section('content')
        @show
    </div>
    <div class="row">
        {{--bottom table--}}
        @section('content-bottom')
        @show
    </div>
    <div class="row">
        {{--tc section--}}
        <div class="col-md-12" id="footer">
            @section('footer')
            @show
            {{-- <hr>--}}
        </div>
    </div>
</div>

</body>
@section('js')
@show