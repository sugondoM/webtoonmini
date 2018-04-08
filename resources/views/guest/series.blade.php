@extends('guest.layouts.master')


@section('title', 'Donate')


@section('content')
<div id="page-main-wrapper">
    <div id="banner">
        <span>{{$series->series_title}}</span>       
    </div>
    <div id="page-main-container" class="dark-background">
        <div class="episode-wrapper">
        @foreach($episodes as $episode)
            {{--@for($i=0; $i<20; $i++)--}}
            <a href="/webtoon/episode/{{$episode->id}}">
                <div class="episode-container">
                    <div class="episode-left-container">
                        <span class="episode-name">Episode {{$episode->episode_number}}</span>
                        <span class="episode-name">Episode {{$episode->episode_title}}</span>
                    </div>
                    <div class="episode-right-container">
                        <img src="/{{$episode->thumbnail_url}}"/>
                    </div>
                </div>
            </a>
            {{--@endfor--}}
        @endforeach
        </div>
    </div>
</div>
@endsection
