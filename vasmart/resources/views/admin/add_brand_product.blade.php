
@extends('admin.blank')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"  style="margin-left: 50px">Thêm Thương Hiệu Sản Phẩm</h1>
            <a href="{{\Illuminate\Support\Facades\URL::to('list-brand-product')}}"><button style="margin-right: 300px" type="submit" class="btn btn-outline-success" name="update_category_product">Quay lại trang danh sách</button>
            </a>
        </div>

        <!-- Content Row -->

        <div class="row" style="margin-left: 50px">

            <div class="col-xl-10 col-lg-7">

<!--                --><?php
                $message= session()->get('message');
                if($message){
                    echo '<p style="color:#78b43d ; font-weight: bold">' .$message.'</p>';
                    session()->put('message',null);
                }
//                ?>
                <form action="{{\Illuminate\Support\Facades\URL::to('save-brand-product')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thương hiệu</label>
                        <input type="text" name="brand_product_name" class="form-control" required id="exampleInputEmail1" placeholder="Nhập tên thương hiệu sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                        <textarea  class="form-control" required name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Hiển thị</label>
                        <select name="brand_product_status" class="form-control" id="exampleFormControlSelect1">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_brand_product">Submit</button>
                </form>
            </div>



        </div>

    </div>
@endsection
