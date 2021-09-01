@extends('admin.blank')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"  style="margin-left: 50px">Thêm Mã Giảm Giá</h1>
            <a href="{{\Illuminate\Support\Facades\URL::to('list-coupon')}}">
                <button style="margin-right: 300px" type="submit" class="btn btn-outline-success" name="update_category_product">Danh sách mã giảm giá</button>
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
                <form action="{{\Illuminate\Support\Facades\URL::to('insert-coupon-code')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên mã</label>
                        <input type="text" required name="coupon_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên mã giảm giá ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã Code</label>
                        <input type="text" required name="coupon_code" class="form-control" id="exampleInputEmail1" placeholder="Nhập mã Code">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số lượng mã</label>
                        <input type="text" required name="coupon_times" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tính năng mã</label>
                        <select name="coupon_condition" class="form-control" id="exampleFormControlSelect1">
                            <option value="0">--- Chọn ---</option>
                            <option value="1">Giảm theo %</option>
                            <option value="2">Giảm theo giá tiền</option>
                        </select>
                    </div>
                   <div class="form-group">
                        <label for="exampleInputEmail1">Nhập số % giảm hoặc số tiền giảm</label>
                        <input type="text" required name="coupon_number" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary" name="add_coupon">Thêm mã</button>
                </form>
            </div>



        </div>

    </div>
@endsection
