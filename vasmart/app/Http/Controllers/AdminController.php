<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Customer;
use App\Models\Product;
session_start();

class AdminController extends Controller
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
    public function dashboard(){
        $order=Order::all()->where('order_id')->count();
        $order_details=Order_detail::sum('product_price');
        $customer= Customer::all()->where('customer_id')->count();
        $product=Product::all()->where('product_id')->count();


        return view('admin.index')->with('order',$order)->with('money',$order_details)->with('customer',$customer)->with('product',$product);
    }
    public function admin_dashboard(Request $request){

        $admin_email= $request->admin_email;
        $admin_password=md5($request->admin_password);
        $result=DB::table('admins')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

        if ($result){
            Session::put('admin_name',$result->admin_name);

            Session::put('admin_id',$result->admin_id);

            return Redirect::to('dashboard');
        }
        else{
            Session::put('message','Mật khẩu hoặc tài khoản bị sai, hãy nhập lại');
            return  Redirect::to('login-admin');
        }
    }

    public function logout(){
        $this->authlogin();

        Session::put('admin_name',null);

        Session::put('admin_id',null);
        return Redirect::to('login-admin');
    }
}
