<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Caterory;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    //
    private $slider;
    private $caterory;
    private $product;

    public function __construct(Slider $slider, Caterory $caterory, Product $product)
    {
        $this->slider = $slider;
        $this->caterory = $caterory;
        $this->product = $product;
    }

    public function index(){
        $sliders = $this->slider->all();
        $categories = $this->caterory->where('parent_id', 0)->get();
        $products = $this->product -> latest() -> take(6) -> get();
        $productsRecommends = $this->product -> latest('views_count', 'desc') -> take(12) -> get();
        return view('shop.home.home',compact('sliders','categories','products','productsRecommends'));
    }
}
