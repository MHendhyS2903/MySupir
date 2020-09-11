<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $limit = 20;
        $gender = $faker->randomElement(['Pria', 'Wanita']);

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ 
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt('adminmaster'),
                'nohp' => $faker->randomNumber(9),
                'address' => $faker->address,
                'photo' => 0,
                'gender' => $gender,
            ]);
        }
    }
}
