<div id="main-topbar-container">
    <div class="burger-menu">Menu</div>      
    <div class="header">
        <a class="menu-button @if(Request::path() == 'profile') active @endif" href = "{{url('profile')   }}" > Profile           </a>
        <a class="menu-button @if(Request::is('webtoon/*')) active @endif" href = "{{url('webtoon')   }}" > WebComic          </a>
        <a class="menu-button @if(Request::path() == 'gallery') active @endif" href = "{{url('gallery')   }}" > Gallery           </a>
        <a class="menu-button central-button @if(Request::path() == '/') active @endif" href = "{{url('/')   }}"> Another You</a>
        <a class="menu-button @if(Request::path() == 'shop') active @endif" href = "{{url('shop')      }}" > Shop              </a>
        <a class="menu-button @if(Request::path() == 'donate') active @endif" href = "{{url('donate')    }}" > Donate            </a>
        <a class="menu-button @if(Request::path() == 'recommend') active @endif" href = "{{url('recommend') }}" > Recommendation    </a>
    </div>
</div>
<div id="filler-topbar-container"></div>