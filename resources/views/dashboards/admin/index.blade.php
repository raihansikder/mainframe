@extends('template.app-frame')

@section('title')
    Super admin dashboard
    <small>View activities</small>
@endsection

@section('content')
    @if(Auth::check())
        <div class="row">
            <div id="area-1" class="col-md-6 pull-left no-padding-r">
                test
            </div>
            <div id="area-4" class="col-md-6 pull-left no-padding-r">
                test
            </div>
        </div>
    @endif
@endsection