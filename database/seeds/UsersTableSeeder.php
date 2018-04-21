<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->delete();

         User::create(array(
	        'first_name'     => 'Katherine Joy',
	        'last_name' => 'Laure',
	        'address'    => 'SJDM Bulacan',
	        'post_code'    => '3023',
	        'phone_number' => '12345678',
	        'email' => 'kjdlaure@gmail.com',
	        'username' => 'kjdlaure',
	        'password' => Hash::make('P@ssw0rd'),
    	));

 		User::create(array(
	        'first_name'     => 'John',
	        'last_name' => 'Smith',
	        'address'    => 'Quezon City',
	        'post_code'    => '1235',
	        'phone_number' => '12345678',
	        'email' => 'jsmith@gmail.com',
	        'username' => 'jsmith',
	        'password' => Hash::make('P@ssw0rd'),
    	));

    	User::create(array(
	        'first_name'     => 'Carla',
	        'last_name' => 'Green',
	        'address'    => 'Makati City',
	        'post_code'    => '3456',
	        'phone_number' => '756890',
	        'email' => 'cgreen@gmail.com',
	        'username' => 'cgreen',
	        'password' => Hash::make('P@ssw0rd'),
    	));

    	User::create(array(
	        'first_name'     => 'Hazel',
	        'last_name' => 'McDonald',
	        'address'    => 'Taguig City',
	        'post_code'    => '9034',
	        'phone_number' => '23435',
	        'email' => 'hmcdonald@gmail.com',
	        'username' => 'hmcdonald',
	        'password' => Hash::make('P@ssw0rd'),
    	));

    	User::create(array(
	        'first_name'     => 'Leonard',
	        'last_name' => 'Coleman',
	        'address'    => 'Caloocan City',
	        'post_code'    => '6789',
	        'phone_number' => '456712',
	        'email' => 'lcoleman@gmail.com',
	        'username' => 'lcoleman',
	        'password' => Hash::make('P@ssw0rd'),
    	));
    }
}
