<?php

use App\model\Category;
use App\model\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{

	public function run()
	{
		 // $this->call(UsersTableSeeder::class);
	        DB::table('USER')->delete();
	        Model::unguard();
		    User::create(array(
		        'username'        => 'admin',
		        'nickname'        => '',
                'avatar_url'      => 'images/admin.jpg',
		        'email'           => 'admin@webtoonmini.com',
		        'deleted'         => 0,
		        'about'           => '',
		        'password'        => 'admin',
		        'facebook_url'    => '',
		        'twitter_url'     => '',
		        'ig_url'          => '',
		        'google_url'      => ''
		      
		    ));
		    Model::reguard();
		    
		    $categories = [
		        ['category_name' => 'comedy'],
		        ['category_name' => 'fantasy'],
		        ['category_name' => 'romance'],
		        ['category_name' => 'slice of life'],
		        ['category_name' => 'sci-fi'],
		        ['category_name' => 'drama'],
		        ['category_name' => 'action'],
		        ['category_name' => 'superhero'],
		        ['category_name' => 'heartwarming'],
		        ['category_name' => 'thriller'],
		        ['category_name' => 'horror'],
		        ['category_name' => 'post apocalyptic'],
		        ['category_name' => 'zombies'],
		        ['category_name' => 'school'],
		        ['category_name' => 'supernatural'],
		        ['category_name' => 'animals'],
		        ['category_name' => 'crime/mystery'],
		        ['category_name' => 'historical'],
		        ['category_name' => 'informative'],
		        ['category_name' => 'sports'],
		        ['category_name' => 'inspirational'],
		        ['category_name' => 'all ages']	        
		    ];
		    DB::table('CATEGORY')->delete();
		    foreach($categories as $category){
		        Category::create($category);
		    }
		   
	}

}