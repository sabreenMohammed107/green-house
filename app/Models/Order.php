<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_date',
        'status_id',
        'user_id',
        'notes',
    ];


    public function status(){
        return $this->belongsTo('App\Models\Order_status', 'status_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }


    public function items(){
        return $this->hasMany('App\Models\Order_item', 'order_id','id');
    }
}
