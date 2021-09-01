<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Brand;
session_start();

class BrandProductController extends Controller
{
    //
    public  function authlogin(){
        $admin_id= Session::get('admin_id');
        if ($admin_id){
            return  Redirect::to('dashboard');
        }
        else{
            return Redirect::to('login-admin')->send();
        }
    }
    public function add_brand_product(){
        $this->authlogin();

        return view('admin.add_brand_product');
    }

    public function list_brand_product(){
        $this->authlogin();
        $list_brand_product= Brand::all();
//        $list_brand_product= Brand::orderBy('brand_id','DESC')->get();//thêm trước sẽ đứng đầu
//        $list_brand_product= Brand::orderBy('brand_id','DESC')->take(5)->get();//chỉ lấy 5 sản phẩm
        return view('admin.list_brand_product')->with('list_brand_product', $list_brand_product);

    }

    public function save_brand_product(Request $requets){
        $this->authlogin();


        $data= $requets->all();
        $brand= new Brand();
        $brand->brand_name=$data['brand_product_name'];
        $brand->brand_desc=$data['brand_product_desc'];
        $brand->brand_status=$data['brand_product_status'];

        $brand->save();

        Session::put('message','Thêm thương hiệu thành công');
        return Redirect::to('add-brand-product');
    }

    public function active_brand_product($id){
        $this->authlogin();

        DB::table('brand_product')->where('brand_id',$id)->update(['brand_status'=>1]);
        Session::put('message','Đã kích hoạt thành công thương hiệu !');
        return Redirect::to('list-brand-product');
    }
    public function unactive_brand_product($id){
        $this->authlogin();

        DB::table('brand_product')->where('brand_id',$id)->update(['brand_status'=>0]);
        Session::put('message','Thương hiệu đã được ngừng kích hoạt !!!');
        return Redirect::to('list-brand-product');
    }

    public function edit_brand_product($id){
        $this->authlogin();
        $edit_brand_product=Brand::where('brand_id',$id)->get();
        return view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
    }
    public function delete_brand_product($id){
        DB::table('brand_product')->where('brand_id',$id)->delete();
        Session::put('message','Xóa tên thương hiệu thành công');
        return Redirect::to('list-brand-product');
    }

    public function update_brand_product(Request $requets ,$id){
        $this->authlogin();
        $data= $requets->all();

        $brand= Brand::find($id);
        $brand->brand_name=$data['brand_product_name'];
        $brand->brand_desc=$data['brand_product_desc'];

        $brand->save();
        Session::put('message','Cập nhật tên thương hiệu thành công');
        return Redirect::to('list-brand-product');
    }
    //end function Admin


    //
    public function show_brand($id){
        $cate_pro=DB::table('category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_pro=DB::table('brand_product')->where('brand_status','1')->orderBy('brand_id','desc')->get();

        $brand_by_id=DB::table('products')
            ->join('brand_product','products.brand_id','=','brand_product.brand_id')
            ->where('products.brand_id',$id)->get();
        $brand_name=DB::table('brand_product')->where('brand_product.brand_id',$id)->limit(1)->get();

        return view('brand/show-brand')->with('category',$cate_pro)->with('brand',$brand_pro)
            ->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
