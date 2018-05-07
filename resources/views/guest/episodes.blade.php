@extends('guest.layouts.master')


@section('title', 'Episode')


@section('content')
<div id="page-main-wrapper" class="theme-main-wrapper">
    <div id="page-mini-header" class="theme-topbar">
        <div id="left-episode"><a href="{{url('/series/'.str_replace(' ', '_', $series->series_title))}}">< <span class="epSerTitle">{{$series->series_title}}</span></a></div> 
        <div id="center-episode"> Episode {{$episodes->episode_number}} {{$episodes->episode_title}}</div>
    </div>
    <div id="page-main-container" class="drop-shadow theme-bg-light">
        <div class="pages-wrapper">
        @foreach($pages as $page)
            <div  id="pages-container-{{$page->page_number}}" class="pages-container">
                <img src="{{asset($page->file_url)}}" />
            </div>
        @endforeach
        </div>
        <div class="donate-container theme-bg-light" >
           
            @if($ads!=null)
            	 @php
                	$i = 1;
                	$j = 1;
                @endphp
                @foreach($ads as $ad)
                	@if(count($ads) == $j && $j%2!=0)
                		<div class="banner-link-container">
                    		<a href="{{$ad->ads_links}}"><div class="banner-link-item  width-70"><div class="image" style="background-image:url('{{asset($ad->ads_landscape_url)}}');"></div></div></a>
                    	</div>
                    @else
                	@if($i == 1)
                		<div class="banner-link-container">
                	@endif
                		<a href="{{$ad->ads_links}}"><div class="banner-link-item  width-50"><div class="image" style="background-image:url('{{asset($ad->ads_landscape_url)}}');"></div></div></a>
                  	@if($i == 2 || count($ads) == $j)
                		</div>
                		 
                	@endif
                	@endif
                	@php
                		$i++;
                        $j++;
                        if($i>2)$i=1;
                    @endphp
                @endforeach
            	
            @endif
        </div>
        <div class="navigate-container theme-bg-light">
        	
			@php
				$page_prev = $episodes->episode_number-1;
				$page_next = $episodes->episode_number+1;
			@endphp
			<div class="theme-button">
			<a  href="{{url('/episode/'.str_replace(' ', '_', $series->series_title).'/'.$page_prev)}}">
        	<div class="prev-episode">
        		Prev Episode
        	</div>
        	</a>
        	</div>
        	<div class="theme-button">
			
        	<a href="{{url('/episode/'.str_replace(' ', '_', $series->series_title).'/'.$page_next)}}">
        	<div class="next-episode">
        		Next Episode
        	</div>
        	</a>
        	</div>
        </div>
        <div id="disqus_thread"></div>
    </div>
    <div class="go_top" id="topBtn" >
    	<i class="arrow top"></i>
		<p>Go Top</p>
	</div>
    <div id="page-thumbnail-episode-container" class="hidden theme-bg-light">
    	
    	<div class="page-thumbnail-wrapper">
    	<div class="thumb-border theme-bg-color-header"></div>
    	<div class="thumb-filler"></div>
        @foreach($allEpisodes as $episodeItem)
            <div class="thumb-container">
            	<a class="black" href="{{url('/episode/'.str_replace(' ', '_', $series->series_title).'/'.$episodeItem->episode_number)}}">
                <div class="thumb-image">
                    <img src="{{asset($episodeItem->thumbnail_url)}}" />
                </div>
                <span >
                   ep. {{$episodeItem->episode_number}}
                </span>
                </a>
            </div>
        @endforeach
        <div class="thumb-filler-2"></div>
        <div class="thumb-border-2 theme-bg-color-header"></div>
        </div>
        <div class="page-thumbnail-episode-fold theme-bg-color-header ">
    		<i class="arrow right"></i>
    	</div>
        
    </div>
    
    <div id="page-thumbnail-container" class="theme-bg-light hidden">
    	<div class="page-thumbnail-fold theme-bg-color-header ">
    		<i class="arrow left"></i>
    	</div>
    	<div class="page-thumbnail-wrapper">
    	<div class="thumb-border theme-bg-color-header"></div>
    	<div class="thumb-filler"></div>
        @foreach($pages as $page)
            <div class="thumb-container" id="thumb-item-{{$page->page_number}}">
                <div class="thumb-image">
                    <img src="{{asset($page->file_url)}}" />
                </div>
                <span>
                   page {{$page->page_number}}
                </span>
            </div>
        @endforeach
        <div class="thumb-filler-2"></div>
        <div class="thumb-border-2 theme-bg-color-header"></div>
        </div>
        
        
    </div>

@endsection

@section('contentjs')
<script>
		$(document).ready(function () {
		   $(".page-thumbnail-fold").click(function(){
                if($("#page-thumbnail-container").hasClass("hidden")){
					$("#page-thumbnail-container").removeClass("hidden");
                }else{
					$("#page-thumbnail-container").addClass("hidden");
                    
                }
           });

		   $(".page-thumbnail-episode-fold").click(function(){
               if($("#page-thumbnail-episode-container").hasClass("hidden")){
					$("#page-thumbnail-episode-container").removeClass("hidden");
               }else{
					$("#page-thumbnail-episode-container").addClass("hidden");
                   
               }
          });

		   
        });
	
</script>

<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://localhost-ebn011krih.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>

<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script id="dsq-count-scr" src="//localhost-ebn011krih.disqus.com/count.js" async></script>
@endsection

