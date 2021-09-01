@extends('layout')
@section('content')
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Đăng nhập / Đăng ký</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="{{\Illuminate\Support\Facades\URL::to('index')}}">Trang chủ</a></li>
                                <li>Đăng nhập / Đăng ký</li>
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

        <!-- LOGIN SECTION START -->
        <div class="login-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="registered-customers">
                            <h6 class="widget-title border-left mb-50">Đăng Nhập</h6>
                            <form action="{{\Illuminate\Support\Facades\URL::to('login-user')}}" method="post">
                                {{csrf_field()}}
                              <?php
                                $message= session()->get('message');
                                if($message){
                                    echo '<p style="color:#f20707c7 ; font-weight: bold; font-style: italic">' .$message.'</p>';
                                    session()->put('message',null);
                                }
                                ?>
                                <div class="login-account p-30 box-shadow">
                                    <input type="text" name="email" placeholder="Nhập Email của bạn !" required>
                                    <input type="password" name="password" placeholder="Mật khẩu !" required>
                                    <p><small><a href="#">Bạn quên mật khẩu?</a></small></p>
                                    <button class="submit-btn-1 btn-hover-1" type="submit">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- new-customers -->
                    <div class="col-lg-6">
                        <div class="new-customers">
                            <form action="{{\Illuminate\Support\Facades\URL::to('add-customer')}}" method="post">
                                {{csrf_field()}}
                                <h6 class="widget-title border-left mb-50">Đăng Ký</h6>
                                <div class="login-account p-30 box-shadow">
                                    <input type="text" name="customer_name"  placeholder="Họ tên" required>
                                    <input type="text"  name="customer_email" placeholder="Nhập Email của bạn..." required>
                                    <input type="password" name="customer_password" placeholder="Mật khẩu" required>
                                    <input type="text" name="customer_phone"  placeholder="Số điện thoại..." required>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Đăng ký</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Làm mới</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGIN SECTION END -->

    </div>
@endsection
