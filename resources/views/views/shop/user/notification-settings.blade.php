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
                        <h1>Notifications settings</h1>
                    </div>
                    <div class="col-auto d-flex justify-content-end align-items-center page-header-right">
                        <ul>
                            <li><a href="{{route('shop.user.notifications')}}"><i class="fa fa-angle-left"></i> Back</a></li>
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

        <div id="main-wrapper" class="main-wrapper">
            <div class="container pb-4">
                <div class="notifications-options">
                    <ul class="list-group">
                        @foreach($notificationoptions as $notificationoption)
                            <?php
                            /** @var  \App\Notificationoption $notificationoption */
                            $checked = '';
                            $usernotificationoption_id = '';
                            if ($notificationoption->usernotificationoption) {
                                $checked = 'checked';
                                $usernotificationoption_id = $notificationoption->usernotificationoption->id;
                            }
                            ?>
                            <li class="list-group-item"> {{$notificationoption->name}}
                                <div class="material-switch pull-right">
                                    <input class="notificationoption_checkbox" id="{{$notificationoption->id}}" name="{{$notificationoption->id}}"
                                           type="checkbox"
                                           data-usernotificationoption_id="{{$usernotificationoption_id}}"
                                           data-notificationoption_id="{{$notificationoption->id}}"
                                           value="{{$notificationoption->id}}"
                                            {{$checked}}
                                    />
                                    <label for="{{$notificationoption->id}}" class="label-default"></label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="clear-notifications">
                        <form id="form-delete-all-notifications" action="{{route('shop.user.notifications-delete-all')}}" method="post">
                            @csrf
                            <a class="delete-all-submit-btn" href="#">Clear All Notifications</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@section('js')
    @parent
    <script>
        jQuery(function () {
            var timer;
            jQuery(window).resize(function () {
                clearTimeout(timer);
                timer = setTimeout(function () {
                    jQuery('.main-container')
                        .css("min-height", (jQuery(window)
                            .height() - 65) + "px");
                }, 40);
            }).resize();

        });
    </script>
    <script>

        /**
         * Handle delete all notifications form submit
         */
        $(".delete-all-submit-btn").click(function () {
            $("#form-delete-all-notifications").submit();
        });

        /**
         * Use ajax to handle checkbox updates.
         */
        $(".notificationoption_checkbox").change(function () {

            var input = this;
            var checked = false;
            if ($(this).is(':checked')) {
                checked = true;
            }

            var usernotificationoption_id = $(this).data('usernotificationoption_id');
            var notificationoption_id = $(this).data('notificationoption_id');
            var user_id = "{{$user->id}}";

            var delete_url = "{{route('home')}}/usernotificationoptions/" + usernotificationoption_id;
            var create_url = "{{route('usernotificationoptions.store')}}";


            if (checked) {
                $.ajax({
                    url: create_url,
                    datatype: 'json',
                    method: "POST",
                    data: {
                        _token: '{{csrf_token()}}',
                        ret: 'json',
                        notificationoption_id: notificationoption_id,
                        user_id: user_id,
                        redirect_success: '{{URL::full()}}',
                        redirect_fail: '{{URL::full()}}',
                    },
                    success: function (response) {
                        $(input).data('usernotificationoption_id', response.data.id);
                        // alert(response.status);
                    }
                });
            } else {
                $.ajax({
                    url: delete_url,
                    datatype: 'json',
                    method: "POST",
                    data: {
                        _method: 'DELETE',
                        _token: '{{csrf_token()}}',
                        ret: 'json',
                        usernotificationoption_id: usernotificationoption_id,
                        redirect_success: '{{URL::full()}}',
                        redirect_fail: '{{URL::full()}}',
                    },
                    success: function (response) {
                        // alert(response.status);
                    }
                });
            }
        });

    </script>


@stop