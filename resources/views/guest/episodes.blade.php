@extends('guest.layouts.master')


@section('title', 'Donate')


@section('content')
<div id="page-main-wrapper">
    <div id="page-mini-header">
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
    <div id="page-thumbnail-container">
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
        <div style="height: 200px;"></div>
    </div>
</div>
@endsection



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
