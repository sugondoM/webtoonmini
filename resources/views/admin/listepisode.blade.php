@extends('admin.layouts.master')
@section('content')
    <div id="page-content-wrapper" class="no-flow">
        <div id="page-list-series" class="fixed">
            <div id="section-list-left">
                <div class="line-list-add">
                    <a href="{{url('admin/episode/add/'.$series->id)}}">
                        Upload New Episodes
                    </a>
                </div>
                <div id="line-list-container">
                
                @foreach ($episodes as $episode)
                        <div class="line-list-item">
                            <a href="{{url('admin/episode/edit/'.$episode->id)}}">
                    
                            <div class="image">
                                <img src="{{asset($episode->thumbnail_url)}}" height="70" width="70">
                            </div>
                            <div class="title">Ep. {{$episode->episode_number}} - {{$episode->episode_title}}</div>
                            </a>
                            <div class="button-container">
                                <a href="{{url('admin/episode/edit/'.$episode->id)}}" ><div class="edit">Edit
                                </div></a>
                                <a href="{{url('admin/episode/dodelete/'.$episode->id)}}"><div class="delete">Delete
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
                    <img src="{{asset($series->thumbnail_url)}}"/>
                </div>
            </div>
        </div>
            </div>
        
      @if($page['total_paging']>1)
    			
                	 <div class="theme-bg-color-1">
                	 	<div class="page-paging-container theme-bg-color-1 theme-paging">
                	 		
                			@php
                				$page_prev = $page['current_paging']-1;
                				$page_next = $page['current_paging']+1;
                			@endphp
                			@if($page_prev > 0)
                			<a href="{{url('/admin/episode/list/'.$series->id.'/'.$page_prev)}}" class="prev">
                			<div >
                				< prev
                			</div>
                			</a>
                			@endif
                			
                			@for($i=0;$i<$page['iteration'];$i++)
                				@php
                					$currentPage = $page['start_paging']+$i;
                				@endphp
                				<a href="{{url('/admin/episode/list/'.$series->id.'/'.$currentPage)}}" @if($page['start_paging']+$i == $page['current_paging']) class="active" @endif>
                				<div class="page-paging-number-container">
                					{{$page['start_paging']+$i}}
                				</div>
                				</a>
                			@endfor
                			@if($page_next < $page['total_paging'])
                			<a href="{{url('/admin/episode/list/'.$series->id.'/'.$page_next)}}" class="next">
                			<div>
                				next >
                			</div>
                			</a>
                			@endif
                		</div>
                	 </div>
               	@endif
    
@endsection

@section('contentjs')
    
@endsection
