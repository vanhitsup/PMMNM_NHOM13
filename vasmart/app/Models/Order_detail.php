<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
         'product_id', 'product_name','product_price','product_sales_quantity','order_code','product_coupon','product_feeship'
    ];
    protected $primaryKey = 'order_detail_id';
    protected $table = 'order_details';

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

}
