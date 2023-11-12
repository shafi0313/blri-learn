@extends('frontend.layouts.app')
@section('content')
    <!--=================================
                            Banner -->
    <section class="slider-01">
        <div class="container-fluid px-0">
            <div id="main-slider" class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide slide-01 align-items-center d-flex bg-overlay-black-50 header-position"
                            style="background-image: url({{ imagePath('slider', $slider->image) }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 position-relative">
                                        <div class="banner-content">
                                            <div class="content text-center">
                                                <h1 class="animated text-white mb-3" data-swiper-animation="fadeInUp"
                                                    data-duration="2.0s" data-delay="1.0s">{{ $slider->title }}</h1>
                                                <h6 class="animated text-white" data-swiper-animation="fadeInUp"
                                                    data-duration="2.0s" data-delay="1.5s">{{ $slider->text }}</h6>
                                                {{-- <a class="btn btn-md btn-primary mt-4 animated" href="#"
                                                    data-swiper-animation="fadeInUp" data-duration="2.0s"
                                                    data-delay="2.0s">Ready to get started? </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- Pagination -->
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"><i
                        class="fas fa-chevron-left"></i></div>
                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"><i
                        class="fas fa-chevron-right"></i></div>
            </div>
        </div>
    </section>
    <!--=================================
                              Banner -->

    <!--=================================
                              info box -->
    <section class="bg-primary">
        <div class="container">
            <div class="row feature-info-02">
                <div class="col-sm-4 py-4 text-center">
                    <i class="fa fa-users fa-3x text-white"></i>
                    <h4 class="fw-5 mt-3 mb-0 text-white">{{ $student }}</h4>
                    <p class="mb-0 text-white">@lang('index.totalStudent')</p>
                </div>
                <div class="col-sm-4 py-4 text-center">
                    <i class="fa fa-book-open fa-3x text-white"></i>
                    <h4 class="fw-5 mt-3 mb-0 text-white">{{ $courses->count() }}</h4>
                    <p class="mb-0 text-white">@lang('index.totalCourse')</p>
                </div>
                <div class="col-sm-4 py-4 text-center">
                    <i class="fa fa-running fa-3x mt-2 text-white"></i>
                    <h4 class="fw-5 mt-3 mb-0 text-white">{{ $courses->where('status', 0)->count() }}</h4>
                    <p class="mb-0 text-white">@lang('index.runningCourse')</p>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                              info box -->


    {{-- <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2>@lang('index.featuredCourse')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-items="4" data-md-items="3"
                    data-sm-items="3" data-xs-items="2" data-xx-items="1" data-space="30" data-autoheight="true">
                    @foreach ($courses as $course)
                        <div class="border border-round">
                            <a href="{{ route('courseDetails', $course->id) }}">
                                <div class="item">
                                    <div class="card">
                                        <img src="{{ asset('uploads/images/course/' . $course->image) }}" height="200px"
                                            class="card-img-top" alt="{{ $course->name }}">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $course->name }}</h6>
                                            @forelse ($course->courseReviews as $coursesReview)
                                                <ul class="list-unstyled d-flex mb-0">
                                                    <li><i
                                                            class="{{ $coursesReview->ratings >= 1 ? 'fas' : 'far' }} fa-star  text-warning"></i>
                                                    </li>
                                                    <li><i
                                                            class="{{ $coursesReview->ratings >= 2 ? 'fas' : 'far' }} fa-star text-warning"></i>
                                                    </li>
                                                    <li><i
                                                            class="{{ $coursesReview->ratings >= 3 ? 'fas' : 'far' }} fa-star text-warning"></i>
                                                    </li>
                                                    <li><i
                                                            class="{{ $coursesReview->ratings >= 4 ? 'fas' : 'far' }} fa-star text-warning"></i>
                                                    </li>
                                                    <li><i
                                                            class="{{ $coursesReview->ratings >= 5 ? 'fas' : 'far' }} fa-star text-warning"></i>
                                                    </li>
                                                </ul>
                                            @empty
                                                <ul class="list-unstyled d-flex mb-0">
                                                    <li><i class="far fa-star text-warning"></i></li>
                                                    <li><i class="far fa-star text-warning"></i></li>
                                                    <li><i class="far fa-star text-warning"></i></li>
                                                    <li><i class="far fa-star text-warning"></i></li>
                                                    <li><i class="far fa-star text-warning"></i></li>
                                                </ul>
                                            @endforelse
                                            <p title="Teacher" class="m-0"><i class="fas fa-chalkboard-teacher"></i>
                                                {{ $course->user->name }}</p>
                                            <p title="মোট অংশগ্রহণকারী"><i class="fas fa-user-graduate"></i>
                                                {{ $course->enrollCounts->groupBy('course_id')->count() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}
    <!--=================================
                Course -->
    <section class="space-ptb bg-light overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-1 col-md-10 offset-lg-2 col-lg-8 offset-xl-3 col-xl-6">
                    <div class="section-title text-center">
                        <h2>@lang('index.featuredCourse')</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="owl-carousel testimonial-center" data-nav-dots="false" data-nav-arrow="false" data-items="5"
                        data-md-items="3" data-sm-items="2" data-xs-items="2" data-xx-items="1" data-space="20"
                        data-autoheight="false">
                        @foreach ($courses as $course)
                            <div class="item">
                                <div class="course">
                                    <div class="course-img">
                                        <img src="{{ imagePath('course', $course->image) }}" alt="{{ $course->name }}">
                                        <a href="{{ route('courseDetails', $course->id) }}" class="course-category"><i
                                                class="far fa-bookmark"></i>{{ $course->category->name }}</a>
                                    </div>
                                    <div class="course-info">
                                        <div class="course-title">
                                            <a href="{{ route('courseDetails', $course->id) }}">{{ $course->name }}</a>
                                        </div>
                                        <div class="course-instructor">by
                                            <a href="#">{{ $course->user->name }}</a>
                                        </div>
                                        <div class="course-rate-price">
                                            <div class="rating">
                                                <span><i class="fas fa-user-graduate"></i>
                                                    {{ $course->enrollCounts->groupBy('course_id')->count() }}</span>মোট
                                                অংশগ্রহণকারী
                                                {{-- <a href="#">578 Ratings</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--=================================
                  Course -->


    <!--=================================
                      How It Works -->
    <section class="space-pt" style="background: #dcfaec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <h2>ফিচারসমূহ</h2>
                    </div>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-sm-4 mb-4 mb-sm-0">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <i class="flaticon-register fa-4x text-white bg-primary rounded-circle"></i>
                            <img class="d-lg-block d-none" src="{{ asset('frontend/images/feature-info/arrow-01.png') }}"
                                alt="">
                        </div>
                        <h4 class="my-4">অনলাইন কোর্স</h4>
                        <p class="mb-0">প্রশিক্ষণ জানালাই বিভিন্ন বিষয়ের উপর একাধিক ক্যাটাগরিতে কোর্সে রয়েছে।
                            প্ল্যাটফর্মে যুক্ত হয়ে আপনার পছন্দের বিষয়ের কোর্সগুলো বেছে নিন।</p>
                    </div>
                </div>
                <div class="col-sm-4 mb-4 mb-sm-0">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <i class="flaticon-add-user fa-4x text-white bg-primary rounded-circle"></i>
                            <img class="d-lg-block d-none" src="{{ asset('frontend/images/feature-info/arrow-02.png') }}"
                                alt="">
                        </div>
                        <h4 class="my-4">অ্যাসেসমেন্ট সেন্টার</h4>
                        <p class="mb-0">প্রশিক্ষণ জানালাই পাচ্ছেন কুইজ, লিখিত, মৌখিকসহ ১০ এর অধিক ক্যাটাগরিতে পরীক্ষা
                            গ্রহণ ও ফলাফল প্রকাশের সুবিধা।</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <i class="flaticon-edit fa-4x text-white bg-primary rounded-circle"></i>
                        </div>
                        <h4 class="my-4">ভার্চুয়াল ক্লাসরুম</h4>
                        <p class="mb-0">অনলাইন/অফলাইন/ব্লেন্ডেড পদ্ধতিতে ক্লাস নিয়ে ভাবছেন? এই সুযোগের সদ্ব্যবহার করতে
                            প্রশিক্ষণ জানালাই যোগ দিন।</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                      How It Works -->



    <!--=================================
                              Course -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2>@lang('index.course') @lang('index.mCategory')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 position-relative">
                    <div class="filters-group mb-2 mb-4">
                        <button class="btn-filter active" data-group="all">All</button>
                        @foreach ($courses->groupBy('course_cat_id') as $course)
                            @php
                                $course = $course->first();
                            @endphp
                            <button class="btn-filter"
                                data-group="course{{ $course->id }}">{{ $course->category->name }}</button>
                        @endforeach
                    </div>
                    <div class="my-shuffle-container grid-4">
                        @foreach ($courses as $course)
                            <div class="grid-item" data-groups='["course{{ $course->id }}"]'>
                                <div class="course">
                                    <div class="course-img">
                                        <img src="{{ imagePath('course', $course->image) }}"
                                            alt="{{ $course->category->name }}">
                                        <a href="{{ route('courseDetails', $course->id) }}" class="course-category">
                                            <i class="far fa-bookmark"></i>{{ $course->category->name }}
                                        </a>
                                    </div>
                                    <div class="course-info">
                                        <div class="course-title">
                                            <a href="{{ route('courseDetails', $course->id) }}"
                                                title="{{ $course->name }}">{{ Str::limit($course->name, 26) }}</a>
                                        </div>
                                        <div class="course-instructor">by
                                            <a href="#">{{ $course->user->name }}</a>
                                        </div>
                                        <div class="course-rate-price">
                                            <div class="rating">
                                                <span><i class="fas fa-user-graduate"></i>
                                                    {{ $course->enrollCounts->groupBy('course_id')->count() }}</span>মোট
                                                অংশগ্রহণকারী
                                                {{-- <a href="#">578 Ratings</a> --}}
                                            </div>
                                            {{-- <div class="price">{{ $course->enrollCounts->groupBy('course_id')->count() }}</div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                              Course -->

    <!--=================================
                              Action box -->
    <section class="space-ptb bg-overlay-theme-90" data-jarallax='{"speed": 0.5}'
        style="background-image: url('images/bg/01.jpg'); background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center my-4 position-relative">
                    <div class="section-title mb-4">
                        <h5 class="text-white">একটি মানুষ যতদিন শিক্ষার প্রতি আকর্ষিত থাকে, ততদিন সে জ্ঞানী থাকে,আর যখনই
                            তার মধ্যে এই ধারণার জন্ম নেয় যে সে জ্ঞানী হয়ে গেছে,তখনই মূর্খতা এবং অজ্ঞতা তাকে ঘিরে ধরে।</h5>
                        {{-- <p class="text-white mb-0">একটি মানুষ যতদিন শিক্ষার প্রতি আকর্ষিত থাকে, ততদিন সে জ্ঞানী থাকে,আর যখনই তার মধ্যে এই ধারণার জন্ম নেয় যে সে জ্ঞানী হয়ে গেছে,তখনই মূর্খতা এবং অজ্ঞতা তাকে ঘিরে ধরে।.</p> --}}
                    </div>
                    {{-- <a class="btn btn-light" href="">Get started</a> --}}
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                              Action box -->

    <!--=================================
                              Testimonial and Brands -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-7 text-center">
                    <div class="owl-carousel testimonial" data-nav-arrow="true" data-nav-dots="false" data-items="1"
                        data-lg-items="1" data-md-items="1" data-sm-items="1" data-space="0" data-autoheight="true">
                        <div class="item">
                            <div class="video-image">
                                <img class="img-fluid w-100" src="{{ imagePath('static', 'video-1.jpg') }}"
                                    alt="">
                                <a class="popup-icon popup-youtube" href="https://www.youtube.com/watch?v=L83evm5SQSw">
                                    <i class="fa fa-play"></i>
                                    <!-- svg start -->
                                    <div class="svg-item">
                                        <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="48px"
                                            viewBox="0 0 1920 48" style="enable-background:new 0 0 1920 48;"
                                            xml:space="preserve">
                                            <polygon id="XMLID_1_" class="st0" fill="#ffffff"
                                                points="1920,48 0,48 0,48 1920,0 " />
                                        </svg>
                                    </div>
                                    <!-- svg end -->
                                </a>
                            </div>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <h6 class="text-dark">গরু হৃষ্টপুষ্ট করণ গুরুত্বের উপর মহাপরিচালক ড. এস এম জাহাঙ্গীর
                                        হোসেন এর বক্তব্য ।</h6>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-name">
                                        <p class="mb-0 text-primary fw-bold">ড. এস এম জাহাঙ্গীর হোসেন</p>
                                        <small class="fw-bold">মহাপরিচালক</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-image">
                                <img class="img-fluid w-100" src="{{ imagePath('static', 'video-2.jpg') }}"
                                    alt="">
                                <a class="popup-icon popup-youtube" href="https://www.youtube.com/watch?v=ZMnmwNT1Maw">
                                    <i class="fa fa-play"></i>
                                    <!-- svg start -->
                                    <div class="svg-item">
                                        <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="48px"
                                            viewBox="0 0 1920 48" style="enable-background:new 0 0 1920 48;"
                                            xml:space="preserve">
                                            <polygon id="XMLID_1_" class="st0" fill="#ffffff"
                                                points="1920,48 0,48 0,48 1920,0 " />
                                        </svg>
                                    </div>
                                    <!-- svg end -->
                                </a>
                            </div>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <h6 class="text-dark">বিএলআরআই প্রশিক্ষণ জানালায় জনপ্রিয় প্রযুক্তি সমূহ অন্তর্ভুক্তি
                                        করণ।</h6>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-name">
                                        <p class="mb-0 text-primary fw-bold">ড. নাসরিন সুলতানা এর বক্তব্য</p>
                                        <small class="fw-bold">পরিচালক (গবেষণা)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-image">
                                <img class="img-fluid w-100" src="{{ imagePath('static', 'video-3.jpg') }}"
                                    alt="">
                                <a class="popup-icon popup-youtube" href="https://www.youtube.com/watch?v=kZ4_AwyJGc8">
                                    <i class="fa fa-play"></i>
                                    <!-- svg start -->
                                    <div class="svg-item">
                                        <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="48px"
                                            viewBox="0 0 1920 48" style="enable-background:new 0 0 1920 48;"
                                            xml:space="preserve">
                                            <polygon id="XMLID_1_" class="st0" fill="#ffffff"
                                                points="1920,48 0,48 0,48 1920,0 " />
                                        </svg>
                                    </div>
                                    <!-- svg end -->
                                </a>
                            </div>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <h6 class="text-dark">অনলাইনে বিএলআরআই এর প্রযুক্তি সমূহের প্রশিক্ষণের অগ্রযাত্রা।</h6>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-name">
                                        <p class="mb-0 text-primary fw-bold">ড. কামরুন নাহার মনিরা</p>
                                        <small class="fw-bold">ইনোভেটর</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 align-self-center ps-0 ps-lg-5 mt-5 mt-lg-0">
                    <div class="ps-3 ps-lg-4">
                        <div class="section-title">
                            <h2 class="mb-4 mb-lg-5">Don’t change your learning just change a way of learning</h2>
                        </div>
                        {{-- <a href="#" class="btn btn-primary">More our customers</a> --}}
                        <hr class="my-5">
                        {{-- <h5 class="text-primary mt-md-4 mt-lg-5 mb-3">Everything you need to build an amazing online education website.</h5> --}}
                        {{-- <div class="row">
                            <div class="col-lg-6 col-sm-3 col-6 mb-3 mb-sm-0"><img class="img-fluid grayscale pt-4 w-75"
                                    src="images/award-logo/01.svg" alt=""></div>
                            <div class="col-lg-6 col-sm-3 col-6 mb-3 mb-sm-0"><img class="img-fluid grayscale pt-4 w-75"
                                    src="images/award-logo/05.svg" alt=""></div>
                            <div class="col-lg-6 col-sm-3 col-6 "><img class="img-fluid grayscale pt-4 pt-lg-5 w-75"
                                    src="images/award-logo/03.svg" alt=""></div>
                            <div class="col-lg-6 col-sm-3 col-6 "><img class="img-fluid grayscale pt-4 pt-lg-5 w-75"
                                    src="images/award-logo/04.svg" alt=""></div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
            Testimonial -->
    <section class="space-ptb bg-primary" data-jarallax='{"speed": 0.5}'
        style="background-image: url({{ asset('frontend/images/bg/09.png') }}); background-size: cover;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <div class="section-title">
                        <h2 class="text-white">ব্যবহারকারীদের মতামত</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-items="2"
                        data-md-items="2" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0"
                        data-autoheight="true">
                        <div class="item">
                            <div class="testimonial-style-03">
                                <div class="testimonial-info">
                                    <div class="testimonial-quote">
                                        <i class="text-white opacity-5 flaticon-quote"></i>
                                    </div>
                                    <div class="testimonial-content">
                                        এটা চমৎকার অ্যাপ। এটি শিক্ষার্থীদের জন্যও কার্যকর। তাছাড়া এটা খুবই উপকারী। সুতরাং, শিক্ষার্থীদের এই অ্যাপটি ব্যবহার করা উচিত এবং কোনো চার্জ ছাড়াই বিভিন্ন কোর্সে অংশগ্রহণ করা উচিত & আমরা নতুন তথ্যও পেতে পারি।
                                    </div>
                                    <div class="testimonial-author">
                                        <div class="avatar avatar-md">
                                            <img class="img-fluid " src="{{ asset('frontend/images/avatar/04.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="testimonial-name">
                                            <h6 class="text-white">Ariful Islam</h6>
                                            {{-- <span class="text-white">- CEO</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-style-03">
                                <div class="testimonial-info">
                                    <div class="testimonial-quote">
                                        <i class="text-white opacity-5 flaticon-quote"></i>
                                    </div>
                                    <div class="testimonial-content">
                                        প্রাথমিক ও মাধ্যমিক শিক্ষকের গুণগত মানোন্নয়নের জন্য সরকার বিভিন্ন উপায়ে
                                        প্রাতিষ্ঠানিক প্রশিক্ষণ দিয়ে থাকেন। এইজন্য সরকারকারকে যেমন ভৌত অবকাঠামো ও লোকবল
                                        নিয়োগ প্রদান ও পরিচালনা ব্যবস্থা বাবদ প্রচুর অর্থ ব্যয় করতে হয় অপরপক্ষে একটি বিরাট
                                        সংখ্যক স্কুল শিক্ষকবৃন্দের প্রশিক্ষণের ব্যবস্থা
                                    </div>
                                    <div class="testimonial-author">
                                        <div class="avatar avatar-md">
                                            <img class="img-fluid " src="{{ asset('frontend/images/avatar/05.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="testimonial-name">
                                            <h6 class="text-white">Mohammad Al-Imran</h6>
                                            {{-- <span class="text-white">- CTO</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="item">
                            <div class="testimonial-style-03">
                                <div class="testimonial-info">
                                    <div class="testimonial-quote">
                                        <i class="text-white opacity-5 flaticon-quote"></i>
                                    </div>
                                    <div class="testimonial-content">
                                        One of the most complete themes here. Thanks a lot for such great features, pages,
                                        shortcodes and home variations. And the best of all, great introductions prices.
                                    </div>
                                    <div class="testimonial-author">
                                        <div class="avatar avatar-md">
                                            <img class="img-fluid " src="images/avatar/06.jpg" alt="">
                                        </div>
                                        <div class="testimonial-name">
                                            <h6 class="text-white">Alice Williams</h6>
                                            <span class="text-white">- Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              Testimonial -->
@endsection
