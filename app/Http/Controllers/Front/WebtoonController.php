<?php
    namespace App\Http\Controllers\Front;
    use App\Http\Controllers\Controller;
    use App\model\User;
    use App\model\Series;
    use App\model\Episode;
    use App\model\Page;
    use App\model\Gallery;
use App\model\Banner;
use App\preference\AdminPreference;
use App\model\Ads;
                	
	class WebtoonController extends Controller
	{
		public function showWebtoonPage($paging=1)
		{
		    
		    $number = $paging - 1;
            $offset = $number * 10;
            $series = Series::where('deleted', 0)
                ->orderBy('id', 'asc')
                ->offset($offset)
                ->limit(10)
                ->get();
            
            $totalSeries = Series::where('deleted', 0)->count();
            $totalPaging = $totalSeries / 10;
            if($number > $totalPaging) {
                abort(404);
            }
           $page = $this->getPagination($paging, $totalPaging, 10, 5);
           //dd($page); 
           return view('guest.webtoon', compact('series', 'page'));
		}
		
		
                
		public function showWebtoonSeriesPage($seriesA, $paging=1)
		{
		    $number = $paging - 1;
		    $offset = $number * 10; 
		    
            $seriesA = $this->myDecodeURL($seriesA);
		    $series = Series::with('category')->where('series_title', $seriesA)
    		    ->orderBy('id', 'asc')
    		    ->first();
		    
            $episodes = Episode::where('series_id', $series->id)
                ->orderBy('episode_number', 'asc')
                ->offset($offset)
                ->limit(10)
                ->get();
            
            $totalEpisodes = Episode::where('series_id', $series->id)
                ->count();
            
            $totalPaging = $totalEpisodes / 10;
            if($number > $totalPaging) {
                abort(404);
            }
            
            $page = $this->getPagination($paging, $totalPaging, 10, 5);
            return view('guest.series', compact('series','episodes','page'));
		}
                
        public function showWebtoonEpisodePage($seriesName, $episodeNumber)
		{
		    $seriesName = $this->myDecodeURL($seriesName);
		    $series = Series::where('series_title', $seriesName)
    		    ->orderBy('id', 'asc')
    		    ->first();
		    
            $episodes = Episode::where('series_id',$series->id)
                ->where('episode_number', $episodeNumber)
                ->first();
            
            $allEpisodes = Episode::where('series_id',$series->id)->get(['episode_number','thumbnail_url']);

            $pages = Page::where('episode_id', $episodes->id)
                ->orderBy('page_number', 'asc')
                ->get();
            $ads = Ads::where('ads_page',AdminPreference::$stringWebCominPage)->inRandomOrder()->take(4)->get();
            return view('guest.episodes', compact('episodes','pages','series','ads','allEpisodes'));
		}
                
        public function showDonatePage()
		{
		    $banners = Banner::where('banner_page',AdminPreference::$stringDonatePage)->get();
		    $ads = Ads::where('ads_page',AdminPreference::$stringDonatePage)->inRandomOrder()->take(4)->get();
			return view('guest.donate', compact('banners','ads'));
		}
                
        public function showHomePage()
		{
            $banners = Banner::where('banner_page',AdminPreference::$stringMainPage)->get();
            $ads = Ads::where('ads_page',AdminPreference::$stringMainPage)->inRandomOrder()->take(8)->get();
            $items = Series::where('deleted',0)
            ->inRandomOrder()->take(6)->get();
            return view('guest.home', compact('banners','ads','items'));
		}
                
        public function showShopPage($paging=1)
		{
		    $number = $paging - 1;
		    $offset = $number * 10;
		    
		    $type = 4;
		    $items = Gallery::where('item_type',$type) 
		    ->offset($offset)
		    ->limit(10)
		    ->get();
		    $totalShop = Gallery::where('item_type',$type)->count();
		    $totalPaging = $totalShop / 10;
		    if($number > $totalPaging) {
		        abort(404);
		    }
		    $page = $this->getPagination($paging, $totalPaging, 10, 5);
		    return view('guest.shop', compact('items','page'));
		}
                
		public function showRecommendPage($paging=1)
		{
		    $number = $paging - 1;
		    $offset = $number * 10;
		    
		    $banners = Banner::where('banner_page',AdminPreference::$stringRecommendPage)
		    ->orderBy('id', 'asc')
		    ->offset($offset)
		    ->limit(10)
		    ->get();
		    $totalBanner = Banner::where('banner_page',AdminPreference::$stringRecommendPage)->count();
		    $totalPaging = $totalBanner / 10;
		    if($number > $totalPaging) {
		        abort(404);
		    }
		    $page = $this->getPagination($paging, $totalPaging, 10, 5);
		    return view('guest.recommend', compact('banners','page'));
		}
                
        public function showProfilePage()
		{
            $profile = User::where("id",1)->first();
            //dd($profile);
			return view('guest.profile', compact('profile'));
		}
                
		public function showGalleryPage($pageName, $paging=1)
		{
		    $number = $paging - 1;
		    $offset = $number * 10;
		    
            $type = 0;
		    switch($pageName){
		        case "character":
		            $type = 1;
		            break;
		        case "sketch":
		            $type = 2;
		            break;
		        case "illustration":
		            $type = 3;
		            break;
		        case "shop":
		            $type = 4;
		            break;
		    }
		    $items = Gallery::where('item_type',$type)
		    ->offset($offset)
		    ->limit(10)
		    ->get();
		    $totalItem = Gallery::where('item_type',$type)->count();
		    $totalPaging = $totalItem / 10;
		    if($number > $totalPaging) {
		        abort(404);
		    }
		    $page = $this->getPagination($paging, $totalPaging, 10, 5);
			return view('guest.gallery', compact('items','page','pageName'));
			
		}
		
		public function getPagination($currentPage, $totalPaging, $batchPaging, $median){
		    $paging = [];
		    if ( ($currentPage - $median) <= 0) {
		        $startPage = 1;
		    } else {
		        $startPage = $currentPage-$median;
		    }
		    if($totalPaging > $batchPaging && ($totalPaging - $currentPage) >= $batchPaging){
		        $iteration = $batchPaging;
		    }else if($totalPaging > $batchPaging && ($totalPaging - $currentPage) < $batchPaging){
		        $iteration = $totalPaging - $startPage;
		    }else if($totalPaging < $batchPaging){
		        $iteration = $totalPaging;
		    }
		    
		    $paging["start_paging"] = $startPage;
		    $paging["iteration"] = $iteration;
		    $paging["total_paging"] = $totalPaging;
		    $paging["current_paging"] = $currentPage;
		    
		    return $paging;
		}
		
		public function myDecodeURL($input){
		    
		    return str_replace('_', ' ', $input);
		}
		
		public function myEncodeURL($input){
		    $output = str_replace(' ', '_', $input);
		    
		    return $output;
		}
	}