@extends('shop.template.page-type-2.layout')

<?php
/** @var \App\User $user */
use App\Purchase;
$avatar_path = $user->profile_pic_url ?? "letsbab/shop/images/profile/profile-placeholder3.png";
$donations = Purchase::select(['charity_id', 'charity_name', DB::raw('sum(charity_donation_in_user_currency) as total')])
    ->where('recommender_user_id', $user->id)
    ->groupBy('charity_id')
    ->orderBy('total', 'DESC')
    ->limit(3)
    ->get();
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
                    <div class="profileStatus-detail total-donated">
                        <h2>Total Donated </h2>

                        <h4>Total Donations</h4>
                        <div class="statistics-table tableLeft mb-3">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Donated to date
                                    </td>
                                    <td width="120"><img src="{{asset('letsbab/shop/images/donate-icon.png')}}" alt="">
                                        {{$user->stat_total_donation_to_date_in_user_currency_formatted}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4>Charities you've championed</h4>
                        <div class="statistics-table  ">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    @if(count($donations))
                                        @foreach($donations as $donation)
                                            <td style="width: 33.3%">
                                                <a href="javascript:;" data-toggle="tooltip" data-html="true" title=""
                                                   data-original-title="<img src=&quot;images/profile/charity-banner/women-for-women.png&quot;>">
                                                    {{$donation->charity_name}}</a>
                                            </td>
                                        @endforeach
                                    @endif
                                </tr>
                                <tr>
                                    @if(count($donations))
                                        @foreach($donations as $donation)
                                            <td>
                                                {{curSign($user->currency).$donation->total}}
                                            </td>
                                        @endforeach
                                    @endif

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