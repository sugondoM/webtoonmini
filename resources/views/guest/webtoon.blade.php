@extends('guest.layouts.master')


@section('title', 'Webtoon')

<div id="page-main-wrapper">
@section('content')
    @foreach($series as $serie)
        @php 
            $index = 0
        @endphp
        {{-- @for($i=0;$i<5;$i++)--}}
        @if($index % 2 == 0)
            <div id="page-recommend-wrapper" class="first-color">
        @else
            <div id="page-recommend-wrapper" class="second-color">    
        @endif

                <div class="recommend-container">
                    <a href="/webtoon/series/{{$serie->id}}">
                        <div class="recomend-image">
                            <img src="/{{$serie->thumbnail_url}}"/>
                        </div>
                    </a>
                </div>
            </div>
        @php 
            $index++;
        @endphp
    {{--@endfor--}}
    @endforeach
</div>
@endsection
