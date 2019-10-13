<!-------Footer-------->
<?php
/** @var \App\User $user */
$user = $user ?? user();

?>
<div class="footer">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-sm-auto col-auto col-lg-4 col-xl-4 footer-copy  d-lg-block">© 2019 LetsBab. All Rights
            Reserved.
        </div>
        <div class="col-12 col-sm-auto  col col-lg-4 col-xl-4 footer-menu">
            <ul>
                <li><a href="{{conf('letsbab.url.about-us')}}">About</a></li>
                <li><a href="{{conf('letsbab.url.how-to-bab')}}">How to Bab</a></li>
                <li><a href="{{route('shop.index')}}">Shop It</a></li>
                <li><a href="{{route('shop.user.activities')}}">Bank it </a></li>
                <li><a href="{{route('shop.user.charity-settings')}}">Give it</a></li>
                @if(!$user)
                    <li><a href="{{route('shop.login')}}">Login</a></li>
                @endif
            </ul>
        </div>
        <div class="col-12 col-sm-12 col-auto  col-lg-4 col-xl-4 d-flex justify-content-end align-items-center  footer-social">
            <ul>
                <li><a href="{{conf('letsbab.url.facebook')}}"><i class="fa fa-facebook"></i></a></li>
                {{--<li><a href="{{conf('letsbab.url.google')}}"><i class="fa fa-google-plus"></i></a></li>--}}
                <li><a href="{{conf('letsbab.url.twitter')}}"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{conf('letsbab.url.instagram')}}"><i class="fa fa-instagram"></i></a></li>
                <li><a href="{{conf('letsbab.url.linkedin')}}"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</div>
