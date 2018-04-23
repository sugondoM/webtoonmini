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
    <input type="hidden" id="upload-count-total" name="file_count_total" value="1">
    <div id="page-upload-left">
        <h3 class="page-section-header">Thumbnail</h3>
        <div class="thumbnail-image-container">
            <img class="thumbnail-image-priview" id="thumbnail-image" src="/{{old('thumbnail_url' , $episodes->thumbnail_url)}}" height="200" width="200">
                <input type="hidden" name="prev_url" value="{{old('thumbnail_url' , $episodes->thumbnail_url)}}"/>
            <p></p>
        </div>
        <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail">
        <p class="page-section-info">Recommended size is 160px*151px and must less than 500KB. Only JPG format is allowed</p>
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
         
         <div id="upload-finalize">
            Upload
            
        </div>
        <button id="submit-button" type="submit" value="submit">Test</button>
    </div>
    
</form>
</div>
</div>
@endsection

@section('contentjs')
    
@endsection
