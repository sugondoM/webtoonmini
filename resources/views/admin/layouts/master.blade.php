@include('admin.partials.header')

<div id="container">
        @include('admin.partials.sidebar')
    <div class="page-main-wrapper">
        @yield('content')
    </div>
    
    

@include('admin.partials.footer')
@yield('contentjs')
@include('admin.partials.javascripts')
@include('admin.partials.end')


