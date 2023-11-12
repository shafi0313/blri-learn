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


    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2>@lang('index.featuredCourse')</h2>
                        {{-- <p>We know this in our gut, but what can we do about it? How can we motivate ourselves? One of the most difficult aspects of achieving success is staying motivated over the long haul.</p> --}}
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
                                    <div class="card" style="">
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
    </section>

    <!--=================================
              Course -->
    <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2>@lang('index.featuredCourse')</h2>
                        {{-- <p>Success isn’t really that difficult. There is a significant portion of the population here in
                            North America, that actually want and need success to be hard! Why.</p> --}}
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
                            <button class="btn-filter" data-group="course{{ $course->id }}">{{ $course->category->name }}</button>
                        @endforeach
                    </div>
                    <div class="my-shuffle-container grid-4">
                        @foreach ($courses as $course)
                            <div class="grid-item" data-groups='["course{{ $course->id }}"]'>
                                <div class="course">
                                    <div class="course-img">
                                        <img class="img-fluid" src="{{ imagePath('course', $course->image) }}" alt="{{ $course->category->name }}">
                                        <a href="#" class="course-category"><i
                                                class="far fa-bookmark"></i>{{ $course->name }}</a>
                                    </div>
                                    <div class="course-info">
                                        <div class="course-title">
                                            <a href="#">Basic web development & coding online course</a>
                                        </div>
                                        <div class="course-instructor">by
                                            <a href="#">Alice Williams</a>
                                        </div>
                                        <div class="course-rate-price">
                                            <div class="rating">
                                                <span>4.4</span>
                                                <a href="#">578 Ratings</a>
                                            </div>
                                            <div class="price">$59</div>
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
                        <h5 class="text-white">একটি মানুষ যতদিন শিক্ষার প্রতি আকর্ষিত থাকে, ততদিন সে জ্ঞানী থাকে,আর যখনই তার মধ্যে এই ধারণার জন্ম নেয় যে সে জ্ঞানী হয়ে গেছে,তখনই মূর্খতা এবং অজ্ঞতা তাকে ঘিরে ধরে।</h5>
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
                                <img class="img-fluid w-100" src="{{ imagePath('static','video-1.jpg') }}" alt="">
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
                                    <h6 class="text-dark">গরু হৃষ্টপুষ্ট করণ গুরুত্বের উপর মহাপরিচালক  ড.  এস এম জাহাঙ্গীর হোসেন এর বক্তব্য ।</h6>
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
                                <img class="img-fluid w-100" src="{{ imagePath('static','video-2.jpg') }}" alt="">
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
                                    <h6 class="text-dark">বিএলআরআই প্রশিক্ষণ জানালায় জনপ্রিয় প্রযুক্তি সমূহ অন্তর্ভুক্তি করণ।</h6>
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
                                <img class="img-fluid w-100" src="{{ imagePath('static','video-3.jpg') }}" alt="">
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
                {{-- <div class="col-lg-6 col-xl-5 align-self-center ps-0 ps-lg-5 mt-5 mt-lg-0">
                    <div class="ps-3 ps-lg-4">
                        <div class="section-title">
                            <h2 class="mb-4 mb-lg-5">Trusted by more than 10,000 companies in 140 countries.</h2>
                        </div>
                        <a href="#" class="btn btn-primary">More our customers</a>
                        <hr class="my-5">
                        <h5 class="text-primary mt-md-4 mt-lg-5 mb-3">Need to train your team?</h5>
                        <div class="row">
                            <div class="col-lg-6 col-sm-3 col-6 mb-3 mb-sm-0"><img class="img-fluid grayscale pt-4 w-75"
                                    src="images/award-logo/01.svg" alt=""></div>
                            <div class="col-lg-6 col-sm-3 col-6 mb-3 mb-sm-0"><img class="img-fluid grayscale pt-4 w-75"
                                    src="images/award-logo/05.svg" alt=""></div>
                            <div class="col-lg-6 col-sm-3 col-6 "><img class="img-fluid grayscale pt-4 pt-lg-5 w-75"
                                    src="images/award-logo/03.svg" alt=""></div>
                            <div class="col-lg-6 col-sm-3 col-6 "><img class="img-fluid grayscale pt-4 pt-lg-5 w-75"
                                    src="images/award-logo/04.svg" alt=""></div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--=================================
                    Testimonial and Brands -->

    <!--=================================
                    Feature info -->
    {{-- <section class="space-pb pt-0 pt-lg-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="bg-dark rounded-sm p-3 p-sm-4 p-xl-5">
                        <div class="m-2">
                            <div class="d-flex align-items-center mb-3">
                                <i class="flaticon-book fa-4x text-white me-4"></i>
                                <h3 class="mb-0 mt-0 text-white">Become a instructor on Guruma</h3>
                            </div>
                            <p class="mb-4 text-white lead">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat.</p>
                            <a class="btn btn-outline-primary" href="#">Start teaching today</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-primary rounded-sm p-3 p-sm-4 p-xl-5">
                        <div class="m-2">
                            <div class="d-flex align-items-center mb-3">
                                <i class="flaticon-book-1 fa-4x text-white me-4"></i>
                                <h3 class="mb-0 mt-0 text-white">Guruma for business & Community</h3>
                            </div>
                            <p class="mb-4 text-white lead">Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                qui officia deserunt.</p>
                            <a class="btn btn-light" href="#">Get guruma for business</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--=================================
                    Feature info -->

    <!--=================================
                    Feature info and Progress -->
    {{-- <section class="space-ptb bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title mb-4">
                        <h2>Plenty of reasons to choose us</h2>
                        <p>Without clarity, you send a very garbled message out to the Universe.</p>
                    </div>
                    <p class="mb-4">I truly believe Augustine’s words are true and if you look at history you know it is
                        true. There are many people in the world with amazing talents.</p>
                    <div class="row">
                        <div class="col-sm-6 mb-4 pb-2">
                            <div class="d-flex align-items-center p-4 box-shadow rounded-sm bg-white">
                                <i class="flaticon-hand fa-2x text-primary me-3"></i>
                                <p class="fw-bold text-dark mb-0">Inspirational Professor speech </p>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4 pb-2">
                            <div class="d-flex align-items-center p-4 box-shadow rounded-sm bg-white">
                                <i class="flaticon-student fa-2x text-primary me-3"></i>
                                <p class="fw-bold text-dark mb-0">Expert Leadership definition </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-4 mb-sm-0 pb-2 pb-sm-0">
                            <div class="d-flex align-items-center p-4 box-shadow rounded-sm bg-white">
                                <i class="flaticon-vector fa-2x text-primary me-3"></i>
                                <p class="fw-bold text-dark mb-0">Supportive Parents & Friends </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-4 box-shadow rounded-sm bg-white">
                                <i class="flaticon-online-learning-3 fa-2x text-primary me-3"></i>
                                <p class="fw-bold text-dark mb-0">Developing Academically Education</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-fluid rounded-sm" src="images/about/01.jpg" alt="">
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <img class="img-fluid rounded-sm" src="images/about/02.jpg" alt="">
                        </div>
                    </div>
                    <div class="progress-style-1 mt-5">
                        <div class="progress-item">
                            <div class="progress-title">Finance</div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 58%;"
                                    aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                    <span>58%</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-item">
                            <div class="progress-title">Marketing</div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 79%;"
                                    aria-valuenow="79" aria-valuemin="0" aria-valuemax="100">
                                    <span>60%</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-item">
                            <div class="progress-title">Business</div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width:85%;"
                                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                    <span>85%</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-item">
                            <div class="progress-title">Design</div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 91%;"
                                    aria-valuenow="91" aria-valuemin="0" aria-valuemax="100">
                                    <span>87%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--=================================
                    Feature info and Progress -->

    <!--=================================
                    News -->
    {{-- <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-sm-10">
                    <div class="section-title text-center">
                        <h2>News, Tips & Articles</h2>
                        <p>The best way is to develop and follow a plan. Start with your goals in mind and then work.
                            backwards to develop the plan. What steps are required to get you to the goals.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="blog-post-style-02 mb-4 mb-md-0">
                        <div class="blog-post-img">
                            <img class="img-fluid" src="images/blog/9.jpg" alt="">
                        </div>
                        <div class="blog-post-info">
                            <div class="blog-post-category">
                                <a href="#">Education,</a>
                                <a href="#">Course</a>
                            </div>
                            <h5 class="blog-post-title"><a href="#">You can expand students access to learning</a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="blog-post-style-02">
                                <div class="blog-post-img">
                                    <img class="img-fluid" src="images/blog/10.jpg" alt="">
                                </div>
                                <div class="blog-post-info">
                                    <div class="blog-post-category">
                                        <a href="#">Study,</a>
                                        <a href="#">Learning</a>
                                    </div>
                                    <h5 class="blog-post-title"><a href="#">The greatest choice of courses</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-0 mt-md-1">
                            <div class="blog-post-style-02">
                                <div class="blog-post-img">
                                    <img class="img-fluid" src="images/blog/11.jpg" alt="">
                                </div>
                                <div class="blog-post-info">
                                    <div class="blog-post-category">
                                        <a href="#">Leadership,</a>
                                        <a href="#">University</a>
                                    </div>
                                    <h5 class="blog-post-title"><a href="#">12 great free online courses</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--=================================
                    News -->

    <!--=================================
                    Download Our Android And IOS App -->
    {{-- <section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-primary rounded-sm px-4 pb-0" style="background-image: url('images/bg/04.png');">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mt-4 mt-lg-5 text-lg-center order-2 order-lg-1">
                                <img class="img-fluid" src="images/mobile-app/01.png" alt="">
                            </div>
                            <div class="col-xl-5 col-lg-6 mt-4 order-1 order-lg-2">
                                <h2 class="text-white">Download Our Android And IOS App</h2>
                                <p class="text-white mb-4">Positive pleasure-oriented goals are much more powerful
                                    motivators than negative fear-based ones.</p>
                                <div class="d-flex flex-wrap mb-0 mb-lg-2">
                                    <a class="btn btn-outline-dark btn-app me-0 me-sm-2 mb-2 mb-sm-0" href="#">
                                        <i class="fab fa-apple"></i>
                                        <div class="btn-text text-start">
                                            <small>Download on the </small>
                                            <span class="mb-0 d-block">App Store</span>
                                        </div>
                                    </a>
                                    <a class="btn btn-outline-dark btn-app mb-2 mb-sm-0" href="#">
                                        <i class="fab fa-google-play"></i>
                                        <div class="btn-text text-start">
                                            <small>Get it on </small>
                                            <span class="mb-0 d-block">Google Play</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--=================================
                    Download Our Android And IOS App -->
@endsection
