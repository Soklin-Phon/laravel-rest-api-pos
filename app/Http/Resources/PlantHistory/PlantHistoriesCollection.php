<?php

namespace App\Http\Resources\PlantHistory;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Resources\PlantHistory\PlantHistoryResource;

class PlantHistoriesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $partern = PlantHistoryResource::collection($this->collection);
        return  $partern;
        
    }
}
