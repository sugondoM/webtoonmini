@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">
<div id="page-content-wrapper">
	
    @if(!empty($ads[0]->ads_name))
    <h2 class="page-gallery-header">Advertising</h2>
    <div class="gallery-holder 2">
    @foreach($ads as $item)
    		<div class="item-wrapper">
            <div class="item">
                <p class="name">Portrait image</p>
                <img src="{{asset($item->ads_portrait_url)}}"/>
	            <p class="name">Landscape image</p>
                <img src="{{asset($item->ads_landscape_url)}}"/>
                 
            </div>
            <div class="item-detail">
            <p class="name">Item: {{$item->ads_name}}</p>
            <p class="url">Page: {{$item->ads_page}}</p>
            <p class="url">URL: {{$item->ads_link}}</p>
            <p class="active">Active: {{$item->ads_active}}</p>
            </div>
            <div class="bottom-link">
                <a href="{{url('admin/ads/edit/'.$item->id)}}" ><div class="width-50 edit">Edit
                </div>
                </a>
               	<a href="{{url('admin/ads/dodelete/'.$item->id)}}"><div class="width-50 delete">Delete
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
    			<a href="{{url('/admin/ads/list/'.$page_prev)}}" class="prev">
    			<div >
    				< prev
    			</div>
    			</a>
    			@endif
    			@for($i=0;$i<$page['iteration'];$i++)
    				@php
    					$currentPage = $page['start_paging']+$i;
    				@endphp
    				<a href="{{url('/admin/ads/list/'.$currentPage)}}" @if($page['start_paging']+$i == $page['current_paging']) class="active" @endif>
    				<div class="page-paging-number-container">
    					{{$page['start_paging']+$i}}
    				</div>
    				</a>
    			@endfor
    			@if($page_next < $page['total_paging'])
    			<a href="{{url('/admin/ads/list/'.$page_next)}}" class="next">
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