@extends('shop.template.page-type-2.layout')

@section('css')
    @parent
    {{-- Write custom CSS here --}}
@stop

@section('content')
    <div class="main-container">
        <?php
        /** @var $featured_partner \App\Partner */
        /** @noinspection PhpUndefinedFieldInspection */
        $featured_partner = $category->featured_partner;
        ?>
        @if($featured_partner && $featured_partner->available_in_webapp==1)
            <div class="d-flex justify-content-center align-items-end productBrand-banner"
                 style="background-image:url({{asset($featured_partner->cover_photo_web)}});">
                <div class="container col-md-4">
                    <div class="bannerLogo">
                        <a href="{{route('shop.index')}}">
                            <img src="{{asset('letsbab/shop/images/logo.png')}}" alt="Letsbab">
                        </a>
                    </div>
                    <div class="clearfix">
                        <a href={{route('shop.partner-store')."?partner_id=".$featured_partner->id."&url=".urlencode($featured_partner->live_url_root)}}>
                            <img src="{{asset($featured_partner->logo)}}" alt=""/>
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center align-items-end productBrand-banner"
                 style="background-image:linear-gradient( to right, rgb(177, 152, 223) 0%, rgb(104, 190, 228) 100% )">
                <div class="container col-md-4">
                    <div class="bannerLogo">
                        <a href="{{route('shop.index')}}">
                            <img src="{{asset('letsbab/shop/images/logo.png')}}" alt="Letsbab">
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <div id="main-wrapper" class="main-wrapper pt-10">
            <div class="container-full pb-2">
                <div class="home-productsCl">

                    <?php
                    /** @var $categories \App\Partnercategory */
                    $categories = $category->categories;

                    ?>
                    @foreach($categories as $category)
                        <h2>{{$category->name}}</h2>
                        <div class="category-listSlider">
                            @foreach($category->brands as $partner)
                                @if($partner->available_in_webapp==1)
                                    <?php
                                    /** @var $partner \App\Partner */
                                    ?>
                                    <div>
                                        <a href="{{route('shop.partner-store')."?partner_id=".$partner->id."&url=".urlencode($partner->live_url_root)}}">
                                            <img style="width: 225px" src="{{asset($partner->block_logo)}}"
                                                 alt=" {{$partner->name}}"/>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    {{-- Write custom JS here --}}
@stop