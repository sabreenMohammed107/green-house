<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'item_id',
        'quantity',
        'points_done',
    ];
    public function order(){
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    public function item(){
        return $this->belongsTo('App\Models\Item', 'item_id');
    }

}
