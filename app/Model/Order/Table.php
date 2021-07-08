<?php

namespace App\Model\Order;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{

    protected $table = 'table';
    
    public function orders() {
        return $this->hasMany('App\Model\Order\Order', 'table_id');
    }

    public function activeOrder() {
        return $this->hasOne('App\Model\Order\Order', 'table_id')
        
        ->select('id', 'receipt_number', 'table_id', 'cashier_id', 'total_price', 'discount', 'total_received', 'ordered_at', 'paid_at')
        ->with([
   
            'details:id,order_id,menu_id,unit_price,qty,discount' ,
            'details.menu:id,name,unit_price',
            'chashier'
           
        ])
        ->where('paid_at', null)
        ->orderBy('id', 'DESC')
        ;
    }
    
}
