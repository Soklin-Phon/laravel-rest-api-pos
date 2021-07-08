<?php

namespace App\Http\Resources\ActivityImage;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Resources\ActivityImage\ActivityImageResource;

class ActivityImageCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $partern = ActivityImageResource::collection($this->collection);
        return  $partern;
        
    }
}
