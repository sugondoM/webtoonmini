<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Http\Request;
    use App\Http\Requests;
    use App\model\User;
    use App\model\Series;
    use App\model\Episode;
    use App\model\Page;
    use Log;
    use App\model\Category;
    use App\model\Gallery;
    use App\preference\AdminPreference;
use App\model\Banner;
use App\model\Ads;
use App\model\SitePage;
                                                                                                    
    class AdminController extends Controller
    {
        private $errorValidation;
        
    	public function getAdminPage()
    	{
            return view('admin.admin');
        }
        
        
        public function showLoginPage()
	    {
            return view('admin.login');
        }
        
        public function doLogin()
        {
            $rules = array(
                'username'    => 'required|alpha',
                'password' => 'required|alphaNum|min:3'
            );
            $validator = Validator::make(Input::all(), $rules);
            
            $username = Input::get('username');
            $password = Input::get('password');
            
            if ($validator->fails()) {
                return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
            } else {
                $userdata = array(
                    'username'     => $username,
                    'password'     => $password
                );
                
                //dd($userdata);
                //dd(Auth::attempt($userdata));
                if (Auth::attempt($userdata)) {
                    
                    return Redirect::to('admin');
                } else {  
                    return Redirect::to('admin/login');
                    
                }
            }
        }
        
        public function getUserList()
        {
            $users = User::all();

            foreach ($users as $user) {
                echo $user;
                echo  "<br/>username: ".$user->username." , password: ".$user->password."<br/>";
                
                $userdata = array(
                    'username'     => $user->username,
                    'password'     => $user->password
                );
                if (Auth::attempt($userdata)) {
                    echo 'SUCCESS!';
                } else {  
                    echo 'FAILED!';
                    //return Redirect::to('admin');
                }
                
            }
        }
        
        public function doEditProfile(Request $request)
        {
            $inputUser = [];
            $thumbnail_url = '';
            $updateuser = new User();
            $inputUser['username'] = $request['username'];
            $inputUser['nickname'] = $request['nickname'];
            $inputUser['password'] = $request['password'];
            $inputUser['about'] = $request['about'];
            $inputUser['email'] = $request['email'];
            $inputUser['facebook_url'] = $request['facebook_url'];
            $inputUser['twitter_url'] = $request['twitter_url'];
            $inputUser['ig_url'] = $request['ig_url'];
            $inputUser['google_url'] = $request['google_url'];
            $inputUser['deleted'] = 0;
            
            $directoryName = "user/1/";
            if($request['prev_avatar_url']!=null){
                $thumbnail_url = $request['prev_avatar_url'];
            }
            if ($request['thumbnail'] != null) {
                $photo = $request['thumbnail'];
                $filename = "avatar_1_".$request['username'].$photo->getClientOriginalExtension();
                $thumbnail_url = $directoryName."avatar_1_".$request['username'].$photo->getClientOriginalExtension();
                $photo->move($directoryName,$filename);
            }
            
            $inputUser['avatar_url'] = $thumbnail_url;
            if ($request['new_password'] != null) {
                $inputUser['password']= $request['new_password'];
                $inputUser['password_confirmation'] = $request['confirm_password'];
                if($this->myValidate($inputUser, $updateuser->getRules2(), $updateuser->getMessages(), [])){
                    $inputUser['password'] = bcrypt($request['new_password']);
                    unset( $inputUser['password_confirmation']);
                }else{
                    return Redirect::back()->withErrors($this->errorValidation)
                    ->withInput(Input::all())
                    ->with('avatar_url'  , $inputUser['avatar_url']);
                }
            } else {
                if($this->myValidate($inputUser, $updateuser->getRules(), $updateuser->getMessages(), [])){
                }else{
                    return Redirect::back()->withErrors($this->errorValidation)
                    ->withInput(Input::all())
                    ->with('avatar_url'  , $inputUser['avatar_url']);
                }

            }
           
           //$updateUser = User::whereId("1")->update($inputUser);
           $updateUser = User::where('id',Auth::user()->id)->update($inputUser);
           return  Redirect::back();
        }
        
        public function doEditSeries(Request $request)
        {
            //dd($request);
            $updateseries = new Series();
            $inputSeries = $this->seriesHandler($request);
            //dd($inputSeries);
            if ($this->myValidate($inputSeries, $updateseries->getRules(), $updateseries->getMessages(), [])) {
                
                
            } else {
                return Redirect::back()->withErrors($this->errorValidation)
                    ->withInput(Input::all())
                    ->with('thumbnail_url'  , $inputSeries['thumbnail_url'])
                    ->with('banner_url'     , $inputSeries['banner_url']);
            }           
            $updateseries = Series::whereId($request['series_id'])->update($inputSeries);
            return redirect("/admin/series/list");
            
        }
        
        public function doEditEpisode(Request $request)
        {
            //dd($request);
            $episode = new Episode();
            $inputEpisodes = $this->episodeHandler($request);
            
            if ($this->myValidate($inputEpisodes, $episode->getRules(), $episode->getMessages(), [])) {
            } else {
                    return Redirect::back()->withErrors($this->errorValidation)
                    ->withInput(Input::all())->with('thumbnail_url' , $inputEpisodes['thumbnail_url']);
            }
            $updateseries = Episode::whereId($request['id'])->update($inputEpisodes);
            return redirect("/admin/episode/list/".$request['series_id']);
            
        }
        
        public function doEditGalleryItem(Request $request)
        {
            $gallery = new Gallery();
            $inputGallery = $this->galleryHandler($request);
            if ($this->myValidate($inputGallery, $gallery->getRules(), $gallery->getMessages(), [])) {
                
                
            } else {
                return Redirect::back()->withErrors($this->errorValidation)
                ->withInput(Input::all())
                ->with('thumbnail_url'  , $inputGallery['item_url']);
            }
            
            $updateGallery = Gallery::whereId($request['id'])->update($inputGallery);
            return redirect("/admin/gallery/list");
        }
        
        public function doEditBannerItem(Request $request)
        {
            $banner = new Banner();
            $inputBanner = $this->bannerHandler($request);
            
            if ($this->myValidate($inputBanner, $banner->getRules(), $banner->getMessages(), [])) {
                
            } else {
                return Redirect::back()->withErrors($this->errorValidation)
                ->withInput(Input::all())
                ->with('thumbnail_url'  , $inputBanner['banner_url']);
            }
            $updateBanner = Banner::whereId($request['id'])->update($inputBanner);
            return redirect("/admin/banner/list");
        }
        
        public function doEditAdsItem(Request $request)
        {
            
            $ads = new Ads();
            $inputAds = $this->adsHandler($request);
            
            if ($this->myValidate($inputAds, $ads->getRules(), $ads->getMessages(), [])) {
                
            } else {
                return Redirect::back()->withErrors($this->errorValidation)
                ->withInput(Input::all())
                ->with('thumbnail_url'  , $inputAds['ads_portrait_url'])
                ->with('banner_url'  , $inputAds['ads_landscape_url']);
            }
            $updateAds = Ads::whereId($request['id'])->update($inputAds);
            return redirect("/admin/ads/list");
        }
        
        public function doLogout()
        {
            Auth::logout();
            return Redirect::to('/'); 
        }
        
        public function doDeleteSeries($series){
            $series = Series::where('id', $series)
            ->update(['deleted' => 1]);
            return Redirect::back();
        }
        
        public function doUnDeleteSeries($series){
            $series = Series::where('id', $series)
            ->update(['deleted' => 0]);
            return Redirect::back();
        }
        
        public function doDeleteEpisode($episode){
            $pages = Page::where('episode_id',$episode)->delete();
            $episodes = Episode::where('id',$episode)->delete();
            return Redirect::back();
        }
        
        public function doDeleteGalleryItem($item){
            $pages = Gallery::where('id',$item)->delete();
            return Redirect::back();
        }
        
        public function doUploadSeries(Request $request)
        {
            //dd($request->all());
           
            $series = new Series();
            $inputSeries = $this->seriesHandler($request);
            
            if ($this->myValidate($inputSeries, $series->getRules(), $series->getMessages(), [])) {
                
               
            } else {
                return Redirect::back()->withErrors($this->errorValidation)
                    ->withInput(Input::all())
                    ->with('thumbnail_url'  , $inputSeries['thumbnail_url'])
                    ->with('banner_url'     , $inputSeries['banner_url']);
            }
            $series = Series::create($inputSeries);
            $insertedId = $series->id;
            return redirect("/admin/episode/add/".$insertedId);
            //return view('admin.listepisode')->with('series_id', $insertedId);
        }
        
        public function doUploadEpisode(Request $request)
        {
            //dd($input = $request->all());
            
            $episode = new Episode();
            $inputEpisodes = $this->episodeHandler($request);
            
            if ($this->myValidate($inputEpisodes, $episode->getRules(), $episode->getMessages(), [])) {
                
                if ($request["photo"]!=null) {
                    
                } else {
                    return Redirect::back()
                    ->with('thumbnail_url' , $inputEpisodes['thumbnail_url'])
                    ->with('error_no_page','Episode images must be selected');
                }
            } else {
                if ($request["photo"]!=null) {
                    return Redirect::back()->withErrors($this->errorValidation)
                    ->withInput(Input::all())->with('thumbnail_url' , $inputEpisodes['thumbnail_url']);
                } else {
                    return Redirect::back()->withErrors($this->errorValidation)
                    ->withInput(Input::all())
                    ->with('thumbnail_url' , $inputEpisodes['thumbnail_url'])
                    ->with('error_no_page','Episode images must be selected');
                }
                
            }
            $episode = Episode::create($inputEpisodes);
            $episode_id = $episode->id;
            $directoryName = dirname($inputEpisodes['thumbnail_url'])."/episode".$inputEpisodes['episode_number']."/";
            //dd($episode_id);
            for($i=0;$i<sizeof($request["photo"]);$i++){
                
                if($request["photo"]!=null){
                    
                    $photo = $request["photo"][$i];
                    $pageNumber = $request["pageNumber"][$i];
                    if( $pageNumber != null ){
                        $filename = $pageNumber;

                    }else{
                        $filename= $i+1;                    
                    }
                   
                    $photo->move($directoryName,$filename.'.'.$photo->getClientOriginalExtension());
                    
                    $page = new Page();
                    $page->page_number = $filename;
                    $page->file_url = $directoryName.$filename.'.'.$photo->getClientOriginalExtension();
                    $page->episode_id = $episode_id;
                    $page->save();
                }
            }
            
            $episodes = Episode::where('series_id', $request['series_id'])
               ->orderBy('episode_title', 'asc')
               ->get();
            
            
           return Redirect::back()->with('success_message' , 'Episode have been added');
        }
        
        public function doUploadGalleryItem(Request $request)
        {
            $gallery = new Gallery();
            $inputGallery = $this->galleryHandler($request);
            
            if ($this->myValidate($inputGallery, $gallery->getRules(), $gallery->getMessages(), [])) {
                
                
            } else {
                return Redirect::back()->withErrors($this->errorValidation)
                ->withInput(Input::all())
                ->with('thumbnail_url'  , $inputGallery['item_url']);
            }
            $gallery = Gallery::create($inputGallery);
            return Redirect::back()->with('success_message' , 'Gallery item have been added');
        }
        
        public function doUploadBannerItem(Request $request)
        {
            $banner = new Banner();
            $inputBanner = $this->bannerHandler($request);
            
            if ($this->myValidate($inputBanner, $banner->getRules(), $banner->getMessages(), [])) {
                
            } else {
                return Redirect::back()->withErrors($this->errorValidation)
                ->withInput(Input::all())
                ->with('thumbnail_url'  , $inputBanner['banner_url']);
            }
            $banner = Banner::create($inputBanner);
            return Redirect::back()->with('success_message' , 'Banner item have been added');
        }
        
        public function doUploadAdsItem(Request $request)
        {
            $ads = new Ads();
            $inputAds = $this->adsHandler($request);
            
            if ($this->myValidate($inputAds, $ads->getRules(), $ads->getMessages(), [])) {
                
            } else {
                return Redirect::back()->withErrors($this->errorValidation)
                ->withInput(Input::all())
                ->with('thumbnail_url'  , $inputAds['ads_portrait_url'])
                ->with('banner_url'  , $inputAds['ads_landscape_url']);
            }
            $ads = Ads::create($inputAds);
            return Redirect::back()->with('success_message' , 'Advertising item have been added');
        }
        
        public function showProfile()
        {
            
        }
        
        public function showEditProfile($userid)
        {
            $user = user::where('id', $userid)
               ->first();
            
            return view('admin.editprofile',compact('user'));
        }
        
        public function showUploadSeries()
        {
            $categories = Category::orderBy("category_name")->get(['id','category_name'])->toArray();
            return view('admin.uploadseries',compact('categories'));
        }
        
        public function showUploadEpisode($series)
        {
            return view('admin.uploadepisode')->with('series_id', $series);
        }
        
        public function showUploadBanner()
        {
            $pages = SitePage::get();
            return view('admin.uploadbanneritem',compact('pages'));
        }
        
        public function showUploadAds()
        {
            return view('admin.uploadadsitem');
        }
        
        public function showSeriesList($paging=1)
        {
            $number = $paging - 1;
            $offset = $number * 30;
            
            $series = Series::join(
                'category',
                'category.id','=','series.genre'
               )
               ->orderBy('series.series_title', 'asc')
               ->get(['series.*','category.category_name as category_name']);
            
               
           $totalItem = Series::count();
           $totalPaging = $totalItem / 30;
           if($number > $totalPaging) {
               abort(404);
           }
           $page = $this->getPagination($paging, $totalPaging, 10, 5);
            //dd($series);
            return view('admin.listseries',compact('series','page'));
        }
        
        public function showEpisodesList($series,$paging=1)
        {
            $number = $paging - 1;
            $offset = $number * 30;
            
            $episodes = Episode::where('series_id', $series)
               ->orderBy('episode_number', 'asc')
               ->get();
            
               
           $totalItem = Episode::where('series_id', $series)->count();
           $totalPaging = $totalItem / 30;
           if($number > $totalPaging) {
               abort(404);
           }
           $page = $this->getPagination($paging, $totalPaging, 10, 5);
           
            $series = Series::where('id', $series)
               ->orderBy('id', 'asc')
               ->first();
            
            
            return view('admin.listepisode',compact('series','episodes','page'));
        }
           
        public function showEditSeries($series)
        {
            $series = Series::where('id', $series)
               ->orderBy('id', 'asc')
               ->first();
            $categories = Category::orderBy("category_name")->get(['id','category_name'])->toArray();
            return view('admin.editseries',compact('series','categories'));
        }
        
        public function showEditEpisode($episode)
        {
            $episodes = Episode::where('id', $episode)
               ->first();
            
            return view('admin.editepisode',compact('episodes'));
        }
        
        public function showGallery($paging=1)
        {
            $number = $paging - 1;
            $offset = $number * 30;
            
            $galleriesItems = Gallery::orderBy('created_at', 'asc')
            ->offset($offset)
            ->limit(30)
            ->get();
            
            $totalItem = Gallery::count();
            $totalPaging = $totalItem / 30;
            if($number > $totalPaging) {
                abort(404);
            }
            $page = $this->getPagination($paging, $totalPaging, 10, 5);
            
            $sortedItems=[];
            $character = [];
            $skecth = [];
            $illustration = [];
            $shop = [];
            
            foreach ($galleriesItems as $item){
                switch ($item['item_type']){
                    case AdminPreference::$indexCharacterSheet : 
                        array_push($character, $item);
                        break;
                    case AdminPreference::$indexSketch :
                        array_push($skecth, $item);
                        break;
                    case AdminPreference::$indexIllustration :
                        array_push($illustration, $item);
                        break;
                    case AdminPreference::$indexShopItem :
                        array_push($shop, $item);
                        break;
                }
            }
            
            
            return view('admin.gallery', compact('character','skecth','illustration','shop', 'page'));
        }
        
        public function showEditGalleryItem($itemid){
            $item = Gallery::where('id',$itemid)
            ->first();
            return view('admin.editgalleryitem', compact('item'));
        }
        
        public function showUploadGallery(){
            return view('admin.uploadgalleryitem');
        }
        
        public function showBanner($pageNo=1){
            $number = $pageNo - 1;
            $offset = $number * 30;
            $banner = Banner::offset($offset)
            ->limit(30)
            ->get();
            
            $totalItem = Banner::count();
            $totalPaging = $totalItem / 30;
            if($number > $totalPaging) {
                abort(404);
            }
            $page = $this->getPagination($pageNo, $totalPaging, 10, 5);
            
            return view('admin.banner', compact('banner','page'));
        }
        
        public function showAds($pageNo=1){
            $number = $pageNo - 1;
            $offset = $number * 30;
            $ads = Ads::offset($offset)
            ->limit(30)
            ->get();
            $totalItem = Ads::count();
            $totalPaging = $totalItem / 30;
            if($number > $totalPaging) {
                abort(404);
            }
            $page = $this->getPagination($pageNo, $totalPaging, 10, 5);
            return view('admin.ads', compact('ads','page'));
        }
        
        public function showEditBannerItem($itemid){
            $pages = SitePage::get();
            $item = Banner::where('id',$itemid)
            ->first();
            return view('admin.editbanneritem', compact('item','pages'));
        }
        
        public function showEditAdsItem($itemid){
            $item = Ads::where('id',$itemid)
            ->first();
            return view('admin.editadsitem', compact('item'));
        }
        
        public function myValidate($data, $rules, $messages, $custom)
        {
            $v = Validator::make($data, $rules, $messages, $custom);
            
            if ($v->fails()){
                $this->errorValidation = $v->errors()->toArray();
                return false;
            }
            
            return true;
        }
        
        public function uploadImageHandler(){
            
        }
        
        public function seriesHandler($request){
            $user_id = 1;
            $inputSeries = [];
            $banner_url = "";
            $genre = "";
            $thumbnail_url = "";
            $filtered_title = str_replace(" ","_",$request['series_title']);
            $destinationPath = 'uploads/u'.$user_id."_s".$filtered_title;
            
            if ($request['prev_url'] != null) {
                $thumbnail_url = $request['prev_url'];
            }
            if ($request['prev_banner_url'] != null) {
                $banner_url = $request['prev_banner_url'];
            }
            if ($request['thumbnail'] != null) {
                $photo = $request['thumbnail'];
                $filename = "thumbnail_".$photo->getClientOriginalName();
                $thumbnail_url =  $destinationPath."/".$filename;
                $photo->move($destinationPath,$filename);
            }
            
            if ($request['genre'] != 0) {
                $genre = $request['genre'];
            }
            
            if ($request['banner'] != null) {
                $photo = $request['banner'];
                $filename2 = "banner_".$photo->getClientOriginalName();
                $banner_url =  $destinationPath."/".$filename2;
                $photo->move($destinationPath,$filename2);
            }
            
            $inputSeries['thumbnail_url']   = $thumbnail_url;
            $inputSeries['banner_url']      = $banner_url;
            $inputSeries['series_title']    = $request['series_title'];
            $inputSeries['author']          = $request['author'];
            $inputSeries['genre']           = $genre;
            $inputSeries['summary']         = $request['summary'];
            $inputSeries['recommend']       = $request['recommend'];
            $inputSeries['recommend_order'] = $request['recommend_order'];
            $inputSeries['deleted']         = false;
            $inputSeries['user_id']         = 1;
            
            return $inputSeries;
        }
        
        public function episodeHandler($request){
            $inputEpisodes = [];
            $thumbnail_url = "";
            $series = Series::where('id', $request['series_id'])
            ->first();
            
            $last_episode = Episode::where('series_id', $request['series_id'])
            ->orderBy('episode_number', 'desc')
            ->first();
            
            if ($last_episode == null) {
                $current_episode_number = 1;
            } else {
                $current_episode_number = $last_episode['episode_number'] + 1;
            }
            
            if ($request['episode_number'] != null) {
                $current_episode_number = $request['episode_number'];
            }
            
            $directoryName = dirname($series['thumbnail_url'])."/episode".$current_episode_number."/";
            
            if($request['prev_url']!=null){
                $thumbnail_url = $request['prev_url'];
            }
            if ($request['thumbnail'] != null) {
                $photo = $request['thumbnail'];
                $filename = "thumbnail_".$photo->getClientOriginalName();
                $thumbnail_url = $directoryName.$filename;
                $photo->move($directoryName,$filename);
            }
            
            $inputEpisodes['episode_title'] = $request["episode_title"];
            $inputEpisodes['episode_number'] = $current_episode_number;
            $inputEpisodes['thumbnail_url'] = $thumbnail_url;
            $inputEpisodes['series_id'] = $request["series_id"];
            
            return $inputEpisodes;
        }
        
        public function galleryHandler($request){
            $inputGallery = [];
            $path_item = "";
            $directoryName = "";
            $thumbnail_url = "";
            $item_type = "";
            $filtered_title = str_replace(" ","_",$request['item_name']);
            
            switch ($request['item_type']){
                case AdminPreference::$indexCharacterSheet :
                    $path_item = AdminPreference::$stringCharacterSheet;
                    break;
                case AdminPreference::$indexSketch :
                    $path_item = AdminPreference::$stringSketch;
                    break;
                case AdminPreference::$indexIllustration :
                    $path_item = AdminPreference::$stringIllustration;
                    break;
                case AdminPreference::$indexShopItem :
                    $path_item = AdminPreference::$stringShopItem;
                    break;
            }
            $directoryName = 'uploads_gallery/'.$path_item."/";
            
            if($request['prev_url']!=null){
                $thumbnail_url = $request['prev_url'];
            }
            
            if ($request['thumbnail'] != null) {
                $photo = $request['thumbnail'];
                $filename = $filtered_title.'_'.$photo->getClientOriginalName();
                $thumbnail_url = $directoryName.$filename;
                $photo->move($directoryName,$filename);
            }
            
            if ($request['item_type'] != 0) {
                $item_type = $request['item_type'];
            }
            
            $inputGallery['item_name'] = $request['item_name'];
            $inputGallery['item_url'] = $thumbnail_url;
            $inputGallery['item_type'] = $item_type;
            $inputGallery['price'] = $request['price'];
            $inputGallery['illustrator'] = $request['illustrator'];
            $inputGallery['series_name'] = $request['series_name'];
            
            return $inputGallery;
        }
        
        public function bannerHandler($request){
            $inputBanner = [];
            $directoryName = "";
            $thumbnail_url = "";
            $filtered_title = str_replace(" ","_",$request['banner_name']);
            
            
            $directoryName = 'uploads_gallery/';
            
            if($request['prev_url']!=null){
                $thumbnail_url = $request['prev_url'];
            }
            
            if ($request['thumbnail'] != null) {
                $photo = $request['thumbnail'];
                $filename = $filtered_title.'_'.$photo->getClientOriginalName();
                $thumbnail_url = $directoryName.$filename;
                $photo->move($directoryName,$filename);
            }
            
            
            $inputBanner['banner_name'] = $request['banner_name'];
            $inputBanner['banner_links'] = $request['banner_links'];
            $inputBanner['banner_url']  = $thumbnail_url;
            $inputBanner['banner_page'] = $request['banner_page'];
            
            return $inputBanner;
        }
        
        public function adsHandler($request){
            $inputAds = [];
            $directoryName = "";
            $thumbnail_url = "";
            $portrait_url = "";
            $filtered_title = str_replace(" ","_",$request['ads_name']);
            $activation = "";
            $directoryName = 'uploads_gallery/';
            
            if($request['prev_url']!=null){
                $thumbnail_url = $request['prev_url'];
            }
            
            if ($request['thumbnail'] != null) {
                $photo = $request['thumbnail'];
                $filename ="portrait_".$filtered_title.'_'.$photo->getClientOriginalName();
                $thumbnail_url = $directoryName.$filename;
                $photo->move($directoryName,$filename);
            }
            
            
            
            if($request['prev_banner_url']!=null){
                $portrait_url = $request['prev_banner_url'];
            }
            
            if ($request['banner'] != null) {
                $photo = $request['banner'];
                $filename2 = "portrait_".$filtered_title.'_'.$photo->getClientOriginalName();
                $portrait_url = $directoryName.$filename2;
                $photo->move($directoryName,$filename2);
            }
            
            if($request['ads_active'] != 0){
                if($request['ads_active']==2){
                    $activation = 0;
                }else{
                    $activation = 1;
                }
            }
            
            $inputAds['ads_name'] = $request['ads_name'];
            $inputAds['ads_links'] = $request['ads_links'];
            $inputAds['ads_portrait_url']  = $thumbnail_url;
            $inputAds['ads_landscape_url']  = $portrait_url;
            $inputAds['ads_active'] = $activation;
            
            return $inputAds;
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
        
        public function checkLogin(){
            return Redirect::to('/');
        }
        
    }