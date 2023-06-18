<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Spot extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'spot_name',
        'ticket_price',
        'description',
        'slug',
        'village',
        'district',
        'link_maps'
    ];

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
