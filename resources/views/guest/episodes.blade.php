@extends('guest.layouts.master')


@section('title', 'Donate')


@section('content')
<div id="page-main-wrapper">
    <div id="page-mini-header">
        <span>{{$episodes->episode_title}}</span>       
    </div>
    <div id="page-main-container" class="drop-shadow">
        <div class="pages-wrapper">
        @foreach($pages as $page)
            <div  id="pages-container-{{$page->page_number}}" class="pages-container">
                <img src="/{{$page->file_url}}" />
            </div>
        @endforeach
        </div>
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
