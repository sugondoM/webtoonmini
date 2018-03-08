<?php
	namespace App\Http\Controllers\Front;
	use App\Http\Controllers\Controller;
	
	class RecommendController extends Controller
	{
		public function getRecommendPage()
		{
			return view('recommend');
		}
	}