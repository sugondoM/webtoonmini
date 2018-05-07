@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">
<div id="page-content-wrapper">
<form action="{{url('admin/page/doedit')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put')}}
    <input type="hidden" id="episode_id" name="episode_id" value="{{$page->episode_id}}">
    <div id="page-upload-left" class="thumb-big">
        <div id="page-smile-container">
            <h3 class="page-section-header">Comic Image</h3>
            <div class="thumbnail-image-container big">
            	@if (Session::get('thumbnail_url') != null)
            	<img class="thumbnail-image-priview big" id="thumbnail-image" src="{{asset(Session::get('thumbnail_url'))}}" >
        	    <input type="hidden" name="prev_url" value="{{Session::get('thumbnail_url')}}"/>
            	@else
                <img class="thumbnail-image-priview big" id="thumbnail-image" src="{{asset($page->file_url)}}" >
        	    <input type="hidden" name="prev_url" value="{{$page->file_url}}"/>
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
            <h3 class="page-section-header">Page Number</h3>
            <input type="text" value="{{old('page_number',$page->page_number)}}" placeholder="Less Than 50 Character" name="page_number" class="custom-inputtext width-500"/>
            @if ($errors->has('page_number'))
          		<div class="error">{{ $errors->first('page_number') }}</div>
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
