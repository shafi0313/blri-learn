@extends('frontend.layout.master')
@section('title', '')
@section('content')

    <!--=================================
            Banner -->
    <section class="slider-01">
        <div class="container-fluid px-0">
            <div id="main-slider" class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide slide-01 align-items-center d-flex bg-overlay-black-50 header-position"
                            style="background-image: url({{ asset('uploads/images/slider/' . $slider->image) }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 position-relative">
                                        <div class="banner-content">
                                            <div class="content text-center">
                                                <h1 class="animated text-white mb-3" data-swiper-animation="fadeInUp"
                                                    data-duration="2.0s" data-delay="1.0s">{{ $slider->title }}</h1>
                                                <h6 class="animated text-white" data-swiper-animation="fadeInUp"
                                                    data-duration="2.0s" data-delay="1.5s">{{ $slider->text }}</h6>
                                                {{-- <a class="btn btn-md btn-primary mt-4 animated" href="{{ $slider->link }}"
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
                <div class="all_course owl-carousel owl-theme">
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

    <section class="space-ptb bg-primary">
        <div class="container">
            <div class="row">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">@lang('index.featuredCourses')</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">{{ __('index.popularCourses') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">@lang('index.latestCourses')</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="all_course owl-carousel owl-theme">
                                @foreach ($courses as $course)
                                    <div class="border border-round">
                                        <a href="{{ route('courseDetails', $course->id) }}">
                                            <div class="item">
                                                <div class="card" style="">
                                                    <img src="{{ asset('uploads/images/course/' . $course->image) }}"
                                                        height="200px" class="card-img-top" alt="{{ $course->name }}">
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
                                                        <p title="Teacher" class="m-0"><i
                                                                class="fas fa-chalkboard-teacher"></i>
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
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="all_course owl-carousel owl-theme">
                                @foreach ($courses as $course)
                                    <div class="border border-round">
                                        <a href="{{ route('courseDetails', $course->id) }}">
                                            <div class="item">
                                                <div class="card" style="">
                                                    <img src="{{ asset('uploads/images/course/' . $course->image) }}"
                                                        height="200px" class="card-img-top" alt="{{ $course->name }}">
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
                                                        <p title="Teacher" class="m-0"><i
                                                                class="fas fa-chalkboard-teacher"></i>
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
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row">
                            <div class="all_course owl-carousel owl-theme">
                                @foreach ($courses as $course)
                                    <div class="border border-round">
                                        <a href="{{ route('courseDetails', $course->id) }}">
                                            <div class="item">
                                                <div class="card" style="">
                                                    <img src="{{ asset('uploads/images/course/' . $course->image) }}"
                                                        height="200px" class="card-img-top" alt="{{ $course->name }}">
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
                                                        <p title="Teacher" class="m-0"><i
                                                                class="fas fa-chalkboard-teacher"></i>
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
                </div>
            </div>
        </div>
    </section>




    <!--=================================
        Testimonial and Brands -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-7 text-center">
                    <div class="owl-carousel testimonial" data-nav-arrow="true" data-nav-dots="false" data-items="1"
                        data-lg-items="1" data-md-items="1" data-sm-items="1" data-space="0" data-autoheight="true">
                        <div class="item">
                            <div class="video-image">
                                <img class="img-fluid w-100" src="{{ asset('frontend/images/categories/09.jpg') }}" alt="Logo">
                                <a class="popup-icon popup-youtube" href="https://www.youtube.com/watch?v=LgvseYYhqU0">
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
                                    <h6 class="text-dark">We were treated like royalty. Needless to say we are extremely
                                        satisfied with the results. Thank you for making it painless, pleasant and most of
                                        all hassle free! It fits our needs perfectly.</h6>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-name">
                                        <p class="mb-0 text-primary fw-bold">Michael Bean</p>
                                        <small class="fw-bold">Web Developer</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-image">
                                <img class="img-fluid w-100" src="{{ asset('frontend/images/categories/09.jpg') }}" alt="">
                                <a class="popup-icon popup-youtube" href="https://www.youtube.com/watch?v=LgvseYYhqU0">
                                    <i class="fa fa-play"></i>
                                    <!-- svg start -->
                                    <div class="svg-item">
                                        <svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="48px"
                                            viewBox="0 0 1920 48" style="enable-background:new 0 0 1920 48;"
                                            xml:space="preserve">
                                            <polygon id="XMLID_2_" class="st0" fill="#ffffff"
                                                points="1920,48 0,48 0,48 1920,0 " />
                                        </svg>
                                    </div>
                                    <!-- svg end -->
                                </a>
                            </div>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <h6 class="text-dark">I have gotten at least 50 times the value from Guruma. I will let
                                        my mum know about this, she could really make use of Guruma! Wow what great service,
                                        I love it! Guruma is the real deal!</h6>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-name">
                                        <p class="mb-0 text-primary fw-bold">Mariquilla V.</p>
                                        <small class="fw-bold">Production Manager</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-image">
                                <img class="img-fluid w-100" src="{{ asset('frontend/images/categories/09.jpg') }}" alt="">
                                <a class="popup-icon popup-youtube" href="https://www.youtube.com/watch?v=LgvseYYhqU0">
                                    <i class="fa fa-play"></i>
                                    <!-- svg start -->
                                    <div class="svg-item">
                                        <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="48px"
                                            viewBox="0 0 1920 48" style="enable-background:new 0 0 1920 48;"
                                            xml:space="preserve">
                                            <polygon id="XMLID_3_" class="st0" fill="#ffffff"
                                                points="1920,48 0,48 0,48 1920,0 " />
                                        </svg>
                                    </div>
                                    <!-- svg end -->
                                </a>
                            </div>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <h6 class="text-dark">We've seen amazing results already. Since I invested in Guruma I
                                        made over 100,000 dollars profits. It's the perfect solution for our business. I was
                                        amazed at the quality of Guruma.</h6>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-name">
                                        <p class="mb-0 text-primary fw-bold">Fern W.</p>
                                        <small class="fw-bold">Vetrov Systems Development</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 align-self-center ps-0 ps-lg-5 mt-5 mt-lg-0">
                    <div class="ps-3 ps-lg-4">
                        <div class="section-title">
                            <h2 class="mb-4 mb-lg-5">Trusted by more than 10,000 companies in 140 countries.</h2>
                        </div>
                        <a href="#" class="btn btn-primary">More our customers</a>
                        <hr class="my-5">
                        <h5 class="text-primary mt-md-4 mt-lg-5 mb-3">Need to train your team?</h5>
                        <div class="row">
                            <div class="col-lg-6 col-sm-3 col-6 mb-3 mb-sm-0"><img class="img-fluid grayscale pt-4 w-75"
                                    src="{{ asset('frontend/images/award-logo/01.svg') }}" alt=""></div>
                            <div class="col-lg-6 col-sm-3 col-6 mb-3 mb-sm-0"><img class="img-fluid grayscale pt-4 w-75"
                                    src="{{ asset('frontend/images/award-logo/05.svg') }}" alt=""></div>
                            <div class="col-lg-6 col-sm-3 col-6 "><img class="img-fluid grayscale pt-4 pt-lg-5 w-75"
                                    src="images/award-logo/03.svg" alt=""></div>
                            <div class="col-lg-6 col-sm-3 col-6 "><img class="img-fluid grayscale pt-4 pt-lg-5 w-75"
                                    src="images/award-logo/04.svg" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                Testimonial and Brands -->






    <!--=================================
              Category -->
    <section class="space-pt">
        <div class="bg-primary bg-overlay-theme-97 space-ptb"
            style="background-image: url('images/bg/04.jpg'); background-position: center;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 position-relative">
                        <div class="section-title text-center mb-5">
                            <h2 class="text-white">@lang('index.topCategories')</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="bg-white mt-n5 mt-sm-n4 mt-md-n5 mt-lg-n6 position-relative z-index-1 rounded-sm">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <div class="categories categories-style-02">
                            @foreach ($categories as $category)
                                <a href="{{ route('courseByCat', $category->id) }}" class="categories-title">
                                    <div class="categories-item">
                                        <div class="categories-icon">
                                            @if ($category->image)
                                                <img src="{{ asset('uploads/images/course/' . $category->image) }}"
                                                    alt="" width="40x">
                                            @else
                                                <i class="flaticon-statistics fa-1x mt-3"></i>
                                            @endif
                                        </div>
                                        <a href="{{ route('courseByCat', $category->id) }}"
                                            class="categories-title">{{ $category->name }}</a>
                                    </div>
                                </a>
                            @endforeach
                            {{-- <div class="clearfix"></div>
                  <div class="show-more-cat">
                    <a href="#" class="">Show more<i class="fas fa-arrow-right icon-btn"></i></a>
                  </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              Category -->

    @push('custom_scripts')
        <script>
            $('.all_course').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            })
            // $('.testimonial').owlCarousel({
            //     loop: true,
            //     margin: 10,
            //     nav: false,
            //     responsive: {
            //         0: {
            //             items: 1
            //         },
            //         600: {
            //             items: 1
            //         },
            //         1000: {
            //             items: 1
            //         }
            //     }
            // })
        </script>
    @endpush
@endsection
