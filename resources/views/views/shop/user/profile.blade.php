@extends('shop.template.page-type-2.layout')

<?php
/** @var \App\User $user */
$avatar_path = $user->avatar ?? "letsbab/shop/images/profile/profile-placeholder3.png";
?>

@section('css')
    @parent
    {{-- Write custom CSS here --}}
@stop

@section('content')
    <div class="main-container">
        <div class="d-flex justify-content-center align-items-center productBrand-banner profile-banner"
             style="background-image:url({{asset('letsbab/shop/images/profile/charity-banner/charity1.jpg')}});"></div>

        <!-------Main Wrapper-------->
        <div id="main-wrapper" class="main-wrapper">
            <div class="container">
                <div class="user-profileWrap">
                    <div id="user-profile">
                        <div class="profil-cover-details">
                            <div class="profile-image">
                                <img src="{{asset($avatar_path)}}" class="rounded-circle" alt="Card image">
                            </div>
                            <div class="profile-detail">
                                <div class="profile-username">{{$user->full_name}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="profileStatus">
                        <div class="row">
                            <div class="col-md-12">
                                @include('template.include.messages-top')
                            </div>
                        </div>
                        <ul class="row">
                            <li class="col-6 col-sm-6 col-md-6 col-lg-3"><a href="{{route('shop.user.total-babs')}}">
                                    <img src="{{asset('letsbab/shop/images/profile/picture1.jpg')}}"> <span>Total Babs<br> <i>(Recommendations)</i></span></a>
                            </li>
                            <li class="col-6 col-sm-6 col-md-6 col-lg-3"><a href="{{route('shop.user.total-earnings')}}"><img
                                            src="{{asset('letsbab/shop/images/profile/picture2.jpg')}}"> <span>Total Earnings</span></a></li>
                            <li class="col-6 col-sm-6 col-md-6 col-lg-3"><a href="{{route('shop.user.total-donated')}}"><img
                                            src="{{asset('letsbab/shop/images/profile/picture3.jpg')}}"> <span>Total Donated</span></a></li>
                            <li class="col-6 col-sm-6 col-md-6 col-lg-3 totalShared"><a href="{{route('shop.user.total-shared')}}"><img
                                            src="{{asset('letsbab/shop/images/profile/picture4.jpg')}}"> <span>Total Shared</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-------/Main Wrapper-------->

    </div>
@stop

@section('js')
    @parent
    {{-- Write custom JS here --}}
@stop