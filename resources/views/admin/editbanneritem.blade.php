@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">
<div id="page-content-wrapper">
<form action="{{url('admin/banner/doedit')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put')}}
    <input type="hidden" id="id" name="id" value="{{$item->id}}">
    <div id="page-upload-left" class="thumb-big">
        <div id="page-smile-container">
            <h3 class="page-section-header">Banner Image</h3>
            <div class="thumbnail-image-container big">
            	@if (Session::get('thumbnail_url') != null)
            	<img class="thumbnail-image-priview big" id="thumbnail-image" src="{{asset(Session::get('thumbnail_url'))}}" >
        	    <input type="hidden" name="prev_url" value="{{Session::get('thumbnail_url')}}"/>
            	@else
                <img class="thumbnail-image-priview big" id="thumbnail-image" src="{{asset($item->banner_url)}}" >
        	    <input type="hidden" name="prev_url" value="{{$item->banner_url}}"/>
                @endif
            </div>
            <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail"/>
            <p class="page-section-info"></p>
            @if ($errors->has('thumbnail_url'))
          		<div class="error">{{ $errors->first('thumbnail_url') }}</div>
          		
        	@endif
        </div>
    </div>
    <div id="page-upload-right" class="thumb-big">
        <div id="page-smale-container">
            <h3 class="page-section-header">Banner Name</h3>
            <input type="text" value="{{old('banner_name',$item->banner_name)}}" placeholder="Less Than 50 Character" name="banner_name" class="custom-inputtext width-500"/>
            @if ($errors->has('banner_name'))
          		<div class="error">{{ $errors->first('banner_name') }}</div>
        	@endif
            <h3 class="page-section-header">Banner Link</h3>
            <input type="text" value="{{old('banner_links',$item->banner_links)}}" placeholder="Less Than 50 Character" name="banner_links" class="custom-inputtext width-500"/>
            @if ($errors->has('banner_links'))
          		<div class="error">{{ $errors->first('banner_links') }}</div>
        	@endif
            <h3 class="page-section-header">Banner Page</h3>
            <div class="custom-select width-500">
            <select name="banner_page" >
                <option value=0>Select Page</option>
                @foreach($pages as $page)
                <option value="{{$page['page_name']}}">{{$page['page_name']}}</option>
                @endforeach
            </select>
            </div>
            @if ($errors->has('banner_page'))
          		<div class="error">{{ $errors->first('banner_page') }}</div>
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
