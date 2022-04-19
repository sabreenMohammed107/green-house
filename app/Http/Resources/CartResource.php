<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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

            'order_date' => $this->order_date ?? '',
            'status_id' => $this->status->status ?? '',
            'user_id' => $this->user->name ?? '',
            'notes' => $this->notes ?? '',
            'items'=>OrderItemsResource::collection($this->items),


        ];
    }
}
