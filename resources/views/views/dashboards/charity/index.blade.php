@extends('template.app-frame')
@section('title')
    Charity dashboard
@endsection
@section('content')
    @if(Auth::check())
        <div class="row">
            <div id="area-1" class="col-md-12 pull-left padding-r">
                {{--@include('dashboards.daterange-picker')--}}
                {{-- Widget area 1 --}}
                @include('dashboards.charity.widgets.count-cards')
                @include('dashboards.charity.widgets.top-brands-advocate')

                @if(strlen($charity->comment) && $charity->comment_is_published)
                    <div class="clearfix"></div>
                    <b>Comments</b>
                    <div class='clearfix'></div>
                    <div class="col-md-12 lb-bg" style="padding: 15px">
                        {{$charity->comment}}
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection