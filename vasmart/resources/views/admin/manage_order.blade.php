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
        <h1 class="h3 mb-2 text-gray-800">Danh Sách Đơn Hàng</h1>

        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<!--                        --><?php
//                        $message= session()->get('message');
//                        if($message){
//                            echo '<p style="color:red ; font-weight: bold">' .$message.'</p>';
//                            session()->put('message',null);
//                        }
//                        ?>
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên người đặt</th>
                            <th>Tổng giá tiền</th>
                            <th>Tình trạng</th>
                            <th>Hiển thị</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($all_order  as $key=>$value)
                            <tr>
                                <td width="10px"><?php echo $i; $i++; ?></td>
                                <td>{{$value->customer_name}}</td>
                                <td>{{$value->order_total}} VNĐ</td>
                                <td>{{$value->order_status}}</td>
                                <td>
                                    <a href="{{\Illuminate\Support\Facades\URL::to('view-order/'.$value->order_id)}}" class="active" style="text-decoration: none">
                                        <button type="button" class="btn btn-outline-success">Xem chi tiết</button>
                                    </a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không?')"  href="{{\Illuminate\Support\Facades\URL::to('delete-order/'.$value->order_id)}}" class="active" style="text-decoration: none">
                                        <button type="button" class="btn btn-outline-danger">Xóa</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
