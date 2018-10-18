@extends('guest.layouts.master')

@section('title', 'Shop')

@section('content')
<div id="page-main-wrapper" class="theme-main-wrapper">
	<div id="page-main-container" class="theme-bg-color-1">
		 <div class="shop-container" class="theme-bg-color-1">
		 	@php
		 		$i = 0;
		 	@endphp
		 	@foreach($items as $item)
                    <div class="shop-item-wrapper">
                    
                    <div class="right-shop">
    		 			<div class="shop-picture">
    		 				<img src="{{asset($item->item_url)}}">
    		 			</div>
    			 	</div>
    			 	<div class="left-shop">
    			 		<h2 id="item_{{$item->id}}">{{$item->item_name}}</h2>
    			 		@if($item->illustrator!=null)
    			 			<p>Illustrator : {{$item->illustrator}}</p>
    			 		@endif
    			 		@if($item->series_name!=null)
    			 			<p>Series : {{$item->series_name}}</p>
    			 		@endif
    			 		@if($item->price!=null)
    			 			<p id="item_price_{{$item->id}}">Price :@if($item->currency==2){{number_format($item->price,2,",",".")}} USD @else{{number_format($item->price,0,",",".")}} IDR @endif
    			 			</p>
    			 		@endif
    			 		<div id="add_{{$item->id}}" class="add_list theme-button" ><a><div class="default">Add To List</div></a></div>
    			 	</div>
    			 	</div>
                    @if($i < count($items)-1)
                    	<div class="separator theme-separator"></div>
                    @endif 
                    	
                    @php 
                    	$i++
                    @endphp
                  
            @endforeach
            </div>
            
            <div id="form-holder" class="theme-bg-light">
            
            	 <form enctype="multipart/form-data" method="POST" id="form-mail" action="{{url('order/doSend')}}">
            	 		{{ csrf_field() }}
                        <p class="form-header">How To Buy: </p>
                        <p class="form-info">Select the item you want or type on the message section below about your more detailed request. We currently only accept paypal. Please fill all the form bellow and we will send the invoice through your paypal's mail.</p>
                        <p class="form-notes">Note: The shipping cost is not included please add it on message section below</p>
                        <p>
                            <label for="form_name">Name</label>
                            <br/>
                            <input name="form_name" id="form_name" class="input" type="text" value="" required autofocus >
                        </p>
                        <p>
                            <label for="form_email">PayPal's Email</label>
                            <br/>
                            <input type="email" name="form_email" id="form_email" class="input" value="">
                        </p>
                        <p>
                            <label for="form_airemail">Airmail / EMS</label>
                            <br/>
                            <input type="text" name="form_airemail" id="form_airmail" class="input" value="">
                        </p>
                        <p>
                            <label for="form_address">Address</label>
                            <br/>
                            <textarea id="form_addres" name="form_address" class="input-big" required></textarea>
                        </p>
                        <p>
                            <label for="form_msg">Message</label>
                            <br/>
                            <textarea id="ta_list" name="form_msg" class="input-big" required></textarea>
                        </p>
                    <input type="submit" name="submit" id="submit" class="input" value="Submit">
                </form>
            	
            </div>
		 	@if($page['total_paging']>1)
    			
        	 <div class="theme-bg-color-1">
        	 	<div class="page-paging-container theme-bg-color-1 theme-paging">
        	 		
        			@php
        				$page_prev = $page['current_paging']-1;
        				$page_next = $page['current_paging']+1;
        			@endphp
        			@if($page_prev > 0)
        			<a href="{{url('/shop/'.$page_prev)}}" class="prev">
        			<div>
        				< prev
        			</div>
        			</a>
        			@endif
        			@for($i=0;$i<$page['iteration'];$i++)
        				@php
        					$currentPage = $page['start_paging']+$i;
        				@endphp
        				<a href="{{url('/shop/'.$currentPage)}}" @if($page['start_paging']+$i == $page['current_paging']) class="active" @endif>
        				<div class="page-paging-number-container">
        					{{$page['start_paging']+$i}}
        				</div>
        				</a>
        			@endfor
        			@if($page_next < $page['total_paging'])
        			<a href="{{url('/shop/'.$page_next)}}" class="next">
        			<div>
        				next >
        			</div>
        			</a>
        			@endif
        		</div>
        	 </div>
       	@endif
	
	</div>
	</div>
@endsection

@section('contentjs')
<script type="text/javascript">
	$(document).ready(function () {
		var typingTimer;
		var typingTimerAddress;                //timer identifier
		var doneTypingInterval = 2000;  //time in ms, 5 second for example
		
		$('.add_list').click(function(){
			var currentIdName = this.id;
			var currentIdNumber = this.id.split("_")[1];
			$("#ta_list").val($("#ta_list").val()+$("#item_"+currentIdNumber).text()+", "+$("#item_price_"+currentIdNumber).text()+"\n");
			localStorage['list'] = $("#ta_list").val();
		});

		$("#form_name").on('keyup', function () {
			localStorage['customer_name'] = $("#form_name").val();
		});
		
		$("#form_email").on('keyup', function () {
			localStorage['email'] = $("#form_email").val();
		});
		
		$("#form_airmail").on('keyup', function () {
			localStorage['airmail'] = $("#form_airmail").val();
		});

		$("#ta_list").on('keyup', function () {
		  clearTimeout(typingTimer);
		  typingTimer = setTimeout(doneTypingMessage, doneTypingInterval);
		});

		$("#ta_list").on('keydown', function () {
			  clearTimeout(typingTimer);
		});


		$("#form_address").on('keyup', function () {
		  clearTimeout(typingTimerAddress);
		  typingTimer = setTimeout(doneTypingAddress, doneTypingInterval);
		});

		$("#form_address").on('keydown', function () {
			  clearTimeout(typingTimerAddress);
		});

		//user is "finished typing," do something
		function doneTypingAddress () {
			localStorage['address'] = $("#form_address").val();
		} 
		
		function doneTypingMessage () {
			localStorage['list'] = $("#ta_list").val();
		}

		if(localStorage['customer_name']!=null || localStorage['customer_name']!=""){
			$("#form_name").val(localStorage['customer_name']);
		}

		if(localStorage['email']!=null || localStorage['email']!=""){
			$("#form_email").val(localStorage['email']);
		}

		if(localStorage['airmail']!=null || localStorage['airmail']!=""){
			$("#form_airmail").val(localStorage['airmail']);
		}

		if(localStorage['list']!=null || localStorage['list']!=""){
			$("#ta_list").val(localStorage['list']);
		}
		if(localStorage['address']!=null || localStorage['address']!=""){
			$("#form_address").val(localStorage['address']);
		}

// 		$("#form-mail").submit(function(event){
//             event.preventDefault();
//             $.ajax({
//               type: "POST",
//               url: "{{url('order/doSend')}}",
//               data: $("#form-mail").serialize(),
//               success: function(){
//             	  alert("The buy request has been sent, please wait for the invoice mail");
//               }
//             });
//         });
		  
	});
</script>
@endsection