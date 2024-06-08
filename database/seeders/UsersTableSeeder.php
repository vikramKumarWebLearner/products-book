<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
                DB::table('users')->insert([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => Hash::make('adminpassword'),
                    'role_id'      => $faker->numberBetween(1, 2)
                ]);
         }
    }
}
