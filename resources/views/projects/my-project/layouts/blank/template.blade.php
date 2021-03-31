@extends($view->defaultTemplate())

@section('sidebar-left')
    @include('mainframe.layouts.default.includes.navigation.left-menu.menu-items')
@endsection

@section('title')
    @if(isset($title)){{$title}}@endif
@endsection

@section('content')
    @if(isset($body)){{$body}}@endif
@endsection

