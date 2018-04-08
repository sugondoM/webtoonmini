@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">
    <div id="page-sitemap-container" class="i2">
    <div class="sitemap-item"><div class="sitemap-bullet active">1</div><div class="sitemap-desc">Series</div></div>
    <div class="sitemap-separator">/</div>
    <div class="sitemap-item"><div class="sitemap-bullet">2</div><div class="sitemap-desc">Episodes</div></div>
    </div>
</div>
<div id="page-content-wrapper">
<form action="{{url('/adminuploadseries')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" id="upload-count-total" name="file-count-total" value="1">
    <div id="page-upload-left">
        <div id="page-smile-container">
            <h3 class="page-section-header">Thumbnail</h3>
            <div class="thumbnail-image-container">
                <p>Select Image to upload</p>
                <img class="thumbnail-image-priview" id="thumbnail-image" height="200" width="200">
                
                
            </div>
            <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail"/>
            <p class="page-section-info">Recommended size is 160px*151px and must less than 500KB. Only JPG format is allowed</p>
        </div>
    </div>
    <div id="page-upload-right">
        <div id="page-smale-container">
            <input type="hidden" value="sugondo" name="author">
            <h3 class="page-section-header">Series Title</h3>
            <input type="text" value="" placeholder="Less Than 50 Character" name="series_title" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Genre</h3>
            <div class="custom-select width-500">
            <select name="genre" >
                <option value="0">Select Genre</option>
                <option value="comedy">Comedy</option>
                <option value="romance">Romance</option>
            </select>
            </div>
            <div id="page-banner-container">
                <h3 class="page-section-header">Banner</h3>
                <div class="banner-image-container">
                    <p>Select Image to upload</p>
                    <img class="banner-image-priview" id="banner-image">
                </div>
                <input class="banner-image-button" id="banner-file" type="file" name="banner"/>
                <p>Recommended size is not defined. Only JPG format is allowed</p>
            </div>
            <h3 class="page-section-header">Summary</h3>
            <textarea placeholder="Less Than 500 Character" value="" rows="10" cols="60" name="summary" class="width-80-500"></textarea>
            <br/>
            <button id="submit-button1" type="submit" value="submit" class="custom-button width-500">Upload Series</button>
        </div>
    </div>
    
</form>
</div>
@endsection

@section('contentjs')
    
@endsection