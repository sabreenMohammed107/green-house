<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'city_id',
        'address',
        'mobile',
        'type',
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get:fn($value) => ["user", "admin", "manager"][$value],
        );
    }

    protected $appends = [
        'current',
    ];

    public function getCurrentAttribute()
    {
        $orders = Order::where('user_id', $this->id)->where('status_id', 3)->get();
        $postivePoints = 0;
        foreach ($orders as $order) {
            $postivePoints += Order_item::where('order_id', $order->id)->sum(\DB::raw('quantity*points_done'));
        }
        $negative = User_prize::where('user_id', $this->id)->sum('confirm_points');

        return $postivePoints - $negative; // Calculates the tax value every time that I call "$item->tax" based on total value of each item.
    }
}
