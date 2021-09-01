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
        <h1 class="h3 mb-2 text-gray-800">Danh Sách Mã Giảm Giá</h1>


        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <?php
                        $message= session()->get('message');
                        if($message){
                            echo '<p style="color:red ; font-weight: bold; font-style: italic">' .$message.'</p>';
                            session()->put('message',null);
                        }
                        ?>
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên mã giảm giá</th>
                            <th>Mã Code</th>
                            <th>Số lượng mã</th>
                            <th>Điều kiện giảm giá</th>
                            <th>Số tiền giảm</th>
                            <th>Xóa mã</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($coupon as $key=>$value)
                            <tr>
                                <td width="10px"><?php echo $i; $i++; ?></td>
                                <td>{{$value->coupon_name}}</td>
                                <td>{{$value->coupon_code}}</td>
                                <td>{{$value->coupon_times}}</td>
                                <td>
                                    <?php
                                    if($value->coupon_condition==1){
                                    ?>
                                    Giảm theo %
                                    <?php
                                    }else{
                                    ?>
                                    Giảm theo tiền
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($value->coupon_condition==1){
                                    ?>
                                    Giảm {{$value->coupon_number}} %
                                    <?php
                                    }else{
                                    ?>
                                    Giảm {{number_format($value->coupon_number)}} đ
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa mã này không?')" href="{{\Illuminate\Support\Facades\URL::to('delete-coupon/'.$value->coupon_id)}}" class="active" style="text-decoration: none">
                                        <button type="button" class="btn btn-outline-danger" style="width: 70px">Xóa</button>
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
