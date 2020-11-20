<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{route('home.index')}}" class="active">Home</a></li>
        <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
            <ul role="menu" class="sub-menu">
                <li><a href="{{asset('eshopper/shop.html')}}">Products</a></li>
                <li><a href="{{asset('eshopper/product-details.html')}}">Product Details</a></li>
                <li><a href="{{asset('eshopper/checkout.html')}}">Checkout</a></li>
                <li><a href="{{asset('eshopper/cart.html')}}">Cart</a></li>
                <li><a href="{{asset('eshopper/login.html')}}">Login</a></li>
            </ul>
        </li>
        <li><a href="{{asset('eshopper/404.html')}}">404</a></li>
        <li><a href="{{asset('eshopper/contact-us.html')}}">Contact</a></li>
    </ul>
</div>
