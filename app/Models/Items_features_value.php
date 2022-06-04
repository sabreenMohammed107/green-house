<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items_features_value extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
    'item_category_features_id',
    'feature_list_id',
    ];

    public function list(){
        return $this->belongsTo('App\Models\Features_list', 'feature_list_id');
    }




}
