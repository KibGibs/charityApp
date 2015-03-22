<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		User::create(array('password'=>Hash::make('admin'),'first_name' =>'admin','last_name'=>'admin','user_type' => 'admin'));

	}

}
