<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{	
	use SoftDeletes;
    protected $table = 'admin';

   
    public function user(){
        return $this->belongsTo('App\Model\User\Main', 'user_id');
    }

    public function branches(){
        return $this->hasMany('App\Model\Branch\BranchAdmin', 'admin_id');
    }

    public function orders(){// 1:M
        return $this->hasMany('App\Model\Order\Order', 'cashier_id');
    }
   

}
