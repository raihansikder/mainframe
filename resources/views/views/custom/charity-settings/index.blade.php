<?php
/** @var \App\Charityselection $current_charityselection */

use App\Isonotification;


/** @var \App\User $user */
$current_charityselection = null;
$charity_id = null;
$charity_share_percent = 50;
if ($user->currentCharityselection()->exists()) {
    $current_charityselection = $user->currentCharityselection;
    $charity_id = $current_charityselection->charity_id;
    $charity_share_percent = $current_charityselection->share_percentage;
}
/** @noinspection PhpUndefinedMethodInspection */

// $charities = \App\Charity::where('is_active', 1)->orderBy('order')->remember(cacheTime('short'))->get();
$charities = \App\Charity::listFor($user->country_id);


$contents = \App\Content::where('type', 'Charity message')->where(function ($query) use ($user) {
    $query->where('country_id', $user->country_id)
        ->orWhereNull('country_id');
})->orderBy('country_id')->get();
$content_by_charity = array();
foreach ($contents AS $content) {
    $content_by_charity[$content->element_id] = $content->body;
}
$isonotifications = \App\Isonotification::where('is_read', 1)->where('element_id', $user->id)->where('type', 'Charity alert')->get();
$new_charities = array();
foreach ($isonotifications AS $isonotification) {
    $charity_detail = json_decode($isonotification->data);
    $new_charities[$charity_detail->charity_id] = $isonotification->id;
}
?>
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{setting('app-name')}}</title>
    <link rel="icon" href="{{asset('letsbab/shop/images/favicons/favicon.png')}}" sizes="32x32"/>
    <link rel="icon" href="{{asset('letsbab/shop/images/favicons/favicon.png')}}" sizes="192x192"/>
    <link rel="apple-touch-icon-precomposed" href="{{asset('letsbab/shop/images/favicons/favicon.png')}}"/>
    <meta name="msapplication-TileImage" content="{{asset('letsbab/shop/images/favicons/favicon.png')}}"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('head')
        {{-- head section --}}
    @show
    <?php

    $script_paths = [
        'templates/admin/css/skins/_all-skins.min.css',
        //'templates/admin/bootstrap/css/bootstrap.min.css',
        'letsbab/shop/css/bootstrap-material-design.min.css',
        'templates/admin/css/AdminLTE.css',
        'templates/admin/plugins/morris/morris.css',
        'templates/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'templates/admin/plugins/datatables/dataTables.bootstrap.css',
        'templates/admin/plugins/validation/css/validationEngine.jquery.css',
        //'templates/admin/plugins/select2-3.5.1/select2.css',
        'templates/admin/plugins/uploadfile/uploadfile.css',
        'templates/admin/plugins/iCheck/all.css',
        'templates/admin/plugins/iCheck/square/blue.css',
        'templates/admin/plugins/datepicker/datepicker3.css',
        'templates/admin/plugins/bootstrap-slider/slider.css',
        //'templates/admin/css/custom.css',
        'letsbab/shop/css/style.css',
        'letsbab/css/css-yit-donation.css',
    ]
    ?>

    @foreach($script_paths as $script_path)
        <link rel="stylesheet" href="{{asset($script_path)}}">
    @endforeach

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Comfortaa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baumans" rel="stylesheet">


</head>
<body class="login-page lb-bg css-yit-donation-body">

@auth()
    @include('shop.template.include.left-menu')
@endif

@include('shop.template.include.header-menu-white')


