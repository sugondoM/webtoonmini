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
  @if($page['total_paging']>1)
    			
    	 <div class="theme-bg-color-1">
    	 	<div class="page-paging-container theme-bg-color-1 theme-paging">
    	 		
    			@php
    				$page_prev = $page['current_paging']-1;
    				$page_next = $page['current_paging']+1;
    			@endphp
    			@if($page_prev > 0)
    			<a href="/admin/gallery/{{$page_prev}}" class="prev">
    			<div >
    				< prev
    			</div>
    			</a>
    			@endif
    			@for($i=0;$i<$page['iteration'];$i++)
    				<a href="/admin/gallery/{{$page['start_paging']+$i}}" @if($page['start_paging']+$i == $page['current_paging']) class="active" @endif>
    				<div class="page-paging-number-container">
    					{{$page['start_paging']+$i}}
    				</div>
    				</a>
    			@endfor
    			@if($page_next < $page['total_paging'])
    			<a href="/admin/gallery/{{$page_next}}" class="next">
    			<div>
    				next >
    			</div>
    			</a>
    			@endif
    		</div>
    	 </div>
   	@endif

@endsection

@section('contentjs')
    
@endsection