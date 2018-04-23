@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">

<div id="page-content-wrapper">
<form action="{{url('/admin/profile/doedit')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put')}}
    <input type="hidden" id="upload-count-total" name="file-count-total" value="1">
    <div id="page-upload-left">
        <div id="page-smile-container">
            <h3 class="page-section-header">Thumbnail*</h3>
            <div class="thumbnail-image-container">
                <p></p>
                <img class="thumbnail-image-priview" id="thumbnail-image"  src="/{{ old('avatar_url' , $user->avatar_url)}}" height="200" width="200"/>
                <input type="hidden" name="prev_avatar_url" value="{{ old('avatar_url' , $user->avatar_url)}}"/>
            </div>
            <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail"/>
            <p class="page-section-info"></p>
            @if ($errors->has('avatar_url'))
          		<div class="error">{{ $errors->first('avatar_url') }}</div>
          	@endif
        </div>
    </div>
    <div id="page-upload-right">
        <div id="page-smale-container">
            <h3 class="page-section-header">User Name*</h3>
            <input type="text" value="{{old('username' , $user->username)}}" placeholder="Less Than 50 Character" name="username" class="custom-inputtext width-500"/>
            @if ($errors->has('username'))
          		<div class="error">{{ $errors->first('username') }}</div>
        	@endif
            <h3 class="page-section-header">Nickname</h3>
            <input type="text" value="{{old('nickname' , $user->nickname)}}" placeholder="Less Than 50 Character" name="nickname" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">New Password</h3>
            <input type="password" value="" placeholder="Min six character" name="new_password" class="custom-inputtext width-500"/>
           	@if ($errors->has('password'))
          		<div class="error">{{ $errors->first('password') }}</div>
        	@endif
           	<h3 class="page-section-header">Confirm Password</h3>
            <input type="password" value="" placeholder="Same as new password" name="confirm_password" class="custom-inputtext width-500"/>
           	@if ($errors->has('password_confirmation'))
          		<div class="error">{{ $errors->first('password_confirmation') }}</div>
        	@endif
            <h3 class="page-section-header">About</h3>
            <textarea placeholder="Less Than 500 Character" rows="10" cols="60" name="about" class="width-80-500"></textarea>
            <h3 class="page-section-header">Email*</h3>
            <input type="text" value="{{old('email' , $user->email)}}" placeholder="Less Than 50 Character" name="email" class="custom-inputtext width-500"/>
            @if ($errors->has('email'))
          		<div class="error">{{ $errors->first('email') }}</div>
        	@endif
            <h3 class="page-section-header">Facebook</h3>
            <input type="text" value="{{old('facebook_url' , $user->facebook_url)}}" placeholder="Less Than 50 Character" name="facebook_url" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Twitter</h3>
            <input type="text" value="{{old('twitter_url' , $user->twitter_url)}}" placeholder="Less Than 50 Character" name="twitter_url" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Instagram</h3>
            <input type="text" value="{{old('ig_url' , $user->ig_url)}}" placeholder="Less Than 50 Character" name="ig_url" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Google Plus</h3>
            <input type="text" value="{{old('google_url' , $user->google_url)}}" placeholder="Less Than 50 Character" name="google_url" class="custom-inputtext width-500"/>
            <input type="hidden" name="password" value="{{$user->password}}">
            <br/>
            <button id="submit-button1" type="submit" value="submit" class="custom-button width-500">Update Profile</button>
            
             @if ($errors->any())
             <div class="list-error-container">
        		<div class="error">
               @foreach($errors->all() as $error)
               		{{$error}}
               		<br/>
               @endforeach
                </div>
                </div>
            @endif
        </div>
    </div>
   
</form>
</div>
</div>
@endsection

@section('contentjs')
    
@endsection
