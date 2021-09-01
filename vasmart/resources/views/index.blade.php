
@extends('layout')
@section('content')
    <div class="slider-area plr-185 mb-80 section">
        <div class="container-fluid">
            <div class="slider-content">
                <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                    <!-- layer-1 Start -->
                    <div class="col-lg-12">
                        <div class="layer-1">
                            <div class="slider-img">
                                <img src="{{asset('../public/frontend/img/slider/slider-1/1.jpg')}}" alt="">
                            </div>
                            <div class="slider-info gray-bg">
                                <div class="slider-info-inner">
                                    <h1 class="slider-title-1 text-uppercase text-black-1">WaterProof smartphone</h1>
                                    <div class="slider-brief text-black-2">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                            have suffered alteration in some form, by injected humour, or randomised words
                                            which don't look even slightly believable. If you are going to use a passage of
                                            Lorem Ipsum,</p>
                                    </div>
                                    <a href="{{\Illuminate\Support\Facades\URL::to('shop')}}" class="button extra-small button-black">
                                        <span class="text-uppercase">Mua ngay</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- layer-1 end -->
                    <!-- layer-1 Start -->
                    <div class="col-lg-12">
                        <div class="layer-1">
                            <div class="slider-img">
                                <img src="{{asset('../public/frontend/img/slider/slider-1/2.jpg')}}" alt="">
                            </div>
                            <div class="slider-info gray-bg">
                                <div class="slider-info-inner">
                                    <h1 class="slider-title-1 text-uppercase text-black-1">WaterProof smartphone</h1>
                                    <div class="slider-brief text-black-2">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                            have suffered alteration in some form, by injected humour, or randomised words
                                            which don't look even slightly believable. If you are going to use a passage of
                                            Lorem Ipsum,</p>
                                    </div>
                                    <a href="{{\Illuminate\Support\Facades\URL::to('shop')}}" class="button extra-small button-black">
                                        <span class="text-uppercase">Mua ngay</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- layer-1 end -->
                    <!-- layer-1 Start -->
                    <div class="col-lg-12">
                        <div class="layer-1">
                            <div class="slider-img">
                                <img src="{{asset('../public/frontend/img/slider/slider-1/1.jpg')}}" alt="">
                            </div>
                            <div class="slider-info gray-bg">
                                <div class="slider-info-inner">
                                    <h1 class="slider-title-1 text-uppercase text-black-1">WaterProof smartphone</h1>
                                    <div class="slider-brief text-black-2">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                            have suffered alteration in some form, by injected humour, or randomised words
                                            which don't look even slightly believable. If you are going to use a passage of
                                            Lorem Ipsum,</p>
                                    </div>
                                    <a href="{{\Illuminate\Support\Facades\URL::to('shop')}}" class="button extra-small button-black">
                                        <span class="text-uppercase">Mua ngay</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- layer-1 end -->
                </div>
            </div>
        </div>
    </div>
    <!-- END SLIDER AREA -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper section">

        <!-- FEATURED PRODUCT SECTION START -->
        <div class="featured-product-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-left mb-40">
                            <h2 class="uppercase">sản phẩm nổi bật</h2>
                        </div>
                    </div>
                </div>

                <div class="featured-product">
                    <div class="row active-featured-product slick-arrow-2">
                        <!-- product-item start -->
                        @foreach($list_product as $key =>$value)
                        <div class="col-lg-12">
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="{{\Illuminate\Support\Facades\URL::to('single-product/'.$value->product_id)}}">
                                        <img src="{{\Illuminate\Support\Facades\URL::to('../public/uploads/products/'.$value->product_image)}}" alt=""/>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="{{\Illuminate\Support\Facades\URL::to('single-product/'.$value->product_id)}}">{{$value->product_name}}</a>
                                    </h6>
                                    <div class="pro-rating">
                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                    </div>
                                    <h3 class="pro-price">{{number_format($value->product_price).' '.'đ'}}</h3>
                                    <ul class="action-button">
                                        <li>
                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                         @endforeach
                        <!-- product-item end -->
                    </div>

                </div>

            </div>
        </div>
        <!-- FEATURED PRODUCT SECTION END -->

        <!-- UP COMMING PRODUCT SECTION START -->
        <div class="up-comming-product-section mb-80">
            <div class="container">
                <div class="row">
                    <!-- up-comming-pro -->
                    <div class="col-lg-8">
                        <div class="up-comming-pro gray-bg clearfix">
                            <div class="up-comming-pro-img f-left">
                                <a href="#">
                                    <img src="{{asset('../public/frontend/img/up-comming/1.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="up-comming-pro-info f-left">
                                <h3><a href="#">Dummy Product Name</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitest, sed do eiusmod tempor incididunt ut labore et dolores top magna aliqua. Ut enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea commodo consequat. laborum. </p>
                                <div class="up-comming-time">
                                    <div data-countdown="2019/02/02"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-block d-md-none d-lg-block">
                        <div class="banner-item banner-1">
                            <div class="ribbon-price">
                                <span>$ 896.00</span>
                            </div>
                            <div class="banner-img">
                                <a href="#"><img src="{{asset('../public/frontend/img/banner/1.jpg')}}" alt=""></a>
                            </div>
                            <div class="banner-info">
                                <h3><a href="#">Product Name</a></h3>
                                <ul class="banner-featured-list">
                                    <li>
                                        <i class="zmdi zmdi-check"></i><span>Lorem ipsum dolor</span>
                                    </li>
                                    <li>
                                        <i class="zmdi zmdi-check"></i><span>amet, consectetur</span>
                                    </li>
                                    <li>
                                        <i class="zmdi zmdi-check"></i><span>adipisicing elitest,</span>
                                    </li>
                                    <li>
                                        <i class="zmdi zmdi-check"></i><span>eiusmod tempor</span>
                                    </li>
                                    <li>
                                        <i class="zmdi zmdi-check"></i><span>labore et dolore.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- UP COMMING PRODUCT SECTION END -->

        <!-- PRODUCT TAB SECTION START -->
        <div class="product-tab-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title text-left mb-40">
                            <h2 class="uppercase">product list</h2>
                            <h6>There are many variations of passages of brands available,</h6>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-tab pro-tab-menu text-right">
                            <!-- Nav tabs -->
                            <ul class="nav" >
                                <li><a class="active" href="#popular-product" data-toggle="tab">Popular Products </a></li>
                                <li><a href="#new-arrival" data-toggle="tab">New Arrival</a></li>
                                <li><a href="#best-seller"  data-toggle="tab">Best Seller</a></li>
                                <li><a href="#special-offer"  data-toggle="tab">Special Offer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- popular-product start -->
                    <div id="popular-product" class="tab-pane active show">
                        <div class="row">
                            <!-- product-item start -->
                            <div class="col-lg-3 col-md-4">
                                <div class="product-item">
                                    <div class="product-img">
{{--                                        <a href="{{\Illuminate\Support\Facades\URL::to('single-product/'.$value->product_id)}}">--}}
                                            <img src="{{asset('../public/frontend/img/product/7.jpg')}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
{{--                                            <a href="{{\Illuminate\Support\Facades\URL::to('single-product/'.$value->product_id)}}">Product Name</a>--}}
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">$ 869.00</h3>
                                        <ul class="action-button">
                                            <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i
                                                        class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- product-item end -->

                        </div>
                    </div>
                    <!-- popular-product end -->
                    <!-- new-arrival start -->
                    <div id="new-arrival" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <!-- product-item start -->
                            <div class="col-lg-3 col-md-4">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="{{\Illuminate\Support\Facades\URL::to('single-product')}}">
                                            <img src="{{asset('../public/frontend/img/product/7.jpg')}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{\Illuminate\Support\Facades\URL::to('single-product')}}">Product Name</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">$ 869.00</h3>
                                        <ul class="action-button">
                                            <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i
                                                        class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- product-item end -->
                        </div>
                    </div>
                    <!-- new-arrival end -->
                    <!-- best-seller start -->
                    <div id="best-seller" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <!-- product-item start -->
                            <div class="col-lg-3 col-md-4">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="{{\Illuminate\Support\Facades\URL::to('single-product')}}">
                                            <img src="{{asset('../public/frontend/img/product/7.jpg')}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{\Illuminate\Support\Facades\URL::to('single-product')}}">Product Name</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">$ 869.00</h3>
                                        <ul class="action-button">
                                            <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i
                                                        class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- product-item end -->

                        </div>
                    </div>
                    <!-- best-seller end -->
                    <!-- special-offer start -->
                    <div id="special-offer" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <!-- product-item start -->
                            <div class="col-lg-3 col-md-4">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="{{\Illuminate\Support\Facades\URL::to('single-product')}}">
                                            <img src="{{asset('../public/frontend/img/product/7.jpg')}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{\Illuminate\Support\Facades\URL::to('single-product')}}">Product Name</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">$ 869.00</h3>
                                        <ul class="action-button">
                                            <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i
                                                        class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- product-item end -->

                        </div>
                    </div>
                    <!-- special-offer end -->
                </div>
            </div>
        </div>
        <!-- PRODUCT TAB SECTION END -->

    </section>
@endsection
