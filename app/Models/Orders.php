<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'invoice_no', 'invoice_prefix', 'store_id', 'store_name', 'store_url', 'firstname', 'lastname', 'email', 'telephone', 'fax', 'payment_firstname', 'payment_lastname', 'payment_company', 'payment_address_1', 'payment_address_2', 'payment_city', 'payment_postcode', 'payment_country', 'payment_country_id', 'payment_zone', 'payment_zone_id', 'payment_address_format', 'payment_custom_field', 'payment_method', 'payment_code', 'shipping_firstname', 'shipping_lastname', 'shipping_company', 'shipping_address_1', 'shipping_address_2', 'shipping_city', 'shipping_postcode', 'shipping_country', 'shipping_country_id', 'shipping_zone', 'shipping_zone_id', 'shipping_address_format', 'shipping_custom_field', 'shipping_method', 'shipping_code', 'comment', 'total', 'order_status_id', 'created_at', 'updated_at'
    ];


        public function products(){
           return $this->belongsToMany('App\Models\products','orders_products','order_id','product_id')->withPivot('quantity');
        }
}
