<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> @yield('title') </title>
        <style type="text/css">
            #banner{
                height: 100px;
                width: 100%;
                background-color: #44ffaa;
            }
        </style>
       
    </head>
    <body>
        <div class="flex-center position-ref full-height">
          
            <div class="header">
                <a class="menu-button" href = "{{url('profile')   }}" > Profile           </a>
                <a class="menu-button" href = "{{url('webtoon')   }}" > WebComic          </a>
                <a class="menu-button" href = "{{url('gallery')   }}" > Gallery           </a>
                <a class="menu-button" href = "{{url('shop')      }}" > Shop              </a>
                <a class="menu-button" href = "{{url('donate')    }}" > Donate            </a>
                <a class="menu-button" href = "{{url('recommend') }}" > Recommendation    </a>
            </div>

             @yield('content')   
        </div>
    </body>
</html>
