@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">
<div id="page-content-wrapper">
	<h2 class="page-gallery-header">Ep.{{$episodes->episode_number}} {{$episodes->episode_title}}</h2>
    <div class="gallery-holder 2">
    @if(!empty($episodesPages))
    
    @foreach($episodesPages as $page)
    		<div class="item-wrapper">
            <div class="item">
                <p class="name"><br/></p>
                <img src="{{asset($page->file_url)}}"/>
	        </div>
            <div class="item-detail">
            <p class="url">Page Number: {{$page->page_number}}</p>
            </div>
            <div class="bottom-link">
                <a href="{{url('admin/page/edit/'.$page->episode_id.'/'.$page->page_number)}}" ><div class="width-50 edit">Edit
                </div>
                </a>
               	<a href="{{url('admin/page/dodelete/'.$page->episode_id.'/'.$page->page_number)}}"><div class="width-50 delete">Delete
                </div>
                </a>
            </div>
            </div>
            
         
    @endforeach
       
    </div>
    @endif
    
</div>
</div>

@endsection

@section('contentjs')
    
@endsection