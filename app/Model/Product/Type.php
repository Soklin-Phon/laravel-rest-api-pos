<?php

namespace App\Model\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Type extends Model
{

    protected $table = 'products_type';

   
    public function products() { //1:M
        return $this->hasMany('App\Model\Product\Product', 'type_id')
        //->select('id', 'name')
        ;

    }

   
    
}
