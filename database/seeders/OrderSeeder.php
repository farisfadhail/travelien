<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Date;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'date' => Date::now(),
            'ticket_amount' => 3,
            'payment_status' => 'paid',
            'snap_token' => '730a75a7-8580-49c9-818b-f9f70310b27e',
            'total_price' => 15000,
            'user_order_id' => 1,
            'spot_id' => 1,
        ]);
    }
}
