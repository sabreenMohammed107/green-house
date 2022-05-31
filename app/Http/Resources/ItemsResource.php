<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemsResource extends JsonResource
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

            'id' => $this->id ?? '',
            'name' => $this->name ?? '',
            'image' =>  $this->image ? asset('uploads/items/' . $this->image) : asset('adminassets/dist/img/avatar.png') ,
            'vedio_url' => $this->vedio_url ?? '',
            'description' => $this->description ?? '',
            'category_id' => $this->category->name ?? '',
            'user_id' => $this->user->name ?? '',
            'notes' => $this->notes ?? '',
        ];
    }
}
