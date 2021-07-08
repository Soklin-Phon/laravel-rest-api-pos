<?php

namespace App\Model\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
   	use SoftDeletes;
    

    protected $table = 'product';

   
    public function type() { //M:1
        return $this->belongsTo('App\Model\Product\Type', 'type_id')
        ->select('id', 'name');
    }

   
    
}
