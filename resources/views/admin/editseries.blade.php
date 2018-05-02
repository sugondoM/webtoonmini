@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">
    
</div>
<div id="container">
<div id="page-content-wrapper">
{{--@if ($errors->any())
		<div class="error">
       @foreach($errors->all() as $error)
       		{{$error}}
       		<br/>
       @endforeach
        </div>
@endif--}}
<form action="{{url('/admin/series/doedit')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put')}}
    <input type="hidden" id="series_id" name="series_id" value="{{$series->id}}">
    <div id="page-upload-left">
        <div id="page-smile-container">
            <h3 class="page-section-header">Thumbnail</h3>
            <div class="thumbnail-image-container">
                <p></p>
                 @if (Session::get('thumbnail_url') != null)
            	<img class="thumbnail-image-priview" id="thumbnail-image" src="{{asset(Session::get('thumbnail_url'))}}" height="200" width="200" />
        	    <input type="hidden" name="prev_url" value="{{Session::get('thumbnail_url')}}"/>
            	@else
               	 <img class="thumbnail-image-priview" id="thumbnail-image" src="{{asset($series->thumbnail_url)}}" height="200" width="200">
                <input type="hidden" name="prev_url" value="{{old('thumbnail_url',$series->thumbnail_url)}}"/>
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
            <input type="text" value="{{ old('series_title' , $series->series_title)}}" placeholder="Less Than 50 Character" name="series_title" class="custom-inputtext width-500"/>
            @if ($errors->has('series_title'))
          		<div class="error">{{ $errors->first('series_title') }}</div>
        	@endif
        	<h3 class="page-section-header">Author</h3>
            <input type="text" value="{{ old('author' , $series->author) }}" placeholder="Less Than 50 Character" name="author" class="custom-inputtext width-500"/>
            @if ($errors->has('author'))
          		<div class="error">{{ $errors->first('author') }}</div>
        	@endif
            <h3 class="page-section-header">Genre</h3>
            <div class="custom-select width-500">
            <select name="genre" >
                <option value=0>Select Genre</option>
                @foreach($categories as $category)
                <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                @endforeach
            </select>
            </div>
            @if ($errors->has('genre'))
          		<div class="error">{{ $errors->first('genre') }}</div>
        	@endif
            <div id="page-banner-container">
                <h3 class="page-section-header">Banner</h3>
                <div class="banner-image-container">
                    <p></p>
                    @if (Session::get('thumbnail_url') != null)
                	<img class="thumbnail-image-priview" id="banner-image" src="{{asset(Session::get('banner_url'))}}" height="200" width="200" />
            	    <input type="hidden" name="prev_banner_url" value="{{Session::get('banner_url')}}"/>
                	@else
                   	<img class="banner-image-priview" id="banner-image" src="{{asset($series->banner_url)}}">
                    <input type="hidden" name="prev_banner_url" value="{{ old('banner_url' , $series->banner_url)}}"/>
                    @endif
                    
                   
                </div>
                <input class="banner-image-button" id="banner-file" type="file" name="banner"/>
                <p>Recommended size is not defined. Only JPG format is allowed</p>
                @if ($errors->has('banner_url'))
          		<div class="error">{{ $errors->first('banner_url') }}</div>
          		@endif
            </div>
            <h3 class="page-section-header">Recommend</h3>
            <div class="custom-select width-500">
            <select name="recommend" >
                <option value=0>Select Genre</option>
                <option value=1>Yes</option>
                <option value=0>No</option>
            </select>
            </div>
            <h3 class="page-section-header">Recommend Order</h3>
            <input type="text" value="{{old('recommend_order',$series->recommend_order)}}" placeholder="" name="recommend_order" class="custom-inputtext width-500"/>
            
            <h3 class="page-section-header">Summary</h3>
            <textarea placeholder="Less Than 500 Character" rows="10" cols="60" name="summary" class="width-80-500">{{old('summary' , $series->summary)}}</textarea>
            <br/>
            @if ($errors->has('summary'))
          		<div class="error">{{ $errors->first('summary') }}</div>
        	@endif
            <button id="submit-button1" type="submit" value="submit" class="custom-button width-500">Upload Series</button>
        </div>
    </div>
    
</form>
</div>
</div>
@endsection

@section('contentjs')
    
@endsection
