<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Miguel Huerta',
        	'email' => 'guelme88@gmail.com',
        	'username' => 'mhuerta',
        	'password' => Hash::make('test12'),
        	//'api_token' => Str::random(80)
        ]);
    }
}
