<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'ticket_amount',
        'payment_status',
        'snap_token',
        'total_price',
        'transaction_time',
        'uid',
        'payment_type',
        'bank',
        'user_order_id',
        'spot_id'
    ];

    public function UserOrder()
    {
        return $this->belongsTo(UserOrder::class);
    }

    public function Spot()
    {
        return $this->belongsTo(Spot::class);
    }
}
