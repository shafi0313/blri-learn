{{-- <li class="nav-item submenu">
    <a data-toggle="collapse" href="#submenu" class="" aria-expanded="true">
        <i class="fas fa-bars"></i>
        <p>Menu Levels</p>
        <span class="caret"></span>
    </a>
    <div class="collapse show" id="submenu" style="">
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
        </ul>
    </div>
</li> --}}


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
                            <li class="{{ activeSubNav(['admin.adminUser.index','admin.adminUser.edit']) }}">
                                <a href="{{ route('admin.adminUser.index') }}">
                                    <span class="sub-item">User Manage</span>
                                </a>
                            </li>
                            <li class="{{ activeSubNav(['admin.adminUser.create']) }}">
                                <a href="{{ route('admin.adminUser.create') }}">
                                    <span class="sub-item">User Add</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan

                {{-- Frontend start --}}
                <li class="nav-item {{ activeNav(['admin.slider.*'])}}">
                    <a data-toggle="collapse" href="#frontend">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                        <p>Frontend</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ openNav(['admin.slider.*']) }}" id="frontend">
                        <ul class="nav nav-collapse">
                            <li class="{{ activeSubNav(['admin.slider.index','admin.slider.edit']) }}">
                                <a href="{{ route('admin.slider.index') }}">
                                    <span class="sub-item">Slider Manage</span>
                                </a>
                            </li>
                            <li class="{{ activeSubNav('admin.slider.create') }}">
                                <a href="{{ route('admin.slider.create') }}">
                                    <span class="sub-item">Slider Add</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Frontend end --}}

                {{-- Course Category start --}}
                <li class="nav-item {{ activeNav(['admin.courser-categories.*'])}}">
                    <a data-toggle="collapse" href="#courseCategory">
                        <i class="fa-solid fa-bars-staggered"></i>
                        <p>Course Category</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ openNav(['admin.courser-categories.*']) }}" id="courseCategory">
                        <ul class="nav nav-collapse">
                            <li class="{{ activeSubNav(['admin.courser-categories.index','admin.courser-categories.edit']) }}">
                                <a href="{{ route('admin.courser-categories.index') }}">
                                    <span class="sub-item">Manage</span>
                                </a>
                            </li>
                            <li class="{{ activeSubNav(['admin.courser-categories.create']) }}">
                                <a href="{{ route('admin.courser-categories.create') }}">
                                    <span class="sub-item">Add</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Course Category end --}}

                {{-- Course Category start --}}
                <li class="nav-item {{ activeNav(['admin.course.*'])}}">
                    <a data-toggle="collapse" href="#course">
                        <i class="fa-solid fa-book"></i>
                        <p>Course</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ openNav(['admin.course.*']) }}" id="course">
                        <ul class="nav nav-collapse">
                            <li class="{{ activeSubNav(['admin.course.index','admin.course.edit']) }}">
                                <a href="{{ route('admin.course.index') }}">
                                    <span class="sub-item">Manage</span>
                                </a>
                            </li>
                            <li class="{{ activeSubNav(['admin.course.create']) }}">
                                <a href="{{ route('admin.course.create') }}">
                                    <span class="sub-item">Add</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Course Category end --}}

                {{-- Course Category start --}}
                <li class="nav-item {{ activeNav(['admin.lecture.*'])}}">
                    <a data-toggle="collapse" href="#lecture">
                        <i class="fa-solid fa-book"></i>
                        <p>Lecture</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ openNav(['admin.lecture.*']) }}" id="lecture">
                        <ul class="nav nav-collapse">
                            <li class="{{ activeSubNav(['admin.lecture.index','admin.lecture.edit','admin.lecture.show']) }}">
                                <a href="{{ route('admin.lecture.index') }}">
                                    <span class="sub-item">Manage</span>
                                </a>
                            </li>
                            <li class="{{ activeSubNav(['admin.lecture.create']) }}">
                                <a href="{{ route('admin.lecture.create') }}">
                                    <span class="sub-item">Add</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Course Category end --}}

                {{-- <li class="nav-item {{ activeNav('admin.lecture.*') }}">
                    <a href="{{ route('admin.lecture.index') }}">
                        <i class="fas fa-book-open"></i>
                        <p>Lecture</p>
                    </a>
                </li> --}}

                @can('quiz-manage')
                <li class="nav-item {{ activeNav('admin.quiz.*') }}">
                    <a href="{{ route('admin.quiz.course') }}">
                        <i class="fa-solid fa-clipboard-question"></i>
                        <p>Quiz</p>
                    </a>
                </li>
                @endcan

                {{-- @can('student-history-manage')
                <li class="nav-item {{ activeNav('admin.studentHistory.*') }}">
                    <a href="{{ route('admin.studentHistory.index') }}">
                        <i class="fa-solid fa-users"></i>
                        <p>Student History</p>
                    </a>
                </li>
                @endcan --}}

                @can('student-history-manage')
                <li class="nav-item {{ activeNav(['admin.student.*']) }}">
                    <a data-toggle="collapse" href="#student">
                        <i class="fas fa-users-cog"></i>
                        <p>Student</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ openNav(['admin.student.*']) }}" id="student">
                        <ul class="nav nav-collapse">
                            <li class="{{ activeSubNav(['admin.student.lists']) }}">
                                <a href="{{ route('admin.student.lists') }}">
                                    <span class="sub-item">Student Lists</span>
                                </a>
                            </li>
                            <li class="{{ activeSubNav(['admin.student.location_wise_lists']) }}">
                                <a href="{{ route('admin.student.location_wise_lists') }}">
                                    <span class="sub-item">Location Wise Lists</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan

                <li class="nav-item {{ activeNav(['admin.certificate-signature.*']) }}">
                    <a href="{{ route('admin.certificate-signature.index') }}">
                        <i class="fa-solid fa-file-signature"></i>
                        <p>Certificate Signature</p>
                    </a>
                </li>

                <li class="nav-item {{ activeNav(['admin.role.*','admin.backup.*','admin.visitorInfo.*','admin.permission.*']) }}">
                    <a data-toggle="collapse" href="#settings">
                        <i class="fa-solid fa-gears"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{openNav(['admin.role.*','admin.backup.*','admin.visitorInfo.*','admin.permission.*'])}}" id="settings">
                        <ul class="nav nav-collapse">
                            @canany('role-manage','permission-manage')
                            {{-- <li class="{{ activeSubNav('admin.role.*','admin.permission.*')}}">
                                <a href="{{ route('admin.role.index') }}">
                                    <span class="sub-item">Role & Permission</span>
                                </a>
                            </li> --}}
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

            </ul>
        </div>
    </div>
</div>
