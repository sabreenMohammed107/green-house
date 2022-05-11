<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'feedback_date',
        'image',
        'name',
        'position',
        'feedback',
        'order',
        'active',
    ];
}
