<?php

namespace App\Model\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Branch extends Model
{
   	use SoftDeletes;
    protected $table = 'branch';
  

    public function staffs() {// 1:M
        return $this->hasMany('App\Model\Branch\BranchAdmin', 'branch_id')
        ->select('id', 'branch_id', 'admin_id', 'role_id as role', 'created_at')
        ->with([
            'admin',
            // 'admin.orders',
            // 'admin.orders.details', 
            // 'admin.orders.details.product'
        ])
        ;
    }

}
