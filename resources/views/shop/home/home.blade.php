@extends('shop.layouts.master')

@section('title')
    <title>HomePage</title>
@endsection
@section('css')
    <link href="{{asset('eshopper/home/home.css')}}" rel="stylesheet">
@endsection
@section('content')
    <body>
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            @for($i = 0 ; $i < count($sliders) ; $i++)
                                <div class="item {{$i == 0 ? "active" : ''}}">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>{{$sliders[$i] -> name}}</h2>
                                        <p>{{$sliders[$i] -> description}} </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{$sliders[$i] -> image_path}}" class="girl img-responsive" alt=""/>
                                        <img src="eshopper/images/home/pricing.png" class="pricing" alt=""/>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                @include('shop.components.leftSidebar',['categories' => $categories])
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @include('shop.home.components.feature_product')
                    </div><!--features_items-->
                    @include('shop.home.components.category_tab')
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        @include('shop.home.components.recommended_items')
                    </div><!--/recommended_items-->
                </div>
            </div>
        </div>
    </section>
    @endsection

    @section('js')
        <script src="{{asset('eshopper/js/jquery.js')}}"></script>
        <script src="{{asset('eshopper/js/price-range.js')}}"></script>
        <script src="{{asset('eshopper/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('eshopper/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('eshopper/js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('eshopper/js/main.js')}}"></script>
    @endsection
    </body>
    </html>
