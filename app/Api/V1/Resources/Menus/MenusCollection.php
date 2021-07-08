<?php

namespace App\Api\V1\Resources\Menus;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Api\V1\Resources\Menus\MenusResource;

class MenusCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $partern = MenusResource::collection($this->collection);
        
        return  $partern;
       
    }
}
