<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeship;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Shipping;
use App\Models\Customer;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;

class OrderController extends Controller
{
    //


    public function manage_order(){

        $getorder = Order::orderby('order_id','DESC')->get();
        return view('admin.manage_order')->with(compact('getorder'));
    }

    public function view_order($order_code){
        $order_details = Order_detail::where('order_code',$order_code)->get();
        $getorder = Order::where('order_code',$order_code)->get();
        foreach($getorder as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        $order_details_product = Order_detail::with('product')->where('order_code', $order_code)->get();

        foreach($order_details_product as $key => $order_d){

            $product_coupon = $order_d->product_coupon;
        }
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }

        return view('admin.view_order')->with(compact('customer','order_details','shipping','order_details_product','coupon_condition','coupon_number','order_status','getorder'));

    }

    public function print_order($checkout_code){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));

        return $pdf->stream();
    }

    public function print_order_convert($checkout_code){
        $order_details = Order_detail::where('order_code',$checkout_code)->get();
        $order = Order::where('order_code',$checkout_code)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();

        $order_details_product = Order_detail::with('product')->where('order_code', $checkout_code)->get();

    foreach($order_details_product as $key => $order_d){

            $product_coupon = $order_d->product_coupon;
        }
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();

            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;

            if($coupon_condition==1){
                $coupon_echo = $coupon_number.'%';
            }elseif($coupon_condition==2){
                $coupon_echo = $coupon_number;
            }
        }else{
            $coupon_condition = 2;
            $coupon_echo = 0;


        }




        $output = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
           <div style="font-family: DejaVu Sans;">
           <p align="right" style="margin-top: -20px">Cộng Hòa Xã Hội Chủ Nghĩa Việt Nam</p>
           <p style="margin:-18px 0 0 440px ">Độc Lập - Tự Do - Hạnh Phúc</p>
           <p style="font-weight: bold; margin-top: -50px">C.TY TNHH VA-SMART</p>
           <p align="center" style="margin:10px 0 40px 0 ;font-weight: bold ">PHIẾU ĐƠN HÀNG</p>
                                       <p align="center" style="margin: -40px 0 20px 0">-------oOo-------</p>
               <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-lg-12">

                   </div>
               </div>
                   <p style="font-style: italic; font-size: 13px; margin-top: 30px">Thông tin người nhận hàng</p>
                  <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-lg-12">
                       <table class="table table-bordered" style="width: 100% ;font-size: 13px" >
                           <thead>
                               <tr>
                                  <th width="30%" height="3%">Người nhận</th>
                                  <th>Địa chỉ</th>
                                  <th>Số điện thoại</th>
                                  <th>Email</th>
                                  <th>Ghi chú</th>
                               </tr>
                           </thead>
                           <tbody>';
                     $output.= '
                               <tr>

                                   <td>'.$shipping->shipping_name.'</td>
		                          <td>'.$shipping->shipping_address.'</td>
		                          <td>'.$shipping->shipping_phone.'</td>
		                          <td>'.$shipping->shipping_email.'</td>
		                          <td>'.$shipping->shipping_note.'</td>

                               </tr>';
                        $output.= '
                          </tbody>
                       </table>
                   </div>
               </div>
               <hr>
           <p style="font-style: italic; font-size: 13px; margin-top: 30px">Chi tiết đơn hàng</p>
                  <div class="row">
                   <div class="col-md-2"></div>
                   <div class="col-lg-12">
                       <table class="table table-bordered" style="width: 100% ;font-size: 13px" >
                           <thead>
                               <tr>
                                  <th>STT</th>
                                  <th>Tên sản phẩm</th>
                                  <th width="10%">Số lượng</th>
                                  <th>Giá bán</th>
                                  <th>Tổng</th>
                               </tr>
                           </thead>
                           <tbody>';
                        $i=0;
                      $i++;

//
        foreach ($order_details_product as $key=>$detail)
            $output.= '

                                <tr>
                                   <td>'.$i++.'</td>
		                            <td>'.$detail->product_name.'</td>
                                     <td>'.$detail->product_sales_quantity.'</td>
                                     <td>'.number_format($detail->product_price).' đ</td>
                                     <td>'.number_format($detail->product_price*$detail->product_sales_quantity).' đ</td>
                               </tr>';
        $subtotals = 0;
        $subtotal = $detail->product_price*$detail->product_sales_quantity;
        $subtotals+=$subtotal;
        if($detail->product_coupon!='no'){
            $product_coupon = $detail->product_coupon;
        }else{
            $product_coupon = 'không mã';
        }
        $output.= '
                                <tr>
                                       <td colspan="2">
                                          <span style="font-weight: bold">Mã giảm giá:</span>
                                          '.$product_coupon.'
                                        </td>
                                        <td colspan="2">
                                         <span style="font-weight: bold"> Số tiền được giảm: </span>
                                         '.number_format($coupon_echo).' đ
                                        </td>
                                        <td >
                                        <span style="font-weight: bold"> Phí Ship:</span>
                                         '.number_format($detail->product_feeship).' đ
                                        </td>
                                </tr>';
                              $output.='
                                <tr>
                            <td colspan="5" align="center">
                                <span style="font-weight: bold;">
                                Tổng giá trị đơn hàng phải thanh toán:
                            </span>
                              <span style="color: red; font-weight: bold; ">
                                  95,985,000 đ
                              </span>
                           </td>
                                </tr>';
                             $output.='

                          </tbody>
                            <div class="admin" style="margin-left: 400px; margin-top:50px" >
                                 <p style="margin-bottom: 50px; font-weight: bold">Người lập phiếu</p>
                                  <p style="font-style: italic">Phạm Trần Việt Anh</p>
                             </div>
                             <div class="user" style="float: left; margin-left: 30px; margin-top: 50px">
                             <p  style="margin-bottom: 60px; font-weight: bold">Người mua hàng</p>
                             <p style="font-style: italic">'.$shipping->shipping_name.'</p>
                            </div>


                       </table>
                   </div>
               </div>
           </div>';

        return $output;

    }
}
