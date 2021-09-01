<?php
//    echo '<pre>';
//    print_r($list_category_product);
//    echo '</pre>';
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
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$order_by_id->customer_name}}</td>
                                <td>{{$order_by_id->customer_phone}}</td>
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
        <h3 class="h3 mb-2 text-gray-800">Thông Tin Vận Chuyển</h3>

        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center">
                        <thead>
                        <tr>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại người nhận</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>{{$order_by_id->shipping_name}}</td>
                            <td>{{$order_by_id->shipping_address}}</td>
                            <td>{{$order_by_id->shipping_phone}}</td>
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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center">

                        <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>{{$order_by_id->product_name}}</td>
                            <td>{{$order_by_id->product_sales_quantity}}</td>
                            <td>{{number_format($order_by_id->product_price)}} VNĐ</td>
                            <td>{{number_format($order_by_id->product_price*$order_by_id->product_sales_quantity)}} VNĐ</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
