<div class="page-sidebar-block" style="width:15%">
    <div class="page-sidebar-home">Webtoon Mini</div>
    <a href="{{url('admlistseries')}}" class="page-sidebar-item" >
        Manage Series
    </a>
    <a href="{{url('admlistseries')}}" class="page-sidebar-item child @if(Request::path() == 'admlistseries') active @endif" >
        Show List Series
    </a>
    <a href="{{url('uploadseries')}}" class="page-sidebar-item child @if(Request::path() == 'uploadsfile' || Request::path() == 'uploadseries') active @endif" >
        Add New Series
    </a>
    <a href="" class="page-sidebar-item @if(Request::path() == 'updategallery') active @endif">
        Manage Gallery
    </a>
       
</div>