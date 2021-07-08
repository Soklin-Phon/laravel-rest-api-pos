<?php

namespace App\Http\Resources\Schedule;

use Illuminate\Http\Resources\Json\Resource;

class ScheduleResource extends Resource
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
       
        return $partern;
    }
}
