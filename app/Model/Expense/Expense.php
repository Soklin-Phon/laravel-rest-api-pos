<?php

namespace App\Model\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Expense extends Model
{
   	use SoftDeletes;
    

    protected $table = 'expense';

   
    public function accountant() { //M:1
        return $this->belongsTo('App\Model\User\Main', 'user_id');
    }

    public function type() {  //M:1
        return $this->belongsTo('App\Model\Expense\Type', 'type_id')
        ->select('id', 'name');
    }

}
