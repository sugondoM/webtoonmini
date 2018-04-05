@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">
    <div id="page-sitemap-container" class="i2">
    <div class="sitemap-item"><div class="sitemap-desc">Update Profile</div></div>
    </div>
</div>
<div id="page-content-wrapper">
<form action="{{url('/uploadseries')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" id="upload-count-total" name="file-count-total" value="1">
    <div id="page-upload-left">
        <div id="page-smile-container">
            <h3 class="page-section-header">Thumbnail</h3>
            <div class="thumbnail-image-container">
                <p></p>
                <img class="thumbnail-image-priview" id="thumbnail-image" src="/{{$user->avatar_url}}" height="200" width="200">
            </div>
            <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail"/>
            <p class="page-section-info"></p>
        </div>
    </div>
    <div id="page-upload-right">
        <div id="page-smale-container">
            <input type="hidden" value="sugondo" name="author">
            <h3 class="page-section-header">User Name</h3>
            <input type="text" value="{{$user->username}}" placeholder="Less Than 50 Character" name="username" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Nickname</h3>
            <input type="text" value="" placeholder="Less Than 50 Character" name="username" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Biography</h3>
            <textarea placeholder="Less Than 500 Character" rows="10" cols="60" name="summary" class="width-80-500"></textarea>
            <h3 class="page-section-header">Email</h3>
            <input type="text" value="{{$user->email}}" placeholder="Less Than 50 Character" name="username" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Facebook</h3>
            <input type="text" value="{{$user->email}}" placeholder="Less Than 50 Character" name="username" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Twitter</h3>
            <input type="text" value="{{$user->email}}" placeholder="Less Than 50 Character" name="username" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Instagram</h3>
            <input type="text" value="{{$user->email}}" placeholder="Less Than 50 Character" name="username" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Google Plus</h3>
            <input type="text" value="{{$user->email}}" placeholder="Less Than 50 Character" name="username" class="custom-inputtext width-500"/>
            
            
            <button id="submit-button1" type="submit" value="submit" class="custom-button width-500">Update Profile</button>
        </div>
    </div>
    
</form>
</div>
@endsection

@section('contentjs')
    
@endsection