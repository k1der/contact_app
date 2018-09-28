<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run( Faker $faker )
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.fr',
            'password' => bcrypt('test'),
            'remember_token' => str_random(10),
        ]);
    }
}
