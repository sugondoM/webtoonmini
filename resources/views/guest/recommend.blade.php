@extends('guest.layouts.master')


@section('title', 'Featured')

<div id="page-main-wrapper" class="theme-main-wrapper">
@section('content')
	@php 
            $index = 0
    @endphp
    @foreach($banners as $banner)
        
        {{-- @for($i=0;$i<5;$i++)--}}
        @if($index % 2 == 0)
            <div class="page-recommend-wrapper theme-bg-color-1">
        		<div class="page-recommend-container page-recommend-container theme-bg-color-2">
        @else
            <div class="page-recommend-wrapper theme-bg-color-2">    
            	<div class="page-recommend-container page-recommend-container theme-bg-color-1">
        @endif
                
                    <a href="{{url($banner->banner_links)}}">
                        <div class="recomend-image" style="background: url('{{asset($banner->banner_url)}}')">
                        </div>
                        <div class="recommend-detail">
                        	<p class="recommend-title theme-title-sublime">{{$banner->banner_name}}</p>
                        </div>
                    </a>
                </div>
            </div>
        @php 
            $index++;
        @endphp
    {{--@endfor--}}
    @endforeach
    
    @while($index<4)
        @if($index % 2 == 0)
            <div class="page-recommend-wrapper theme-bg-color-1">
            	 <div class="page-recommend-container theme-bg-color-2">
        @else
            <div class="page-recommend-wrapper second-color theme-bg-color-2">  
            	 <div class="page-recommend-container theme-bg-color-1">  
        @endif

               
                  
                </div>
            </div>
        @php 
            $index++;
        @endphp
    @endwhile
    
    @if($page['total_paging']>1)
    			
    @if($index % 2 == 0)
    	 <div class="theme-bg-color-1">
    	 	<div class="page-paging-container theme-bg-color-2 theme-paging">
    	 		
    @else
    	 <div class="theme-bg-color-2">
    	 	<div class="page-paging-container theme-bg-color-1 theme-paging">
    @endif
    		
    			@php
    				$page_prev = $page['current_paging']-1;
    				$page_next = $page['current_paging']+1;
    			@endphp
    			@if($page_prev > 0)
    			<a href="{{url('/recommend/list/'.$page_prev)}}" class="prev">
    			<div >
    				< prev
    			</div>
    			</a>
    			@endif
    			@for($i=0;$i<$page['iteration'];$i++)
    				@php
    					$currentPage = $page['start_paging']+$i;
    				@endphp
    				<a href="{{url('/recommend/list/'.$currentPage)}}" @if($page['start_paging']+$i == $page['current_paging']) class="active" @endif>
    				<div class="page-paging-number-container">
    					{{$page['start_paging']+$i}}
    				</div>
    				</a>
    			@endfor
    			<a href="{{url('/recommend/list/'.$page_next)}}" class="next">
    			<div>
    				next >
    			</div>
    			</a>
    		</div>
    	 </div>
   	@endif
</div>
@endsection

                            
