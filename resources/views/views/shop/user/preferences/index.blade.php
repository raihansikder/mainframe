@extends('shop.template.page-type-3.layout')

<?php
$user = $user ?? user();
?>

@section('css')
    @parent
    {{-- Write css CSS here --}}
@stop

@section('content')
    <div class="main-container">
        <div class="page-header d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1>Preferences</h1>
                    </div>
                    <div class="col-auto d-flex justify-content-end align-items-center page-header-right">
                        <ul>
                            <li><a href="{{route('shop.user.notifications-settings')}}" style="font-size:24px;"><i class="fa fa-sliders" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @include('template.include.messages-top')
                    </div>
                </div>
            </div>
        </div>

        <!-------Main Wrapper-------->
        <div id="main-wrapper" class="main-wrapper">
            <div class="container pb-4">
                <div class="preferences">
                    <div class="row edit-pic-name">
                        @include('shop.user.preferences.avatar-upload')
                        @include('shop.user.preferences.update-names')
                    </div>
                    <hr>
                    <h2 class="mb-3">Earnings and donations</h2>
                    <div class="earningDonations">
                        <ul class="row">
                            <li class="col-12">
                                @include('shop.user.preferences.payment-settings')
                            </li>
                            <li class="col-sm-6"><a href="{{$user->charity_settings_url}}&ref=web">Charity Settings <i class="fa fa-angle-right"></i></a></li>
                            <li class="col-sm-6">
                                @include('shop.user.preferences.gift-aid')
                            </li>
                        </ul>
                        <hr>
                        <h2 class="mb-3">Settings</h2>
                        <ul class="row">
                            <li class="col-12">
                                @include('shop.user.preferences.update-password')
                            </li>
                            <li class="col-sm-6">
                                @include('shop.user.preferences.update-email')
                            </li>
                            <li class="col-sm-6"><a href="{{route('logout')}}?ref=web&type=user">Sign out <i class="fa fa-angle-right"></i></a></li>
                        </ul>
                        <hr>
                        <h2 class="mb-3">LetsHelp</h2>
                        <ul class="row">
                            <li class="col-sm-6"><a href="https://www.letsbab.com/app-help-steps/" target="_blank">How to <i class="fa fa-angle-right"></i></a></li>
                            <li class="col-sm-6"><a target="_blank" href="{{conf('letsbab.url.contact')}}">letshelp@letsbab.com <i
                                            class="fa fa-angle-right"></i></a></li>
                        </ul>
                        <hr>
                        <h2 class="mb-3">Legal</h2>
                        <ul class="row">
                            <li class="col-6"><a href="{{conf('letsbab.url.terms')}}">Term of Use <i class="fa fa-angle-right"></i></a></li>
                            <li class="col-6"><a href="{{conf('letsbab.url.privacy-policy')}}">Privacy Policy <i class="fa fa-angle-right"></i></a></li>
                            <li class="col-12"><a href="{{conf('letsbab.url.terms')}}">Why we differ? <i class="fa fa-angle-right"></i></a></li>
                        </ul>
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

        $(".notification-delete-btn").click(function () {
            var notification_id = $(this).data('isonotification-id');
            var url = $(this).data('isonotification-delete-url');
            $("li#" + notification_id).fadeOut('slow');

            $.ajax({
                url: url,
                datatype: 'json',
                method: "POST",
                data: {
                    _method: 'DELETE',
                    _token: '{{csrf_token()}}',
                    ret: 'json',
                    redirect_success: '{{URL::full()}}',
                    redirect_fail: '{{URL::full()}}',
                },
                success: function (response) {
                    if (response.status === 'success') {
                        // $("li#"+notification_id).fadeOut('slow');
                    } else {
                        alert(response.status)
                        $("li#" + notification_id).fadeIn('slow');
                    }
                }
            });
        });

    </script>
@stop