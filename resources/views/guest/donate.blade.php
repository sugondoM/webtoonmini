@extends('guest.layouts.master')


@section('title', 'Donate')


@section('content')
<div id="page-main-wrapper" class="theme-bg-color-1">
   	<!-- Jssor Slider Begin -->
   	@include('guest.partials.banner')
   
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
            @foreach($banners as $banner)
            	<div><img data-u="image" src="{{asset($banner->banner_url)}}" /></div>
            @endforeach
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
   	

   
    <!-- Jssor Slider End -->
            

    <div id="page-main-container" >
    <div class="donate-container">
        @php
        	$i = 1;
        	$j = 1;
        @endphp
        @foreach($ads as $ad)
        	@if($i == 1)
        		<div class="banner-link-container">
        	@endif
        		<a href="{{$ad->ads_links}}"><div class="banner-link-item  width-50"><img src="{{asset($ad->ads_landscape_url)}}"/></div></a>
          	@if($i == 2 || count($ads) == $j)
        		</div>
        		 
        	@endif
        	@php
        		$i++;
                $j++;
                if($i>2)$i=1;
            @endphp
        @endforeach
    </div>
    </div>
</div>
@endsection