<?php
	namespace App\Http\Controllers\Front;
	use App\Http\Controllers\Controller;
	
	class DonateController extends Controller
	{
		public function getDonatePage()
		{
			return view('donate');
		}
	}