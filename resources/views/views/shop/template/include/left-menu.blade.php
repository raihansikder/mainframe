<?php
$menu_avatar_path = "letsbab/shop/images/profile/profile-palceholder.png";

$user = $user ?? user();
if ($user && $user->isRecommender()) {
    /** @var $user \App\User */
    $menu_avatar_path = $user->avatar ?? "letsbab/shop/images/profile/profile-palceholder.png";
}

?>

<span class="toggle-button">
    <i class="menu-bar menu-bar-top"></i>
    <i class="menu-bar menu-bar-middle"></i>
    <i class="menu-bar menu-bar-bottom"></i>
</span>

@if($user && $user->isRecommender())
    <div class="sidebar-menu">
        <div class="menu-wrap">
            <span class="toggle-button button-second button-open" >
            <i class="menu-bar menu-bar-top"></i>
            <i class="menu-bar menu-bar-middle"></i>
            <i class="menu-bar menu-bar-bottom"></i>
            </span>
            <div class="profile-sidebar">
                <div class="profile-userpic"><a href="{{route('shop.user.profile')}}"> <img src="{{asset($menu_avatar_path)}}"
                                                                                            class="img-responsive" alt=""></a></div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">{{$user->full_name}}</div>
                    <div class="profile-usertitle-status">{{$user->country_name}}</div>
                </div>
                <div class="clear"></div>
            </div>
            <nav id="site-navigation" class="sidebar-navigation">
                <ul>
                    <li>
                        <a href="{{route('shop.user.profile')}}">
                            <img src="{{asset('letsbab/shop/images/menu-icon/Profile-white.png')}}" alt="Profile">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{route('shop.user.notifications')}}">
                            <img src="{{asset('letsbab/shop/images/menu-icon/Notification-white.png')}}" alt="Messages">
                            Messages
                        </a>
                    </li>

                    <li>
                        <a href="{{route('shop.user.preference')}}">
                            <img src="{{asset('letsbab/shop/images/menu-icon/Differ-white.png')}}" alt="Preferences">
                            Preferences
                        </a>
                    </li>

                    <li class="menu-parent">
                        <a href="javascript:;" data-toggle="collapse" data-target="#support">
                            <img src="{{asset('letsbab/shop/images/menu-icon/Support-white.png')}}" alt="Support">
                            Support
                        </a>

                        <ul id="support" class="collapse dropdown">
                            <li> <a href="{{conf('letsbab.url.faq')}}"> FAQ </a> </li>
                            <li><a href="{{conf('letsbab.url.contact')}}" target="_blank"> Contact </a> </li>
                        </ul>

                    </li>


                    <li>
                        <a href="{{conf('letsbab.url.terms')}}">
                            <img src="{{asset('letsbab/shop/images/menu-icon/Legal-white.png')}}" alt="Legal Stuff">
                            Legal Stuff
                        </a>
                    </li>
                    <li>
                        <a href="{{conf('letsbab.url.why-we-differ')}}">
                            <img src="{{asset('letsbab/shop/images/menu-icon/BabMe-white.png')}}" alt="Why We Differ">
                            Why We Differ
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}?ref=web&type=user">
                            <img src="{{asset('letsbab/shop/images/menu-icon/Signin-white-48.png')}}" alt="Sign Out">
                            Sign Out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@else
    <div class="sidebar-menu">
        <div class="menu-wrap">
         <span class="toggle-button button-second button-open" >
            <i class="menu-bar menu-bar-top"></i>
            <i class="menu-bar menu-bar-middle"></i>
            <i class="menu-bar menu-bar-bottom"></i>
            </span>
            <div class="profile-sidebar">
                <div class="profile-userpic"><a href="#"> <img src="{{asset($menu_avatar_path)}}"
                                                               class="img-responsive" alt=""></a></div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">Your Name</div>
                    {{-- <div class="profile-usertitle-status">Name</div>--}}
                </div>
                <div class="clear"></div>
            </div>
            <nav id="site-navigation" class="sidebar-navigation">
                <ul>
                    <li class="menu-parent">
                        <a href="javascript:;" data-toggle="collapse" data-target="#support">
                            <img src="{{asset('letsbab/shop/images/menu-icon/Support-white.png')}}" alt="Support">
                            Support
                        </a>

                        <ul id="support" class="collapse dropdown">
                            <li> <a href="{{conf('letsbab.url.faq')}}"> FAQ </a> </li>
                            <li><a href="{{conf('letsbab.url.contact')}}" target="_blank"> Contact </a> </li>
                        </ul>

                    </li>
                    <li>
                        <a href="{{conf('letsbab.url.terms')}}">
                            <img src="{{asset('letsbab/shop/images/menu-icon/Legal-white.png')}}" alt="Legal Stuff">
                            Legal Stuff
                        </a>
                    </li>
                    <li>
                        <a href="{{conf('letsbab.url.why-we-differ')}}">
                            <img src="{{asset('letsbab/shop/images/menu-icon/BabMe-white.png')}}" alt="Why We Differ">
                            Why We Differ
                        </a>
                    </li>
                    <li>
                        <a href="{{route('shop.login')}}?ref=web&type=user">
                            <img src="{{asset('letsbab/shop/images/menu-icon/Signin-white-48.png')}}" alt="Sign In">
                            Sign In
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    {{--    <span class="pull-right toggle-button"><a id="login" href="{{route('shop.login')}}" class="text-black">Login</a></span>--}}
@endif