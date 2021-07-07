<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'last_name' => 'admin',
            "dni" => '123',
            "address" => 'av siempre viva 123',
            "phone" => '123',
            "email" => 'admin@email.co',
            "password" => '$2y$10$fxu9lD6j5HUduGmRjn/Pp.ZOXZS/8OlvzLnQ8UWnOKrPnBkWX9re2'
        ]);
    }
}
