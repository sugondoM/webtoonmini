@extends('guest.layouts.master')


@section('title', 'Donate')


@section('content')
<div id="page-main-wrapper">
    <div id="page-sidegallery-container" class="floating">
        <div class="gallery-button-wrapper">
        <a href="#">
            <div id="button-character" class="gallery-button-container active">
                Character
            </div>
        </a>
        </div>
        
        <div class="gallery-button-wrapper">
         <a>
            <div id="button-sketch"  class="gallery-button-container">
                Sketch
            </div>
        </a>
         </div>
        
        <div class="gallery-button-wrapper">
         <a>
            <div id="button-illustration" class="gallery-button-container">
                Illustration
            </div>
        </a>
        </div>
        
        <div class="gallery-button-wrapper huge-leap">
         <a>
            <div id="button-shop" class="gallery-button-container">
                Shop
            </div>
        </a>
        </div>
    </div>
    <div id="page-itemgallery-container" class="floating">
        <div class="gallery-box-wrapper">
            <div class="gallery-box-container">
            <a>
                <div class="box-thumbnail" id="1"></div>
            </a>
            </div>
            <div class="gallery-box-container">
            <a>
                <div class="box-thumbnail" id="1"></div>
            </a>
            </div>
            <div class="gallery-box-container">
            <a>
                <div class="box-thumbnail" id="1"></div>
            </a>
            </div>
            <div class="gallery-box-container">
            <a>
                <div class="box-thumbnail" id="1"></div>
            </a>
            </div>
        </div>
    </div>
    <div id="page-viewgallery-container" class="floating">
        <div id="prev-gallery">
            <
        </div>
        <div class="image-view">
            
        </div>
        <div id="next-gallery">
            >
        </div>
    </div>
    
</div>
@endsection
