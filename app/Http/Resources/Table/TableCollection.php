<?php

namespace App\Http\Resources\Table;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Resources\Table\TableResource;

class TableCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $partern = TableResource::collection($this->collection); 
        return  $partern;
       
    }
}