<div class="login-box shadow">
    <!--------donation-update-26022019 Css--------->
    <div class="css-yit-donation-header">
        <?php
        $back_url = "letsbab://letsbab.co";
        if (Request::get('ref') == 'web') {
            $back_url = route('shop.index');
        }
        ?>
        <a class="css-yit-donation-back" href="{{$back_url}}"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        <div class="css-yit-donation-title">Lets Donate</div>
    </div>
    <!--------/donation-update-26022019 Css--------->
    <div class="login-box-body css-yit-donation-body">

        @include('template.include.messages-top')
        @section('content-top')
            {{-- +++++++++++++++++++ --}}
            {{-- content-top section --}}
            {{-- +++++++++++++++++++ --}}
        @show
        @section('content')
            <div class="card-body">
                <div class="filterSlider">
                    <div class="container">
                        <div class="css-yit-donation-heading">Share what you’ve made</div>
                        <form method="POST" action="{{ route('post.users.charity-settings') }}" aria-label="">
                            @csrf


                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                            <input type="hidden" name="charity_id" value="{{$charity_id}}"/>

                        {{--<input type="text" name="share_percentage" value="{{$current_charityselection->share_percentage}}"/>--}}


                        <!--------donation-update-26022019 Css--------->
                            <div class="css-yit-donation-filter">
                                <b class="css-yit-donation-value">0%</b>
                                <input id="share_percentage" name="share_percentage"
                                       data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100"
                                       data-slider-step="10"
                                       data-slider-value="{{$charity_share_percent}}"/>
                                <b class="css-yit-donation-value right">100%</b>
                            </div>
                    </div>
                </div>
                <!--------/donation-update-26022019 Css--------->
                <div class="clearfix"></div>

                <div class="css-yit-donation-heading2">Lets find a charity</div>
                <div class="slimscroll" style="height: 400px">
                    <div class="row findCharitywrap">
                        @foreach($charities as $charity)
                            <div class="col-md-12 charity">
                                <div class="info-box css-yit-donation-box">
                                        <span class="info-box-icon bg-aqua">
                                            <img src="{{$charity->block_logo}}" width="100">
                                        @if(isset($new_charities[$charity->id]))
                                            @php
                                                $readstatus_class = 'yit-update-status-by-read';
                                                $isonotification_id = $new_charities[$charity->id];
                                            @endphp
                                            <!-------span class="css-yit-donation-badge">New Charity</span------->
                                            @else
                                                @php
                                                    $readstatus_class = '';
                                                    $isonotification_id = '';
                                                @endphp
                                            @endif
                                        </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">{{$charity->name}}</span>
                                        <span class="info-box-des">{{$charity->account_name}}</span>
                                        <span class="info-box-excerpt">{{substr($charity->description,0,25)}}...</span>
                                        <?php
                                        $hidden = 'hidden';
                                        if ($charity->id == $charity_id) $hidden = ''
                                        ?>
                                        <span class="css-yit-donation-check {{ $readstatus_class }}" data-isonotification_id="{{$isonotification_id}}"
                                              data-charity_id="{{$charity->id}}">
                                            <i class="fa fa-check pull-right {{$hidden}} checkMark"
                                               data-check_charity_id="{{$charity->id}}">
                                            </i>
                                            </span>

                                        <div class="css-yit-info-detial"> {{$charity->description}}
                                            @if(isset($content_by_charity[$charity->id]))
                                                <br/><br/>{{ $content_by_charity[$charity->id] }}
                                            @endif
                                        </div>

                                        <span class="css-yi-info-btn"> <a href="javascript:;" class="{{ $readstatus_class }}"
                                                                          data-isonotification_id="{{$isonotification_id}}">Read More <i
                                                        class="fa fa-caret-down"> </i></a> </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <input type="hidden" name="redirect_success" value="{{URL::full()}}"/>
                <input type="hidden" name="redirect_fail" value="{{URL::full()}}"/>

                <div class="clearfix"></div>
                <div class="saveCharity stickybtm">
                    <button type="submit" class="btn btn-primary btn-block css-yit css-yit-btn-block-2"> Save</button>
                </div>
                </form>
            </div>
        @show
        @section('content-bottom')
            {{-- ++++++++++++++++++++++ --}}
            {{-- content-bottom section --}}
            {{-- ++++++++++++++++++++++ --}}
        @show
    </div>
</div>

@include('template.js')
@section('js')
    {{-- js section   --}}
@show


@include('shop.template.include.footer')
<script src="{{asset('letsbab/shop/js/popper.js')}}"></script>
<script src="{{asset('letsbab/shop/js/bootstrap-material-design.js')}}"></script>

