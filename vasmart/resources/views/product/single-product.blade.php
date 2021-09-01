@extends('layout')
@section('content')
<div class="breadcrumbs-section plr-200 mb-80 section">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Chi tiết sản phẩm</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('index')}}">Trang Chủ</a></li>
                            <li>Chi tiết sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper section">

    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!-- single-product-area start -->
                    @foreach($detail_product as $key =>$value)
                        <form>
                            @csrf
                            <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                            <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">

                            <div class="single-product-area mb-80">
                        <div class="row">
                            <!-- imgs-zoom-area start -->
                            <div class="col-lg-5">
                                <div class="imgs-zoom-area">
                                    <img src="{{\Illuminate\Support\Facades\URL::to('../public/uploads/products/'.$value->product_image)}}" alt=""/>                                                    </a>
                                </div>
                            </div>
                            <!-- imgs-zoom-area end -->
                            <!-- single-product-info start -->
                            <div class="col-lg-7">
                                <div class="single-product-info">
                                    <h3 class="text-black-1">{{$value->product_name}}</h3>
                                    <span style="margin-top: 10px">Mã sản phẩm: {{$value->product_id}}</span>
                                    <h6 class="brand-name-2" style="margin-top: 10px">Thương hiệu: {{$value->brand_name}}</h6>
                                    <h6 class="brand-name-2" style="margin-top: 10px">Danh mục: {{$value->category_name}}</h6>
                                    <hr>
                                    <h7>Tình Trạng: Còn Hàng</h7>
                                    <hr>
                                    <!-- plus-minus-pro-action -->
{{--                                    <form action="{{\Illuminate\Support\Facades\URL::to('/save-cart')}}" method="post">--}}
{{--                                        {{csrf_field()}}--}}
{{--                                        <div class="plus-minus-pro-action clearfix">--}}
{{--                                            <div class="sin-plus-minus f-left clearfix">--}}
{{--                                                <p class="color-title f-left">Số lượng</p>--}}
{{--                                                    <input style="width: 60px" name="qty" type="number" min="1"  value="1">--}}
{{--                                                    <input type="hidden" value="{{$value->product_id}}" name="productid_hidden" >--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                        <!-- single-product-price -->--}}
{{--                                        <h3 class="pro-price">Giá: {{number_format($value->product_price)}} đ</h3>--}}
{{--                                        <!--  hr -->--}}
{{--                                        <hr>--}}
{{--                                            <button type="submit" class="btn btn-outline-success add-to-cart" style="height: 45px; width: 200px; border-radius: 5px">--}}
{{--                                                <i class="zmdi zmdi-shopping-cart-plus"></i>--}}
{{--                                                Thêm vào giỏ hàng--}}
{{--                                            </button>--}}
{{--                                    </form>--}}

                                        <div class="plus-minus-pro-action clearfix">
                                            <div class="sin-plus-minus f-left clearfix">
                                                <p class="color-title f-left">Số lượng</p>
                                                <input style="width: 60px" name="qty" type="number" min="1"  value="1">
                                                <input type="hidden" value="{{$value->product_id}}" name="productid_hidden" >
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- single-product-price -->
                                        <h3 class="pro-price">Giá: {{number_format($value->product_price)}} đ</h3>
                                        <hr>
                                </div>
                                <button type="button" class="btn btn-outline-success add-to-cart" style="height: 45px; width: 200px; border-radius: 5px"  data-id_product="{{$value->product_id}}" name="add-to-cart">
                                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                                    Thêm vào giỏ hàng
                                </button>

                            </div>
                            </div>
                            <!-- single-product-info end -->

                        </div>
                        <!-- single-product-tab -->
                        </form>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- hr -->
                                <hr>
                                <div class="single-product-tab reviews-tab">
                                    <ul class="nav mb-20">
                                        <li><a class="active" href="#description" data-toggle="tab">Mô tả</a></li>
                                        <li ><a href="#information" data-toggle="tab">Thông tin chi tiết</a></li>
                                        <li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div  style="color: #3a3b45" role="tabpanel" class="tab-pane active show" id="description">
                                           <p> {!! $value->product_desc !!}</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="information">
                                            <p style="color: #3a3b45"> {!! $value->product_content !!}</p>
                                            </div>
                                        <div role="tabpanel" class="tab-pane" id="reviews">
                                            <!-- reviews-tab-desc -->
                                            <div class="reviews-tab-desc">
                                                <!-- single comments -->
                                                <div class="media mt-30">
                                                    <div class="media-left">
                                                        <a href="#"><img class="media-object" src="{{asset('../public/frontend/img/author/1.jpg')}}" alt="#"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="name-commenter pull-left">
                                                                <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                                                <p class="mb-10">27 Jun, 2019 at 2:30pm</p>
                                                            </div>
                                                            <div class="pull-right">
                                                                <ul class="reply-delate">
                                                                    <li><a href="#">Reply</a></li>
                                                                    <li>/</li>
                                                                    <li><a href="#">Delate</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas .</p>
                                                    </div>
                                                </div>
                                                <!-- single comments -->
                                                <div class="media mt-30">
                                                    <div class="media-left">
                                                        <a href="#"><img class="media-object" src="{{asset('../public/frontend/img/author/2.jpg')}}" alt="#"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="name-commenter pull-left">
                                                                <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                                                <p class="mb-10">27 Jun, 2019 at 2:30pm</p>
                                                            </div>
                                                            <div class="pull-right">
                                                                <ul class="reply-delate">
                                                                    <li><a href="#">Reply</a></li>
                                                                    <li>/</li>
                                                                    <li><a href="#">Delate</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas .</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  hr -->
                                <hr>
                            </div>
                        </div>

                        </form></div>
                    <!-- single-product-area end -->
                    @endforeach
                    <div class="related-product-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title text-left mb-40">
                                    <h2 class="uppercase">Sản phẩm liên quan</h2>
                                </div>
                            </div>
                        </div>
                        <div class="active-related-product">
                            <!-- product-item start -->
                            @foreach($related_product as $key =>$value_related)

                            <div class="col-lg-12" >
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="{{\Illuminate\Support\Facades\URL::to('single-product/'.$value_related->product_id)}}">
                                            <img height="250px" src="{{\Illuminate\Support\Facades\URL::to('../public/uploads/products/'.$value_related->product_image)}}" alt=""/>                                                    </a>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{\Illuminate\Support\Facades\URL::to('single-product/'.$value_related->product_id)}}">{{$value_related->product_name}}</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">Giá: {{number_format($value_related->product_price)}} đ</h3>
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
                        @endforeach

                        <!-- product-item end -->
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
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
                                @foreach($cate_pro as $key=>$value_cate)
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
                                @foreach($brand_pro as $key=>$value_brand)
                                    <li class="closed"><a href="{{\Illuminate\Support\Facades\URL::to('/thuong-hieu/'.$value_brand->brand_id)}}">{{$value_brand->brand_name}}</a>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    <!-- widget-product -->
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->

</section>
@endsection
