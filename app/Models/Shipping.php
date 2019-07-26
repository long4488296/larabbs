<?php

namespace App\Models;

/*** 
 * 
 * 快递表
 * Shipping
*/
class Shipping extends Model
{
    protected $table = 'shipping';
    protected $primaryKey = 'shipping_id';
    protected $fillable = [
       'shipping_id','shipping_code','shipping_name','shipping_desc','insure','support_cod','enabled','shipping_print','print_bg','config_lable','print_model','shipping_order','shipping100_code'
    ];
}
