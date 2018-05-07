<div id="main-topbar-container" class="page-topbar-container theme-topbar">
    <div class="burger-menu">Menu</div>      
    <div class="header theme-topbar">
        <a href = "{{url('profile')}}" class="menu-button @if(Request::path() == 'profile') active @endif">
        	Profile
        </a>
        <a href = "{{url('webtoon/list')}}" class="menu-button @if(Request::is('webtoon/*')||Request::is('webtoon')) active @endif"> 
        	WebComic
        </a>
        <a href = "{{url('gallery/character')}}" class="menu-button @if(Request::is('gallery/*')) active @endif">
        	Gallery
        </a>
        <a href = "{{url('/')}}" class="menu-button central-button @if(Request::path() == '/') active @endif" > 
        	Another You
        </a>
        <a href = "{{url('shop')}}" class="menu-button @if(Request::path() == 'shop') active @endif"  > 
        	Shop
        </a>
        <a href = "{{url('donate')}}" class="menu-button @if(Request::path() == 'donate') active @endif"> 
        	Donate
       	</a>
        <a href = "{{url('featured/list')}}" class="menu-button @if(Request::is('featured/*')||Request::is('featured')) active @endif" > 
        	Featured
        </a>
    </div>
</div>