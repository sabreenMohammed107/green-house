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


protected $appends = [
    'rank',
];

public function getRankAttribute()
{
    $values = Items_features_value::where('item_id', $this->id)->get();
    $ranks = 0;
    foreach ($values as $val) {
        $ranks += Features_list::where('id', $val->feature_list_id)->sum(\DB::raw('rank'));
    }

    return $ranks; // Calculates the tax value every time that I call "$item->tax" based on total value of each item.
}


}
