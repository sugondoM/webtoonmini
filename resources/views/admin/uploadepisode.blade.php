@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">
    <div id="page-sitemap-container" class="i2">
    <div class="sitemap-item"><div class="sitemap-bullet">1</div><div class="sitemap-desc">Series</div></div>
    <div class="sitemap-separator">/</div>
    <div class="sitemap-item"><div class="sitemap-bullet active">2</div><div class="sitemap-desc">Episodes</div></div>
    </div>
</div>
<div id="container">
<div id="page-content-wrapper">
<form action="{{url('/admin/episode/doadd')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="series_id" value="{{$series_id}}">
    <input type="hidden" id="upload-count-total" name="file_count_total" value="1">
    <div id="page-upload-left">
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
        <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail">
        <p class="page-section-info">Recommended size is 160px*151px and must less than 500KB. Only JPG format is allowed</p>
        @if ($errors->has('thumbnail_url'))
          		<div class="error">{{ $errors->first('thumbnail_url') }}</div>
          		
        @endif
    </div>
    <div id="page-upload-right">
        <h3 class="page-section-header">Episode Title</h3>
        <input type="text" value="{{old('episode_title')}}" placeholder="Less Than 50 Character" name="episode_title" class="custom-inputtext width-500"/>
        @if ($errors->has('episode_title'))
          		<div class="error">{{ $errors->first('episode_title') }}</div>
        @endif
        <h3 class="page-section-header">Episode Pages</h3>
        <div id="upload-box-button">
            Select Images
            
        </div>
        <div id="upload-box">
            <div id="upload-basket">
            	
            </div>
         </div>
         @if (Session::get('error_no_page') != null)
          		<div class="error">{{ Session::get('error_no_page') }}</div>
         @endif
         <input class="upload-basket-button" id="upload-basket-button" type="file" name="photo[]" accept="image/x-png,image/gif,image/jpeg" multiple>
         
         <div id="upload-finalize">
            Upload
            
        </div>
        <button id="submit-button" type="submit" value="submit">Test</button>
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
    
</form>
</div>
</div>
@endsection

@section('contentjs')
    @if (Session::get('success_message') != null)
    	<script>
		$(document).ready(function () {
    		alert("{{Session::get('success_message')}}");
		});
    	</script>
    @endif
 
@endsection