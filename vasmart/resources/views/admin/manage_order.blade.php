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
                            <th>Mã đơn hàng</th>
                            <th>Ngày tháng đặt hàng</th>
                            <th>Tình trạng đơn hàng</th>
                            <th align="center">Chi tiết đơn hàng</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($getorder as $key =>$value)
                            <tr>
                                <td width="10px" align="center"><?php echo $i; $i++; ?></td>
                                <td align="center">{{$value->order_code}}</td>
                                <td align="center">{{$value->created_at}}</td>
                                <td align="center">
                                    @if($value->order_status==1)
                                        <span class="text text-success">Đơn hàng mới</span>
                                    @elseif($value->order_status==2)
                                        <span class="text text-primary">Đã xử lý - Đã giao hàng</span>
                                    @else
                                        <span class="text text-danger">Đơn hàng đã bị hủy</span>
                                    @endif
                                </td>
                                <td align="center">
                                    <a href="{{\Illuminate\Support\Facades\URL::to('view-order/'.$value->order_code)}}" class="active" style="text-decoration: none">
                                        <button type="button" class="btn btn-outline-success">Xem chi tiết</button>
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
