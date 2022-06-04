<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_category_feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_category_id',
        'name',
    ];
}
