<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProductController extends Controller
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

    public function add_category_product(){
        $this->authlogin();

        return view('admin.add_category_product');
    }

    public function list_category_product(){
        $this->authlogin();

        $list_category_product= DB::table('category_product')->get();
        return view('admin.list_category_product')->with('list_category_product', $list_category_product);
    }

    public function save_category_product(Request $request){
        $this->authlogin();

        $data=array();
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;
        $data['category_status']=$request->category_product_status;

        DB::table('category_product')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return Redirect::to('add-category-product');
    }

    public function unactive_category_product($id){
        $this->authlogin();

        DB::table('category_product')->where('category_id',$id)->update(['category_status'=>0]);
        Session::put('message','Danh mục đã được ngừng kích hoạt !!!');
        return Redirect::to('list-category-product');
    }
    public function active_category_product($id){
        $this->authlogin();

        DB::table('category_product')->where('category_id',$id)->update(['category_status'=>1]);
        Session::put('message','Đã kích hoạt thành công danh mục !');
        return Redirect::to('list-category-product');
    }

    public function edit_category_product($id){
        $this->authlogin();

        $edit_category_product= DB::table('category_product')->where('category_id',$id)->get();
        return view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
    }
    public function delete_category_product($id){
        $this->authlogin();

        DB::table('category_product')->where('category_id',$id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('list-category-product');
    }

    public function update_category_product(Request $requets ,$id){
        $this->authlogin();

        $data=array();
        $data['category_name']=$requets->category_product_name;
        $data['category_desc']=$requets->category_product_desc;

        DB::table('category_product')->where('category_id',$id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('list-category-product');
    }
    //end admin

    //start user
    public function show_category($id){
        $cate_pro=DB::table('category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_pro=DB::table('brand_product')->where('brand_status','1')->orderBy('brand_id','desc')->get();

        $category_by_id=DB::table('products')
            ->join('category_product','products.category_id','=','category_product.category_id')
            ->where('products.category_id',$id)->get();

        $category_name=DB::table('category_product')->where('category_product.category_id',$id)->limit(1)->get();
        return view('category.show-category')->with('category',$cate_pro)->with('brand',$brand_pro)
            ->with('category_by_id',$category_by_id)
            ->with('category_name',$category_name);
    }
}
