<?php
	namespace App\Http\Controllers\Front;
	use App\Http\Controllers\Controller;
	
	class ShopController extends Controller
	{
		public function getShopPage()
		{
			return view('shop');
		}
	}