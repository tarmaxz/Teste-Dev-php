<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerTemperature;


class CustomerTemperatureSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['id' => 1, 'name' => 'Fria'],
            ['id' => 2, 'name' => 'Morno'],
            ['id' => 3, 'name' => 'Quente'],
            ['id' => 4, 'name' => 'Finalizado'],
        ];

        foreach ($types as $type) {
            CustomerTemperature::updateOrCreate(['id' => $type['id']], $type);
        }
    }
}
