@extends('template.app-frame')

@section('title')
    Super admin dashboard
    <small>View activities</small>
@endsection

@section('content')
    @if(Auth::check())
        <div class="row">
            <div id="area-1" class="col-md-6 pull-left no-padding-r">
                {{-- Widget area 1 --}}
                @include('dashboards.lb-accounts.widgets.count-cards')
                {{--@include('dashboards.admin.widgets.recommend-vs-purchase')--}}
                <div class="clearfix"></div>
            </div>
            <div id="area-4" class="col-md-6 pull-left no-padding-r">
                {{-- Widget area 4 --}}
                @include('dashboards.lb-accounts.widgets.list-current-invoices')
            </div>
        </div>
    @endif
@endsection