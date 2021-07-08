<?php

namespace App\Model\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{

    protected $table = 'expenses_type';
    
    public function expenses() {
        return $this->hasMany('App\Model\Expense\Expense', 'type_id');
    }
    
}
