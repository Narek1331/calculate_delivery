<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Point;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Point::insert([
            [
            'lat' => 55.751244,
            'lng' => 37.618423,
            'name' => 'Moscow',
            ],
            [
            'lat' => 50.61074,
            'lng' => 36.58015,
            'name' => 'Belgorod',
            ],
            [
            'lat' => 53.241505,
            'lng' => 50.221245,
            'name' => 'Samara',
            ],
            [
            'lat' => 59.937500,
            'lng' => 30.308611,
            'name' => 'St Petersburg',
            ],
            [
            'lat' => 43.03667,
            'lng' => 44.66778,
            'name' => 'Vladikavkaz',
            ],
        ]);

    }
}
