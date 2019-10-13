@extends('shop.template.page-type-2.layout')

<?php
/** @var \App\User $user */
use App\Recommendurl;$avatar_path = $user->profile_pic_url ?? "letsbab/shop/images/profile/profile-placeholder3.png";
$recommendations = Recommendurl::select(['partner_id', 'partner_name', DB::raw('count(*) as total')])
    ->where('recommender_user_id', $user->id)
    ->where('is_shared', 1)
    ->groupBy('partner_id')
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
                    <div class="profileStatus-detail">
                        <h2>Total Babs <span>(Recommendations)</span></h2>
                        <h4>Brands that you love</h4>
                        <div class="statistics-table">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    @if (count($recommendations))
                                        @foreach($recommendations as $recommendation)
                                            <td style="width: 33.3%">
                                                <a href="javascript:;" data-toggle="tooltip" data-html="true" title=""
                                                   data-original-title="<img src=&quot;images/profile/charity-banner/Asos.png&quot;>">
                                                    {{$recommendation->partner_name}}
                                                </a>
                                            </td>
                                        @endforeach

                                    @endif
                                </tr>
                                <tr>
                                    @if (count($recommendations))
                                        @foreach($recommendations as $recommendation)
                                            <td>
                                                {{$recommendation->total}}
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

    </div>
@stop

@section('js')
    @parent
    {{-- Write custom JS here --}}
@stop