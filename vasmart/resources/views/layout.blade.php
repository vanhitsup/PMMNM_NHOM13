<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/subas-preview-v1/subas/index.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2021 09:27:18 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>V-A Smart </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('../public/frontend/img/icon/favicon.png')}}">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/bootstrap.min.css')}}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{asset('../public/frontend/lib/css/nivo-slider.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('../public/frontend/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/responsive.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('../public/backend/css/sweetalert.css')}}">

    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{asset('../public/frontend/css/style-customizer.css')}}">
    <link href="#" data-style="styles" rel="stylesheet">

    <!-- Modernizr JS -->
    <script src="{{asset('../public/frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>

<!-- Body main wrapper start -->
<div class="wrapper">

    <!-- START HEADER AREA -->
    <header class="header-area header-wrapper">
        <!-- header-top-bar -->
        <div class="header-top-bar plr-185">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 d-none d-md-block">
                        <div class="call-us">
                            <p class="mb-0 roboto">+84.854572098</p>
                        </div>
                    </div>
                    <div style="margin: 10px 0 0 500px">
                            <?php
                            $customer_id=\Illuminate\Support\Facades\Session::get('customer_id');
                            if($customer_id!=null){

                            ?>
                                <a style="color: #cccccc; font-weight: bold" href="{{\Illuminate\Support\Facades\URL::to('logout-user')}}">
                                <i class="zmdi zmdi-account"></i>
                                Đăng xuất
                                </a>
                                <?php
                                }
                            else{
                                ?>
                                <a style="color: #cccccc; font-weight: bold" href="{{\Illuminate\Support\Facades\URL::to('login')}}">
                                <i class="zmdi zmdi-lock"></i>
                                Đăng nhập
                                </a>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-middle-area -->
        <div id="sticky-header" class="header-middle-area plr-185">
            <div class="container-fluid">
                <div class="full-width-mega-dropdown">
                    <div class="row">
                        <!-- logo -->
                        <div class="col-lg-2 col-md-4">
                            <div class="logo">
                                <a href="{{\Illuminate\Support\Facades\URL::to('index')}}">
                                    <img src="{{asset('../public/frontend/img/logo/logo.png')}}" alt="main logo">
                                </a>
                            </div>
                        </div>
                        <!-- primary-menu -->
                        <div class="col-lg-8 d-none d-lg-block">
                            <nav id="primary-menu">
                                <ul class="main-menu text-center">
                                    <li><a href="{{\Illuminate\Support\Facades\URL::to('index')}}">Trang chủ</a>
                                    </li>
                                    <li class="mega-parent"><a href="{{\Illuminate\Support\Facades\URL::to('shop')}}">Shop</a>
                                    </li>
                                    <li class="mega-parent"><a href="#">Danh Mục</a>
                                        <div class="mega-menu-area clearfix">
                                            <div class="mega-menu-link f-left">
                                                <ul class="single-mega-item">
                                                    <li class="menu-title">Điện thoại thông minh</li>
                                                    <li>
                                                        <a href="#">Iphone</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">SamSung</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Oppo</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Huawei</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">BPhone</a>
                                                    </li>

                                                </ul>
                                                <ul class="single-mega-item">
                                                    <li class="menu-title">Laptop</li>
                                                    <li>
                                                        <a href="#">MacBook</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">DEll</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Asus</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">SamSung</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Acer</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Lennovo</a>
                                                    </li>

                                                </ul>
                                                <ul class="single-mega-item">
                                                    <li class="menu-title">Tai nghe</li>
                                                    <li>
                                                        <a href="#">Sony</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Apple</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Logitech</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">HP</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Gaming</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Có Dây</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Bluetooth</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="mega-menu-photo f-left">
                                                <a href="#">
                                                    <img src="{{asset('../public/frontend/img/mega-menu/1.jpg')}}" alt="mega menu image">
                                                </a>
                                            </div>
                                        </div>
                                    </li>


                                    <li>
                                        <a href="{{\Illuminate\Support\Facades\URL::to('/about')}}">Về chúng tôi</a>
                                    </li>
                                    <li>
                                        <a href="{{\Illuminate\Support\Facades\URL::to('/contact')}}">Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- header-search & total-cart -->
                        <div class="col-lg-2 col-md-8">
                            <div class="search-top-cart  f-right">
                                <!-- header-search -->
                                <div class="header-search f-left">
                                    <div class="header-search-inner">
                                        <button class="search-toggle">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                        <form action="{{\Illuminate\Support\Facades\URL::to('search')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="top-search-box">
                                                <input type="text" placeholder="Nhập tên sản phẩm tìm kiếm..." name="keywords_submit">
                                                <button type="submit">
                                                    <i class="zmdi zmdi-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- total-cart -->
                                <div class="total-cart f-left">
                                    <div class="total-cart-in">
                                        <div class="cart-toggler">
                                            <a href="#">
                                                <span class="cart-quantity">02</span><br>
                                                <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                            </a>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="top-cart-inner your-cart">
                                                    <h5 class="text-capitalize">Giỏ hàng</h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total-cart-pro">
                                                    <!-- single-cart -->
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-img f-left">
                                                            <a href="#">
                                                                <img src="{{asset('../public/frontend/img/cart/1.jpg')}}" alt="Cart Product" />
                                                            </a>
                                                            <div class="del-icon">
                                                                <a href="#">
                                                                    <i class="zmdi zmdi-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="cart-info f-left">
                                                            <h6 class="text-capitalize">
                                                                <a href="#">Dummy Product Name</a>
                                                            </h6>
                                                            <p>
                                                                <span>Brand <strong>:</strong></span>Brand Name
                                                            </p>
                                                            <p>
                                                                <span>Model <strong>:</strong></span>Grand s2
                                                            </p>
                                                            <p>
                                                                <span>Color <strong>:</strong></span>Black, White
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!-- single-cart -->
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-img f-left">
                                                            <a href="#">
                                                                <img src="{{asset('../public/frontend/img/cart/1.jpg')}}" alt="Cart Product" />
                                                            </a>
                                                            <div class="del-icon">
                                                                <a href="#">
                                                                    <i class="zmdi zmdi-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="cart-info f-left">
                                                            <h6 class="text-capitalize">
                                                                <a href="#">Dummy Product Name</a>
                                                            </h6>
                                                            <p>
                                                                <span>Brand <strong>:</strong></span>Brand Name
                                                            </p>
                                                            <p>
                                                                <span>Model <strong>:</strong></span>Grand s2
                                                            </p>
                                                            <p>
                                                                <span>Color <strong>:</strong></span>Black, White
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner subtotal">
                                                    <h4 class="text-uppercase g-font-2">
                                                        Tổng tiền =
                                                        <span>$ 500.00</span>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner view-cart">
                                                    <h4 class="text-uppercase">
                                                        <a href="{{\Illuminate\Support\Facades\URL::to('cart')}}">Xem Giỏ Hàng</a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner check-out">
                                                    <h4 class="text-uppercase">
                                                        <?php
                                                        $customer_id=\Illuminate\Support\Facades\Session::get('customer_id');
                                                        $shipping_id=\Illuminate\Support\Facades\Session::get('shipping_id');
                                                        if($customer_id!=NULL && $shipping_id==NULL){
                                                        ?>
                                                        <a  href="{{\Illuminate\Support\Facades\URL::to('checkout')}}">
                                                            Thanh Toán
                                                        </a>
                                                            <?php
                                                            }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                                                ?>
                                                            <a  href="{{\Illuminate\Support\Facades\URL::to('payment')}}">
                                                                Thanh Toán
                                                            </a>
                                                        <?php
                                                        }
                                                        else{
                                                        ?>
                                                        <a href="{{\Illuminate\Support\Facades\URL::to('login')}}">
                                                            Thanh toán
                                                        </a>
                                                        <?php } ?>
                                                    </h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER AREA -->




    <!-- START SLIDER AREA -->
    <!-- END SLIDER AREA -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper section">


        @yield('content')

    </section>
    <!-- End page content -->

    <!-- START FOOTER AREA -->
    <footer id="footer" class="footer-area section">
        <div class="footer-top">
            <div class="container-fluid">
                <div class="plr-185">
                    <div class="footer-top-inner gray-bg">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-5">
                                <div class="single-footer footer-about">
                                    <div class="footer-logo">
                                        <img src="{{asset('../public/frontend/img/logo/logo.png')}}" alt="">
                                    </div>
                                    <div class="footer-brief">
                                        <p>V.A Smart là nhà phân phối thiết bị công nghệ, điện tử hàng đầu Việt Nam. Đi đầu trong lĩnh vực công nghệ, luôn mang đến những sản phẩm công nghệ mới nhất trên thế giới đến với người dùng.</p>
                                    </div>
                                    <ul class="footer-social">
                                        <li>
                                            <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 d-block d-xl-block d-lg-none d-md-none">
                                <div class="single-footer">
                                    <h4 class="footer-title border-left">Danh mục</h4>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{\Illuminate\Support\Facades\URL::to('shop')}}"><i class="zmdi zmdi-circle"></i><span>Shop</span></a>
                                        </li>
                                        <li>
                                            <a href="{{\Illuminate\Support\Facades\URL::to('blog')}}"><i class="zmdi zmdi-circle"></i><span>Blog</span></a>
                                        </li>
                                        <li>
                                            <a href="{{\Illuminate\Support\Facades\URL::to('contact')}}"><i class="zmdi zmdi-circle"></i><span>Liên hệ</span></a>
                                        </li>
                                        <li>
                                            <a href="{{\Illuminate\Support\Facades\URL::to('about')}}"><i class="zmdi zmdi-circle"></i><span>Về chúng tôi</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-3">
                                <div class="single-footer">
                                    <h4 class="footer-title border-left">Tài khoản</h4>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="{{\Illuminate\Support\Facades\URL::to('my-account')}}"><i class="zmdi zmdi-circle"></i><span>Tài khoản</span></a>
                                        </li>
                                        <li>
                                            <a href="{{\Illuminate\Support\Facades\URL::to('wishlist')}}"><i class="zmdi zmdi-circle"></i><span>Danh sách yêu thích</span></a>
                                        </li>
                                        <li>
                                            <a href="{{\Illuminate\Support\Facades\URL::to('cart')}}"><i class="zmdi zmdi-circle"></i><span>Giỏ hàng</span></a>
                                        </li>
                                        <li>
                                            <a href="{{\Illuminate\Support\Facades\URL::to('login')}}"><i class="zmdi zmdi-circle"></i><span>Đăng nhập</span></a>
                                        </li>
                                        <li>
                                            <a href="{{\Illuminate\Support\Facades\URL::to('login')}}"><i class="zmdi zmdi-circle"></i><span>Đăng ký</span></a>
                                        </li>
                                        <li>
                                            <a href="{{\Illuminate\Support\Facades\URL::to('checkout')}}"><i class="zmdi zmdi-circle"></i><span>Thanh toán</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="single-footer">
                                    <h4 class="footer-title border-left">Liên hệ</h4>
                                    <div class="footer-message">
                                        <form action="#">
                                            <input type="text" name="name" placeholder="Tên của bạn...">
                                            <input type="text" name="email" placeholder="Email của bạn...">
                                            <textarea class="height-80" name="message" placeholder="Lời nhắn cho chúng tôi..."></textarea>
                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit">Gửi đi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom black-bg">
            <div class="container-fluid">
                <div class="plr-185">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="copyright-text">
                                    <p>&copy; <a href="#" target="_blank">PTVanh</a> 2021. All Rights Reserved.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul class="footer-payment text-right">
                                    <li>
                                        <a href="#"><img src="{{asset('../public/frontend/img/payment/1.jpg')}}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{asset('../public/frontend/img/payment/2.jpg')}}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{asset('../public/frontend/img/payment/3.jpg')}}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{asset('../public/frontend/img/payment/4.jpg')}}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER AREA -->

    <!-- START QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product clearfix">
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="" src="{{asset('../public/frontend/img/product/quickview.jpg')}}">
                                </div>
                            </div><!-- .product-images -->

                            <div class="product-info">
                                <h1>Aenean eu tristique</h1>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">£160.00</span>
                                        <span class="old-price">£190.00</span>
                                    </div>
                                </div>
                                <a href="{{\Illuminate\Support\Facades\URL::to('single-product')}}" class="see-all">See all features</a>
                                <div class="quick-add-to-cart">
                                    <form method="post" class="cart">
                                        <div class="numbers-row">
                                            <input type="number" id="french-hens" value="3">
                                        </div>
                                        <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="quick-desc">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons clearfix">
                                            <li>
                                                <a class="facebook" href="https://www.facebook.com/p.t.v.a.09/" target="_blank" title="Facebook">
                                                    <i class="zmdi zmdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="google-plus" href="#" target="_blank" title="Google +">
                                                    <i class="zmdi zmdi-google-plus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="#" target="_blank" title="Twitter">
                                                    <i class="zmdi zmdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="pinterest" href="#" target="_blank" title="Pinterest">
                                                    <i class="zmdi zmdi-pinterest"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="rss" href="#" target="_blank" title="RSS">
                                                    <i class="zmdi zmdi-rss"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->

    <!--style-customizer start -->
    <div class="style-customizer closed">
        <div class="buy-button">
            <a href="{{\Illuminate\Support\Facades\URL::to('index')}}" class="customizer-logo"><img src="{{asset('../public/frontend/images/logo/logo.png')}}" alt="Theme Logo"></a>
        </div>
        <div class="clearfix content-chooser">
            <h3>Layout Options</h3>
            <p>Which layout option you want to use?</p>
            <ul class="layoutstyle clearfix">
                <li class="wide-layout selected" data-style="wide" title="wide"> Wide </li>
                <li class="boxed-layout" data-style="boxed" title="boxed"> Boxed </li>
            </ul>
            <h3>Color Schemes</h3>
            <p>Which theme color you want to use? Select from here.</p>
            <ul class="styleChange clearfix">
                <li class="skin-default selected" title="skin-default" data-style="skin-default" ></li>
                <li class="skin-green" title="green" data-style="skin-green"></li>
                <li class="skin-purple" title="purple" data-style="skin-purple"></li>
                <li class="skin-blue" title="blue" data-style="skin-blue"></li>
                <li class="skin-cyan" title="cyan" data-style="skin-cyan"></li>
                <li class="skin-amber" title="amber" data-style="skin-amber"></li>
                <li class="skin-blue-grey" title="blue-grey" data-style="skin-blue-grey"></li>
                <li class="skin-teal" title="teal" data-style="skin-teal"></li>
            </ul>
            <h3>Background Patterns</h3>
            <p>Which background pattern you want to use?</p>
            <ul class="patternChange clearfix">
                <li class="pattern-1" data-style="pattern-1" title="pattern-1"></li>
                <li class="pattern-2" data-style="pattern-2" title="pattern-2"></li>
                <li class="pattern-3" data-style="pattern-3" title="pattern-3"></li>
                <li class="pattern-4" data-style="pattern-4" title="pattern-4"></li>
                <li class="pattern-5" data-style="pattern-5" title="pattern-5"></li>
                <li class="pattern-6" data-style="pattern-6" title="pattern-6"></li>
                <li class="pattern-7" data-style="pattern-7" title="pattern-7"></li>
                <li class="pattern-8" data-style="pattern-8" title="pattern-8"></li>
            </ul>
            <h3>Background Images</h3>
            <p>Which background image you want to use?</p>
            <ul class="patternChange main-bg-change clearfix">
            </ul>
            <ul class="resetAll">
                <li><a class="button button-border button-reset" href="#">Reset All</a></li>
            </ul>
        </div>
    </div>
    <!--style-customizer end -->
