
@extends('admin.blank')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"  style="margin-left: 50px">Thêm Sản Phẩm</h1>
            <a href="{{\Illuminate\Support\Facades\URL::to('list-product')}}"><button style="margin-right: 300px" type="submit" class="btn btn-outline-success" name="update_product">Quay lại trang danh sách</button>
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
                <form role="form" action="{{\Illuminate\Support\Facades\URL::to('save-product')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" name="product_name" required class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                        <input  required type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                        <input type="text" name="product_price" class="form-control" id="exampleInputEmail1"  required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                        <textarea type="text" name="product_desc" class="form-control" id="product_desc " required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                        <textarea type="text" name="product_content" class="form-control" id="exampleInputPassword1" required ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Danh mục</label>
                        <select name="product_category" class="form-control" id="exampleFormControlSelect1">
                            @foreach($cate_pro as $key=>$value1)
                                <option value="{{$value1->category_id}}">{{$value1->category_name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Thương hiệu</label>
                        <select name="product_brand" class="form-control" id="exampleFormControlSelect1">
                            @foreach($brand_pro as $key=>$value2)
                                <option value="{{$value2->brand_id}}">{{$value2->brand_name}}</option>
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
            </div>



        </div>

    </div>

@endsection
