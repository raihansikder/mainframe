@extends('shop.template.page-type-2.layout')

<?php
/** @var \App\User $user */
$avatar_path = $user->profile_pic_url ?? "letsbab/shop/images/profile/profile-placeholder3.png";
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
                    <div class="profileStatus-detail total-shared">
                        <h2>Total Shared </h2>

                        <div class="statistics-table tableLeft">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Shared to date</td>
                                    <td width="120"><img src="{{asset('letsbab/shop/images/money-icon2.png')}}" alt="">
                                        {{$user->stat_total_donation_to_date_in_user_currency_formatted}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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