<script>

    /**
     * Enable slider
     */
    $('#share_percentage').slider({
        tooltip: 'always',
        formatter: function (value) {
            return '' + value + '%';
        }
    });

    /**
     * Based on selection of charity from UI update hidden charity_id field.
     * Update UI based on selection
     */
    $('.css-yit-donation-check').click(function () {
        var old_charity_id = $('input[name=charity_id]').val();
        var new_charity_id = $(this).data('charity_id');
        if (new_charity_id != old_charity_id) {
            $('[data-check_charity_id]').addClass('hidden').hide();
            $('[data-check_charity_id=' + new_charity_id + ']').removeClass('hidden').show();
            $('input[name=charity_id]').val(new_charity_id);
        } else {
            $('[data-check_charity_id=' + new_charity_id + ']').addClass('hidden').hide();
            $('input[name=charity_id]').val(null);
        }
    });


    /**
     * Update New Charity as read when user click on info or select buttons
     */
    /*$(".yit-update-status-by-read").click(function(){
        var update_status_route = "{{ route('isonotifications.store') }}";
        var isonotification_id = $(this).data('isonotification_id');
        // Send a Ajax request to update the status
        $.post(update_status_route, {'_token': $("input[name='_token'").val(), 'id': isonotification_id}, function(data){
            alert(data);
        });
    });*/
    $('.css-yi-info-btn a').each(function (index) {
        jQuery(this).attr('data-index', index);
    });
    $('.css-yi-info-btn a').on('click', function () {
        var index = jQuery(this).attr('data-index');
        var parent_box = $(this).closest('.charity');
        parent_box.siblings().find('.css-yit-info-detial').slideUp();
        parent_box.find('.css-yit-info-detial').slideToggle(500, 'swing');
        jQuery('.css-yi-info-btn a').find('i').attr('class', 'fa fa-caret-down');
        jQuery('.info-box-content .info-box-excerpt').removeClass('hide-excerpt');
        if (jQuery(this).hasClass('current-readmore')) {
            jQuery(this).find('i').attr('class', 'fa fa-caret-down');
            jQuery(this).removeClass('current-readmore');
            jQuery(this).parents('.info-box-content').find('.info-box-excerpt').removeClass('hide-excerpt');
        } else {
            jQuery(this).find('i').attr('class', 'fa fa-caret-up');
            jQuery(this).addClass('current-readmore');
            jQuery(this).parents('.info-box-content').find('.info-box-excerpt').addClass('hide-excerpt');
        }
        jQuery('.css-yi-info-btn a.current-readmore').each(function () {
            var index2 = jQuery(this).attr('data-index');
            if (index2 != index) {
                jQuery(this).removeClass('current-readmore');
                jQuery(this).parents('.info-box-content').find('.info-box-excerpt').removeClass('hide-excerpt');
            }
        });
    });
    jQuery(function () {
        var timer;
        jQuery(window).resize(function () {
            clearTimeout(timer);
            timer = setTimeout(function () {
                jQuery('.slimScrollDiv').css("height", (jQuery(window).height() - 255) + "px");
            }, 40);
        }).resize();

    });


    jQuery(function () {
        var timer;
        jQuery(window).resize(function () {
            clearTimeout(timer);
            timer = setTimeout(function () {
                jQuery('.slimscroll').css("height", (jQuery(window).height() - 255) + "px");
            }, 40);
        }).resize();

    });
</script>


<script>
    jQuery(window).bind('scroll', function() {
        if(jQuery(window).scrollTop() >= jQuery('.findCharitywrap').offset().top + jQuery('.findCharitywrap').outerHeight() - window.innerHeight) {
            jQuery('.saveCharity').addClass('stickybtm');
        }
        else if(jQuery(document).height()-$(window).scrollTop()>=500){
            jQuery('.saveCharity').removeClass('stickybtm');
        }
    });


    jQuery(function() {
        var header = jQuery(".filterSlider");
        jQuery(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 200) {
                header.removeClass('filterSlider1').addClass("filterSlider-alt");
            } else {
                header.removeClass("filterSlider-alt").addClass('filterSlider');
            }
        });
    });

</script>

<script>
    jQuery(document).ready(function() {
        var $toggleButton = jQuery('.toggle-button'),
            $menuWrap = jQuery('.menu-wrap, .sidebar-menu'),
            $sidebarArrow = jQuery('.sidebar-menu-arrow');
        // Hamburger button
        $toggleButton.on('click', function() {
            jQuery(this).toggleClass('button-open');
            $menuWrap.toggleClass('menu-show');
        });
        // Sidebar navigation arrows
        $sidebarArrow.click(function() {
            jQuery(this).next().slideToggle(300);
        });
        jQuery('.button-second').click(function(){
            $toggleButton.removeClass('button-open');
            jQuery(this).addClass('button-open');
        });

    });


    $( ".searchbtn" ).click( function() {
        $( '.headersearchbox' ).toggleClass( "show-search-box" );
    });
    $( ".searchbtn" ).click( function() {
        $( '.search-overlay' ).toggleClass( "overlay-show" );
    });
    $( ".searchbtn" ).click( function() {
        $( '.site-header .logo' ).toggleClass( "hidelogo" );
    });


    $('.headersearchbox .dropdown-menu').click(function(e) {
        e.stopPropagation();
    });
</script>
</body>
</html>
<?php
/** Make all notification of type 'Charity alert' read for this user. */
Isonotification::where('module_id', 4)// 4 = users module
->where('element_id', $user->id)// element id = user id
->where('type', 'Charity alert')
    ->update([
        'read_at' => now(),
        'is_read' => 1,
    ]);

?>

