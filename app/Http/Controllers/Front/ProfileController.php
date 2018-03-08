<?php
	namespace App\Http\Controllers\Front;
	use App\Http\Controllers\Controller;
	
	class ProfileController extends Controller
	{
		public function getProfilePage()
		{
			return view('profile');
		}
		
	}