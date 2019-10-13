@extends('template.app-frame')

<?php
/** @var \App\Purchase $purchases */
/** @var \App\Partner $partner */
?>

@section('title')
    Brand Dashboard
    @if(user()->isSuperUser())
        - {{$partner->name}} #<code class="bg-gray">{{$partner->id}}</code>
    @endif
@endsection

@section('content')
    @if(Auth::check())
        <div class="row">
            <div id="area-1" class="col-md-6 pull-left padding-r">
                @include('dashboards.daterange-picker')
                {{-- Widget area 1 --}}
                @include('dashboards.partner.widgets.count-cards')
                @include('dashboards.partner.widgets.latest-purchases')

                @if(strlen($partner->comment) && $partner->comment_is_published)
                    <div class="clearfix"></div>
                    <b>Comments</b>
                    <div class='clearfix'></div>
                    <div class="col-md-12 lb-bg" style="padding: 15px">
                        {{$partner->comment}}
                    </div>
                @endif

            </div>
            <div id="area-4" class="col-md-6 pull-left no-padding-r">
                {{-- Widget area 4 --}}
                {{-- @include('dashboards.partner.widgets.top-recommends') --}}
                {{-- @include('dashboards.partner.widgets.most-selected-charities') --}}

                @include('dashboards.partner.widgets.top-recommends-graph')
                {{-- @include('dashboards.partner.widgets.top-purchases') --}}
                @include('dashboards.partner.widgets.most-selected-charities-graph')
                @include('dashboards.partner.widgets.top-recommends-cumulative')
                {{-- @include('dashboards.partner.widgets.top-purchases-cumulative') --}}


                {{--<div id="area-5" class="col-md-12 pull-left" style="padding-left:10%;">--}}
                {{-- Widget area 5 --}}
                {{--{{ '* Data will be visible at the end of the month.' }} <br/>--}}
                {{--{{ '** Data Shown is from March 2019' }}--}}
                {{--</div>--}}
                {{--<div id="area-6" class="col-md-3 pull-left no-padding-l">--}}
                {{-- Widget area 7 --}}
                {{--</div>--}}
            </div>
        </div>
    @endif
@endsection