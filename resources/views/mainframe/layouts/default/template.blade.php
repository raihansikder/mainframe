<!DOCTYPE html>
<?php
/**
 * @var \App\Mainframe\Features\Core\ViewProcessor $view
 */
?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @section('head-title')
            {{config('app.name')}} | {{isset($module) ? $module->title: ''}}  {{isset($element) ? $element->id : ''}}
        @show
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
    @section('head')
    @show
    @include('mainframe.layouts.default.includes.css')
</head>
<body class="hold-transition skin-blue-light sidebar-mini fixed">

<div id="root" class="wrapper">
    <header class="main-header">
        <a href="{{route('home')}}" class="logo">

            <span class="logo-mini">
                {{-- <img style="width: 80%" src="{{asset("projects/vscript/images/logo-mini.png")}}" alt="{{config('app.name')}}"/>--}}
                 <span class="logo-lg">{{substr(config('app.name'),0,1)}}</span>
            </span>
            <span class="logo-lg">
                 {{-- <img style="width: 50%" src="{{asset("projects/vscript/images/logo-large.png")}}" alt="{{config('app.name')}}"/>--}}
                 <span class="logo-lg">{{config('app.name')}}</span>
             </span>
            <span class="logo-lg">{{config('app.name')}}</span>
        </a>

        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    {{--@include('template.include.top-menu.message-menu')--}}
                    {{--@include('template.include.top-menu.message-menu')--}}
                    {{--@include('template.include.top-menu.task-menu')--}}
                    @include('mainframe.layouts.default.includes.navigation.top-menu.top-right-menu')
                    {{--<li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>--}}
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            @section('sidebar-left')
                @include('mainframe.layouts.default.includes.navigation.left-menu.menu-items')
            @show
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h2>
                @section('title')
                @show
            </h2>
            @section('breadcrumb')
            @show
        </section>

        <!-- Main content -->
        <section class="content col-md-12">
            <div class="col-md-12 no-padding">
                @include('mainframe.layouts.default.includes.alerts.messages-top')

                @section('content-top')
                @show

                @section('content')
                @show

                <div class="clearfix"></div>

                @section('content-bottom')
                @show
            </div>
        </section>
    </div>
    @include('mainframe.layouts.default.includes.modals.messages')
    @include('mainframe.layouts.default.includes.modals.delete')
</div>

@include('mainframe.layouts.default.includes.js')

@section('js')
@show
</body>
</html>
