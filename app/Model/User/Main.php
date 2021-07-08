<?php

namespace App\Model\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Main extends Authenticatable
{
    use Notifiable;
    //use SoftDeletes;
    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'google2fa_secret', 'telegram_chat_id',
    ];
    
    public function type(){
        return $this->belongsTo('App\Model\User\Type', 'type_id');
    }

    public function country(){
        return $this->belongsTo('App\Model\Setup\Country', 'country_id');
    }

    public function province(){
        return $this->belongsTo('App\Model\Setup\Province', 'province_id');
    }

    public function logs() {
        return $this->hasMany('App\Model\User\Log', 'user_id');
    }

    public function admin() {
        return $this->hasOne('App\Model\Admin\Admin', 'user_id');
    }
    public function member() {
        return $this->hasOne('App\Model\Member\Main', 'user_id');
    }

    public function codes() {
        return $this->hasMany('App\Model\User\Code', 'user_id');
    }

     public function notifies() {
        return $this->hasMany('App\Model\User\Notify', 'user_id');
    }
    public function userPermissions() {
        return $this->hasMany('App\Model\User\UserPermission\Main', 'user_id');
    }

}
