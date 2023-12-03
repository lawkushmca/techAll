<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{--<img src="/logo.png" alt="Logo" class="brand-image img-circle elevation-3"--}}
        {{--style="opacity: .8;">--}}
        <h4 class="mb-0 ml-3">TECH4ALL</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <li class="nav-item">
                    <a href="{{ route('admin.members.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Members</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Meetings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.media-contents.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Configuration</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contact-us.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Contact Us</p>
                    </a>
                </li>
            </ul>

        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>