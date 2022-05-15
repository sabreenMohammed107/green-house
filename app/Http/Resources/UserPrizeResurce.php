<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPrizeResurce extends JsonResource
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
            'user_id' => $this->user,
            'prize_id' => $this->prize,
            'confirm_date' => $this->confirm_date ?? '',
            'confirm_points' => $this->confirm_points ?? '',
            'notes' => $this->notes ?? '',

        ];



//         $categories = Category::whereNull('parent_id')->get()->toArray();

// $merged = array_merge($categories, [
//            [
//              'id' => 9999,
//              'name' => 'How Offers',
//              'image' => 'http://businessdotkom.com/storage/categories/January2020/1o6nDi1kjVuwje5FiFXv.png',
//              'products' => ProductIndexResource::collection(Product::whereNotNull('sale_price')->get()),
//            ]
// ]);

// return CategoryProductsResource::collection(collect($merged));
    }
}
