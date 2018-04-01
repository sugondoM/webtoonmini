@extends('admin.layouts.master')
@section('content')
    <div id="page-list-series">
    @foreach ($series as $serie)
    <div class="list-series-item">
        <div class="list-series-image">
            <img src="{{$serie->thumbnail_url}}" height="40" width="40">
        </div>
        <div class="list-series-title">{{$serie->series_title}}</div>
    </div>
    
    @endforeach
    </div>
@endsection

