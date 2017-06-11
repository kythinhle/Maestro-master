<?php

use Illuminate\Database\Seeder;

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
        	[
	        	'name' => str_random(10),
	            'email' => 'boconganh@gmail.com',
	            'password' => bcrypt('site@123'),
	            'level' => 1,
        	],
        	[
	        	'name' => str_random(10),
	            'email' => 'kythinhle@gmail.com',
	            'password' => bcrypt('site@123'),
	            'level' => 1,
        	]
        ]);
    }
}
