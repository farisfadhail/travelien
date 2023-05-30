<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'identity_number',
        'phone'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
