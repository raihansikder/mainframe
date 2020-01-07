@extends('mainframe.layouts.default.template')

@section('sidebar-left')
    @include('mainframe.modules.base.include.sidebar-left')
@endsection

@section('title')
    @if(isset($title)){{$title}}@endif
@endsection

@section('content')
    @if(isset($body)){{$body}}@endif
@endsection

