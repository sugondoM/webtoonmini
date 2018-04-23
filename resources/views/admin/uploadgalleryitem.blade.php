@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">
<div id="page-content-wrapper">
<form action="{{url('/uploadgalleryItem')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" id="upload-count-total" name="file-count-total" value="1">
    <div id="page-upload-left" class="thumb-big">
        <div id="page-smile-container">
            <h3 class="page-section-header">Gallery Item</h3>
            <div class="thumbnail-image-container big">
                <p class="big">Select Image to upload</p>
                <img class="thumbnail-image-priview big" id="thumbnail-image">
            </div>
            <input class="thumbnail-image-button" id="thumbnail-file" type="file" name="thumbnail"/>
            <p class="page-section-info"></p>
        </div>
    </div>
    <div id="page-upload-right" class="thumb-big">
        <div id="page-smale-container">
            <input type="hidden" value="sugondo" name="author">
            <h3 class="page-section-header">Item Name</h3>
            <input type="text" value="" placeholder="Less Than 50 Character" name="series_title" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Type</h3>
            <div class="custom-select width-500">
            <select name="type" >
                <option value="0">Select Item Type</option>
                <option value="character">Character</option>
                <option value="skectch">Sketch</option>
                <option value="illustration">Illustration</option>
                <option value="shop">Shop</option>
            </select>
            </div>
            <h3 class="page-section-header">Illustrator</h3>
            <input type="text" value="" placeholder="Less Than 50 Character" name="illustrator_name" class="custom-inputtext width-500"/>
            <h3 class="page-section-header">Series Name</h3>
            <input type="text" value="" placeholder="Less Than 50 Character" name="series_name" class="custom-inputtext width-500"/>
            
            <h3 class="page-section-header">Price</h3>
            <input type="text" value="" placeholder="Less Than 50 Character" name="price" class="custom-inputtext width-500"/>
            <br/>
            <button id="submit-button1" type="submit" value="submit" class="custom-button width-500">Upload Item</button>
        </div>
    </div>
    
</form>
</div>
</div>
@endsection

@section('contentjs')
    
@endsection
