
<?php
$content=\Gloudemans\Shoppingcart\Facades\Cart::content();

?>
@extends('layout')
@section('content')
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Xác nhận thanh toán</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="{{\Illuminate\Support\Facades\URL::to('index')}}">Home</a></li>
                                <li>Payment</li>
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
                    <div class="col-lg-12">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- checkout start -->
                            <div class="tab-pane active" id="checkout">
                                <div class="checkout-content box-shadow p-30">
                                    <form action="{{\Illuminate\Support\Facades\URL::to('order-place')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <!-- billing details -->

                                            <div class="col-md-12">
                                                <!-- our order -->
                                                <div class="payment-details pl-10 mb-50">
                                                    <h6 class="widget-title border-left mb-20">Đơn hàng</h6>
                                                    <table>
                                                        @foreach($content as $key=>$value)
                                                            <tr>
                                                                <td class="td-title-1">{{$value->name}} x {{$value->qty}}</td>
                                                                <td class="td-title-2">{{number_format($value->price*$value->qty).' VND'}}</td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td class="td-title-1">Tổng tiền</td>
                                                            <td class="td-title-2">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal().' VNĐ'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Phí vận chuyển </td>
                                                            <td class="td-title-2">0 VND</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Thuế VAT</td>
                                                            <td class="td-title-2">0 VNĐ</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="order-total">Tổng tiền thanh toán</td>
                                                            <td class="order-total-price">$2425.00</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!-- payment-method -->
                                                    {{csrf_field()}}
                                                <div class="payment-method">
                                                    <h6 class="widget-title border-left mb-20">phương thức thanh toán</h6>
                                                    <div id="accordion">
                                                        <div class="panel">
                                                            <h4 class="payment-title box-shadow">
                                                                <input type="radio" name="payment_option" value="1">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="" >
                                                                    Thanh toán bằng ATM
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div class="panel">
                                                            <h4 class="payment-title box-shadow">
                                                                <input type="radio" name="payment_option" value="2">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                                    Thanh toán bằng thẻ Visa/Master Card
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div class="panel">
                                                            <h4 class="payment-title box-shadow">
                                                                <input type=radio name="payment_option" value="3">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >
                                                                    Ship Cod
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- payment-method end -->
                                            </div>
                                        </div>
                                        <input class="submit-btn-1 mt-30 btn-hover-1" name="send_order_place" value="Đặt hàng" type="submit">
                                    </form>
                                </div>
                            </div>
                            <!-- checkout end -->
                            <!-- order-complete start -->
                            <div class="tab-pane" id="order-complete">
                                <div class="order-complete-content box-shadow">
                                    <div class="thank-you p-30 text-center">
                                        <h6 class="text-black-5 mb-0">Thank you. Your order has been received.</h6>
                                    </div>
                                    <div class="order-info p-30 mb-10">
                                        <ul class="order-info-list">
                                            <li>
                                                <h6>order no</h6>
                                                <p>m 2653257</p>
                                            </li>
                                            <li>
                                                <h6>order no</h6>
                                                <p>m 2653257</p>
                                            </li>
                                            <li>
                                                <h6>order no</h6>
                                                <p>m 2653257</p>
                                            </li>
                                            <li>
                                                <h6>order no</h6>
                                                <p>m 2653257</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <!-- our order -->
                                        <div class="col-md-6">
                                            <div class="payment-details p-30">
                                                <h6 class="widget-title border-left mb-20">our order</h6>
                                                <table>
                                                    <tr>
                                                        <td class="td-title-1">Dummy Product Name x 2</td>
                                                        <td class="td-title-2">$1855.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Dummy Product Name</td>
                                                        <td class="td-title-2">$555.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Cart Subtotal</td>
                                                        <td class="td-title-2">$2410.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Shipping and Handing</td>
                                                        <td class="td-title-2">$15.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Vat</td>
                                                        <td class="td-title-2">$00.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-total">Order Total</td>
                                                        <td class="order-total-price">$2425.00</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="bill-details p-30">
                                                <h6 class="widget-title border-left mb-20">billing details</h6>
                                                <ul class="bill-address">
                                                    <li>
                                                        <span>Address:</span>
                                                        28 Green Tower, Street Name, New York City, USA
                                                    </li>
                                                    <li>
                                                        <span>email:</span>
                                                        info@companyname.com
                                                    </li>
                                                    <li>
                                                        <span>phone : </span>
                                                        (+880) 19453 821758
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="bill-details pl-30">
                                                <h6 class="widget-title border-left mb-20">billing details</h6>
                                                <ul class="bill-address">
                                                    <li>
                                                        <span>Address:</span>
                                                        28 Green Tower, Street Name, New York City, USA
                                                    </li>
                                                    <li>
                                                        <span>email:</span>
                                                        info@companyname.com
                                                    </li>
                                                    <li>
                                                        <span>phone : </span>
                                                        (+880) 19453 821758
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- order-complete end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->

    </section>
@endsection
