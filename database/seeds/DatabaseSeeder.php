<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

    	foreach (range(1,500) as $index) {
            DB::table('users')->insert([
                'name' => $faker->firstname,
                'last_name' => $faker->lastname,
                'dni' => $faker->numberBetween(100000, 2999999),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),                
                'email' => $faker->email,
                //'password' => '$2y$10$BtFPCo75GIAMku2R57cxpechqxl9RlvXSEoTAK8lSCwfYDMX8k.QC'
            ]);
        }
        //$this->call(UserSeeder::class);
    }
}
