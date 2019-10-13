<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Letsbab - Shop | Share | Earn | Give</title>
    <link rel="icon" href="{{asset('letsbab/shop/images/favicons/favicon.png')}}" sizes="32x32"/>
    <link rel="icon" href="{{asset('letsbab/shop/images/favicons/favicon.png')}}" sizes="192x192"/>
    <link rel="apple-touch-icon-precomposed" href="{{asset('letsbab/shop/images/favicons/favicon.png')}}"/>
    <meta name="msapplication-TileImage" content="{{asset('letsbab/shop/images/favicons/favicon.png')}}"/>
    @section('head')
        {{-- head section --}}
    @show
    @include('shop.template.css')
</head>

<body>
@include('shop.template.include.left-menu')
@include('shop.template.include.header-menu-white')

@section('content')
    {{-- content section--}}
@show

@include('shop.template.include.footer')

@include('shop.template.js')
<!--suppress JSUnresolvedFunction -->
<script>
    jQuery(function () {
        var timer;
        jQuery(window).resize(function () {
            clearTimeout(timer);
            timer = setTimeout(function () {
                jQuery('.min-height').css("min-height", (jQuery(window).height() - 150) + "px");
            }, 40);
        }).resize();

    });
</script>

</body>
</html>