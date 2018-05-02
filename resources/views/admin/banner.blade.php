@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">
<div id="page-content-wrapper">
	 @if(!empty($banner[0]->banner_name)))
	<h2 class="page-gallery-header">Banner</h2>
	<div class="gallery-holder 1">
	
	@foreach($banner as $item)
            <div class="item-wrapper">
            <div class="item">
                <img src="{{asset($item->banner_url)}}"/>
                 
            </div>
            <div class="item-detail">
            <p class="name">Item: {{$item->banner_name}}</p>
            <p class="url">URL: {{$item->banner_links}}</p>
            <p class="page">Page: {{$item->banner_page}}</p>
            </div>
            <div class="bottom-link">
                <a href="{{url('admin/banner/edit/'.$item->id)}}" ><div class="width-50 edit">Edit
                </div>
                </a>
               	<a href="{{url('admin/banner/dodelete/'.$item->id)}}"><div class="width-50 delete">Delete
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
    			<a href="{{url('/admin/banner/list/'.$page_prev)}}" class="prev">
    			<div >
    				< prev
    			</div>
    			</a>
    			@endif
    			@for($i=0;$i<$page['iteration'];$i++)
    				@php
    					$currentPage = $page['start_paging']+$i;
    				@endphp
    				<a href="{{url('/admin/banner/list/'.$currentPage)}}" @if($page['start_paging']+$i == $page['current_paging']) class="active" @endif>
    				<div class="page-paging-number-container">
    					{{$page['start_paging']+$i}}
    				</div>
    				</a>
    			@endfor
    			@if($page_next < $page['total_paging'])
    			<a href="{{url('/admin/banner/list/'.$page_next)}}" class="next">
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