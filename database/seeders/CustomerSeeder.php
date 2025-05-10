<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');

        foreach (range(1, 50) as $i) {
            Customer::create([
                'name_full'     => $faker->name,
                'cpf'           => $faker->cpf(false),
                'email'         => $faker->unique()->safeEmail,
                'phone'         => $faker->phoneNumber,
                'zip_code'      => $faker->postcode,
                'street'        => $faker->streetName,
                'neighborhood'  => $faker->streetSuffix,
                'number'        => $faker->buildingNumber,
                'city'          => $faker->city,
                'state'         => $faker->stateAbbr
            ]);
        }
    }
}
