@extends('frontend.layouts.app')
@section('content')
    <!--=================================
            Inner Header -->
    <section class="inner-header bg-holder bg-overlay-black-90" style="background-image: url('images/bg/03.jpg');">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <h1 class="breadcrumb-title mb-0 text-white">Contact Us</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb d-flex justify-content-center justify-content-md-end ms-auto">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                        <li class="breadcrumb-item active"><span>Contact Us</span></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              Inner Header -->

    <!--=================================
              Contact Us -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <form class="row fill-form mb-4 mb-md-0 form-flat-style">
                        <div class="mb-3 col-sm-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <button type="submit" class="btn btn-primary">Send us</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <h4 class="mb-4">Contact Detail</h4>
                    <p class="mb-2">Saver, Dhaka</p>
                    <p class="mb-2"><b class="text-dark">Call us:</b> 0000000000</p>
                    <p class="mb-4"><b class="text-dark">Mail us:</b> support@elearning-blri.com</p>
                    <div class="social-icon-round icon-sm">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ URL::to('https://www.youtube.com/@-sj5nt') }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              Contact Us -->

    <!--=================================
              Additional Info -->
    {{-- <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <h2>Additional Contact Info</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center px-0 px-sm-3 mb-4 mb-md-0">
                        <i class="flaticon-support fa-3x text-primary"></i>
                        <h4 class="my-4">Our Support Center</h4>
                        <p class="mb-0">For those of you who are serious about having more, doing more, giving more and
                            being more, success is achievable.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center px-0 px-sm-3 mb-4 mb-md-0">
                        <i class="flaticon-video fa-3x text-primary"></i>
                        <h4 class="my-4">Chat To Us Online</h4>
                        <p class="mb-0">The first thing to remember about success is that it is a process – nothing more,
                            nothing less. There is really no magic.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center px-0 px-sm-3">
                        <i class="flaticon-clock-1 fa-3x text-primary"></i>
                        <h4 class="my-4">Education Hours</h4>
                        <p class="mb-0">Monday to Friday : 10 am – 7 pm.<br> Saturday : 9 am – 1 pm. <br>Sunday : Closed
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--=================================
              Additional Info -->

    <!--=================================
              map -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-0" style="height: 500px">
                        <div id="g-mapdisplay" style="height:100%; width:100%;max-width:100%;">
                            <iframe style="height:100%;width:100%;border:0;" frameborder="0"
                                src="https://www.google.com/maps/embed/v1/place?q=Bangladesh+Livestock+Research+Institute,+Dhaka+-+Aricha+Highway,+Ashulia,+Bangladesh&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                        </div>

                </div>
            </div>
        </div>
    </section>
    <!--=================================
              map -->
    @push('custom_scripts')
    @endpush
@endsection
