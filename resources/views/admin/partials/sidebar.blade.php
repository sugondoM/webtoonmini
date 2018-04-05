<div class="page-sidebar-block" style="width:15%">
    <div class="page-sidebar-home">Webtoon Mini</div>
    <a href="{{url('admineditprofile/1')}}" class="page-sidebar-item" >
        Manage Profiles
    </a>
    <a href="{{url('adminlist')}}" class="page-sidebar-item" >
        Manage Series
    </a>
    <a href="{{url('adminlist')}}" class="page-sidebar-item child @if(Request::path() == 'adminlist') active @endif" >
        Show List Series
    </a>
    <a href="{{url('adminupload')}}" class="page-sidebar-item child @if(Request::path() == 'adminupload') active @endif" >
        Add New Series
    </a>
    <a href="#" class="page-sidebar-item child @if(Request::is('admineditseries/*') || Request::is('admineditepisode/*')) active @endif" >
        Editing Series
    </a>
    <a href="{{url('adminlist')}}" class="page-sidebar-item" >
        Manage Gallery
    </a>
    <a href="{{url('admingallery')}}" class="page-sidebar-item child @if(Request::path() == 'admingallery') active @endif" >
        Show Gallery
    </a>
    <a href="{{url('adminuploadgallery')}}" class="page-sidebar-item child @if(Request::path() == 'adminuploadgallery') active @endif" >
        Add New Gallery Item(s)
    </a>
       
</div>