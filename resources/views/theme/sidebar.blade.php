    <!-- Sidebar -->
    <ul class="pe-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
          <img style="width:70%" src="{!! asset('logo.png') !!}"> 
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link {{$dir == 'rtl' ? 'text-right' : ''}}"  href="{{route('admin.index')}}" >
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>{{__('Control Panel')}}</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/projects*') ? 'active' : '' }}">
        <a class="nav-link {{$dir == 'rtl' ? 'text-right' : ''}}" href="{{route('admin.projects.index')}}">
        <i class="fas fa-folder"></i>
          <span>{{__('Projects')}}</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/newsletters*') ? 'active' : '' }}">
        <a class="nav-link {{$dir == 'rtl' ? 'text-right' : ''}}" href="{{route('admin.newsletters.index')}}">
        <i class="fas fa-pen-fancy"></i>
          <span>{{__('Newsletter')}}</span>
        </a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    
    </ul>
    <!-- End of Sidebar -->