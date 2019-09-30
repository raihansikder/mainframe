@extends('template.app-frame')

@section('sidebar-left')
    @include('modules.base.include.sidebar-left')
@endsection

@section('title')
    @if(isset($title)){{$title}}@endif
@endsection

@section('content')
    @if(isset($body)){{$body}}@endif
@endsection

