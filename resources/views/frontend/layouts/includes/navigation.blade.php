<header class="header header-sticky default-transparent default-transparent-03">
    <nav class="navbar navbar-static-top navbar-expand-lg px-3 px-md-5">
        <div class="container-fluid position-relative px-0">
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i
                    class="fas fa-align-left"></i></button>
            <a class="navbar-brand" href="{{ route('index') }}">
                <img class="img-fluid" src="{{ asset('uploads/images/icon/blri_learning_logo.png') }}" alt="BLRI">
            </a>
            <a class="navbar-brand navbar-brand-sticky" href="{{ route('index') }}">
                <img class="img-fluid" src="{{ asset('uploads/images/icon/blri_learning_logo.png') }}" alt="BLRI">
            </a>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                    <li class="dropdown nav-item">
                        <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Course Categories<i
                                class="fas fa-chevron-down fa-xs"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (App\Models\CourseCat::all(['id','name']) as $courseCat)
                            <li>
                                <a class="{{ route('courseByCat',$courseCat->id) }}" href="classic-full-width.html">
                                    <span>{{ $courseCat->name }}</span>
                                </a>
                            </li>
                         @endforeach
                        </ul>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Shop<i class="fas fa-chevron-down fa-xs"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="shop.html"><span>Shop</span></a></li>
                            <li><a class="dropdown-item" href="cart.html"><span>Cart</span></a></li>
                            <li><a class="dropdown-item" href="checkout.html"><span>Checkout</span></a></li>
                            <li><a class="dropdown-item" href="shop-single.html"><span>Shop single</span></a></li>
                        </ul>
                    </li> --}}
                    <li><a class="nav-link" href="contact-us.html">Contact us</a></li>
                </ul>
            </div>
            <div class="search-category ms-auto">
                <form class="form-inline" data-swiper-animation="fadeInUp" data-duration="2.0s" data-delay="1.0s">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search Courses...">
                    </div>
                    <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i></button>
                </form>
            </div>
            @auth
                @php
                    $dashboard = match (user()->permission) {
                        '1' => route('admin.dashboard'),
                        '2' => route('user.dashboard'),
                    };
                @endphp
                <div class="_user">
                    <i class="fas fa-user"></i>
                    <ul>
                        <li>
                            <a href="{{ $dashboard }}">
                                <div class="name">
                                    <div class="icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <h5>{{ user()->name }}</h5>
                                        <p>{{ user()->email }}</p>
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
            <div class="woo-action">
                <ul class="list-unstyled">
                    @guest
                     <li class="user"><a data-bs-toggle="modal" data-bs-target="#loginModal" style="color:white"
                        href="#">{{__('global.signIn')}}/{{__('global.register')}}<i class="fa fa-user ps-2 text-primary"></i></a></li>
                        {{-- <li class="user"><a data-bs-toggle="modal" data-bs-target="#registerMo"
                                href="#">{{__('global.register')}}<i class="fas fa-user-plus ps-2 text-primary"></i></a>
                        </li> --}}
                     @endguest
                    {{-- @guest
                        <li class="user">
                            <a data-bs-toggle="modal" data-bs-target="#loginModal" href="#">
                                Hello sign in<i class="fa fa-user ps-2 text-primary"></i>
                            </a>
                        </li>
                    @endguest --}}
                    {{-- @auth
                        <li class="cart dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><span class="cart-icon"><i
                                        class="fas fa-shopping-cart"></i></span></button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <ul class="cart-list ps-0">
                                    <li class="">
                                        <a href="{{ $dashboard }}">{{ user()->name }}</a>
                                    </li>
                                    <li class="">
                                        <a href="{{ $dashboard }}">Dashboard</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endauth --}}

                    {{-- <li class="user">
                        <a data-bs-toggle="modal" data-bs-target="#loginModal" href="#">
                            Hello sign in<i class="fa fa-user ps-2 text-primary"></i>
                        </a>
                    </li> --}}
                    <li class="cart dropdown">
                        @if (config('app.locale') == 'en')
                            <a class="btn btn-sm btn-primary" style="color: white !important" href="/locale/bn">বাংলা
                                <i class="fas fa-language" style="color: white"></i></a>
                        @else
                            <a class="btn btn-sm btn-primary" style="color: white !important"
                                href="/locale/en">English
                                <i class="fas fa-language" style="color: white"></i></a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
