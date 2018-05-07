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
<form action="{{url('/admin/episode/doedit')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put')}}
    <input type="hidden" name="series_id" value="{{$episodes->series_id}}">
    <input type="hidden" name="id" value="{{$episodes->id}}">
    @php
    	$lastNumber = $lastPageNumber->page_number;
    @endphp
    <input type="hidden" id="upload-count-total" name="file_count_total" value="{{$lastNumber}}">
    <div id="page-upload-left">
        <h3 class="page-section-header">Thumbnail</h3>
        <div class="thumbnail-image-container">
        
        	@if (Session::get('thumbnail_url') != null)
        	<img class="thumbnail-image-priview" id="thumbnail-image" src="{{asset(Session::get('thumbnail_url'))}}" height="200" width="200" />
    	    <input type="hidden" name="prev_url" value="{{Session::get('thumbnail_url')}}"/>
        	@else
           	<img class="thumbnail-image-priview" id="thumbnail-image" src="{{asset($episodes->thumbnail_url)}}" height="200" width="200">
            <input type="hidden" name="prev_url" value="{{old('thumbnail_url' , $episodes->thumbnail_url)}}"/>
            @endif
            
            <p></p>
        </div>
        <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail">
        <p class="page-section-info">Recommended size is 160px*151px and must less than 500KB. Only JPG format is allowed
        <br/>
        <br/>
        You can add new page just by select photo you want with page start from current page.
        <br/>
        <br/>
        To edit the episodes content, click the button bellow...
        <a href="{{url('/admin/page/list/'.$episodes->id)}}">
        <div class="edit-button">
            Edit Button
        </div>
        </a>
        </p>
        
        @if ($errors->has('thumbnail_url'))
          		<div class="error">{{ $errors->first('thumbnail_url') }}</div>
          		
        @endif
    </div>
    <div id="page-upload-right">
        <h3 class="page-section-header">Episode Title</h3>
        <input type="text" value="{{old('episode_title' , $episodes->episode_title)}}" placeholder="Less Than 50 Character" name="episode_title" class="custom-inputtext width-500"/>
        @if ($errors->has('episode_title'))
          		<div class="error">{{ $errors->first('episode_title') }}</div>
        @endif
	<h3 class="page-section-header">Episode Number</h3>
        <input type="text" value="{{old('episode_number' , $episodes->episode_number)}}" placeholder="Less Than 50 Character" name="episode_number" class="custom-inputtext width-500"/>
        @if ($errors->has('episode_number'))
          		<div class="error">{{ $errors->first('episode_number') }}</div>
        @endif
        <h3 class="page-section-header">Add New Episode Pages</h3>
        <div id="upload-box-button">
            Select New Images
            
        </div>
        <div id="upload-box">
            <div id="upload-basket">
            	
            </div>
         </div>
         
         <div id="upload-finalize">
            Upload
            
        </div>
         <input class="upload-basket-button" id="upload-basket-button" type="file" name="photo[]" accept="image/x-png,image/gif,image/jpeg" multiple>
        <button id="submit-button" type="submit" value="submit">Test</button>
    </div>
    
</form>
</div>
</div>
@endsection

@section('contentjs')
    
@endsection
