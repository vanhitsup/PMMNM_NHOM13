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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"  style="margin-left: 50px">Cập Nhật Thương Hiệu Sản Phẩm</h1>
            <a href="{{\Illuminate\Support\Facades\URL::to('list-brand-product')}}"><button style="margin-right: 250px" type="submit" class="btn btn-outline-success" name="update_category_product">Quay lại trang danh sách</button>
            </a>
        </div>

        <!-- Content Row -->

        <div class="row" style="margin-left: 50px">
            <div class="col-xl-10 col-lg-7">

        <?php
                $message= session()->get('message');
                if($message){
                    echo '<p style="color:#78b43d ; font-weight: bold">' .$message.'</p>';
                    session()->put('message',null);
                }
//                ?>
                @foreach($edit_brand_product as $key =>$value)
                    <form action="{{\Illuminate\Support\Facades\URL::to('update-brand-product/'.$value->brand_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" value="{{$value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea  class="form-control"  name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu ...">{{$value->brand_desc}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="update_brand_product">Submit</button>
                    </form>
                @endforeach
            </div>



        </div>

    </div>
@endsection
