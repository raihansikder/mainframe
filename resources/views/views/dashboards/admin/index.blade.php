@extends('template.app-frame')

@section('title')
    Super admin dashboard
    <small>View activities</small>
@endsection

@section('content')
    @if(Auth::check())
        <div class="row">
            <div id="area-1" class="col-md-6 pull-left no-padding-r">
                @include('dashboards.daterange-picker')
                {{-- Widget area 1 --}}
                @include('dashboards.admin.widgets.count-cards')
                @include('dashboards.admin.widgets.count-cards-split')
                @include('dashboards.admin.widgets.count-cards-non-split')

                {{--@include('dashboards.admin.widgets.recommend-vs-purchase')--}}
                @include('dashboards.admin.widgets.no-recommend-purchase-in-last-ten-days')
                <div class="clearfix"></div>
            </div>
            <div id="area-4" class="col-md-6 pull-left no-padding-r">
                {{-- Widget area 4 --}}
                @include('dashboards.admin.widgets.top-brands-bar-chart')
                @include('dashboards.admin.widgets.top-charities-bar-chart')
                @include('dashboards.admin.widgets.most-selected-charities-bar-chart')
                @include('dashboards.admin.widgets.most-recommended-brand-categories-bar-chart')
            </div>
        </div>
    @endif
@endsection