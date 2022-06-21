@php $user = auth()->user(); @endphp
<div class="sidebar"  data-background-color="{{App\Models\Layout::where('user_id',$user->id)->first()->sidebar ?? 'white'}}">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            {{-- <div class="user">
                @if ($user->email == devAdminEmail())
                    @php $profileImg =  asset('uploads/images/users/shafi.jpg') @endphp
                @elseif($user->images == null)
                    @php $profileImg =  asset('uploads/images/users/company_logo.jpg') @endphp
                @else
                    @php $profileImg =  asset('uploads/images/users/'.$user->image) @endphp
                @endif
                <div class="avatar-sm float-left mr-2">
                    <img src="{{$profileImg}}" alt="..." class="avatar-img rounded-circle">
                </div>

                <div class="info">
                    <a data-toggle="collapse" href="#myProfile" aria-expanded="true">
                        <span>
                            {{ $user->name }}
                            <span class="user-level">{{ $user->designation }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse {{$m=='myProfile'?'show':''}} in" id="myProfile">
                        <ul class="nav">
                            <li class="{{$sm=='profile'?'activeSub':''}}">
                                <a href="{{ route('admin.myProfile.profile.index') }}">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li class="{{$sm=='layout'?'activeSub':''}}">
                                <a href="{{ route('admin.layout.create') }}">
                                    <span class="link-collapse">Layout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            <ul class="nav nav-primary">
                <li class="nav-item {{$m=='dashboard'?'active':''}}">
                    <a href="{{ route('user.dashboard') }}">
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

                <li class="nav-item {{$m=='course'?'active':''}}">
                    <a href="{{ route('course.index') }}">
                        <i class="fas fa-book"></i>
                        <p>Course</p>
                    </a>
                </li>

                <li class="nav-item {{$m=='lecture'?'active':''}}">
                    <a href="{{ route('lecture.index') }}">
                        <i class="fas fa-book-open"></i>
                        <p>Lecture</p>
                    </a>
                </li>

                {{-- <li class="nav-item {{$m=='visitor'?'active':''}}">
                    <a href="{{ route('admin.visitorInfo.index') }}">
                        <i class="fas fa-user-secret"></i>
                        <p>Visitor Info</p>
                    </a>
                </li> --}}

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
