<?php

namespace Database\Seeders;

use App\Models\Spot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Spot::create([
            'spot_name' => 'Papuma',
            'ticket_price' => 5000,
            'village' => 'Sumberrejo',
            'district' => 'Patrang',
        ]);
    }
}
