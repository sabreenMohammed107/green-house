<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PointsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [

            'name' => $this->name ?? '',
            'image' => $this->image ? asset('uploads/points/' . $this->image) : asset('adminassets/dist/img/avatar.png') ,
            'description' => $this->description ?? '',
            'points' => $this->points ?? '',
            'order' => $this->order ?? '',
            'notes' => $this->notes ?? '',
            'active' => $this->active ?? '',


        ];
    }
}
