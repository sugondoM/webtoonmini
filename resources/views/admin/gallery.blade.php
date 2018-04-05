@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">
    <div id="page-sitemap-container" class="i2">
    <div class="sitemap-item"><div class="sitemap-desc">Update Profile</div></div>
    </div>
</div>
<div id="page-content-wrapper">
    @foreach($items as $item)
    <div id="gallery-character">
        @if($item->type == "character")
            <div id="item">
                <img src="{{$item->file_url}}"/>
                <p class="name">{{$item->item_name}}</p>
            </div>
        @endif
        <a href="">
            <div class="add-gallery-item"></div>
        </a>
        
    </div>
    <div id="gallery-skecth">
        @if($item->type == "sketch")
            <div id="item">
                <img src="{{$item->file_url}}"/>
                <p class="name">{{$item->item_name}}</p>
            </div>
        @endif
        <a href="">
            <div class="add-gallery-item"></div>
        </a>
    </div>
    <div id="gallery-illustration">
        @if($item->type == "illustration")
            <div id="item">
                <img src="{{$item->file_url}}"/>
                <p class="name">{{$item->item_name}}</p>
            </div>
        @endif
        <a href="">
            <div class="add-gallery-item"></div>
        </a>
    </div>
    <div id="gallery-shop">
        @if($item->type == "shop")
            <div id="item">
                <img src="{{$item->file_url}}"/>
                <p class="name">{{$item->item_name}}</p>
            </div>
        @endif
        <a href="">
            <div class="add-gallery-item"></div>
        </a>
    </div>
    @endforeach
</div>
@endsection

@section('contentjs')
    
@endsection