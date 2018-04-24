@extends('admin.layouts.master')
@section('content')
<div id="page-sitemap-wrapper">

</div>
<div id="container">
    <div id="page-content-wrapper">
        <div id="page-list-series">
        @foreach ($series as $serie)
            <div class="box-list-item">
                <div class="top-link">
                <a href="{{url('admin/episode/list/'.$serie->id)}}">
                    <img src="/{{$serie->thumbnail_url}}" alt="" width="138" height="138">
                    <p class="genre">{{ucfirst($serie->category_name)}}</p>
                    
                    <div class="info">
                            <p class="title">{{$serie->series_title}}</p>
                            <p class="author">{{$serie->author}}</p>
                            <p class="status">
                                @if($serie->deleted)
                               		Status: Deleted
                               	@else
                               		Status: Active
                                @endif
                           </p>
                    </div>
                    <p class="grade"></p>
                </a>
                </div>
                <div class="bottom-link">
                    <a href="{{url('admin/series/edit/'.$serie->id)}}" ><div class="width-50 edit">Edit
                    </div>
                    </a>
                    @if($serie->deleted)
                   	<a href="{{url('admin/series/doundelete/'.$serie->id)}}"><div class="width-50 delete">Undelete
                    </div>
                    </a>
                   	@else
                   	<a href="{{url('admin/series/dodelete/'.$serie->id)}}"><div class="width-50 delete">Delete
                    </div>
                    </a>
                    @endif
        			
                </div>
            </div>
           
        @endforeach
        </div>
    </div>
    </div>
@endsection

@section('contentjs')
    
@endsection