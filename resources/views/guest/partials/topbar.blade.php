<div id="main-topbar-container">
    <div class="burger-menu">Menu</div>      
    <div class="header">
        <a href = "{{url('profile')}}" class="menu-button @if(Request::path() == 'profile') active @endif">
        	Profile
        </a>
        <a href = "{{url('webtoon')}}" class="menu-button @if(Request::is('webtoon/*')) active @endif"> 
        	WebComic
        </a>
        <a href = "{{url('gallery')}}" class="menu-button @if(Request::path() == 'gallery') active @endif">
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
        <a href = "{{url('recommend')}}" class="menu-button @if(Request::path() == 'recommend') active @endif"  > 
        	Recommendation
        </a>
    </div>
</div>
<div id="filler-topbar-container"></div>