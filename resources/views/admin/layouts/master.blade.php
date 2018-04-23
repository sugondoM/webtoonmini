@include('admin.partials.header')
@include('admin.partials.topbar')

	<div class="page-main-wrapper">
        @yield('content')
    
    

@include('admin.partials.footer')
@yield('contentjs')
@include('admin.partials.javascripts')
@include('admin.partials.end')



