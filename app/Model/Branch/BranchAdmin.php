<?php

namespace App\Model\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BranchAdmin extends Model
{
   	use SoftDeletes;
    protected $table = 'branch_admin';
  

    public function branch() { // M:1
        return $this->belongsTo('App\Model\Branch\Branch', 'branch_id');
    }

    public function admin() { // M:1
        return $this->belongsTo('App\Model\Admin\Admin', 'admin_id')
        ->select('id', 'user_id', 'is_supper')
        ->with([
            'user:id,name,phone'
        ])
        ;
    }

}
