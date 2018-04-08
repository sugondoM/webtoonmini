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
    
    class AdminController extends Controller
    {
	public function getAdminPage()
	{
            return view('admin.admin');
        }
        
        
        public function getLoginPage()
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
            
            
            
            if ($validator->fails()) {
                return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
            } else {
                $userdata = array(
                    'username'     => Input::get('user'),
                    'password'     => Input::get('password')
                );
                
                if (Auth::attempt($userdata)) {
                    echo 'SUCCESS!';
                } else {  
                    echo 'FAILED!';
                    //return Redirect::to('admin');
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
            
        }
        
        public function doEditSeries(Request $request)
        {
            
        }
        
        public function doEditEpisode(Request $request)
        {
            
        }
        
        public function doEditGalleryItem(Request $request)
        {
            
        }
        
        public function doUploadSeries(Request $request)
        {
            //$insertedId = 1;
            //return view('admin.uploadsfile')->with('series_id', $insertedId);
            $user_id=1;
            $filtered_title = str_replace(" ","_",$request['series_title']);
            $destinationPath = 'uploads/u'.$user_id."_s".$filtered_title;
            if($request['thumbnail']!=null){
                $photo = $request['thumbnail'];
                $filename = "thumbnail_".$photo->getClientOriginalName();
                $thumbnail_url = $destinationPath."/".$request['thumbnail']->getClientOriginalName();
                $photo->move($destinationPath,$filename);
            }
            
            if($request['banner']!=null){
                $photo = $request['banner'];
                $filename2 = "banner".$photo->getClientOriginalName();
                $thumbnail_url = $destinationPath."/".$request['banner']->getClientOriginalName();
                $photo->move($destinationPath,$filename2);
            }
            
            $series = new Series();
            
            $series->thumbnail_url = $destinationPath."/".$filename;
            $series->banner_url = $destinationPath."/".$filename2;
            $series->series_title = $request['series_title'];
            $series->author = $request['author'];
            //$series->genre = $request['genre'];
            $series->summary = $request['summary']; 
            $series->deleted = 0; 
            $series->user_id = 1;
            $series->save();  
            
            
            $insertedId = $series->id;
            return view('admin.uploadepisode')->with('series_id', $insertedId);
        }
        
        public function doUploadEpisode(Request $request)
        {
            //dd($request['series_id']);
            $series = Series::where('id', $request['series_id'])
               ->first();
            
            
            $last_episode = Episode::where('series_id', $request['series_id'])
                    ->orderBy('episode_number', 'desc')
                    ->first();
            
            if($last_episode==null){
                $current_episode_number = 1; 
            }else{
                $current_episode_number = $last_episode['episode_number'] + 1; 
            }
            
            $directoryName = dirname($series['thumbnail_url'])."/episode".$current_episode_number."/";
            
            
            if($request['thumbnail']!=null){
                $photo = $request['thumbnail'];
                $filename = "thumbnail_".$photo->getClientOriginalName();
                $thumbnail_url = $directoryName."thumbnail_".$request['thumbnail']->getClientOriginalName();
                $photo->move($directoryName,$filename);
            }
            $episode = new Episode();
            $episode->episode_title = $request["episode_title"];
            $episode->episode_number = $current_episode_number;
            $episode->thumbnail_url = $thumbnail_url;
            $episode->series_id = $series['id'];
            $episode->save();
            
            $episode_id = $episode->id;
            //dd($request["file_count_total"]);
            for($i=0;$i<$request["file_count_total"];$i++){
                
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
            
            
            return view('admin.listepisode',compact('series','episodes'));
        }
        
        public function doUploadGalleryItem(Request $request)
        {
            
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
            return view('admin.uploadseries');
        }
        
        public function showUploadEpisode($series)
        {
            return view('admin.uploadepisode')->with('series_id', $series);
        }
        
        public function showSeriesList()
        {
            $series = Series::where('deleted', 0)
               ->orderBy('series_title', 'asc')
               ->get();
            
            return view('admin.listseries',compact('series'));
        }
        
        public function showEpisodesList($series)
        {
            $episodes = Episode::where('series_id', $series)
               ->orderBy('series_id', 'asc')
               ->get();
            
            $series = Series::where('id', $series)
               ->orderBy('id', 'asc')
               ->first();
            
            
            return view('admin.listepisode',compact('series','episodes'));
        }
           
        public function showEditSeries($series)
        {
            $series = Series::where('id', $series)
               ->orderBy('id', 'asc')
               ->first();
            
            return view('admin.editseries',compact('series'));
        }
        
        public function showEditEpisode($series,$episode)
        {
            $episodes = Episode::where('id', $episode)
               ->first();
            
            $pages = Page::where('episode_id', $episode)
               ->orderBy('page_number', 'asc')
               ->get();
            
            return view('admin.editepisode',compact('episodes','pages'));
        }
        
        public function showGallery()
        {
            
        }
        
        public function showEditGallery($itemid){
            
        }
        
        public function showUploadGallery(){
            return view('admin.uploadgalleryitem',compact('episodes','pages'));
        }
        
    }