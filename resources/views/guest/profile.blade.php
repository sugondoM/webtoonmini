@extends('guest.layouts.master')


@section('title', 'Profile')


@section('content')
<div id="page-main-wrapper" class="theme-main-wrapper">
	<div id="page-main-container" class="theme-bg-color-1">
		 <div class="profile-container" class="theme-bg-color-1">
		 	<div class="top-profile">
		 		
		 	</div>
		 	<div class="middle-profile">
		 	
		 		<div class="right-profile">
		 			<div class="profile-picture">
		 				<img src="{{asset($profile->avatar_url)}}">
		 			</div>
			 	</div>
			 	<div class="left-profile">
			 		<h2>Biodata</h2>
			 		@if($profile->nickname!=null)
			 			<p>NickName : {{$profile->nickname}}</p>
			 		@else
			 			<p>NickName : {{$profile->username}}</p>
			 		@endif
			 		@if($profile->email!=null)
			 			<p>Email : {{$profile->email}}</p>
			 		@endif
			 		<div class="socmed-icon-container">
			 			@if($profile->facebook_url!=null)
    			 			<a href="{{$profile->facebook_url}}"><div class="fa fa-facebook"></div></a>
    			 		@endif
    			 		@if($profile->twitter_url!=null)
    			 			<a href="{{$profile->twitter_url}}"><div class="fa fa-twitter"></div></a>
    			 		@endif
    			 		@if($profile->ig_url!=null)
    			 			<a href="{{$profile->ig_url}}"><div class="fa fa-instagram"></div></a>
    			 		@endif
    			 		@if($profile->google_url!=null)
    			 			<a href="{{$profile->google_url}}"><div class="fa fa-google"></div></a>
    			 		@endif
			 		</div>
			 	</div>
		 	</div>
		 	<div class="low-profile">
		 		<h2>About</h2>
		 		@php
		 			echo html_entity_decode($profile->about, ENT_QUOTES);
		 		@endphp
		 	</div>
		 </div>
	</div>
@endsection

@section('contentjs')
	<script>
        $( document ).ready(function() {
           
        });

		
	</script>
@endsection
