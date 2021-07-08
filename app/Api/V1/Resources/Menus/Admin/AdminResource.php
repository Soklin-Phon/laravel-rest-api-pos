<?php

namespace App\Api\V1\Resources\Admin;

use Illuminate\Http\Resources\Json\Resource;

use App\Http\Resources\ActivityImage\ActivityImageResource;

use App\Api\V1\Resources\User\UserResource;

class AdminResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $partern = parent::toArray($request);
        // $img = json_decode($this->user->avatar,true);
        // $partern['user']['avatar'] = asset($img['xs']);
         $partern['avatar'] = asset($this->user->avatar);
         $partern['user']   =  new UserResource($this->user);
        return $partern;
    }
}
