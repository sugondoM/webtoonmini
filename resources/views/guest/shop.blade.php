@extends('guest.layouts.master')

@section('title', 'Shop')

@section('content')
<div id="page-main-wrapper" class="theme-main-wrapper">
	<div id="page-main-container" class="theme-bg-color-1">
		 <div class="shop-container" class="theme-bg-color-1">
		 	@php
		 		$i = 0;
		 	@endphp
		 	@foreach($items as $item)
                    <div class="shop-item-wrapper">
                    
                    <div class="right-shop">
    		 			<div class="shop-picture">
    		 				<img src="/{{$item->item_url}}">
    		 			</div>
    			 	</div>
    			 	<div class="left-shop">
    			 		<h2>Item Description</h2>
    			 		@if($item->item_name!=null)
    			 			<p>Item : {{$item->item_name}}</p>
    			 		@endif
    			 		@if($item->illustrator!=null)
    			 			<p>Illustrator : {{$item->illustrator}}</p>
    			 		@endif
    			 		@if($item->series_name!=null)
    			 			<p>Series : {{$item->series_name}}</p>
    			 		@endif
    			 		@if($item->price!=null)
    			 			<p>Price : {{$item->price}}</p>
    			 		@endif
    			 		
    			 	</div>
    			 	</div>
                    @if($i < count($items)-1)
                    	<div class="separator theme-separator"></div>
                    @endif 
                    	
                    @php 
                    	$i++
                    @endphp
                  
            @endforeach
            </div>
		 	@if($page['total_paging']>1)
    			
        	 <div class="theme-bg-color-1">
        	 	<div class="page-paging-container theme-bg-color-1 theme-paging">
        	 		
        			@php
        				$page_prev = $page['current_paging']-1;
        				$page_next = $page['current_paging']+1;
        			@endphp
        			@if($page_prev > 0)
        			<a href="/shop/{{$page_prev}}" class="prev">
        			<div >
        				< prev
        			</div>
        			</a>
        			@endif
        			@for($i=0;$i<$page['iteration'];$i++)
        				<a href="/shop/{{$page['start_paging']+$i}}" @if($page['start_paging']+$i == $page['current_paging']) class="active" @endif>
        				<div class="page-paging-number-container">
        					{{$page['start_paging']+$i}}
        				</div>
        				</a>
        			@endfor
        			@if($page_next < $page['total_paging'])
        			<a href="/shop/{{$page_next}}" class="next">
        			<div>
        				next >
        			</div>
        			</a>
        			@endif
        		</div>
        	 </div>
       	@endif
	
	</div>
	</div>
@endsection
