<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categories as $key=>$category)
                <li class="{{$key == 0 ? 'active' : ''}}"><a href="#{{$category->slug}}" data-toggle="tab">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($categories as $key=>$category)
            <div class="tab-pane fade {{$key == 0 ? 'active in' : ''}}" id="{{$category->slug}}">
                @foreach($category -> getProductByCategoryId as $products)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{$products -> feature_image_path}}" alt="" class="feature_image_300_200"/>
                                    <h2>{{number_format($products -> price)}} VNĐ</h2>
                                    <p>{{$products -> name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div><!--/category-tab-->
