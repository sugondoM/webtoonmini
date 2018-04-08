@extends('admin.layouts.master')
@section('content')
    <div id="page-content-wrapper" class="no-flow">
        <div id="page-list-series" class="fixed">
            <div id="section-list-left">
                <div class="line-list-add">
                    <a href="{{url('adminupload/'.$series->id)}}">
                        Upload New Episodes
                    </a>
                </div>
                <div id="line-list-container">
                
                @foreach ($episodes as $serie)
                        <div class="line-list-item">
                            <a href="{{url('admineditepisode/'.$serie->series_id."/".$serie->id)}}">
                    
                            <div class="image">
                                <img src="/{{$serie->thumbnail_url}}" height="70" width="70">
                            </div>
                            <div class="title">Ep. {{$serie->episode_number}} - {{$serie->episode_title}}</div>
                            </a>
                            <div class="button-container">
                                <a href="{{url('admineditepisode/'.$serie->id."/".$serie->id)}}" ><div class="edit">Edit
                                </div></a>
                                <a href="{{url('admineditepisode/'.$serie->id."/".$serie->id)}}"><div class="delete">Delete
                                </div></a>
                            </div>
                        </div>
                    
                    
                @endforeach
                </div>
            </div>
            <div id="section-list-right">
                 <div class="series-description">
                    <h3>{{$series->series_title}}</h3>
                    <p>{{$series->author}}</p>
                    <p>{{$series->summary}}</p>
                    <img src="/{{$series->thumbnail_url}}"/>
                </div>
            </div>
        </div>
        
     
    </div>
@endsection

@section('contentjs')
    
@endsection
