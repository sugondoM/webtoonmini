@extends('guest.layouts.master')


@section('title', 'Recommend')

<div id="page-main-wrapper" class="theme-main-wrapper">
@section('content')
	@php 
            $index = 0
    @endphp
    @foreach($series as $serie)
        
        {{-- @for($i=0;$i<5;$i++)--}}
        @if($index % 2 == 0)
            <div class="page-recommend-wrapper theme-bg-color-1">
        		<div class="page-recommend-container page-recommend-container theme-bg-color-2">
        @else
            <div class="page-recommend-wrapper theme-bg-color-2">    
            	<div class="page-recommend-container page-recommend-container theme-bg-color-1">
        @endif
                
                    <a href="/series/{{str_replace(' ', '_', $serie->series_title)}}">
                        <div class="recomend-image" style="background: url('/{{$serie->banner_url}}')">
                        </div>
                        <div class="recommend-detail">
                        	<p class="recommend-title theme-title-sublime">{{$serie->series_title}}</p>
                        	<p class="recommend-subtitle theme-subtitle-sublime">By: {{$serie->author}}</p>
                        </div>
                    </a>
                </div>
            </div>
        @php 
            $index++;
        @endphp
    {{--@endfor--}}
    @endforeach
    
    @while($index<10)
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
    			<a href="/recommend/list/{{$page_prev}}" class="prev">
    			<div >
    				< prev
    			</div>
    			</a>
    			@for($i=0;$i<$page['iteration'];$i++)
    				<a href="/recommend/list/{{$page['start_paging']+$i}}" @if($page['start_paging']+$i == $page['current_paging']) class="active" @endif>
    				<div class="page-paging-number-container">
    					{{$page['start_paging']+$i}}
    				</div>
    				</a>
    			@endfor
    			<a href="/recommend/list/{{$page_next}}" class="next">
    			<div>
    				next >
    			</div>
    			</a>
    		</div>
    	 </div>
   	@endif
</div>
@endsection

                            
