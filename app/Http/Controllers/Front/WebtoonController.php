<?php
    namespace App\Http\Controllers\Front;
    use App\Http\Controllers\Controller;
    use App\model\User;
    use App\model\Series;
    use App\model\Episode;
    use App\model\Page;
	
	class WebtoonController extends Controller
	{
		public function showWebtoonPage()
		{
                    $series = Series::where('deleted', 0)
                        ->orderBy('series_title', 'asc')
                        ->get();
                    
                    return view('guest.webtoon', compact('series'));
		}
                
                public function showWebtoonSeriesPage($series)
		{
                    $episodes = Episode::where('series_id', $series)
                        ->orderBy('episode_title', 'asc')
                        ->get();

                    $series = Series::where('id', $series)
                        ->orderBy('series_title', 'asc')
                        ->first();
                    
                    return view('guest.series', compact('series','episodes'));
		}
                
                public function showWebtoonEpisodePage($episode)
		{
                    $episodes = Episode::where('id', $episode)
                        ->first();

                    $pages = Page::where('episode_id', $episode)
                        ->orderBy('page_number', 'asc')
                        ->get();
                    
                    return view('guest.episodes', compact('episodes','pages'));
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