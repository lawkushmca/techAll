<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" class="brand-link">
        {{--<img src="/logo-1.jpg" alt="Logo" class="brand-image img-circle elevation-3"--}}
        {{--style="opacity: .8;">--}}
        {{--<img src="{{asset('img/Tech4All_Logo.webp')}}" class="brand-image elevation-3" title="logo">--}}
        <h4 class="mb-0 ml-3">TECH4ALL</h4>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Meetings</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>