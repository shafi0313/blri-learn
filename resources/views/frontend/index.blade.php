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
                    style="background-image: url({{ asset('uploads/images/slider/'. $slider->image) }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 position-relative">
                                <div class="banner-content">
                                    <style>
                                        .content h1 {
                                            font-size: 40px;
                                            line-height: 1.3;
                                        }
                                        .content h6 {
                                            font-size: 30px;
                                            line-height: 1.3;
                                        }
                                    </style>
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
                <h4 class="fw-5 mt-3 mb-0 text-white">{{$student}}</h4>
                <p class="mb-0 text-white">@lang('index.totalStudent')</p>
            </div>
            <div class="col-sm-4 py-4 text-center">
                <i class="fa fa-book-open fa-3x text-white"></i>
                <h4 class="fw-5 mt-3 mb-0 text-white">{{ $courses->count() }}</h4>
                <p class="mb-0 text-white">@lang('index.totalCourse')</p>
            </div>
            <div class="col-sm-4 py-4 text-center">
                <i class="fa fa-running fa-3x mt-2 text-white"></i>
                <h4 class="fw-5 mt-3 mb-0 text-white">{{ $courses->where('status',0)->count() }}</h4>
                <p class="mb-0 text-white">@lang('index.runningCourse')</p>
            </div>
        </div>
    </div>
</section>
<!--=================================
      info box -->

