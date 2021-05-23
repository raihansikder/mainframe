<?php
/** @var \App\Mainframe\Features\Core\ViewProcessor $view */
?>

@extends($view->defaultTemplate())

@section('sidebar-left')
    @include('mainframe.layouts.default.includes.navigation.left-menu.menu-items')
@endsection

@section('title')
    @include('mainframe.layouts.module.grid.includes.title')
@endsection

@section('content')
    @include('mainframe.layouts.module.grid.includes.datatable')
@endsection
