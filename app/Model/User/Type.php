<?php

namespace App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
   
    protected $table = 'users_type';

    public function user(){
        return $this->belongsTo('App\Model\User\User', 'user_id');
    }
    
}
