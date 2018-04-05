@extends('admin.layouts.master')
@section('content')
    <div id="page-content-wrapper">
        <div id="page-list-series">
        @foreach ($series as $serie)
            @for ($i=0;$i<20;$i++)
            <div class="box-list-item">
                <div class="top-link">
                <a href="{{url('adminlist/'.$serie->id)}}">
                    <img src="{{$serie->thumbnail_url}}" alt="" width="138" height="138">
                    <p class="genre">Slice of life</p>
                    <div class="info">
                            <p class="title">{{$serie->series_title}}</p>
                            <p class="author">{{$serie->author}}</p>
                    </div>
                    <p class="grade"><span class="like">like</span><em class="grade-num">6M</em></p>
                </a>
                </div>
                <div class="bottom-link">
                    <a href="{{url('admineditseries/'.$serie->id)}}" ><div class="width-50 edit">Edit
                    </div>
                    </a>
                    <a href="{{url('admineditseries/'.$serie->id)}}"><div class="width-50 delete">Delete
                    </div>
                    </a>
                </div>
            </div>
            @endfor
        @endforeach
        </div>
    </div>
@endsection

@section('contentjs')
    
@endsection