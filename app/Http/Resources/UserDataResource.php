<?php
namespace App\Http\Resources;

use App\Models\User_prize;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
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
            'email' => $this->email ?? '',
            'city'=> $this->city ?? '',
            'address' => $this->address ?? '',
            'mobile'=> $this->mobile,
            'current_points'=> $this->current,
            'prize'=>PointsResource::collection($this->prize)
             ,
            'accessToken' => $this->accessToken,
        ];
    }
}
