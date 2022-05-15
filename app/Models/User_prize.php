<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_prize extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
    'prize_id',
    'confirm_date',
    'confirm_points',
    'notes',
    ];

    public function prize(){
        return $this->belongsTo('App\Models\Prizes_point', 'prize_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
