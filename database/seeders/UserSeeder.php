<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();

        $faker = Factory::create();
        $password = Hash::make('admin');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => $password,
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
