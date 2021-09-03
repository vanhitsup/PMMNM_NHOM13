<?php
$i=1;
//?>
@extends('admin.blank')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h3 class="h3 mb-2 text-gray-800">Thông Tin Khách Hàng</h3>

        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center">
                        <thead>
                        <tr>
                            <th>Tên người mua hàng</th>
                            <th>Số điện thoại người đặt</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$customer->customer_name}}</td>
                                <td>{{$customer->customer_phone}}</td>
                                <td>{{$customer->customer_email}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h3 class="h3 mb-2 text-gray-800">Thông Tin Người Nhận</h3>

        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center">
                        <thead>
                        <tr>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Ghi chú</th>
                            <th>Hình thức thanh toán</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>{{$shipping->shipping_name}}</td>
                            <td>{{$shipping->shipping_address}}</td>
                            <td>{{$shipping->shipping_phone}}</td>
                            <td>{{$shipping->shipping_email}}</td>
                            <td>{{$shipping->shipping_note}}</td>
                            <td>
                                @if($shipping->shipping_method==0)
                                   ATM/Visa Card
                                @else
                                    Ship Cod
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h3 class="h3 mb-2 text-gray-800">Chi Tiết Đơn Hàng</h3>

        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
           @php
                 $total = 0;
          @endphp
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center">

                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                            <th>Tổng</th>
                        </tr>

                        </thead>

                        <tbody>
                        @foreach($order_details_product as $key =>$detail)
                            @php

                                $subtotal = $detail->product_price*$detail->product_sales_quantity;
                                $total+=$subtotal;
                            @endphp
                            <tr>
                                <td><?php echo $i; $i++; ?></td>
                                <td>{{$detail->product_name}}</td>
                                <td>{{$detail->product_sales_quantity}}</td>
                                <td>
                                    {{number_format($detail->product_price)}} đ
                                </td>
                                <td>{{number_format($detail->product_price*$detail->product_sales_quantity)}} đ
                                </td>
                            </tr>
                        @endforeach
                        <hr>
                        <tr>
                            <td colspan="2">
                                <span style="font-weight: bold">Mã giảm giá:</span>
                                <span style="font-weight: bold; color: #ff0000">
                                @if($detail->product_coupon!='no')
                                    {{$detail->product_coupon}}
                                @else
                                    Không sử dụng mã
                                @endif
                                </span>
                            </td>
                            <td colspan="2">
                                @php
                                    $total_coupon = 0;
                                @endphp
                                @if($coupon_condition==1)
                                    @php
                                        $total_after_coupon = ($total*$coupon_number)/100;
                                        $total_coupon = $total + $detail->product_feeship - $total_after_coupon ;
                                    @endphp
                                    <span style="font-weight: bold"> Số tiền được giảm: </span>{{number_format($total_after_coupon)}} đ

                                @else
                                    @php

                                            $total_coupon = $total + $detail->product_feeship - $coupon_number ;
                                    @endphp
                                    <span style="font-weight: bold"> Số tiền được giảm: </span>{{ number_format($coupon_number)}} đ

                                @endif
                            </td>
                            <td >
                                <span style="font-weight: bold"> Phí vận chuyển:</span>
                                {{number_format($detail->product_feeship)}} đ
                            </td>
                        </tr>
                        <tr>
                           <td colspan="5">
                                <span style="font-weight: bold;">
                                Tổng giá trị đơn hàng phải thanh toán:
                            </span>
                              <span style="color: red; font-weight: bold">
                                  {{number_format($total_coupon)}} đ
                              </span>
                           </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       <div style="margin-left: 800px">
           <a target="_blank" href="{{\Illuminate\Support\Facades\URL::to('print-order/'.$detail->order_code)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
               <i class="fas fa-print"></i> In đơn hàng</a>
       </div>
    </div>

@endsection
