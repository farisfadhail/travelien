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
            'payment_status' => 'PAID',
            'snap_token' => 'akjsdbakwjdbaksjdbawhdb',
            'total_price' => 15000,
            'user_order_id' => 1,
            'spot_id' => 1,
        ]);
    }
}
