 {{-- <!--=================================
    Header --> --}}
 {{-- default-transparent --}}
 <header class="header header-sticky ">
     <nav class="navbar navbar-static-top navbar-expand-lg px-3 px-md-5">
         <div class="container-fluid position-relative px-0">
             <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i
                     class="fas fa-align-left"></i></button>
             <a class="navbar-brand" href="{{ route('index') }}">
                 <img class="img-fluid" src="{{ asset('uploads/images/icon/blri_learning_logo.png') }}" alt="logo">
             </a>
             <div class="search-category ms-auto">
                 <div class="form-group select-border course-category">
                     <i class="fa fa-th text-primary me-2" aria-hidden="true"></i>
                     <select class=" basic-select">
                         <option selected="selected">{{ __('index.mCategory') }}</option>
                         @foreach (App\Models\CourseCat::all(['id','name']) as $courseCat)
                         <option value="{{ $courseCat->id }}">{{ $courseCat->name }}</option>
                         @endforeach
                     </select>
                 </div>
             </div>

             <div class="navbar-collapse  collapse">
                 <ul class="nav navbar-nav m-auto">
                     <form class="d-flex search-category">
                         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                     </form>
                     {{-- <div class="search-category">
                        <input type="text" class="form-control" placeholder="Search Courses...">
                        <button class="search-button" type="submit"> <i class="fa fa-search"></i></button>
                    </div> --}}
                     {{-- <li><a class="nav-link" href="{{ route('index') }}">{{__('index.mHome')}}</a></li> --}}
                     {{-- <li class="dropdown nav-item">
                  <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Course<i class="fas fa-chevron-down fa-xs"></i></a>
                  <ul class="dropdown-menu megamenu dropdown-menu-md">
                    <li>
                      <div class="row g-0">
                        <div class="col-sm-6">
                          <h6 class="nav-title">Course Pages</h6>
                          <ul class="list-unstyled mt-lg-1">
                            <li><a class="dropdown-item" href="course-list.html"><span>Course List</span></a></li>
                            <li><a class="dropdown-item" href="course-list-map.html"><span>Course List With Map</span></a></li>
                            <li><a class="dropdown-item" href="course-grid.html"><span>Course Gird</span></a></li>
                            <li><a class="dropdown-item" href="course-grid-map.html"><span>Course Gird With Map</span></a></li>
                            <li><a class="dropdown-item" href="course-detail-style-01.html"><span>Course Detail Style 01</span></a></li>
                            <li><a class="dropdown-item" href="course-detail-style-02.html"><span>Course Detail Style 02</span></a></li>
                          </ul>
                        </div>
                        <div class="col-sm-6">
                          <h6 class="nav-title">Course Pages</h6>
                          <ul class="list-unstyled mt-lg-1">
                            <li><a class="dropdown-item" href="course-detail-style-03.html"><span>Course Detail Style 03</span></a></li>
                            <li><a class="dropdown-item" href="membership-levels.html"><span>Membership Levels</span></a></li>
                            <li><a class="dropdown-item" href="events.html"><span>Events</span></a></li>
                            <li><a class="dropdown-item" href="event-detail.html"><span>Event Detail</span></a></li>
                            <li><a class="dropdown-item" href="teachers.html"><span>Teachers</span></a></li>
                            <li><a class="dropdown-item" href="teacher-detail.html"><span>Teacher Detail</span></a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li> --}}
                     {{-- <li class="dropdown nav-item">
                  <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Pages<i class="fas fa-chevron-down fa-xs"></i></a>
                  <ul class="dropdown-menu megamenu dropdown-menu-lg">
                    <li>
                      <div class="row g-0">
                        <div class="col-sm-6 col-md-4">
                          <h6 class="nav-title">Basic Pages</h6>
                          <ul class="list-unstyled mt-lg-1">
                            <li><a class="dropdown-item" href="about-us.html"><span>About us</span></a></li>
                            <li><a class="dropdown-item" href="contact-us.html"><span>Contact us</span></a></li>
                            <li><a class="dropdown-item" href="gallery.html"><span>Gallery</span></a></li>
                            <li><a class="dropdown-item" href="login.html"><span>login</span></a></li>
                          </ul>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <h6 class="nav-title">Information Pages</h6>
                          <ul class="list-unstyled mt-lg-1">
                            <li><a class="dropdown-item" href="privacy-policy.html"><span>Privacy policy</span></a></li>
                            <li><a class="dropdown-item" href="terms-and-conditions.html"><span>Terms & conditions</span></a></li>
                            <li><a class="dropdown-item" href="faqs.html"><span>FAQs</span></a></li>
                          </ul>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <h6 class="nav-title">Extra Pages</h6>
                          <ul class="list-unstyled mt-lg-1">
                            <li><a class="dropdown-item" href="error-404.html"><span>404 error</span></a></li>
                            <li><a class="dropdown-item" href="coming-soon.html"><span>Coming soon</span></a></li>
                            <li><a class="dropdown-item" href="maintenance.html"><span>Maintenance</span></a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li> --}}
                     {{-- <li class="dropdown nav-item">
                  <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Blog<i class="fas fa-chevron-down fa-xs"></i></a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="classic-full-width.html"><span>Classic Full width</span></a></li>
                    <li><a class="dropdown-item" href="classic-left-sidebar.html"><span>Classic Left Sidebar</span></a></li>
                    <li><a class="dropdown-item" href="blog-single.html"><span>Blog single</span></a></li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Dropdown <i class="fas fa-chevron-right fa-xs"></i></a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Submenu</a></li>
                      <li><a class="dropdown-item" href="#">Submenu</a></li>
                      <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu 01 <i class="fas fa-chevron-right fa-xs"></i></a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Subsubmenu 01</a></li>
                        <li><a class="dropdown-item" href="#">Subsubmenu 01</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu 02 <i class="fas fa-chevron-right fa-xs"></i></a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Subsubmenu 02</a></li>
                      <li><a class="dropdown-item" href="#">Subsubmenu 02</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
                  </ul>
                </li> --}}
                     {{-- <li class="nav-item dropdown">
                  <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop<i class="fas fa-chevron-down fa-xs"></i></a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="shop.html"><span>Shop</span></a></li>
                    <li><a class="dropdown-item" href="cart.html"><span>Cart</span></a></li>
                    <li><a class="dropdown-item" href="checkout.html"><span>Checkout</span></a></li>
                    <li><a class="dropdown-item" href="shop-single.html"><span>Shop single</span></a></li>
                  </ul>
                </li> --}}
                     {{-- <li><a class="nav-link" href="contact-us.html">টিউটোরিয়াল</a></li>
                <li><a class="nav-link" href="contact-us.html">পার্টনারশীপ</a></li> --}}
                 </ul>
                 @auth
                 @php
                     $dashboard = match(auth()->user()->permission) {
                        '1' => route('admin.dashboard'),
                        '2' => route('user.dashboard'),
                    };
                 @endphp
                 <div class="_user">
                    <i class="fas fa-user"></i>
                    <ul>
                        <li>
                           <a href="{{ $dashboard  }}">
                               <div class="name">
                                   <div class="icon">
                                       <i class="fas fa-user"></i>
                                   </div>
                                   <div>
                                       <h5>{{ auth()->user()->name }}</h5>
                                       <p>{{ auth()->user()->email }}</p>
                                   </div>
                               </div>
                           </a>
                        </li>
                        <hr style="margin:2px 0">
                        <li>
                           <a href="{{ route('logout') }}">
                               <div class="name">
                                   <div class="icon">
                                    <i class="fas fa-sign-out-alt"></i>
                                   </div>
                                   <div>
                                       <p>Logout</p>
                                   </div>
                               </div>
                           </a>
                        </li>
                    </ul>
                </div>
                 @endauth
             </div>
             <style>

                ._user{
                    float: right;
                    position: relative;
                    padding: 10px;

                }
                ._user>i{
                    font-size: 25px;
                    padding: 10px;
                    background: white;
                    border-radius: 50px;

                }
                ._user ul{
                    display: none;
                    position: absolute;
                    top: 55px;
                    right: 0;
                    z-index: 9999999;
                    background: rgb(243, 243, 243);
                    list-style: none;
                    padding: 10px 10px;
                    border-radius: 5px;
                }

                ._user:hover ul{
                    display: block;

                }
                ._user .name{
                    display: flex;
                    align-items: center;
                }

                ._user .name i{
                    font-size: 20px;
                    padding-right: 8px;
                }
                ._user .name h5{
                    margin: 0 !important;
                    line-height: 14px;
                }
                ._user .name p{
                    margin: 0 !important;
                }
             </style>

             <div class="woo-action">
                 <ul class="list-unstyled _dropdown">
                     @guest
                     <li class="user"><a data-bs-toggle="modal" data-bs-target="#loginModal"
                        href="#">{{__('global.signIn')}}<i class="fa fa-user ps-2 text-primary"></i></a></li>
                        <li class="user"><a data-bs-toggle="modal" data-bs-target="#registerMo"
                                href="#">{{__('global.register')}}<i class="fas fa-user-plus ps-2 text-primary"></i></a>
                        </li>
                     @endguest
{{--
                     @auth
                         <li>sdf
                             <ul>
                                 <li>
                                    <a href="">
                                        <div>
                                            <div>
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div>
                                                <h3>{{ auth()->user()->name }}</h3>
                                            </div>
                                        </div>
                                    </a>
                                 </li>
                             </ul>
                         </li>
                     @endauth --}}


                     @if (config('app.locale')=='en')
                     <li><a class="btn btn-primary" style="color: white !important" href="/locale/bn">বাংলা <i
                                 class="fas fa-language" style="color: white"></i></a></li>
                     @else
                     <li><a class="btn btn-primary" style="color: white !important" href="/locale/en">English <i
                                 class="fas fa-language" style="color: white"></i></a></li>
                     @endif
                 </ul>
             </div>
         </div>
     </nav>
 </header>
 <!--=================================
      Header -->

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


 {{-- <!--=================================
    Modal login --> --}}
 <div class="modal login fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header border-0">
                 <h5 class="modal-title" id="loginModalLabel">@lang('global.login')</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
                     <li class="nav-item">
                         <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab"
                             aria-controls="login" aria-selected="false"> <span>@lang('global.login')</span></a>
                     </li>
                 </ul>
                 <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                         <form method="POST" action="{{ route('loginProcess') }}" class="row my-4 align-items-center">
                             @csrf
                             <div class="mb-3 col-sm-12">
                                 <input class="form-control" type="email" name="email" required placeholder="@lang('login_register.email')">
                             </div>
                             <div class="mb-3 col-sm-12">
                                 <input class="form-control" type="password" name="password" required
                                     placeholder="@lang('login_register.passwordOnly')">
                             </div>
                             <div class="col-sm-6 d-grid">
                                 <button type="submit" class="btn btn-primary">@lang('global.login')</button>
                             </div>
                             <div class="col-sm-6 d-grid ">
                                 <a href="{{ route('forgetPassword') }}" style="text-align: right !important">@lang('global.forgetPass')</a>
                             </div>
                         </form>

                     </div>
                     {{-- <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                         <form class="row my-4 align-items-center">
                             <div class="mb-3 col-sm-12">
                                 <input type="text" class="form-control" placeholder="Username">
                             </div>
                             <div class="mb-3 col-sm-12">
                                 <input type="email" class="form-control" placeholder="Email Address">
                             </div>
                             <div class="mb-3 col-sm-12">
                                 <input type="Password" class="form-control" placeholder="Password">
                             </div>
                             <div class="mb-3 col-sm-12">
                                 <input type="Password" class="form-control" placeholder="Confirm Password">
                             </div>
                             <div class="col-sm-6 d-grid">
                                 <button type="submit" class="btn btn-primary">{{ __('global.signUp') }}</button>
                             </div>
                         </form>
                     </div> --}}
                 </div>
             </div>
         </div>
     </div>
 </div>
 {{-- <!--=================================
      Modal login --> --}}

 <div class="modal login fade" id="registerMo" tabindex="-1" role="dialog" aria-labelledby="registerMoLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header border-0">
                 <h5 class="modal-title" id="registerMoLabel">@lang('global.register')</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
                     <li class="nav-item">
                         <a class="nav-link active" id="register-tab" data-bs-toggle="tab" href="#register" role="tab"
                             aria-controls="register" aria-selected="true"><span>{{ __('global.register') }}</span></a>
                     </li>
                 </ul>
                 <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                         <form class="row my-4 align-items-center" method="post" action="{{ route('registerStore') }}">
                            @csrf
                             <div class="mb-3 col-sm-12">
                                <input type="text" name="name" class="form-control" placeholder="{{__('login_register.name')}} *" required>
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                @endif
                             </div>

                             {{-- <div class="mb-3 col-sm-12">
                                 <select name="profession" class="form-control" id="">
                                     <option value="">{{__('login_register.profession')}} </option>
                                 </select>
                             </div> --}}
                             <div class="mb-3 col-sm-12">
                                 <select name="gender" class="form-control" required>
                                     <option value="">{{__('login_register.gender')}}  *</option>
                                     <option value="1">{{__('login_register.male')}} </option>
                                     <option value="2">{{__('login_register.female')}} </option>
                                     <option value="3">{{__('login_register.other')}} </option>
                                 </select>
                                 @if ($errors->has('gender'))
                                    <div class="alert alert-danger">{{ $errors->first('gender') }}</div>
                                @endif
                             </div>
                             <div class="mb-3 col-sm-12">
                                <input type="email" name="email" class="form-control" placeholder="{{__('login_register.email')}}  *" required>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                             <div class="mb-3 col-sm-12">
                                 <input type="Password" name="password" class="form-control" placeholder="{{__('login_register.password')}}  *" required>
                                 @if ($errors->has('password'))
                                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                @endif
                             </div>
                             <div class="mb-3 col-sm-12">
                                 <input type="Password" name="password_confirmation" class="form-control" placeholder="{{__('login_register.rePassword')}}  *" required>
                                 @if ($errors->has('password_confirmation'))
                                    <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                             </div>
                             <div class="col-sm-12 d-grid">
                                 <button type="submit" class="btn btn-primary">{{__('login_register.registerBtn')}} </button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