<!--=================================
      Education Categories -->
{{-- <section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h2>{{__('index.featuredCourses')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($courses as $course)
              <div class="col-md-3 col-sm-6">
                <a href="{{ route('courseDetails', $course->id) }}">
                  <div class="categories">
                    <img class="img-fluid" src="{{ asset('uploads/images/course/'.$course->image) }}" alt="">
                    <h6 class="categories-title">{{ $course->name }}</h6>
                  </div>
                </a>
              </div>
              @endforeach
        </div>
    </div>
</section> --}}

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
                <div class="border border-round" >
                    <a href="{{ route('courseDetails', $course->id) }}">
                        <div class="item">
                            <div class="card" style="">
                                <img src="{{ asset('uploads/images/course/'.$course->image) }}" height="200px" class="card-img-top" alt="{{ $course->name }}" >
                                <div class="card-body">
                                  <h6 class="card-title">{{ $course->name }}</h6>
                                  @forelse ($course->courseReviews as $coursesReview)
                                    <ul class="list-unstyled d-flex mb-0">
                                        <li><i class="{{ $coursesReview->ratings>=1?'fas':'far' }} fa-star  text-warning"></i></li>
                                        <li><i class="{{ $coursesReview->ratings>=2?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $coursesReview->ratings>=3?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $coursesReview->ratings>=4?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $coursesReview->ratings>=5?'fas':'far' }} fa-star text-warning"></i></li>
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
                                    <p title="Teacher" class="m-0"><i class="fas fa-chalkboard-teacher"></i> {{$course->user->name}}</p>
                                    <p title="মোট অংশগ্রহণকারী"><i class="fas fa-user-graduate"></i> {{$course->enrollCounts->groupBy('course_id')->count()}}</p>
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
<style>
    .nav-pills {
        border-bottom: 2px solid rgb(204, 204, 204);
    }
    .nav-pills .nav-link.active {

        background: transparent;
        border-bottom: 3px solid #21C87A;
        color: black;
    }
    .nav-item button{
        border-radius: 0px !important;
    }
</style>
<section class="space-ptb" style="background:#f9f9f9 !important">
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
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <div class="all_course owl-carousel owl-theme">
                            @foreach ($courses as $course)
                            <div class="border border-round" >
                                <a href="{{ route('courseDetails', $course->id) }}">
                                    <div class="item">
                                        <div class="card" style="">
                                            <img src="{{ asset('uploads/images/course/'.$course->image) }}" height="200px" class="card-img-top" alt="{{ $course->name }}" >
                                            <div class="card-body">
                                              <h6 class="card-title">{{ $course->name }}</h6>
                                              @forelse ($course->courseReviews as $coursesReview)
                                                <ul class="list-unstyled d-flex mb-0">
                                                    <li><i class="{{ $coursesReview->ratings>=1?'fas':'far' }} fa-star  text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=2?'fas':'far' }} fa-star text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=3?'fas':'far' }} fa-star text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=4?'fas':'far' }} fa-star text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=5?'fas':'far' }} fa-star text-warning"></i></li>
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
                                                <p title="Teacher" class="m-0"><i class="fas fa-chalkboard-teacher"></i> {{$course->user->name}}</p>
                                                <p title="মোট অংশগ্রহণকারী"><i class="fas fa-user-graduate"></i> {{$course->enrollCounts->groupBy('course_id')->count()}}</p>
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
                            <div class="border border-round" >
                                <a href="{{ route('courseDetails', $course->id) }}">
                                    <div class="item">
                                        <div class="card" style="">
                                            <img src="{{ asset('uploads/images/course/'.$course->image) }}" height="200px" class="card-img-top" alt="{{ $course->name }}" >
                                            <div class="card-body">
                                              <h6 class="card-title">{{ $course->name }}</h6>
                                              @forelse ($course->courseReviews as $coursesReview)
                                                <ul class="list-unstyled d-flex mb-0">
                                                    <li><i class="{{ $coursesReview->ratings>=1?'fas':'far' }} fa-star  text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=2?'fas':'far' }} fa-star text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=3?'fas':'far' }} fa-star text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=4?'fas':'far' }} fa-star text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=5?'fas':'far' }} fa-star text-warning"></i></li>
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
                                                <p title="Teacher" class="m-0"><i class="fas fa-chalkboard-teacher"></i> {{$course->user->name}}</p>
                                                <p title="মোট অংশগ্রহণকারী"><i class="fas fa-user-graduate"></i> {{$course->enrollCounts->groupBy('course_id')->count()}}</p>
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
                            <div class="border border-round" >
                                <a href="{{ route('courseDetails', $course->id) }}">
                                    <div class="item">
                                        <div class="card" style="">
                                            <img src="{{ asset('uploads/images/course/'.$course->image) }}" height="200px" class="card-img-top" alt="{{ $course->name }}" >
                                            <div class="card-body">
                                              <h6 class="card-title">{{ $course->name }}</h6>
                                              @forelse ($course->courseReviews as $coursesReview)
                                                <ul class="list-unstyled d-flex mb-0">
                                                    <li><i class="{{ $coursesReview->ratings>=1?'fas':'far' }} fa-star  text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=2?'fas':'far' }} fa-star text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=3?'fas':'far' }} fa-star text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=4?'fas':'far' }} fa-star text-warning"></i></li>
                                                    <li><i class="{{ $coursesReview->ratings>=5?'fas':'far' }} fa-star text-warning"></i></li>
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
                                                <p title="Teacher" class="m-0"><i class="fas fa-chalkboard-teacher"></i> {{$course->user->name}}</p>
                                                <p title="মোট অংশগ্রহণকারী"><i class="fas fa-user-graduate"></i> {{$course->enrollCounts->groupBy('course_id')->count()}}</p>
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
      Category -->
      <section class="space-pt">
          <div class="bg-primary bg-overlay-theme-97 space-ptb"
              style="background-image: url('images/bg/04.jpg'); background-position: center;">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-lg-8 position-relative">
                          <div class="section-title text-center mb-5">
                              <h2 class="text-white">@lang('index.topCategories')</h2>
                              {{-- <p class="lead text-white">I truly believe Augustine’s words are true and if you look at
                                  history you know it is true. There are many people in the world with amazing talents
                                  who realize.</p> --}}
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
                            <div class="categories-item">
                                <div class="categories-icon">
                                    @if ($category->image)
                                    <img src="{{ asset('uploads/images/course/'.$category->image) }}" alt="" width="40x">
                                    @else
                                    <i class="flaticon-statistics fa-1x mt-3"></i>
                                    @endif
                                </div>
                                <a href="#" class="categories-title">{{ $category->name }}</a>
                            </div>
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


<!--=================================
      Education Categories -->

<!--=================================
      Course -->
{{-- <section class="space-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12 position-relative">
                <div class="filters-group mb-2 mb-4">
                    <button class="btn-filter active" data-group="all">{{ __('index.featuredCourses') }}</button>
                    <button class="btn-filter" data-group="development">{{ __('index.popularCourses') }}</button>
                    <button class="btn-filter" data-group="design">{{ __('index.latestCourses') }}</button>
                </div>
                <div class="my-shuffle-container grid-4">
                    <div class="grid-item" data-groups='["development"]'>
                        <div class="course">
                            <div class="course-img">
                                <img class="img-fluid" src="{{ asset('frontend/images/course/01.jpg') }}" alt="">
                                <a href="#" class="course-category"><i class="far fa-bookmark"></i>Development</a>
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
                    <div class="grid-item senior" data-groups='["personal", "marketing", "photography", "software"]'>
                        <div class="course">
                            <div class="course-img">
                                <img class="img-fluid" src="{{ asset('frontend/images/course/07.jpg') }}" alt="">
                                <a href="#" class="course-category"><i class="far fa-bookmark"></i> Personal
                                    Development</a>
                            </div>
                            <div class="course-info">
                                <div class="course-title">
                                    <a href="#">Great thinking devices to help you learn tough topics</a>
                                </div>
                                <div class="course-instructor">by
                                    <a href="#">Alice Williams</a>
                                </div>
                                <div class="course-rate-price">
                                    <div class="rating">
                                        <span>4.4</span>
                                        <a href="#">18 Ratings</a>
                                    </div>
                                    <div class="price">$79</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item" data-groups='["marketing", "design", "music", "business"]'>
                        <div class="course">
                            <div class="course-img">
                                <img class="img-fluid" src="{{ asset('frontend/images/course/03.jpg') }}" alt="">
                                <a href="#" class="course-category"><i class="far fa-bookmark"></i> Marketing</a>
                            </div>
                            <div class="course-info">
                                <div class="course-title">
                                    <a href="#">Diploma in marketing management course</a>
                                </div>
                                <div class="course-instructor">by
                                    <a href="#">Felica Queen</a>
                                </div>
                                <div class="course-rate-price">
                                    <div class="rating">
                                        <span>3.4</span>
                                        <a href="#">97 Ratings</a>
                                    </div>
                                    <div class="price">$19</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item" data-groups='["software", "development", "photography", "music"]'>
                        <div class="course">
                            <div class="course-img">
                                <img class="img-fluid" src="{{ asset('frontend/images/course/04.jpg') }}" alt="">
                                <a href="#" class="course-category"><i class="far fa-bookmark"></i> IT & software</a>
                            </div>
                            <div class="course-info">
                                <div class="course-title">
                                    <a href="#">Introduction to robotic process automation (RPA)</a>
                                </div>
                                <div class="course-instructor">by
                                    <a href="#">Ricardo Marshall</a>
                                </div>
                                <div class="course-rate-price">
                                    <div class="rating">
                                        <span>4.2</span>
                                        <a href="#">172 Ratings</a>
                                    </div>
                                    <div class="price">$99</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item senior" data-groups='["photography", "design", "personal", "business"]'>
                        <div class="course">
                            <div class="course-img">
                                <img class="img-fluid" src="{{ asset('frontend/images/course/05.jpg') }}" alt="">
                                <a href="#" class="course-category"><i class="far fa-bookmark"></i> Photography</a>
                            </div>
                            <div class="course-info">
                                <div class="course-title">
                                    <a href="#">Certificate in camera and photography course</a>
                                </div>
                                <div class="course-instructor">by
                                    <a href="#">Mellissa Doe</a>
                                </div>
                                <div class="course-rate-price">
                                    <div class="rating">
                                        <span>3.4</span>
                                        <a href="#">48 Ratings</a>
                                    </div>
                                    <div class="price">$199</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item " data-groups='["music", "development", "software", "photography"]'>
                        <div class="course">
                            <div class="course-img">
                                <img class="img-fluid" src="{{ asset('frontend/images/course/06.jpg') }}" alt="">
                                <a href="#" class="course-category"><i class="far fa-bookmark"></i> Music</a>
                            </div>
                            <div class="course-info">
                                <div class="course-title">
                                    <a href="#">Composing music with others online course</a>
                                </div>
                                <div class="course-instructor">by
                                    <a href="#">Paul Flavius</a>
                                </div>
                                <div class="course-rate-price">
                                    <div class="rating">
                                        <span>1.4</span>
                                        <a href="#">157 Ratings</a>
                                    </div>
                                    <div class="price">$149</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item" data-groups='["software", "development", "business", "music"]'>
                        <div class="course">
                            <div class="course-img">
                                <img class="img-fluid" src="{{ asset('frontend/images/course/02.jpg') }}" alt="">
                                <a href="#" class="course-category"><i class="far fa-bookmark"></i> Design</a>
                            </div>
                            <div class="course-info">
                                <div class="course-title">
                                    <a href="#">UX & web design master course: Strategy, design..</a>
                                </div>
                                <div class="course-instructor">by
                                    <a href="#">Joana Williams</a>
                                </div>
                                <div class="course-rate-price">
                                    <div class="rating">
                                        <span>3.1</span>
                                        <a href="#">57 Ratings</a>
                                    </div>
                                    <div class="price">$49</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item" data-groups='["business", "design", "marketing", "personal"]'>
                        <div class="course">
                            <div class="course-img">
                                <img class="img-fluid" src="{{ asset('frontend/images/course/08.jpg') }}" alt="">
                                <a href="#" class="course-category"><i class="far fa-bookmark"></i> Business</a>
                            </div>
                            <div class="course-info">
                                <div class="course-title">
                                    <a href="#">How to launch a successful startup company</a>
                                </div>
                                <div class="course-instructor">by
                                    <a href="#">Harry Russell</a>
                                </div>
                                <div class="course-rate-price">
                                    <div class="rating">
                                        <span>3.4</span>
                                        <a href="#">15 Ratings</a>
                                    </div>
                                    <div class="price">$9</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--=================================
      Course -->

<!--=================================
      Action box -->
{{-- <section class="space-ptb bg-overlay-theme-90" data-jarallax='{"speed": 0.5}'
    style="background-image: url('images/bg/01.jpg'); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center my-4 position-relative">
                <div class="section-title mb-4">
                    <h2 class="text-white">Discover best classes for the best learning</h2>
                    <p class="text-white mb-0">If success is a process with a number of defined steps, then it is just
                        like any other process.</p>
                </div>
                <a class="btn btn-light" href="">Get started</a>
            </div>
        </div>
    </div>
</section> --}}
<!--=================================
      Action box -->

<!--=================================
      Testimonial and Brands -->
{{-- <section class="space-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-7 text-center">
                <div class="owl-carousel testimonial" data-nav-arrow="true" data-nav-dots="false" data-items="1"
                    data-lg-items="1" data-md-items="1" data-sm-items="1" data-space="0" data-autoheight="true">
                    <div class="item">
                        <div class="video-image">
                            <img class="img-fluid w-100" src="{{ asset('frontend/images/categories/09.jpg') }}" alt="">
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
                            <img class="img-fluid w-100" src="{{ asset('frontend/images/categories/10.jpg') }}" alt="">
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
                            <img class="img-fluid w-100" src="{{ asset('frontend/images/categories/11.jpg') }}" alt="">
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
                                src="{{ asset('frontend/images/award-logo/03.svg') }}" alt=""></div>
                        <div class="col-lg-6 col-sm-3 col-6 "><img class="img-fluid grayscale pt-4 pt-lg-5 w-75"
                                src="{{ asset('frontend/images/award-logo/04.svg') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
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
                        <img class="img-fluid rounded-sm" src="{{ asset('frontend/images/about/01.jpg') }}" alt="">
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <img class="img-fluid rounded-sm" src="{{ asset('frontend/images/about/02.jpg') }}" alt="">
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
                            <div class="progress-bar bg-info" role="progressbar" style="width: 91%;" aria-valuenow="91"
                                aria-valuemin="0" aria-valuemax="100">
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
                        <img class="img-fluid" src="{{ asset('frontend/images/blog/9.jpg') }}" alt="">
                    </div>
                    <div class="blog-post-info">
                        <div class="blog-post-category">
                            <a href="#">Education,</a>
                            <a href="#">Course</a>
                        </div>
                        <h5 class="blog-post-title"><a href="#">You can expand students access to learning</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="blog-post-style-02">
                            <div class="blog-post-img">
                                <img class="img-fluid" src="{{ asset('frontend/images/blog/10.jpg') }}" alt="">
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
                                <img class="img-fluid" src="{{ asset('frontend/images/blog/11.jpg') }}" alt="">
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
                          <img class="img-fluid" src="{{ asset('frontend/images/mobile-app/01.png') }}" alt="">
</div>
<div class="col-xl-5 col-lg-6 mt-4 order-1 order-lg-2">
    <h2 class="text-white">Download Our Android And IOS App</h2>
    <p class="text-white mb-4">Positive pleasure-oriented goals are much more powerful motivators than negative
        fear-based ones.</p>
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



@push('custom_scripts')
<script>
    $('.all_course').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>

@endpush
@endsection
