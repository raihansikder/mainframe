<?php
/** @var \App\User $user */
$user = $user ?? user();
?>
<header class="site-header inner-header innerpage-header">
    <div class="container-fluid">
        <div class="row flex-nowrap justify-content-between align-items-center"><a class="navbar-brand">
                <!--<img src="images/logo.png" alt="Letsbab">--></a>
            <div class="col-auto text-center d-none d-md-block">
                <nav class="navbar-expand-sm ">
                    <div class=" justify-content-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link " href="{{conf('letsbab.url.about-us')}}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{conf('letsbab.url.how-to-bab')}}">How to Bab</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('shop.index')}}">Shop It</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('shop.user.activities')}}">Bank
                                    It </a></li>
                            @if($user)
                                <li class="nav-item"><a class="nav-link" href="{{$user->charity_settings_url}}&ref=web"
                                                        target="_blank">Give it </a></li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-auto d-flex justify-content-end align-items-center"><a
                        class="header-search  text-white searchbtn" href="javascript:;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                    </svg>
                </a></div>
        </div>
    </div>
</header>

@include('shop.template.include.search-box')

@section('js')
    @parent
    <!--suppress JSUnresolvedFunction -->
    <script>
        $('.searchbtn').removeClass('text-white').addClass('text-black');
        $('a#login').removeClass('text-white').addClass('text-black');
    </script>
@stop
