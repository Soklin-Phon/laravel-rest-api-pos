<?php

namespace App\Api\V1\Resources\Menus;

use Illuminate\Http\Resources\Json\Resource;

use App\Http\Resources\ActivityImage\ActivityImageResource;

class MenusResource extends Resource
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
        $img = json_decode($this->image,true);
        $partern['image'] = asset($img['xs']);
        $partern['image'] = asset($this->image);
        $partern['image'] = env('FILE_BASE_URL').$this->image;
        return $partern;
    }
}
