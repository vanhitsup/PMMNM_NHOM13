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
            <h1 class="h3 mb-0 text-gray-800"  style="margin-left: 50px">Cập Nhật Sản Phẩm</h1>
            <a href="{{\Illuminate\Support\Facades\URL::to('list-product')}}"><button style="margin-right: 300px" type="submit" class="btn btn-outline-success" name="update_product">Quay lại trang danh sách</button>
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
                ?>
                @foreach($edit_product as $key=> $value_product)
                    <form role="form" action="{{\Illuminate\Support\Facades\URL::to('update-product/'.$value_product->product_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" value="{{$value_product->product_name}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục sản phẩm">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                            <input  type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                            <img src="{{\Illuminate\Support\Facades\URL::to('../public/uploads/products/'.$value_product->product_image)}}" alt="" width="100" height="100">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="product_price" value="{{$value_product->product_price}}" class="form-control" id="exampleInputEmail1" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea type="text" name="product_desc" class="form-control"  id="exampleInputEmail1 product_desc">{{$value_product->product_desc}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                            <textarea type="text" name="product_content" class="form-control" id="exampleInputEmail1 "> {{$value_product->product_content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Danh mục</label>
                            <select name="product_category" class="form-control" id="exampleFormControlSelect1">
                                @foreach($cate_pro as $key=>$value1)
                                    @if($value_product->category_id == $value1->category_id )
                                        <option selected value="{{$value1->category_id}}">{{$value1->category_name}}</option>
                                    @else
                                        <option value="{{$value1->category_id}}">{{$value1->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thương hiệu</label>
                            <select name="product_brand" class="form-control" id="exampleFormControlSelect1">
                                @foreach($brand_pro as $key=>$value2)
                                    @if($value_product->brand_id == $value2->brand_id )
                                        <option selected value="{{$value2->brand_id}}">{{$value2->brand_name}}</option>
                                    @else
                                        <option value="{{$value2->brand_id}}">{{$value2->brand_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Hiển thị</label>
                            <select name="product_status" class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_product">Submit</button>
                    </form>
                @endforeach
            </div>



        </div>

    </div>

@endsection
