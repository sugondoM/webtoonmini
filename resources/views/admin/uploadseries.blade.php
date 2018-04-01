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
<form action="{{url('/uploadseries')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" id="upload-count-total" name="file-count-total" value="1">
    <div id="page-upload-left">
        <h3 class="page-section-header">Thumbnail</h3>
        <div class="thumbnail-image-container">
            <img class="thumbnail-image-priview" id="thumbnail-image" src="" height="200">
            <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail"/>
            <p>Select Image to upload</p>
        </div>
        <p class="page-section-info">Recommended size is 160px*151px and must less than 500KB. Only JPG format is allowed</p>
    </div>
    <div id="page-upload-right">
        <input type="hidden" value="sugondo" name="author">
        <h3 class="page-section-header">Series Title</h3>
        <input type="text" value="" placeholder="Less Than 50 Character" name="series_title"/>
        <h3 class="page-section-header">Genre</h3>
        <select name="genre">
            <option value="comedy">Comedy</option>
            <option value="romance">Romance</option>
        </select>
        <h3 class="page-section-header">Summary</h3>
        <textarea placeholder="Less Than 500 Character" value="" rows="10" cols="60" name="summary"></textarea>
        <br/>
        <button id="submit-button1" type="submit" value="submit">Test</button>
    </div>
    
</form>
</div>

@endsection