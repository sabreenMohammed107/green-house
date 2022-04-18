<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'image',
    'vedio_url',
    'description',
    'category_id',
    'user_id',
    'notes',
];

public function category(){
    return $this->belongsTo('App\Models\Item_category', 'category_id');
}

public function user(){
    return $this->belongsTo('App\Models\User', 'user_id');
}
}
