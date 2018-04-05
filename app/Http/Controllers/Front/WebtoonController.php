<?php
	namespace App\Http\Controllers\Front;
	use App\Http\Controllers\Controller;
	
	class WebtoonController extends Controller
	{
		public function showWebtoonPage()
		{
			return view('guest.webtoon');
		}
                
                public function showDonatePage()
		{
			return view('guest.donate');
		}
                
                public function showHomePage()
		{
			return view('guest.home');
		}
                
                public function showShopPage()
		{
			return view('guest.shop');
		}
                
                public function showRecommendPage()
		{
			return view('guest.recommend');
		}
                
                public function showProfilePage()
		{
			return view('guest.profile');
		}
                
                public function showGalleryPage()
		{
			return view('guest.gallery');
		}
	}