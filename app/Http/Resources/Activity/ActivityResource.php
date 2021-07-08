<?php

namespace App\Http\Resources\Activity;

use Illuminate\Http\Resources\Json\Resource;

use App\Http\Resources\ActivityImage\ActivityImageResource;

class ActivityResource extends Resource
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
        $img = json_decode($this->img,true);
        $partern['img'] = asset($img['xs']);
        $partern['postimage'] = ActivityImageResource::collection($this->postimage);
        return $partern;
    }
}
