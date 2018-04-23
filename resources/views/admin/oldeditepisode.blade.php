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
<form action="{{url('/admin/episode/edit')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put')}}
    <input type="hidden" name="series_id" value="{{$episodes->series_id}}">
    <input type="hidden" id="upload-count-total" name="file_count_total" value="1">
    <div id="page-upload-left">
        <h3 class="page-section-header">Thumbnail</h3>
        <div class="thumbnail-image-container">
            <img class="thumbnail-image-priview" id="thumbnail-image" src="/{{$episodes->thumbnail_url}}" height="200" width="200">
           
            <p></p>
        </div>
        <input class="thumbnail-image-button" id="thumbnail-file"  type="file" name="thumbnail">
        <p class="page-section-info">Recommended size is 160px*151px and must less than 500KB. Only JPG format is allowed</p>
    </div>
    <div id="page-upload-right">
        <h3 class="page-section-header">Episode Title</h3>
        <input type="text" value="{{$episodes->episode_title}}" placeholder="Less Than 50 Character" name="episode_title"/>
        <div id="upload-box">
            <div id="upload-basket">
                <div class="upload-item"  id="upload-item-1">
                    <div class="upload-cancel-button" id="upload-cancel-1">x</div>                
                    <div class="upload-image-container" id="upload-priview-1">
                        <img class="upload-image-priview" id="upload-image-1" height="200">

                    </div>
                    <input class="upload-image-button" id="upload-file-1" type="file" name="photo[]">
                    <div class="upload-number-container">
                        <label>Page</label>
                        <input class="upload-page-number" id="upload-number-1" type="text" name="pageNumber[]" value="1">
                    </div>
                </div>
            {{--
            @foreach ($pages as $page)
            <div class="upload-item"  id="upload-item-{{$page->page_number}}">
                <div class="upload-cancel-button" id="upload-cancel-{{$page->page_number}}">x</div>                
                <div class="upload-image-container" id="upload-priview-{{$page->page_number}}">
                    <img class="upload-image-priview" id="upload-image-{{$page->page_number}}" src="/{{$page->file_url}}" height="200">
                    
                </div>
                <input class="upload-image-button" id="upload-file-{{$page->page_number}}" type="file" name="photo[]">
                <div class="upload-number-container">
                    <label>Page</label>
                    <input class="upload-page-number" id="upload-number-{{$page->page_number}}" type="text" name="pageNumber[]" value="{{$page->page_number}}">
                </div>
            </div>
            @endforeach
            --}}

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

@section('contentjs')
    
@endsection