<?php

namespace App\Http\Resources\PlantHistory;

use Illuminate\Http\Resources\Json\Resource;

class PlantHistoryResource extends Resource
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
        return $partern;
    }
}
