<?php

namespace App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
   
    protected $table = 'user_notifies';
    public function user(){
        return $this->belongsTo('App\Model\User\User', 'user_id');
    }
   
}