</div>
<!-- Body main wrapper end -->


<!-- Placed JS at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="{{asset('../public/frontend/js/vendor/jquery-3.1.1.min.js')}}"></script>
<!-- Popper js js -->
<script src="{{asset('../public/frontend/js/popper.min.js')}}"></script>
<!-- Bootstrap framework js -->
<script src="{{asset('../public/frontend/js/bootstrap.min.js')}}"></script>
<!-- jquery.nivo.slider js -->
<script src="{{asset('../public/frontend/lib/js/jquery.nivo.slider.js')}}"></script>
<!-- All js plugins included in this file. -->
<script src="{{asset('../public/frontend/js/plugins.js')}}"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="{{asset('../public/frontend/js/main.js')}}"></script>
<script src="{{asset('../public/backend/js/sweetalert.js')}}"></script>
<script src="{{asset('../public/frontend/js/sweetjs.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function() {
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{url('add-cart-ajax')}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id,
                    cart_product_name:cart_product_name,
                    cart_product_image:cart_product_image,
                    cart_product_price:cart_product_price,
                    cart_product_qty:cart_product_qty,
                    _token:_token},
                success:function(){
                    swal({
                            title: "Sản phẩm đã được thêm vào giỏ !",
                            text: "Bạn có thế tiếp tục mua hàng hoặc đi tới Giỏ hàng !",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{url('cart')}}";
                        });

                }
            });

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action==='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{\Illuminate\Support\Facades\URL::to('select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp === '' && maqh ==='' && xaid ===''){
                alert('Làm ơn chọn để tính phí vận chuyển');
            }else{
                $.ajax({
                    url : '{{\Illuminate\Support\Facades\URL::to('calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                        location.reload();
                    }
                });
            }
        });
    });
</script>
</body>


</html>

