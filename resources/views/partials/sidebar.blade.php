<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('profile_pics/'.Auth::user()->profile_pic) }}" class="img img-circle elevation-2" width="50px" height="50px" alt="User Image">
            </div>
            <div class="info">
<!--                --><?php
//                if(Auth::user()->getTable() == 'teachers'){
//                    $url = 'teacher/forum/edit/'.$post['id'];
//                }elseif (Auth::user()->getTable() == 'students'){
//                    $url = 'student/forum/edit/'.$post['id'];
//                }
//                ?>
                @if(Auth::user()->getTable() == 'teachers')
                <a href="{{url('/teacher/profile/'.Auth::user()->teacher_id)}}" class="d-block">{{ Auth::user()->name }}</a>
                @else
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
                    <a href="{{ route('teach.library.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Library</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Discussion</p>
                    </a>
                </li>
                 <li class="nav-item">
                     @if(Auth::user()->getTable() == 'teachers')
                    <a href="{{url('/teacher/forum')}}" class="nav-link" target="_blank" >
                    @endif
                    @if(Auth::user()->getTable() == 'students')
                    <a href="{{url('/student/forum')}}" class="nav-link" target="_blank" >
                    @endif
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Forum</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            test
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
