@extends('shop.layouts.master')

@section('title')
    <title>HomePage</title>
@endsection
@section('css')
    <link href="{{asset('eshopper/home/home.css')}}" rel="stylesheet">
@endsection
@section('content')
    <body>

    <section id="advertisement">
        <div class="container">
            <img src="{{asset('eshopper/images/shop/advertisement.jpg')}}" alt=""/>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                @include('shop.components.leftSidebar')<
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{$product->feature_image_path}}" alt=""/>
                                            <h2>{{number_format($product->price)}} VNĐ</h2>
                                            <p>{{$product->name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!--features_items-->
                    {{$products -> links()}}
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
