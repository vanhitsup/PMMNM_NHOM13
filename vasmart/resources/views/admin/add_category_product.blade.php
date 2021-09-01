@extends('admin.blank')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"  style="margin-left: 50px">Thêm Danh Mục Sản Phẩm</h1>
            <a href="{{\Illuminate\Support\Facades\URL::to('list-category-product')}}"><button style="margin-right: 300px" type="submit" class="btn btn-outline-success" name="update_category_product">Quay lại trang danh sách</button>
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
                <form action="{{\Illuminate\Support\Facades\URL::to('save-category-product')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" required name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                        <textarea required class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Hiển thị</label>
                        <select name="category_product_status" class="form-control" id="exampleFormControlSelect1">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_category_product">Submit</button>
                </form>
            </div>



        </div>

    </div>
@endsection
