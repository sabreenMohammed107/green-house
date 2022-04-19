<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemsResource extends JsonResource
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

            'order_id'=>$this->order_id,
            'item_id'=>$this->item->name ?? '',
            'quantity'=>$this->quantity ?? '',
            'points_done'=>$this->points_done ?? '',

        ];
    }
}
