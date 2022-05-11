<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    'image',
    'description',
    ];
}
