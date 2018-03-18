<?php

use App\model\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

	public function run()
	{
		 // $this->call(UsersTableSeeder::class);
	        DB::table('USER')->delete();
		    User::create(array(
		        'username' => 'admin',
                        'avatar_url' => '',
		        'email'    => 'admin@webtoonmini.com',
		        'type'	   => 1,
                        'deleted'  => 0,
		        'password' => 'admin'
		    ));
	}

}