<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            "id"=>$this->id,
            "month"=>MonthResource::make($this->month),
            'transaction_details'=>TransactionDetailsResource::collection($this->transaction_details),
            'user_account'=>$this->user->bank_account ?? '',
        ];

    }
}
