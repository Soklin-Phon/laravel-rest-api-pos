<?php

namespace App\Http\Resources\Activity;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Resources\Activity\ActivityResource;

class ActivitiesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $partern = ActivityResource::collection($this->collection);
        return  $partern;
       
    }
}
