<?php

namespace Database\Seeders;

use App\Models\UserOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserOrder::create([
            'user_id' => 1,
            'name' => 'udin',
            'identity_number' => 11217312,
            'phone' => 875765234
        ]);
    }
}
