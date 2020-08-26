@extends('projects.my-project.layouts.default.template')
@section('head-title')
    MPH | Admin Dashboard
@endsection
@section('title')
    Admin Dashboard
@endsection
@section('content')
    <div>
        <div class="row dashboard-tile-grid">
            <div class="col-md-3 dashboard-tile">
                <a href="{{route('resellers.index')}}">
                    <img class="image img-responsive" src="{{asset('projects/my-project/images/tile-manage-partner.png')}}" alt=""/>
                </a>
            </div>
            <div class="col-md-3 dashboard-tile">
                <a href="{{route('vendors.index')}}">
                    <img class="image img-responsive" src="{{asset('projects/my-project/images/tile-manage-vendors.png')}}" alt=""/>
                </a>
            </div>
            <div class="col-md-3 dashboard-tile">
                <a href="{{route('products.index')}}">
                    <img class="image img-responsive" src="{{asset('projects/my-project/images/tile-manage-stocks.png')}}" alt=""/>
                </a>
            </div>
            <div class="col-md-3 dashboard-tile">
                <a href="#">
                    <img class="image img-responsive" src="{{asset('projects/my-project/images/tile-manage-shipping.png')}}" alt=""/>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row dashboard-tile-grid">
            <div class="col-md-6 dashboard-tile">
                <a href="{{route('orders.index')}}">
                    <img class="image img-responsive" src="{{asset('projects/my-project/images/tile-manage-orders.png')}}" alt=""/>
                </a>
            </div>
            <div class="col-md-6 dashboard-tile">
                <a href="{{route('quotes.index')}}">
                    <img class="image img-responsive" src="{{asset('projects/my-project/images/tile-quote-builder.png ')}}" alt=""/>
                </a>
            </div>
        </div>
    </div>
@endsection
