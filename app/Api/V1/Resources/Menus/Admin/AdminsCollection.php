<?php

namespace App\Api\V1\Resources\Admin;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Api\V1\Resources\Admin\AdminResource;

class AdminsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $partern = AdminResource::collection($this->collection);
        return  $partern;
       
    }
}
