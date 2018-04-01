@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">
    <div id="page-sitemap-container" class="i2">
    <div class="sitemap-item"><div class="sitemap-bullet">1</div><div class="sitemap-desc">Series</div></div>
    <div class="sitemap-separator">/</div>
    <div class="sitemap-item"><div class="sitemap-bullet active">2</div><div class="sitemap-desc">Episodes</div></div>
    </div>
</div>
<div id="page-content-wrapper">
<form action="{{url('/uploadfile')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="series_id" value="{{$series_id}}">
    <input type="hidden" id="upload-count-total" name="file_count_total" value="1">
    <div id="page-upload-left">
        <h3 class="page-section-header">Thumbnail</h3>
        <div class="thumbnail-image-container">
            <img class="thumbnail-image-priview" id="thumbnail-image" src="" height="200">
            <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail">
            <p>Select Image to upload</p>
        </div>
        <p class="page-section-info">Recommended size is 160px*151px and must less than 500KB. Only JPG format is allowed</p>
    </div>
    <div id="page-upload-right">
        <h3 class="page-section-header">Episode Title</h3>
        <input type="text" value="" placeholder="Less Than 50 Character" name="episode_title"/>
        <div id="upload-box">
            <div id="upload-basket">
            <div class="upload-item">
                <div class="upload-cancel-button" id="upload-cancel-1"></div>                
                <div class="upload-image-container">
                    <img class="upload-image-priview" id="upload-image-1"  src="" height="200">
                    <input class="upload-image-button" id="upload-file-1" type="file" name="photo[]">
                </div>
                <div class="upload-number-container">
                    <label>Page</label>
                    <input class="upload-page-number" id="upload-number-1" type="text" name="pageNumber[]" value="1">
                </div>
            </div>

            </div>
             <div id="add-new-file"></div>
         </div>
         <div id="upload-finalize">
            Upload
            
        </div>
        <button id="submit-button" type="submit" value="submit">Test</button>
    </div>
    
</form>
</div>
@endsection
