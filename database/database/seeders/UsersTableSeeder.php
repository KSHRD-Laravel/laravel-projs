<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Factory::create();

        // $users = [];
        // for($i = 0; $i < 50; $i++) {
        //     $user = [
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'password' => $faker->password()
        //     ];
        //     array_push($users, $user);
        // }

        User::factory()->count(10)->create();
    }
}
