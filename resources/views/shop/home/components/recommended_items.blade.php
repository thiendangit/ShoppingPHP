<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="item active">
            @foreach($productsRecommends as $key => $productsRecommend)
                @if($key < 3)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{$productsRecommend -> feature_image_path}}" alt="" class="feature_image_300_200" />
                                    <h2>{{number_format($productsRecommend -> price)}} VNĐ</h2>
                                    <p>{{$productsRecommend -> name}}</p>
                                    <p>{{$productsRecommend -> views_count}} lượt xem</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="item">
            @foreach($productsRecommends as $key => $productsRecommend)
                @if($key >= 3 && $key < 6)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{$productsRecommend -> feature_image_path}}" alt="" class="feature_image_300_200"/>
                                    <h2>{{number_format($productsRecommend -> price)}} VNĐ</h2>
                                    <p>{{$productsRecommend -> name}}</p>
                                    <p>{{$productsRecommend -> views_count}} lượt xem</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <a class="left recommended-item-control" href="#recommended-item-carousel"
       data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="right recommended-item-control" href="#recommended-item-carousel"
       data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a>
</div>
