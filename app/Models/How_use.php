<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class How_use extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
    'title',
    'sub_title',
    'use_date',
    'text',
    ];
}
