
<?php
$content=\Gloudemans\Shoppingcart\Facades\Cart::content();
$total_pt=0;
?>
@extends('layout')
@section('content')
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Thanh toán</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="{{\Illuminate\Support\Facades\URL::to('index')}}">Home</a></li>
                                <li>Checkout</li>
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
                            <div class="table-content table-responsive mb-50">

                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @elseif(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif



                            </div>
                        @if(\Illuminate\Support\Facades\Session::get('cart')==true)

                            @php
                                $total = 0;
                            @endphp
                            @foreach(\Illuminate\Support\Facades\Session::get('cart') as $key => $cart)
                                @php
                                    $subtotal = $cart['product_price'] * $cart['product_qty'];
                                    $total+=$subtotal;
                                @endphp
                            @endforeach


                            <!-- checkout start -->
                            <div class="tab-pane active" id="checkout">
                                <div class="checkout-content box-shadow p-30">
                                    <div class="col-md-12" style="margin-bottom: 40px">
                                         <form>
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Tỉnh thành phố</label>
                                            <select name="city" class="form-control choose city" id="city" >
                                                <option value="">--- Chọn tỉnh thành phố ---</option>
                                                @foreach($city as $key => $value_city)
                                                    <option value="{{$value_city->matp}}">{{$value_city->name_city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Quận, huyện</label>
                                            <select name="province" class="form-control choose province" id="province">
                                                <option value="">--- Chọn quận, huyện ---</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Xã, phường, thị trấn</label>
                                            <select name="wards" class="form-control wards" id="wards">
                                                <option value="">--- Chọn xã, phường, thị trấn ---</option>
                                            </select>
                                        </div>
                                        <button type="button" class="submit-btn-1 mt-30 btn-hover-1 calculate_delivery" name="calculate_order">Tính phí vận chuyển</button>
                                    </form>

                                    </div>
                                    <form method="post">
                                        @csrf
                                        <div class="row">
                                            <!-- billing details -->
                                            <div class="col-md-6">
                                                <div class="billing-details pr-10">
                                                    <h6 class="widget-title border-left mb-20">Chi tiết hóa đơn</h6>
                                                    <input type="text" required name="shipping_name"  class="shipping_name" placeholder="Họ tên bạn...">
                                                    <input type="text" required name="shipping_email" class="shipping_email" placeholder="Địa chỉ email...">
                                                    <input type="text" required name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại...">
                                                    <input type="text" required name="shipping_address" class="shipping_address" placeholder="Địa chỉ...">
                                                    <textarea class="custom-textarea shipping_note" name="shipping_note"  placeholder="Ghi chú..." required></textarea>

                                                    @if(\Illuminate\Support\Facades\Session::get('fee'))
                                                        <input type="hidden" name="order_fee" class="order_fee" value="{{\Illuminate\Support\Facades\Session::get('fee')}}">
                                                    @else
                                                        <input type="hidden" name="order_fee" class="order_fee" value="10000">
                                                    @endif

                                                    @if(\Illuminate\Support\Facades\Session::get('coupon'))
                                                        @foreach(\Illuminate\Support\Facades\Session::get('coupon') as $key => $cou)
                                                            <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                                                        @endforeach
                                                    @else
                                                        <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                                    @endif

                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Chọn hình thức thanh toán</label>
                                                        <select required name="payment_select" class="form-control payment_select" id="exampleFormControlSelect1">
                                                                <option value="">--- Chọn ---</option>
                                                                <option value="0">ATM / Visa Card</option>
                                                                <option value="1">Ship Cod</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- our order -->
                                                <div class="payment-details pl-10 mb-50">
                                                    <h6 class="widget-title border-left mb-20">Đơn hàng</h6>
                                                    <table>

                                                        <tr>
                                                            <td class="td-title-1">Tiền hàng</td>
                                                            <td class="td-title-2">{{number_format($total,0,',','.')}} đ </td>
                                                        </tr>
                                                        @if(\Illuminate\Support\Facades\Session::get('fee'))
                                                        <tr>
                                                            <td class="td-title-1">Phí vận chuyển</td>
                                                            <td class="td-title-2">
                                                                <?php
                                                                $fee=0;
                                                                $fee=\Illuminate\Support\Facades\Session::get('fee');
                                                               echo number_format($fee);
                                                                ?> đ
                                                                    <a class="cart_quantity_delete" href="{{\Illuminate\Support\Facades\URL::to('delete-fee')}}"><i class="zmdi zmdi-close"></i></a>

                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if(Session::get('coupon'))
                                                            @foreach(Session::get('coupon') as $key => $cou)
                                                                @if($cou['coupon_condition']==1)

                                                                    <tr>
                                                                        <td class="td-title-1">Mã giảm giá</td>
                                                                        <td class="td-title-2"> {{$cou['coupon_number']}} %</td>
                                                                    </tr>

                                                                    <tr>

                                                                        <td class="td-title-1">Số tiền được giảm</td>
                                                                        <td class="td-title-2">
                                                                            @php
                                                                                $total_coupon = ($total*$cou['coupon_number'])/100;
                                                                                    echo number_format($total_coupon,0,',','.');
                                                                            @endphp
                                                                            đ
                                                                        </td>

                                                                    </tr>

                                                                    <tr>
                                                                        <td class="order-total">Tổng tiền thanh toán</td>
                                                                        <td class="order-total-price"> <?php
                                                                            if(\Illuminate\Support\Facades\Session::get('fee') && !\Illuminate\Support\Facades\Session::get('coupon')){
                                                                                $total_pt = $total;
                                                                                echo number_format($total_pt);
                                                                            }
                                                                            elseif (!Session::get('fee') && Session::get('coupon')){
                                                                                $total_pt = $total - $total_coupon ;
                                                                                echo number_format($total_pt);
                                                                            }
                                                                            elseif (Session::get('fee') && Session::get('coupon')){

                                                                                $total_pt = $total -$total_coupon - $fee;
                                                                                echo number_format($total_pt);
                                                                            }
                                                                            elseif(Session::get('fee') && !Session::get('coupon')){
                                                                                $total_after_fee = $total - Session::get('fee');
                                                                                $total_pt = $total_after_fee;
                                                                                echo number_format($total_pt);
                                                                            }
                                                                            ?>
                                                                             đ</td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <td class="td-title-1">Mã giảm giá</td>
                                                                        <td class="td-title-2">   {{number_format($cou['coupon_number'],0,',','.')}} đ</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="td-title-1">Số tiền được giảm</td>
                                                                        <td class="td-title-2">
                                                                            {{number_format($cou['coupon_number'],0,',','.')}} đ
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="order-total">Tổng tiền thanh toán</td>
                                                                        <td class="order-total-price">
                                                                            <?php
                                                                            if(\Illuminate\Support\Facades\Session::get('fee') && !\Illuminate\Support\Facades\Session::get('coupon')){
                                                                                $total_coupon = $total - $fee ;
                                                                                echo number_format($total_coupon);
                                                                            }
                                                                            elseif (!Session::get('fee') && Session::get('coupon')){
                                                                                $total_coupon = $total - $cou['coupon_number'];
                                                                                echo number_format($total_coupon);
                                                                            }
                                                                            elseif (Session::get('fee') && Session::get('coupon')){
                                                                                $total_coupon = $total - $cou['coupon_number'] - $fee;
                                                                                echo number_format($total_coupon);
                                                                            }
                                                                                ?>
                                                                                đ
                                                                        </td>


                                                                    </tr>
                                                                @endif

                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td class="td-title-1">Mã giảm giá</td>
                                                                <td class="td-title-2"> Không có</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="td-title-1">Số tiền được giảm</td>
                                                                <td class="td-title-2">
                                                                    0 đ
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="order-total">Tổng tiền thanh toán</td>
                                                                <td class="order-total-price">
                                                                    <?php
                                                                    $total_after_fee = $total - Session::get('fee');
                                                                    $total_pt = $total_after_fee;
                                                                    echo number_format($total_pt)
                                                                    ?>
                                                                   đ
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </table>
                                                </div>
                                                <!-- payment-method -->
                                                <div class="payment-method">
                                                    <h6 class="widget-title border-left mb-20">phương thức thanh toán</h6>
                                                    <div id="accordion">
                                                        <div class="panel">
                                                            <h4 class="payment-title box-shadow">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#bank-transfer" >
                                                                    direct bank transfer
                                                                </a>
                                                            </h4>
                                                            <div id="bank-transfer" class="panel-collapse collapse in" >
                                                                <div class="payment-content">
                                                                    <p>Lorem Ipsum is simply in dummy text of the printing and type setting industry. Lorem Ipsum has been.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel">
                                                            <h4 class="payment-title box-shadow">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                                    cheque payment
                                                                </a>
                                                            </h4>
                                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                                <div class="payment-content">
                                                                    <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel">
                                                            <h4 class="payment-title box-shadow">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >
                                                                    paypal
                                                                </a>
                                                            </h4>
                                                            <div id="collapseThree" class="panel-collapse collapse" >
                                                                <div class="payment-content">
                                                                    <p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                                                    <ul class="payent-type mt-10">
                                                                        <li><a href="#"><img src="{{asset('../public/frontend/img/payment/1.png')}}" alt=""></a></li>
                                                                        <li><a href="#"><img src="{{asset('../public/frontend/img/payment/2.png')}}" alt=""></a></li>
                                                                        <li><a href="#"><img src="{{asset('../public/frontend/img/payment/3.png')}}" alt=""></a></li>
                                                                        <li><a href="#"><img src="{{asset('../public/frontend/img/payment/4.png')}}" alt=""></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- payment-method end -->
{{--                                                <input class="submit-btn-1 mt-30 btn-hover-1" name="send_order" value="Đặt hàng" type="submit">--}}
                                            </div>
                                        </div>
                                        <input class="submit-btn-1 mt-30 btn-hover-1 send_order" name="send_order" value="Đặt hàng" type="button">

                                    </form>
                                </div>
                            </div>
                        @endif

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
