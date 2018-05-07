@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">
    <div id="page-sitemap-container" class="i2">
    <div class="sitemap-item"><div class="sitemap-bullet active">1</div><div class="sitemap-desc">Series</div></div>
    <div class="sitemap-separator">/</div>
    <div class="sitemap-item"><div class="sitemap-bullet">2</div><div class="sitemap-desc">Episodes</div></div>
    </div>
</div>
<div id="container">
<div id="page-content-wrapper">
<form action="{{url('/admin/series/doadd')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" id="upload-count-total" name="file-count-total" value="1">
    <div id="page-upload-left">
        <div id="page-smile-container">
            <h3 class="page-section-header">Thumbnail</h3>
            <div class="thumbnail-image-container">
            @if (Session::get('thumbnail_url') != null)
        	    <img class="thumbnail-image-priview" id="thumbnail-image" height="200" width="200" src="{{asset(Session::get('thumbnail_url'))}}" >
        	    <input type="hidden" name="prev_url" value="{{Session::get('thumbnail_url')}}"/>
        	@else
        		<img class="thumbnail-image-priview" id="thumbnail-image" height="200" width="200" >
        		<p>Select Image to upload</p>
        	@endif    
            </div>
            <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail"/>
            <p class="page-section-info">Recommended size is 160px*151px and must less than 500KB. Only JPG format is allowed</p>
            @if ($errors->has('thumbnail_url'))
          		<div class="error">{{ $errors->first('thumbnail_url') }}</div>
          	@endif
        </div>
    </div>
    <div id="page-upload-right">
        <div id="page-smale-container">
            <h3 class="page-section-header">Series Title</h3>
            <input type="text" value="{{old('series_title')}}" placeholder="Less Than 50 Character" name="series_title" class="custom-inputtext width-500"/>
            @if ($errors->has('series_title'))
          		<div class="error">{{ $errors->first('series_title') }}</div>
        	@endif
        	<h3 class="page-section-header">Author</h3>
            <input type="text" value="{{old('author')}}" placeholder="Less Than 50 Character" name="author" class="custom-inputtext width-500"/>
            @if ($errors->has('author'))
          		<div class="error">{{ $errors->first('author') }}</div>
        	@endif
            <h3 class="page-section-header">Genre</h3>
            <div class="custom-select width-500">
            <select name="genre" >
                <option value=0>Select Genre</option>
                 {{ old('$genre') }}
                @foreach($categories as $category)
                <option value="{{$category['id']}}" {{ old('$genre') == $category['id'] ? 'selected' : '' }}>{{$category['category_name']}}</option>
                @endforeach
            </select>
            </div>
            @if ($errors->has('genre'))
          		<div class="error">{{ $errors->first('genre') }}</div>
        	@endif
            <div id="page-banner-container">
                <h3 class="page-section-header">Banner</h3>
                <div class="banner-image-container">
                	@if (Session::get('banner_url') != null)
                    <img class="banner-image-priview" id="banner-image" height="200" width="200" src="{{asset(Session::get('banner_url'))}}" >
        	    	<input type="hidden" name="prev_banner_url" value="{{Session::get('banner_url')}}"/>	
                    @else
                    <p>Select Image to upload</p>
                    <img class="banner-image-priview" id="banner-image">
                    @endif
                </div>
                <input class="banner-image-button" id="banner-file" type="file" name="banner"/>
                <p>Recommended size is not defined. Only JPG format is allowed</p>
                @if ($errors->has('banner_url'))
          		<div class="error">{{ $errors->first('banner_url') }}</div>
          		@endif
            </div>
            <h3 class="page-section-header">Summary</h3>
            <textarea placeholder="Less Than 500 Character"  rows="10" cols="60" name="summary" class="width-80-500">{{old('summary')}}</textarea>
            <br/>
            @if ($errors->has('summary'))
          		<div class="error">{{ $errors->first('summary') }}</div>
        	@endif
            <button id="submit-button1" type="submit" value="submit" class="custom-button width-500">Upload Series</button>
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