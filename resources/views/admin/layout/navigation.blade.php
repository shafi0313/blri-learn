<div class="sidebar"  data-background-color="white">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            <ul class="nav nav-primary">
                <li class="nav-item {{ activeNav('admin.dashboard') }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                @can('user-manage')
                <li class="nav-item {{ activeNav(['admin.adminUser.*']) }}">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-users-cog"></i>
                        <p>Admin</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ openNav(['admin.adminUser.*']) }}" id="base">
                        <ul class="nav nav-collapse">
                            @can('user-manage')
                            <li class="{{ activeSubNav(['admin.adminUser.*']) }}">
                                <a href="{{ route('admin.adminUser.index') }}">
                                    <span class="sub-item">User</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan

                {{-- Frontend start --}}
                <li class="nav-item {{ activeNav(['admin.slider.*'])}}">
                    <a data-toggle="collapse" href="#frontend">
                        <i class="fa-solid fa-eye"></i>
                        <p>Frontend</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ openNav(['admin.slider.*']) }}" id="frontend">
                        <ul class="nav nav-collapse">
                            @can('slider-manage')
                            <li class="{{ activeSubNav('admin.slider.*') }}">
                                <a href="{{ route('admin.slider.index') }}">
                                    <span class="sub-item">Slider</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                {{-- Frontend end --}}
                @can('course-cat-manage')
                <li class="nav-item {{ activeNav('admin.courseCat.*') }}">
                    <a href="{{ route('admin.courseCat.index') }}">
                        <i class="fas fa-database"></i>
                        <p>Course Category</p>
                    </a>
                </li>
                @endcan

                @can('course-manage')
                <li class="nav-item {{ activeNav('course.*') }}">
                    <a href="{{ route('course.index') }}">
                        <i class="fas fa-book"></i>
                        <p>Course</p>
                    </a>
                </li>
                @endcan

                @can('lecture-manage')
                <li class="nav-item {{ activeNav('lecture.*') }}">
                    <a href="{{ route('lecture.index') }}">
                        <i class="fas fa-book-open"></i>
                        <p>Lecture</p>
                    </a>
                </li>
                @endcan

                @can('quiz-manage')
                <li class="nav-item {{ activeNav('admin.quiz.*') }}">
                    <a href="{{ route('admin.quiz.course') }}">
                        <i class="fas fa-book-open"></i>
                        <p>Quiz</p>
                    </a>
                </li>
                @endcan

                @can('student-history-manage')
                <li class="nav-item {{ activeNav('admin.studentHistory.*') }}">
                    <a href="{{ route('admin.studentHistory.index') }}">
                        <i class="fas fa-book-open"></i>
                        <p>Student History</p>
                    </a>
                </li>
                @endcan

                <li class="nav-item {{ activeNav(['admin.role.*','admin.backup.*','admin.visitorInfo.*','admin.permission.*']) }}">
                    <a data-toggle="collapse" href="#settings">
                        <i class="fa-solid fa-gears"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{openNav(['admin.role.*','admin.backup.*','admin.visitorInfo.*','admin.permission.*'])}}" id="settings">
                        <ul class="nav nav-collapse">
                            @canany('role-manage','permission-manage')
                            <li class="{{ activeSubNav('admin.role.*','admin.permission.*')}}">
                                <a href="{{ route('admin.role.index') }}">
                                    <span class="sub-item">Role & Permission</span>
                                </a>
                            </li>
                            @endcanany
                            @canany('backup-manage')
                            <li class="{{ activeSubNav('admin.backup.*')}}">
                                <a href="{{ route('admin.backup.password') }}">
                                    <span class="sub-item">App Backup</span>
                                </a>
                            </li>
                            @endcanany
                            @canany('visitor-manage')
                            <li class="{{ activeSubNav('admin.visitorInfo.*')}}">
                                <a href="{{ route('admin.visitorInfo.index') }}">
                                    <span class="sub-item">Visitor Info</span>
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>


{{--
                <li class="nav-item">
                    <a href="widgets.html">
                        <i class="fas fa-desktop"></i>
                        <p>Widgets</p>
                        <span class="badge badge-success">4</span>
                    </a>
                </li> --}}


                {{-- <li class="nav-item">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="fas fa-bars"></i>
                        <p>Menu Levels</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a data-toggle="collapse" href="#subnav1">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav1">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a data-toggle="collapse" href="#subnav2">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Level 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
