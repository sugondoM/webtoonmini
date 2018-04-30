<div id="main-topbar-container">
    <div class="burger-menu">Menu</div>      
    <div class="header no-shadow">
        <a href = "{{url('/admin/profile/edit/1')}}" class="menu-button @if(Request::is('admin/profile/*')) active @endif">
        	Profile
        </a>
        <a href = "{{url('/admin/series/list')}}" class="menu-button @if(Request::is('admin/series')||Request::is('admin')||Request::is('admin/series/*')||Request::is('admin/episode/*')) active @endif"> 
        	Series
        </a>
        <a href = "{{url('/admin/gallery/list')}}" class="menu-button  @if(Request::is('admin/gallery/*')||Request::is('admin/gallery')) active @endif">
        	Gallery
        </a>
        <a href = "{{url('/admin/banner')}}" class="menu-button  @if(Request::is('admin/banner')||Request::is('admin/ads')||Request::is('admin/banner/*')||Request::is('admin/ads/*')) active @endif">
        	Banner Ads
        </a>
        <a href = "{{url('/admin/dologout')}}" class="menu-button logout-button">
        	Log Out
        </a>
    </div>
    @if(Request::is('admin/series')||Request::is('admin')||Request::is('admin/series/*')||Request::is('admin/episode/*'))
    <div class="sub-header" id="sub_header_series">
        <a href = "{{url('/admin/series/list')}}" class="menu-button @if(Request::is('admin/series/list')) active @endif"> 
        	List Series
        </a>
        
        <a href = "{{url('/admin/series/add')}}" class="menu-button @if(Request::path() == 'admin/series/add') active @endif">
        	New Series
        </a>

		@if(Request::is('admin/series/edit/*'))
        <a href = "#" class="menu-button active"> 
        	Edit Series
        </a>
        @endif 
        
        @if(Request::is('admin/episode/list/*'))
        <a href = "#" class="menu-button active"> 
        	List Episodes
        </a>
        @endif 
        
        @if(Request::is('admin/episode/add/*'))
        <a href = "#" class="menu-button active"> 
        	New Episode
        </a>
        @endif
        
         @if(Request::is('admin/episode/edit/*'))
        <a href = "#" class="menu-button active"> 
        	Edit Episodes
        </a>
        @endif 
        
        
    </div>
    @endif
    @if(Request::is('admin/gallery')||Request::is('admin/gallery/*'))
    <div class="sub-header" id="sub_header_gallery">
        <a href = "{{url('/admin/gallery/list')}}" class="menu-button @if(Request::is('admin/gallery/list')||Request::is('admin/gallery/list/*')) active @endif"> 
        	List Item
        </a>
        <a href = "{{url('/admin/gallery/add')}}" class="menu-button @if(Request::path() == 'admin/gallery/add') active @endif">
        	Add Item
        </a>
        @if(Request::is('admin/gallery/edit/*'))
        <a href = "#" class="menu-button active"> 
        	Edit Item
        </a>
        @endif 
    </div>
     @endif
     @if(Request::is('admin/banner') || Request::is('admin/ads') || Request::is('admin/banner/*') || Request::is('admin/ads') || Request::is('admin/ads/*'))
     <div class="sub-header" id="sub_header_gallery">
        <a href = "{{url('/admin/banner/list')}}" class="menu-button @if(Request::is('admin/banner')) active @endif"> 
        	Banner
        </a>
        <a href = "{{url('/admin/ads/list')}}" class="menu-button @if(Request::is('admin/ads')) active @endif"> 
        	Ads
        </a>
        <a href = "{{url('/admin/banner/add')}}" class="menu-button @if(Request::path() == 'admin/banner/add') active @endif">
        	Add Banner
        </a>
        <a href = "{{url('/admin/ads/add')}}" class="menu-button @if(Request::path() == 'admin/ads/add') active @endif">
        	Add Ads
        </a>
        @if(Request::is('admin/banner/edit/*'))
        <a href = "#" class="menu-button active"> 
        	Edit Banner
        </a>
        @endif 
        @if(Request::is('admin/ads/edit/*'))
        <a href = "#" class="menu-button active"> 
        	Edit Ads
        </a>
        @endif 
     </div>
     @endif
     
</div>
@if(Request::is('admin/profile/*'))
<div id="filler-topbar-container"></div>
@else
<div id="filler-topbar-container2"></div>
@endif
