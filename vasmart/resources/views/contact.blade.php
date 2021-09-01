@extends('layout')
@section('content')
<div class="breadcrumbs-section plr-200 mb-80 section">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Liên hệ</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="{{\Illuminate\Support\Facades\URL::to('index')}}">Trang chủ</a></li>
                            <li>Liên hệ</li>
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

    <!-- ADDRESS SECTION START -->
    <div class="address-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-address box-shadow">
                        <i class="zmdi zmdi-pin"></i>
                        <h6>House 06, Road 01, Katashur, Mohammadpur,</h6>
                        <h6>Dhaka-1207, Bangladesh</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-address box-shadow">
                        <i class="zmdi zmdi-phone"></i>
                        <h6><a href="tel:555-555-1212">555-555-1212</a></h6>
                        <h6><a href="tel:555-555-1212">666-666-1313</a></h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-address box-shadow">
                        <i class="zmdi zmdi-email"></i>
                        <h6>vietanhpt@gmail.com</h6>
                        <h6>admin@vietanhpt.com</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADDRESS SECTION END -->

    <!-- GOOGLE MAP SECTION START -->
    <div class="google-map-section">
        <div class="container-fluid">
            <div class="google-map plr-185">
                <div id="googleMap"></div>
            </div>
        </div>
    </div>
    <!-- GOOGLE MAP SECTION END -->

    <!-- MESSAGE BOX SECTION START -->
    <div class="message-box-section mt--50 mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="message-box box-shadow white-bg">
                        <form id="contact-form" action="https://demo.hasthemes.com/subas-preview-v1/subas/mail.php" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="blog-section-title border-left mb-30">get in touch</h4>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Your name here">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="email" placeholder="Your email here">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="subject" placeholder="Subject here">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="phone" placeholder="Your phone here">
                                </div>
                                <div class="col-lg-12">
                                    <textarea class="custom-textarea" name="message" placeholder="Message"></textarea>
                                    <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">submit message</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MESSAGE BOX SECTION END -->
</section>
@endsection
