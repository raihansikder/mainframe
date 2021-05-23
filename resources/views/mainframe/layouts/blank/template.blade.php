@extends($view->defaultTemplate())

@section('sidebar-left')
    @include($view->leftMenu())
@endsection

@section('title')
    @if(isset($title)){{$title}}@endif
@endsection

@section('content')
    @if(isset($body)){{$body}}@endif
@endsection

