<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $fillable = [
        'spot_name',
        'ticket_price',
        'village',
        'district'
    ];

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
