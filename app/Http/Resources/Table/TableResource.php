<?php

namespace App\Http\Resources\Table;

use Illuminate\Http\Resources\Json\Resource;

class TableResource extends Resource
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
        $partern['table'] = TableResource::collection($this->table);
        return $partern;
    }
}
