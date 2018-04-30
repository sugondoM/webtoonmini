@extends('guest.layouts.master')


@section('title', 'Episode')


@section('content')
<div id="page-main-wrapper" class="theme-main-wrapper">
    <div id="page-mini-header" class="theme-topbar">
        <div id="left-episode">{{$episodes->episode_title}}</div> 
        <div id="center-episode"> Episode {{$episodes->episode_number}} </div>
    </div>
    <div id="page-main-container" class="drop-shadow">
        <div class="pages-wrapper">
        @foreach($pages as $page)
            <div  id="pages-container-{{$page->page_number}}" class="pages-container">
                <img src="/{{$page->file_url}}" />
            </div>
        @endforeach
        </div>
        <div id="disqus_thread"></div>
    </div>
    <div id="page-thumbnail-container" class="theme-bg-light hidden">
    	<div class="page-thumbnail-fold theme-bg-color-header ">
    		<i class="arrow left"></i>
    	</div>
    	<div class="page-thumbnail-wrapper">
    	<div class="thumb-filler theme-bg-color-header"></div>
        @foreach($pages as $page)
            <div class="thumb-container" id="thumb-item-{{$page->page_number}}">
                <div class="thumb-image">
                    <img src="/{{$page->file_url}}" />
                </div>
                <span>
                    {{$page->page_number}}
                </span>
            </div>
        @endforeach
        <div class="thumb-filler-2 theme-bg-color-header"></div>
        </div>
        
        
    </div>

@endsection

@section('contentjs')
<script>
		$(document).ready(function () {
			console.log("cumi-cumi  ass");
           $(".page-thumbnail-fold").click(function(){
               console.log("cumi-cumi");
                if($("#page-thumbnail-container").hasClass("hidden")){
					$("#page-thumbnail-container").removeClass("hidden");
                }else{
					$("#page-thumbnail-container").addClass("hidden");
                    
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

