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
        
        public function getIndexPage(){
            return view('index');
        }
        
        public function showUploadFile(Request $request){
            //print_r(request,true);
            //die();
            $file = $request->file('image');
            //Display File Name
            echo 'File Name: '.$file->getClientOriginalName();
            echo '<br>';
            //Display File Extension
            echo 'File Extension: '.$file->getClientOriginalExtension();
            echo '<br>';
            //Display File Real Path
            echo 'File Real Path: '.$file->getRealPath();
            echo '<br>';
            //Display File Size
            echo 'File Size: '.$file->getSize();
            echo '<br>';
            //Display File Mime Type
            echo 'File Mime Type: '.$file->getMimeType();

            //Move Uploaded File
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
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

    }