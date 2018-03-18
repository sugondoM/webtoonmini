<?php
	namespace App\Http\Controllers\Front;
	use App\Http\Controllers\Controller;
	
	class GalleryController extends Controller
	{
		public function getGalleryPage()
		{
			return view('gallery');
		}
	}