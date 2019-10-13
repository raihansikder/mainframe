<!-------Header-------->
<header class="site-header ">
    <div class="container-fluid">
        <div class="row flex-nowrap justify-content-between ">
            <a class="navbar-brand d-none d-md-block">
                <!--<img src="images/logo.png" alt="Letsbab">--></a>
            <div class="col-auto text-center headerMlogo-wrap">
                <div class="headerMlogo">
                    <div class="pageLogo">
                        <a href="{{route('shop.index')}}">
                            <img src="{{asset('letsbab/shop/images/logo2.png')}}" alt="Letsbab">
                        </a>
                    </div>
                    <h1>Shop | Share | Earn | Give</h1>
                </div>
            </div>
            <div class="col-auto d-flex justify-content-end  header-right mobileRight">
                <a class="header-search text-black searchbtn" href="javascript:;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                    </svg>
                </a></div>
        </div>
    </div>
</header>
<!-------/Header-------->

@include('shop.template.include.search-box')

