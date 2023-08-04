<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    protected function products(){
        return $this->hasMany('App\Models\Product', 'orders_products', 'order_id', 'product_id');
    }
}
