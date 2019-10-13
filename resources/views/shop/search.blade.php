@extends('shop.template.page-type-3.layout')

@section('css')
    @parent
    {{-- Write css CSS here --}}
@stop
<?php
$keyword = Request::get('name');
?>
@section('content')
    <div class="main-container">
        <div class="page-header d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="search-heading">Search Results: {{$keyword}}</h1>
                    </div>
                    <div class="col-auto d-flex justify-content-end align-items-center page-header-right">
                        <ul>
                            <li><a href="{{route('shop.index')}}"><i class="fa fa-angle-left"></i> Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-wrapper" class="main-wrapper">
            <div class="container">
                <div class="search-result-wrap">
                    <div class="row">
                        @if(count($partners))
                            @foreach($partners as $partner)
                                @if($partner->available_in_webapp==1)
                                    <?php /** @var $partner \App\Partner */?>
                                    <div class="col-6 col-sm-4 col-md-3 col-lg-2   search-product">
                                        <a href="{{route('shop.partner-store')."?partner_id=".$partner->id."&url=".urlencode($partner->live_url_root)}}">
                                            <img src="{{asset($partner->block_logo)}}" alt="{{$partner->name}}">
                                        </a>
                                    </div>
                                @elseif($keyword)
                                    <p>{{$keyword. ' is not found. More brands are coming soon.'}}</p>
                                @endif
                            @endforeach
                        @else
                            <p>{{$keyword. ' not found. More brands are coming soon.'}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    {{-- Write custom JS here --}}
    <script>
        $('.toggle-button').removeClass('white-toggle');
    </script>
@stop