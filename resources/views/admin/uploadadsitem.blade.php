@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">
<div id="page-content-wrapper">
<form action="{{url('admin/ads/doadd')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" id="upload-count-total" name="file-count-total" value="1">
    <div id="page-upload-left" class="thumb-big">
        <div id="page-smile-container">
            <h3 class="page-section-header">Portrait Image</h3>
            <div class="thumbnail-image-container big">
            	@if (Session::get('thumbnail_url') != null)
            	<img class="thumbnail-image-priview big" id="thumbnail-image" src="{{asset(Session::get('thumbnail_url'))}}" >
        	    <input type="hidden" name="prev_url" value="{{Session::get('thumbnail_url')}}"/>
            	@else
                <p class="big">Select Image to upload</p>
                <img class="thumbnail-image-priview big" id="thumbnail-image">
                @endif
            </div>
            <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail"/>
            <p class="page-section-info"></p>
            @if ($errors->has('ads_portrait_url'))
          		<div class="error">{{ $errors->first('ads_portrait_url') }}</div>
          		
        	@endif
        </div>
    </div>
    <div id="page-upload-right" class="thumb-big">
        <div id="page-smale-container">
            <h3 class="page-section-header">Advertising Name</h3>
            <input type="text" value="{{old('ads_name')}}" placeholder="Less Than 50 Character" name="ads_name" class="custom-inputtext width-500"/>
            @if ($errors->has('ads_name'))
          		<div class="error">{{ $errors->first('ads_name') }}</div>
        	@endif
            <h3 class="page-section-header">Advertising Link</h3>
            <input type="text" value="{{old('ads_links')}}" placeholder="Less Than 50 Character" name="ads_links" class="custom-inputtext width-500"/>
            @if ($errors->has('ads_links'))
          		<div class="error">{{ $errors->first('ads_links') }}</div>
        	@endif
        	<div id="page-banner-container">
                <h3 class="page-section-header">Landscape Image</h3>
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
                <p></p>
                @if ($errors->has('ads_landscape_url'))
          		<div class="error">{{ $errors->first('ads_landscape_url') }}</div>
          		@endif
            </div>
            <h3 class="page-section-header">Activation</h3>
            <div class="custom-select width-500">
            <select name="ads_active" >
            	<option value="0">Select</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
                
            </select>
            </div>
            @if ($errors->has('ads_active'))
          		<div class="error">{{ $errors->first('ads_active') }}</div>
        	@endif
            <br/>
            <button id="submit-button1" type="submit" value="submit" class="custom-button width-500">Upload Item</button>
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
     @if (Session::get('success_message') != null)
    	<script>
		$(document).ready(function () {
    		alert("{{Session::get('success_message')}}");
		});
    	</script>
    @endif
@endsection
