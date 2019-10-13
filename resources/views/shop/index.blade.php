@extends('shop.template.page-type-1.layout')

@section('css')
    @parent
    {{-- Write custom CSS here --}}
@stop

@section('content')
    <div class="main-container home-container">
        <div id="main-wrapper" class="justify-content-center align-items-center d-flex  main-wrapper homeWrap">
            <div class="container-full w-100">
                <div class="main-categries">
                    <div class="row min-height">

                        @foreach ($categories as $category)
                            <?php
                            /** @var $categoreis \App\Partnercategory */
                            /** @var $category \App\Partnercategory */
                            $logo = $category->block_logo;
                            if ($category->webapp_block_logo) {
                                $logo = $category->webapp_block_logo;
                            }
                            ?>
                            <div class="col-6 col-md-6 col-lg-6 col-xl-3">
                                <a data-animation="fadeInUp" data-animation-delay="02" class="catBox catBox1"
                                   style="background-image:url({{asset($logo)}}); background-position:center center"
                                   href="{{route('shop.category',$category->id)}}">
                                    <span>{{$category->name}}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    {{-- Write custom JS here --}}
@stop
