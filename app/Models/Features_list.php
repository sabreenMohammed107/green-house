<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_category_features_id',
        'name',
        'rank',
    ];

    public function feature(){
        return $this->belongsTo('App\Models\Item_category_feature', 'item_category_features_id');
    }
    public function vals(){
        return $this->hasMany('App\Models\Items_features_value', 'feature_list_id','id');
    }
}
