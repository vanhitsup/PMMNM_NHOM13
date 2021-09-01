
@extends('admin.blank')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"  style="margin-left: 50px">Phí Vận Chuyển</h1>
{{--            <a href="{{\Illuminate\Support\Facades\URL::to('list-brand-product')}}"><button style="margin-right: 300px" type="submit" class="btn btn-outline-success" name="update_category_product">Quay lại trang danh sách</button>--}}
{{--            </a>--}}
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
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tỉnh thành phố</label>
                        <select name="city" class="form-control choose city" id="city" >
                            <option value="">--- Chọn tỉnh thành phố ---</option>
                            @foreach($city as $key => $value_city)
                                <option value="{{$value_city->matp}}">{{$value_city->name_city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Quận, huyện</label>
                        <select name="province" class="form-control choose province" id="province">
                            <option value="">--- Chọn quận, huyện ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Xã, phường, thị trấn</label>
                        <select name="wards" class="form-control wards" id="wards">
                            <option value="">--- Chọn xã, phường, thị trấn ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Phí vận chuyển</label>
                        <input type="text" name="fee_ship" class="form-control fee_ship" required id="exampleInputEmail1">

                    </div>
                    <button type="button" class="btn btn-primary add_delivery" name="add_delivery">Thêm phí vận chuyển</button>
                </form>
            </div>


        </div>
        <div id="load_delivery" style="margin: 20px 0 0 40px" class="col-xl-10 col-lg-7">

        </div>

    </div>
@endsection
