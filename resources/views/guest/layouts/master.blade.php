@include('guest.partials.header')

<div id="container">
    @include('guest.partials.topbar')
   
    @yield('content')
    
    

@include('guest.partials.footer')
@yield('contentjs')
@include('guest.partials.javascripts')