@extends('shop.template.page-type-3.layout')

<?php $user = $user ?? user(); ?>

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
                        <h1>Notifications</h1>
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
            <div class="container ph-4">
                <div class="notifications">
                    <ul class=" notifications-alert">
                        @forelse($notifications as $notification)
                            <?php /** @var \App\Isonotification $notification */?>
                            <li id="{{$notification->id}}">
                                <a href="{{$notification->web_app_follow_url}}">
                                    <h3>{{$notification->name}}</h3>
                                    {{$notification->short_content}}
                                    @if($notification->type != 'Payment setting alert')
                                        <i class="fa fa-trash-o notification-delete-btn"
                                           data-isonotification-id="{{$notification->id}}"
                                           data-isonotification-delete-url="{{route('isonotifications.destroy',[$notification->id])}}"
                                           data-placement="left" title="Delete">
                                        </i>
                                    @endif
                                </a>
                            </li>
                        @empty
                            <h2 class="purple-color text-center mt-4">No notification found</h2>
                        @endforelse
                    </ul>
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