@extends('guest.layouts.master')


@section('title', 'Gallery')


@section('content')
<div id="page-main-wrapper">
    <div id="page-sidegallery-container" class="floating theme-bg-color-2">
        <div class="gallery-button-wrapper theme-border   @if(Request::path() == 'gallery/character') active @endif">
        <a href="/gallery/character">
            <div id="button-character" class="gallery-button-container">
                Character
            </div>
        </a>
        </div>
        
        <div class="gallery-button-wrapper theme-border  @if(Request::path() == 'gallery/sketch') active @endif">
         <a href="/gallery/sketch">
            <div id="button-sketch"  class="gallery-button-container">
                Sketch
            </div>
        </a>
         </div>
        
        <div class="gallery-button-wrapper theme-border  @if(Request::path() == 'gallery/illustration') active @endif">
         <a href="/gallery/illustration">
            <div id="button-illustration" class="gallery-button-container">
                Illustration
            </div>
        </a>
        </div>
        
        <div class="gallery-button-wrapper huge-leap theme-border  @if(Request::path() == 'gallery/shop') active @endif">
         <a href="/gallery/shop">
            <div id="button-shop" class="gallery-button-container">
                Shop
            </div>
        </a>
        </div>
    </div>
    <div id="page-itemgallery-container" class="floating ">
        <div class="gallery-box-wrapper">
        	@foreach($items as $item)
            <div class="gallery-box-container">
            <a>
                <div class="box-thumbnail" id="{{$item->id}}"><img src="/{{$item->item_url}}" height="120"></div>
            </a>
            </div>
            @endforeach
        </div>
        
        @if($page['total_paging']>1)
    			
        	 <div class="theme-bg-light">
        	 	<div class="page-paging-container theme-bg-light theme-paging">
        	 		
        			@php
        				$page_prev = $page['current_paging']-1;
        				$page_next = $page['current_paging']+1;
        			@endphp
        			@if($page_prev > 0)
        			<a href="/gallery/{{$pageName}}/{{$page_prev}}" class="prev">
        			<div >
        				< prev
        			</div>
        			</a>
        			@endif
        			@for($i=0;$i<$page['iteration'];$i++)
        				<a href="/gallery/{{$pageName}}/{{$page['start_paging']+$i}}" @if($page['start_paging']+$i == $page['current_paging']) class="active" @endif>
        				<div class="page-paging-number-container">
        					{{$page['start_paging']+$i}}
        				</div>
        				</a>
        			@endfor
        			@if($page_next < $page['total_paging'])
        			<a href="/gallery/{{$pageName}}/{{$page_next}}" class="next">
        			<div>
        				next >
        			</div>
        			</a>
        			@endif
        		</div>
        	 </div>
       	@endif
    </div>
    <div id="page-viewgallery-container" class="floating theme-bg-color-1">
        
        <div id="image-view" style="background: url('/@if(!empty($items[0]->item_url)){{$items[0]->item_url}}@endif');">
            
        </div>
        <div id="description">
            
        </div>
    </div>
    
</div>
@endsection

@section('contentjs')
	<script>
        $(document).ready(function () {
        	$(".box-thumbnail").click(function(){

            	console.log("test");
        		url = $(this).find('img').attr('src');
        		console.log(url);
        		$('#image-view').css('background',"url('"+url+"')");
            });
        });
	</script>
@endsection
