<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
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
    public function add_product(){
        $this->authlogin();

        $cate_pro=DB::table('category_product')->orderBy('category_id','desc')->get();
        $brand_pro=DB::table('brand_product')->orderBy('brand_id','desc')->get();

        return view('admin.add_product')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro);
    }

    public function list_product(){
        $this->authlogin();

//       $list_category_product =DB::table('category_product')->get();

//       $manager_category= view('admin.list_category_product')->with('list_category_product',$list_category_product);
        //gán $list_category_product vào 'list_category_product' ->để lấy dữ liệu ở bên trang list

//        return view('admin.list_category_product')->with('list_category_product',$manager_category);
        //gán index cho $manager_category
        $list_product= DB::table('products')
            ->join('category_product','category_product.category_id','=','products.category_id')
            ->join('brand_product','brand_product.brand_id','=','products.brand_id')
            ->orderby('products.product_id','desc')->get();

        return view('admin.list_product')->with('list_product', $list_product);

    }

    public function save_product(Request $requets){
        $this->authlogin();

        $data=array();
        $data['product_name']=$requets->product_name;
        $data['product_price']=$requets->product_price;
        $data['product_desc']=$requets->product_desc;
        $data['product_content']=$requets->product_content;
        $data['product_status']=$requets->product_status;
        $data['category_id']=$requets->product_category;
        $data['brand_id']=$requets->product_brand;
        $data['product_image']=$requets->product_image;
        $get_image=$requets->file('product_image');
        $path = '../public/uploads/products';
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $data['product_image'] = $new_image;
            DB::table('products')->insert($data);
            Session::put('message','Thêm sản phẩm thành công !');
            return Redirect::to('add-product');
        }
        $date_image['product_image']= '';
        DB::table('products')->insert($data);
        Session::put('message','Thêm sản phẩm thành công !');
        return Redirect::to('add-product');
    }

    public function active_product($id){
        $this->authlogin();

        DB::table('products')->where('product_id',$id)->update(['product_status'=>1]);
        Session::put('message','Đã kích hoạt thành công sản phẩm!');
        return Redirect::to('list-product');
    }
    public function unactive_product($id){
        $this->authlogin();

        DB::table('products')->where('product_id',$id)->update(['product_status'=>0]);
        Session::put('message','Sản phẩm đã được ngừng kích hoạt !!!');
        return Redirect::to('list-product');
    }

    public function edit_product($id){
        $this->authlogin();

        $cate_pro=DB::table('category_product')->orderBy('category_id','desc')->get();
        $brand_pro=DB::table('brand_product')->orderBy('brand_id','desc')->get();

        $edit_product= DB::table('products')->where('product_id',$id)->get();
        return view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro);
    }
    public function delete_product($id){
        $this->authlogin();

        DB::table('products')->where('product_id',$id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('list-product');
    }

    public function update_product(Request $requets ,$id)
    {
        $this->authlogin();

        $data = array();
        $data['product_name'] = $requets->product_name;
        $data['product_price'] = $requets->product_price;
        $data['product_desc'] = $requets->product_desc;
        $data['product_content'] = $requets->product_content;
        $data['product_status'] = $requets->product_status;
        $data['category_id'] = $requets->product_category;
        $data['brand_id'] = $requets->product_brand;
        $get_image = $requets->file('product_image');

        $path = '../public/uploads/products';
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $data['product_image'] = $new_image;
            DB::table('products')->where('product_id',$id)->update($data);
            Session::put('message', 'Cập Nhật sản phẩm thành công !');
            return Redirect::to('add-product');
        }
        DB::table('products')->where('product_id',$id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công !');
        return Redirect::to('list-product');

    }
    //end admin page

    //
    public function single_product($id){
        $cate_pro=DB::table('category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_pro=DB::table('brand_product')->where('brand_status','1')->orderBy('brand_id','desc')->get();

        $detail_product= DB::table('products')
            ->join('category_product','category_product.category_id','=','products.category_id')
            ->join('brand_product','brand_product.brand_id','=','products.brand_id')
            ->where('products.product_id',$id)->get();

        foreach ( $detail_product as $key =>$value){
            $category_id =$value->category_id;
        }

        $related_product= DB::table('products')
            ->join('category_product','category_product.category_id','=','products.category_id')
            ->join('brand_product','brand_product.brand_id','=','products.brand_id')
            ->where('category_product.category_id',$category_id)->whereNotIn('products.product_id',[$id])->get();
        return view('product.single-product')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro)
            ->with('detail_product',$detail_product)
            ->with('related_product',$related_product);
    }
}
