@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">
<div id="page-content-wrapper">
<form action="{{url('admin/gallery/doedit')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put')}}
    <input type="hidden" id="id" name="id" value="{{$item->id}}">
    <div id="page-upload-left" class="thumb-big">
        <div id="page-smile-container">
            <h3 class="page-section-header">Gallery Item</h3>
            <div class="thumbnail-image-container big">
            	
        	   	@if (Session::get('thumbnail_url') != null)
            	<img class="thumbnail-image-priview big" id="thumbnail-image" src="/{{Session::get('thumbnail_url')}}" >
        	    <input type="hidden" name="prev_url" value="{{Session::get('thumbnail_url')}}"/>
            	@else
                <img class="thumbnail-image-priview big" id="thumbnail-image" src="/{{old('item_url',$item->item_url)}}" >
        	    <input type="hidden" name="prev_url" value="{{old('item_url',$item->item_url)}}"/>
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
            <h3 class="page-section-header">Item Name</h3>
            <input type="text" value="{{old('item_name',$item->item_name)}}" placeholder="Less Than 50 Character" name="item_name" class="custom-inputtext width-500"/>
            @if ($errors->has('item_name'))
          		<div class="error">{{ $errors->first('episode_title') }}</div>
        	@endif
            <h3 class="page-section-header">Type</h3>
            <div class="custom-select width-500">
            <select name="item_type" >
                <option value="0">Select Item Type</option>
                <option value="1">Character</option>
                <option value="2">Sketch</option>
                <option value="3">Illustration</option>
                <option value="4">Shop</option>
            </select>
            </div>
            @if ($errors->has('item_type'))
          		<div class="error">{{ $errors->first('item_type') }}</div>
        	@endif
            <h3 class="page-section-header">Illustrator</h3>
            <input type="text" value="{{old('illustrator',$item->illustrator)}}" placeholder="Less Than 50 Character" name="illustrator_name" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Series Name</h3>
            <input type="text" value="{{old('series_name',$item->series_name)}}" placeholder="Less Than 50 Character" name="series_name" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Price</h3>
            <input type="text" value="{{old('price',$item->price)}}" placeholder="Less Than 50 Character" name="price" class="custom-inputtext width-500"/>
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
