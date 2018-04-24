@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">
<div id="page-content-wrapper">
	@if(sizeof($character) > 0)
	<h2 class="page-gallery-header">Charater</h2>
	<div class="gallery-holder 1">
	
	@foreach($character as $item)
            <div class="item-wrapper">
            <div class="item">
                <img src="/{{$item->item_url}}"/>
                 
            </div>
            <div class="item-detail">
            <p class="name">Item: {{$item->item_name}}</p>
            <p class="illustrator">Illustrator: {{$item->illustrator}}</p>
            <p class="series">Series: {{$item->series_name}}</p>
            <p class="price">Price: {{$item->price}}</p>
            </div>
            <div class="bottom-link">
                <a href="{{url('admin/gallery/edit/'.$item->id)}}" ><div class="width-50 edit">Edit
                </div>
                </a>
               	<a href="{{url('admin/gallery/dodelete/'.$item->id)}}"><div class="width-50 delete">Delete
                </div>
                </a>
            </div>
            </div>
    @endforeach
       
    </div>
    @endif
    @if(sizeof($skecth) > 0)
    <h2 class="page-gallery-header">Sketch</h2>
    <div class="gallery-holder 2">
    @foreach($skecth as $item)
    		<div class="item-wrapper">
            <div class="item">
                <img src="/{{$item->item_url}}"/>
                 
            </div>
            <div class="item-detail">
            <p class="name">Item: {{$item->item_name}}</p>
            <p class="illustrator">Illustrator: {{$item->illustrator}}</p>
            <p class="series">Series: {{$item->series_name}}</p>
            <p class="price">Price: {{$item->price}}</p>
            </div>
            <div class="bottom-link">
                <a href="{{url('admin/gallery/edit/'.$item->id)}}" ><div class="width-50 edit">Edit
                </div>
                </a>
               	<a href="{{url('admin/gallery/dodelete/'.$item->id)}}"><div class="width-50 delete">Delete
                </div>
                </a>
            </div>
            </div>
    @endforeach
       
    </div>
    @endif
    @if(sizeof($illustration) > 0)
    <h2 class="page-gallery-header">Illustration</h2>
    <div class="gallery-holder 1">
    @foreach($illustration as $item)
            <div class="item-wrapper">
            <div class="item">
                <img src="/{{$item->item_url}}"/>
                 
            </div>
            <div class="item-detail">
            <p class="name">Item: {{$item->item_name}}</p>
            <p class="illustrator">Illustrator: {{$item->illustrator}}</p>
            <p class="series">Series: {{$item->series_name}}</p>
            <p class="price">Price: {{$item->price}}</p>
            </div>
            <div class="bottom-link">
                <a href="{{url('admin/gallery/edit/'.$item->id)}}" ><div class="width-50 edit">Edit
                </div>
                </a>
               	<a href="{{url('admin/gallery/dodelete/'.$item->id)}}"><div class="width-50 delete">Delete
                </div>
                </a>
            </div>
            </div>
    @endforeach
        
    </div>
    @endif
    @if(sizeof($shop) > 0)
    <h2 class="page-gallery-header">Shop</h2>
    <div class="gallery-holder 2">
    @foreach($shop as $item)
            <div class="item-wrapper">
            <div class="item">
                <img src="{{$item->item_url}}"/>
                
            </div>
            <div class="item-detail">
            <p class="name">Item: {{$item->item_name}}</p>
            <p class="illustrator">Illustrator: {{$item->illustrator}}</p>
            <p class="series">Series: {{$item->series_name}}</p>
            <p class="price">Price: {{$item->price}}</p>
            </div>
            <div class="bottom-link">
                <a href="{{url('admin/gallery/edit/'.$item->id)}}" ><div class="width-50 edit">Edit
                </div>
                </a>
               	<a href="{{url('admin/galler/dodelete/'.$item->id)}}"><div class="width-50 delete">Delete
                </div>
                </a>
            </div>
            </div>
          	
    @endforeach
        
    </div>
    @endif
</div>
</div>
@endsection

@section('contentjs')
    
@endsection