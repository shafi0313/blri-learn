<!DOCTYPE html>
<html lang="en">
    @php
    $user = auth()->user();
    $layout = App\Models\Layout::where('user_id',$user->id)->first();
    @endphp
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title') | {{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('backend/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: ['{{ asset("backend/css/fonts.min.css" )}}']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backend/css/demo.css') }}">
</head>

<body data-background-color="{{$layout->background ?? 'bg1'}}">
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="{{$layout->logo_header ?? 'blue'}}">
                <a href="{{ route('index') }}" class="logo"> <h4 class="display:4 text-light" style="margin-top: 20px">BLRI e-Learning</h4>
				</a>
                {{-- <a href="index.html" class="logo">
                    <img src="{{ asset('backend/img/logo.svg') }}" alt="navbar brand" class="navbar-brand">
                </a> --}}
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            @include('admin.layout.header')
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        {{-- @include('admin.layout.navigation') --}}
        <!-- End Sidebar -->


        @yield('content')

        <!-- Custom template | don't include it in your project! -->
        {{-- <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <form action="{{ route('admin.logoHeaderStore') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="btnSwitch">
                                <button name="logo_header" value="dark" class="{{$layout->logo_header=='dark'?'selected':''}} changeLogoHeaderColor" data-color="dark"></button>
                                <button name="logo_header" value="blue" class="{{$layout->logo_header=='blue'?'selected':''}} changeLogoHeaderColor" data-color="blue"></button>
                                <button name="logo_header" value="purple" class="{{$layout->logo_header=='purple'?'selected':''}} changeLogoHeaderColor" data-color="purple"></button>
                                <button name="logo_header" value="light-blue" class="{{$layout->logo_header=='light-blue'?'selected':''}} changeLogoHeaderColor" data-color="light-blue"></button>
                                <button name="logo_header" value="green" class="{{$layout->logo_header=='green'?'selected':''}} changeLogoHeaderColor" data-color="green"></button>
                                <button name="logo_header" value="orange" class="{{$layout->logo_header=='orange'?'selected':''}} changeLogoHeaderColor" data-color="orange"></button>
                                <button name="logo_header" value="red" class="{{$layout->logo_header=='red'?'selected':''}} changeLogoHeaderColor" data-color="red"></button>
                                <button name="logo_header" value="white" class="{{$layout->logo_header=='white'?'selected':''}} changeLogoHeaderColor" data-color="white"></button>
                                <br />
                                <button name="logo_header" value="dark2" class="{{$layout->logo_header=='dark2'?'selected':''}} changeLogoHeaderColor" data-color="dark2"></button>
                                <button name="logo_header" value="blue2" class="{{$layout->logo_header=='blue2'?'selected':''}} changeLogoHeaderColor" data-color="blue2"></button>
                                <button name="logo_header" value="purple2" class="{{$layout->logo_header=='purple2'?'selected':''}} changeLogoHeaderColor" data-color="purple2"></button>
                                <button name="logo_header" value="light-blue2" class="{{$layout->logo_header=='light-blue2'?'selected':''}} changeLogoHeaderColor" data-color="light-blue2"></button>
                                <button name="logo_header" value="green2" class="{{$layout->logo_header=='green2'?'selected':''}} changeLogoHeaderColor" data-color="green2"></button>
                                <button name="logo_header" value="orange2" class="{{$layout->logo_header=='orange2'?'selected':''}} changeLogoHeaderColor" data-color="orange2"></button>
                                <button name="logo_header" value="red2" class="{{$layout->logo_header=='red2'?'selected':''}} changeLogoHeaderColor" data-color="red2"></button>
                            </div>
                        </form>

                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <form action="{{route('admin.navbarHeaderStore')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="btnSwitch">
                                <button name="navbar_header" value="dark" class="{{$layout->navbar_header=='dark'?'selected':''}} changeTopBarColor" data-color="dark"></button>
                                <button name="navbar_header" value="blue" class="{{$layout->navbar_header=='blue'?'selected':''}} changeTopBarColor" data-color="blue"></button>
                                <button name="navbar_header" value="purple" class="{{$layout->navbar_header=='purple'?'selected':''}} changeTopBarColor" data-color="purple"></button>
                                <button name="navbar_header" value="light-blue" class="{{$layout->navbar_header=='light-blue'?'selected':''}} changeTopBarColor" data-color="light-blue"></button>
                                <button name="navbar_header" value="orange" class="{{$layout->navbar_header=='orange'?'selected':''}} changeTopBarColor" data-color="orange"></button>
                                <button name="navbar_header" value="red" class="{{$layout->navbar_header=='red'?'selected':''}} changeTopBarColor" data-color="red"></button>
                                <button name="navbar_header" value="white" class="{{$layout->navbar_header=='white'?'selected':''}} changeTopBarColor" data-color="white"></button>
                                <br />
                                <button name="navbar_header" value="dark2" class="{{$layout->navbar_header=='dark2'?'selected':''}} changeTopBarColor" data-color="dark2"></button>
                                <button name="navbar_header" value="blue2" class="{{$layout->navbar_header=='blue2'?'selected':''}} changeTopBarColor" data-color="blue2"></button>
                                <button name="navbar_header" value="purple2" class="{{$layout->navbar_header=='purple2'?'selected':''}} changeTopBarColor" data-color="purple2"></button>
                                <button name="navbar_header" value="light-blue2" class="{{$layout->navbar_header=='light-blue2'?'selected':''}} changeTopBarColor" data-color="light-blue2"></button>
                                <button name="navbar_header" value="green2" class="{{$layout->navbar_header=='green2'?'selected':''}} changeTopBarColor" data-color="green2"></button>
                                <button name="navbar_header" value="orange2" class="{{$layout->navbar_header=='orange2'?'selected':''}} changeTopBarColor" data-color="orange2"></button>
                                <button name="navbar_header" value="red2" class="{{$layout->navbar_header=='red2'?'selected':''}} changeTopBarColor" data-color="red2"></button>
                            </div>
                        </form>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <form action="{{route('admin.sidebarStore')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="btnSwitch">
                                <button name="sidebar" value="white" class="{{$layout->sidebar=='white'?'selected':''}} changeSideBarColor" data-color="white"></button>
                                <button name="sidebar" value="dark" class="{{$layout->sidebar=='dark'?'selected':''}} changeSideBarColor" data-color="dark"></button>
                                <button name="sidebar" value="dark2" class="{{$layout->sidebar=='dark2'?'selected':''}} changeSideBarColor" data-color="dark2"></button>
                            </div>
                        </form>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <form action="{{route('admin.backgroundStore')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="btnSwitch">
                                <button name="background" value="bg2" class="{{$layout->sidebar=='bg2'?'selected':''}} changeBackgroundColor" data-color="bg2"></button>
                                <button name="background" value="bg1"  class="{{$layout->sidebar=='bg1'?'selected':''}} changeBackgroundColor" data-color="bg1"></button>
                                <button name="background" value="bg3" class="{{$layout->sidebar=='bg3'?'selected':''}} changeBackgroundColor" data-color="bg3"></button>
                                <button name="background" value="dark" class="{{$layout->sidebar=='dark'?'selected':''}} changeBackgroundColor" data-color="dark"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="flaticon-settings"></i>
            </div>
        </div> --}}
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('backend/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('backend/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    {{-- <script src="{{ asset('backend/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script> --}}



    <!-- Bootstrap Notify -->
    <script src="{{ asset('backend/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    {{-- jQuery Vector Maps
    <script src="{{ asset('backend/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script> --}}

    <!-- Sweet Alert -->
    {{-- <script src="{{ asset('backend/js/plugin/sweetalert/sweetalert.min.js') }}"></script> --}}

    <!-- Atlantis JS -->
    <script src="{{ asset('backend/js/atlantis.min.js') }}"></script>


    {{-- Atlantis DEMO methods, don't include it in your project! --}}
    {{-- <script src="{{ asset('backend/js/setting-demo.js') }}"></script>
    <script src="{{ asset('backend/js/demo.js') }}"></script> --}}

    <script>
        $("form").on('submit', function(e){
            $(this).find('button[type="submit"]').attr('disabled', 'disabled');
        });
    </script>

    @include('sweetalert::alert')
	@stack('custom_scripts')
</body>

</html>
