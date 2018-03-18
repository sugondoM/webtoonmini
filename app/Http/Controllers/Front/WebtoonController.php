<?php
	namespace App\Http\Controllers\Front;
	use App\Http\Controllers\Controller;
	
	class WebtoonController extends Controller
	{
		public function getWebtoonPage()
		{
			return view('webtoon');
		}
	}