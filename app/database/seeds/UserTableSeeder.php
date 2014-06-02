<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
				'firstname' => 'Administrator',
				'lastname' => 'Lara Blog',
				'email' => 'admin@mail.com',
				'password' => Hash::make('admin')
			));

		
	}
}