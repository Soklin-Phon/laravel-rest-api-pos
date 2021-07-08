<?php

namespace App\Model\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
   	use SoftDeletes;

    protected $table = 'order';

   
    public function cashier() {
        return $this->belongsTo('App\Model\User\Main', 'cashier_id')
        ->select('id', 'name');
    }


    public function details() {
        return $this->hasMany('App\Model\Order\Detail', 'order_id')
        ->select('id', 'order_id', 'qty', 'product_id', 'unit_price')
        ->with([
            'product:id,name,image'
        ])
        ;
    }
    
}
