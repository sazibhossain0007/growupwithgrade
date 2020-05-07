<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Title</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                @if(Auth::guard('student')->check())
                <img src="{{ asset(Auth::guard('student')->user()->profile_pic) }}" class="img img-circle elevation-2" width="50px" height="50px" alt="User Image">
                @elseif(Auth::guard('teacher')->check())
                <img src="{{ asset(Auth::guard('teacher')->user()->profile_pic) }}" class="img img-circle elevation-2" width="50px" height="50px" alt="User Image">
                @else
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img img-circle elevation-2" width="50px" height="50px" alt="User Image">
                @endif
            </div>
            <div class="info">
                @if(Auth::guard('student')->check())
                    <a href="#" class="d-block">{{ Auth::guard('student')->user()->name }}</a>
                @elseif(Auth::guard('teacher')->check())
                    <a href="#" class="d-block">{{ Auth::guard('teacher')->user()->name }}</a>
                @elseif(Auth::guard('guardian')->check())
                    <a href="#" class="d-block">{{ Auth::guard('guardian')->user()->name }}</a>
                @else
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(Auth::guard('student')->check())
                <li class="nav-item">
                    <a href="{{ route('student.dashboard') }}" class="nav-link" >
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Courses</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('library.index') }}" class="nav-link" >
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Library</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/student/forum')}}" class="nav-link" target="_blank" >
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Forum</p>
                    </a>
                </li>
            @elseif(Auth::guard('teacher')->check())
                <li class="nav-item">
                    <a href="{{ route('teach.dashboard') }}" class="nav-link" >
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Courses</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('library.index') }}" class="nav-link" >
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Library</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/teacher/forum')}}" class="nav-link" target="_blank" >
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Forum</p>
                    </a>
                </li>
            @elseif(Auth::guard('guardian')->check())
                <li class="nav-item">
                    <a href="{{ route('guardian.dashboard') }}" class="nav-link" >
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Courses</p>
                    </a>
                </li>
            @else
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Student</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Teacher</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ route('guardian.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Guardian</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('course.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Course</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ route('library.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Library</p>
                    </a>
                </li>
            @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
