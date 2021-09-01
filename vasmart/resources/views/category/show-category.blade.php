
@extends('layout')
@section('content')
    <!-- BREADCRUMBS SETCTION START -->
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Danh mục sản phẩm</h1>
                            @foreach($category_name as $key=>$name)
                                <h1 style="margin: -20px 0 20px 500px"> {{$name->category_name}}</h1>
                            @endforeach
                            <ul class="breadcrumb-list">
                                <li><a href="{{\Illuminate\Support\Facades\URL::to('index')}}">Trang chủ</a></li>
                                <li><a href="{{\Illuminate\Support\Facades\URL::to('shop')}}">Cửa hàng</a></li>
                                <li><a href="{{\Illuminate\Support\Facades\URL::to('shop')}}">Danh mục</a></li>
                                    @foreach($category_name as $key=>$name)
                                <li>
                                    {{$name->category_name}}
                                </li>
                                   @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS SETCTION END -->

    <!-- Start page content -->
    <div id="page-content" class="page-wrapper section">

        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-2 order-1">
                        <div class="shop-content">
                            <!-- shop-option start -->
                            <div class="shop-option box-shadow mb-30 clearfix">
                                <!-- Nav tabs -->
                                <ul class="nav shop-tab f-left" role="tablist">
                                    <li>
                                        <a class="active" href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
                                    </li>
                                    <li>
                                        <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                                    </li>
                                </ul>
                                <!-- short-by -->
                                <div class="short-by f-left text-center">
                                    <span>Sort by :</span>
                                    <select>
                                        <option value="volvo">Newest items</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                </div>
                                <!-- showing -->
                                <div class="showing f-right text-right">
                                    <span>Showing : 01-09 of 17.</span>
                                </div>
                            </div>
                            <!-- shop-option end -->
                            <!-- Tab Content start -->
                            <div class="tab-content">
                                <!-- grid-view -->
                                <div id="grid-view" class="tab-pane active show" role="tabpanel">
                                    <div class="row">
                                        <!-- product-item start -->
                                        @foreach($category_by_id as $key => $value_cate)
                                        <div class="col-lg-3 col-md-6">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="{{\Illuminate\Support\Facades\URL::to('single-product/'.$value_cate->product_id)}}">
                                                        <img src="{{\Illuminate\Support\Facades\URL::to('../public/uploads/products/'.$value_cate->product_image)}}" alt=""/>                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <p class="product-title">
                                                        <a href="{{\Illuminate\Support\Facades\URL::to('single-product/'.$value_cate->product_id)}}">{{$value_cate->product_name}}</a>
                                                    </p>
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                    <h4 class="pro-price">{{number_format($value_cate->product_price)}} đ</h4>
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
                                        <!-- product-item end -->
                                        @endforeach
                                    </div>
                                </div>
                                <!-- list-view -->
                                <div id="list-view" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <!-- product-item start -->
                                        @foreach($category_by_id as $key => $value_cate)
                                        <div class="col-lg-12">
                                            <div class="shop-list product-item">
                                                <div class="product-img">
                                                    <a href="{{\Illuminate\Support\Facades\URL::to('single-product/'.$value_cate->product_id)}}">
                                                        <img src="{{\Illuminate\Support\Facades\URL::to('../public/uploads/products/'.$value_cate->product_image)}}" alt=""/>                                                    </a>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="clearfix">
                                                        <h6 class="product-title f-left">
                                                            <a href="{{\Illuminate\Support\Facades\URL::to('single-product/'.$value_cate->product_id)}}">{{$value_cate->product_name}}</a>
                                                        </h6>
                                                        <div class="pro-rating f-right">
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                        </div>
                                                    </div>
                                                    <h3 class="pro-price">{{number_format($value_cate->product_price)}} đ</h3>
                                                    <p>{{$value_cate->product_desc}}</p>
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
                            <!-- Tab Content end -->
                            <!-- shop-pagination start -->
                            <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                                <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                <li><a href="#">01</a></li>
                                <li><a href="#">02</a></li>
                                <li><a href="#">03</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">05</a></li>
                                <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                            </ul>
                            <!-- shop-pagination end -->
                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-1 order-2">
                        <!-- widget-search -->
                        <aside class="widget-search mb-30">
                            <form action="#">
                                <input type="text" placeholder="Search here...">
                                <button type="submit"><i class="zmdi zmdi-search"></i></button>
                            </form>
                        </aside>
                        <!-- widget-categories -->
                        <aside class="widget widget-categories box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Danh mục</h6>
                            <div id="cat-treeview" class="product-cat">
                                <ul>
                                    @foreach($category as $key=>$value_cate)
                                        <li class="closed"><a href="{{\Illuminate\Support\Facades\URL::to('/danh-muc/'.$value_cate->category_id)}}">{{$value_cate->category_name}}</a>

                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </aside>

                        <aside class="widget widget-categories box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Thương hiệu</h6>
                            <div id="cat-treeview" class="product-cat">
                                <ul>
                                    @foreach($brand as $key=>$value_brand)
                                        <li class="closed"><a href="{{\Illuminate\Support\Facades\URL::to('/thuong-hieu/'.$value_brand->brand_id)}}">{{$value_brand->brand_name}}</a>

                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                        <!-- shop-filter -->
                        <aside class="widget shop-filter box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Giá</h6>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit"  value="You range :"/>
                                    <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                </div>
                                <div id="slider-range"></div>
                            </div>
                        </aside>
                        <!-- widget-color -->
                        <aside class="widget widget-color box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">color</h6>
                            <ul>
                                <li class="color-1"><a href="#">LightSalmon</a></li>
                                <li class="color-2"><a href="#">Dark Salmon</a></li>
                                <li class="color-3"><a href="#">Tomato</a></li>
                                <li class="color-4"><a href="#">Deep Sky Blue</a></li>
                                <li class="color-5"><a href="#">Electric Purple</a></li>
                                <li class="color-6"><a href="#">Atlantis</a></li>
                            </ul>
                        </aside>

                        <!-- widget-product -->

                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->
@endsection
