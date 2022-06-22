@extends('frontend.layout.master')
@section('title', '')
@section('content')

<!--=================================
    Course Details -->
@php
    $star5 = $coursesReviews->where('course_id',$course->id)->where('ratings','=',5)->count();
    $star4 = $coursesReviews->where('course_id',$course->id)->where('ratings','=',4)->count();
    $star3 = $coursesReviews->where('course_id',$course->id)->where('ratings','=',3)->count();
    $star2 = $coursesReviews->where('course_id',$course->id)->where('ratings','=',2)->count();
    $star1 = $coursesReviews->where('course_id',$course->id)->where('ratings','=',1)->count();
    $totalRatings = ($star5*5)+($star4*4)+($star3*3)+($star2*2)+($star1*1);
    $ratingCount = $coursesReviews->count()*5;
    if($coursesReviews->count() > 0){
        $avgRating = number_format($totalRatings/$ratingCount*5,1);
    }else{
        $avgRating = 0;
    }
@endphp
<section class="space-ptb course-details">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-xl-8">
                <h4 class="news-title mb-2">{{ $course->name }}</h4>
                <div class="d-flex align-items-center">
                    <span class="text-warning h6 mb-0 me-2">{{ $avgRating }}</span>
                    <ul class="list-unstyled d-flex mb-0 me-2">
                        <li><i class="{{ $avgRating>=1?'fas':'far' }} fa-star  text-warning"></i></li>
                        <li><i class="{{ $avgRating>=2?'fas':'far' }} fa-star text-warning"></i></li>
                        <li><i class="{{ $avgRating>=3?'fas':'far' }} fa-star text-warning"></i></li>
                        <li><i class="{{ $avgRating>=4?'fas':'far' }} fa-star text-warning"></i></li>
                        <li><i class="{{ $avgRating>=5?'fas':'far' }} fa-star text-warning"></i></li>
                    </ul>
                </div>
            <ul class="list-unstyled d-flex flex-wrap mb-4">
                <li class="course-d-Teacher me-3 me-lg-5 mb-2 mb-lg-0">
                    <div class="d-flex">
                        <img class="me-2 me-lg-3 mt-2" src="{{ asset('uploads/images/users/'.$course->user->image) }}"
                            alt="">
                        <div class="d-block">
                            <p class="mb-0">Teacher</p>
                            <span class="lead fw-6 text-dark">{{ $course->user->name }}</span>
                        </div>
                    </div>
                </li>

                <li class="me-3 me-lg-5 mb-2 mb-lg-0">
                    <div class="d-flex">
                        <i class="flaticon-student fa-3x mt-2 me-2 me-lg-3 text-primary"></i>
                        <div class="d-block">
                            <p class="mb-0">Students</p>
                            <span class="lead fw-6 text-dark">{{ $course->enrollCounts->count() }} (Registered)</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <i class="flaticon-bookmark fa-3x mt-2 me-2 me-lg-3 text-primary"></i>
                        <div class="d-block">
                            <p class="mb-0">Language</p>
                            <span class="lead fw-6 text-dark">{{ $course->language }}</span>
                        </div>
                    </div>
                </li>
            </ul>
            
            <div class="iframe">
                {!! $course->video_des !!}
            </div>

            {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/gaZdszryfAY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
            {{-- <iframe class="border mb-5" style="width: 100%; height: 465px;"
                    src="https://www.youtube.com/embed/rGtcmKIZi5c"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe> --}}
            <div class="border mb-4">
                <h6 class="text-dark px-4 py-2 bg-light mb-0">Description</h6>
                <div class="p-4 border-top">
                    {{-- <span class="lead text-dark fw-6">Course Description</span> --}}
                    {!! $course->description !!}
                </div>
            </div>
            <div class="border mb-4">
                <h6 class="text-dark px-4 py-2 bg-light mb-0">Curriculum</h6>
                <div class="p-4 border-top">
                    @foreach ($chapters as $chapter)
                    <span class="lead text-dark fw-6">{{ $chapter->name }}</span>
                    <ul class="list-unstyled mt-3">
                        @php
                        $x=1;
                        @endphp
                        @foreach ($chapter->lectures as $lecture)
                        <li class="d-sm-flex align-items-center border-bottom pb-3 mb-3">
                            <i class="flaticon-list-1 fa-sm me-2 text-primary"></i>
                            <span class="me-4">Lecture {{$x++}} :</span>
                            <span>{{ $lecture->name }}</span>
                            <div class="ms-auto">
                                <i class="far fa-clock text-primary me-2"></i>
                                <span>45 min</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endforeach
                </div>
            </div>
            @php
            $star5 = $coursesReviews->where('course_id',$course->id)->where('ratings','=',5)->count();
            $star4 = $coursesReviews->where('course_id',$course->id)->where('ratings','=',4)->count();
            $star3 = $coursesReviews->where('course_id',$course->id)->where('ratings','=',3)->count();
            $star2 = $coursesReviews->where('course_id',$course->id)->where('ratings','=',2)->count();
            $star1 = $coursesReviews->where('course_id',$course->id)->where('ratings','=',1)->count();
            $totalRatings = ($star5*5)+($star4*4)+($star3*3)+($star2*2)+($star1*1);
            $ratingCount = $coursesReviews->count()*5;
            // $avgRating = number_format($totalRatings/$ratingCount*5,1);
            if($coursesReviews->count() > 0){
            $avgRating = number_format($totalRatings/$ratingCount*5,1);
            }else{
            $avgRating = 0;
            }
            @endphp
            <div class="border mb-4">
                <h6 class="text-dark px-4 py-2 bg-light mb-0">Student feedback </h6>
                <div class="p-4 border-top">
                    <div class="d-flex align-items-center mb-2">
                        <div class="me-auto">
                            <span>{{$coursesReviews->count()}} Reviews</span>
                            <ul class="list-unstyled d-flex mb-0">
                                <li><i class="{{ $avgRating>=1?'fas':'far' }} fa-star  text-warning"></i></li>
                                <li><i class="{{ $avgRating>=2?'fas':'far' }} fa-star text-warning"></i></li>
                                <li><i class="{{ $avgRating>=3?'fas':'far' }} fa-star text-warning"></i></li>
                                <li><i class="{{ $avgRating>=4?'fas':'far' }} fa-star text-warning"></i></li>
                                <li><i class="{{ $avgRating>=5?'fas':'far' }} fa-star text-warning"></i></li>
                            </ul>
                            {{-- <ul class="list-unstyled d-flex mb-0">
                                    <li><i class="fas fa-star text-warning"></i></li>
                                    <li><i class="fas fa-star text-warning"></i></li>
                                    <li><i class="fas fa-star text-warning"></i></li>
                                    <li><i class="fas fa-star-half-alt text-warning"></i></li>
                                    <li><i class="far fa-star text-warning"></i></li>
                                  </ul> --}}

                        </div>
                        {{-- {{ ($coursesReviews->count()) / ($star5) }} --}}
                        <b class="display-4 text-warning fw-bold">{{ $avgRating }}</b>
                    </div>
                    <div class="progress-item mb-2">
                        <div class="d-flex">
                            <div class="progress-title mb-1 me-auto">5 Stars</div>
                            <span>{{ $star5 }}</span>
                        </div>
                        <div class="progress rounded" style="height: 6px;">
                            <div class="progress-bar bg-warning rounded" role="progressbar"
                                style="width: {{ $star5>0? $star5/$coursesReviews->count()*100 :'0' }}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress-item mb-2">
                        <div class="d-flex">
                            <div class="progress-title mb-1 me-auto">4 Stars</div>
                            <span>{{ $star4 }}</span>
                        </div>
                        <div class="progress rounded" style="height: 6px;">
                            <div class="progress-bar bg-warning rounded" role="progressbar"
                                style="width:{{ $star4>0? $star4 / $coursesReviews->count()*100:'0' }}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress-item mb-2">
                        <div class="d-flex">
                            <div class="progress-title mb-1 me-auto">3 Stars</div>
                            <span>{{ $star3 }}</span>
                        </div>
                        <div class="progress rounded" style="height: 6px;">
                            <div class="progress-bar bg-warning rounded" role="progressbar"
                                style="width:{{ $star3>0?$star3 / $coursesReviews->count()*100:'0' }}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress-item mb-2">
                        <div class="d-flex">
                            <div class="progress-title mb-1 me-auto">2 Stars</div>
                            <span>{{ $star2 }}</span>
                        </div>
                        <div class="progress rounded" style="height: 6px;">
                            <div class="progress-bar bg-warning rounded" role="progressbar"
                                style="width: {{ $star2>0?$star2 / $coursesReviews->count()*100:'0' }}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="d-flex">
                            <div class="progress-title mb-1 me-auto">1 Stars</div>
                            <span>{{ $star1 }}</span>
                        </div>
                        <div class="progress rounded" style="height: 6px;">
                            <div class="progress-bar bg-warning rounded" role="progressbar"
                                style="width:{{ $star1>0?$star1 / $coursesReviews->count()*100 :'0' }}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border mb-4">
                <h6 class="text-dark px-4 py-2 bg-light mb-0">Reviews</h6>
                <div class="p-4 border-top">
                    @foreach ($coursesReviews as $coursesReview)
                    {{-- <div class="mb-4 d-xl-inline-flex"> --}}
                    <div class="mb-4 d-block">
                        {{-- <img class="me-3 media-img" src="images/avatar/06.jpg" alt=""> --}}
                        <div class="media-body">
                            <div class="px-xl-4 mt-3 mt-xl-0">
                                <div class="d-flex align-items-center">
                                    <h6 class="mt-0">{{ $coursesReview->name }}</h6>
                                    <div class="d-flex ms-auto mb-3">
                                        <span
                                            class="px-2 border text-success rounded-sm d-inline-block me-2">{{ $coursesReview->ratings }}</span>
                                        <ul class="list-unstyled d-flex mb-0">
                                            <li><i
                                                    class="{{ $coursesReview->ratings>=1?'fas':'far' }} fa-star  text-warning"></i>
                                            </li>
                                            <li><i
                                                    class="{{ $coursesReview->ratings>=2?'fas':'far' }} fa-star text-warning"></i>
                                            </li>
                                            <li><i
                                                    class="{{ $coursesReview->ratings>=3?'fas':'far' }} fa-star text-warning"></i>
                                            </li>
                                            <li><i
                                                    class="{{ $coursesReview->ratings>=4?'fas':'far' }} fa-star text-warning"></i>
                                            </li>
                                            <li><i
                                                    class="{{ $coursesReview->ratings>=5?'fas':'far' }} fa-star text-warning"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p>{{$coursesReview->msg}}</p>
                                {{-- <div class="d-sm-flex">
                                        <a class="bg-light text-dark rounded-sm px-3 py-1 me-2 me-xl-4 font-sm d-inline-block mb-2 mb-sm-0"
                                            href="#"> <i class="fas fa-reply pe-1"></i> Reply Review </a>
                                        <a class="bg-success-soft text-success rounded-sm px-3 py-1 me-2 me-xl-4 font-sm d-inline-block"
                                            href="#"> <i class="far fa-thumbs-up pe-1"></i> 56 Votes</a>
                                        <a class="bg-danger-soft text-danger rounded-sm px-3 py-1 font-sm d-inline-block"
                                            href="#"> <i class="far fa-thumbs-down pe-1"></i> 06</a>
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach


                </div>
            </div>
            <div class="border">
                <h6 class="text-dark px-4 py-2 bg-light mb-0">Add a Review</h6>
                <div class="p-4 border-top">
                    <form action="{{ route('course-review.store') }}" method="post" class="form-flat-style">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <div class="row">
                            <div class="form-group mb-3 col-md-12">
                                <div class="ratings">
                                    <input type="radio" id="star5" name="ratings" value="5" /><label class="full"
                                        for="star5" title="Awesome - 5 stars"></label>
                                    {{-- <input type="radio" id="star4half" name="ratings" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> --}}
                                    <input type="radio" id="star4" name="ratings" value="4" /><label class="full"
                                        for="star4" title="Pretty good - 4 stars"></label>
                                    {{-- <input type="radio" id="star3half" name="ratings" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> --}}
                                    <input type="radio" id="star3" name="ratings" value="3" /><label class="full"
                                        for="star3" title="Meh - 3 stars"></label>
                                    {{-- <input type="radio" id="star2half" name="ratings" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> --}}
                                    <input type="radio" id="star2" name="ratings" value="2" /><label class="full"
                                        for="star2" title="Kinda bad - 2 stars"></label>
                                    {{-- <input type="radio" id="star1half" name="ratings" value="1 and a half" /><label class="half" for="star1half" title="1.5 stars"></label> --}}
                                    <input type="radio" id="star1" name="ratings" value="1" /><label class="full"
                                        for="star1" title="1 star"></label>
                                    {{-- <input type="radio" id="starhalf" name="ratings" value="half" /><label class="half" for="starhalf" title="0.5 stars"></label> --}}
                                </div>
                            </div>
                            @if ($errors->has('ratings'))
                            <div class="alert alert-danger">{{ $errors->first('ratings') }}</div>
                            @endif

                            <div class="form-group mb-3 col-lg-4">
                                <label class="form-label">Your name</label>
                                <input type="text" name="name" class="form-control" placeholder="Your name">
                                @if ($errors->has('name'))
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-3 col-lg-4">
                                <label class="form-label">Your email</label>
                                <input type="email" name="email" class="form-control" placeholder="Your email">
                                @if ($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-3 col-lg-4">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" id="phone" placeholder="Subject">
                                @if ($errors->has('subject'))
                                <div class="alert alert-danger">{{ $errors->first('subject') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-3 col-lg-12">
                                <label class="form-label">Your message</label>
                                <textarea class="form-control" name="msg" rows="4"
                                    placeholder="Your message"></textarea>
                                @if ($errors->has('msg'))
                                <div class="alert alert-danger">{{ $errors->first('msg') }}</div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit review</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-xl-4 mt-5 mt-md-0">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="widgets">
                <div class="widget widget-price">
                    <h6 class="widget-title"></h6>
                    <div class="widget-content">
                        @auth
                        @php $courseEnroll =
                        \App\Models\CourseEnroll::where('user_id',auth()->user()->id)->where('course_id',$course->id)->count()
                        @endphp
                        @if ($courseEnroll < 1) <form action="{{ route('user.courseEnroll') }}" method="post">
                            @csrf
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <button type="submit" class="btn btn-primary">কোর্সটি শুরু করুন</button>
                            </form>
                            @else
                            <a class="btn btn-primary" href="{{ route('user.lecture.show',$course->id) }}">View</a>
                            @endif
                            @endauth
                            @guest
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#courseLoginModal"
                                href="#">কোর্সটি শুরু করুন</a>
                            @endguest
                    </div>
                </div>


                <!--=================================
    Modal login -->
    @php
          $districts = App\Models\District::get(['id','name','bn_name']);
      @endphp
                <div class="modal login fade" id="courseLoginModal" tabindex="-1" role="dialog"
                    aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="loginModalLabel">{{__('login_register.loginRegister')}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#loginC"
                                            role="tab" aria-controls="login" aria-selected="false"> <span>
                                                {{ __('global.login') }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="register-tab" data-bs-toggle="tab"
                                            href="#enrollRegisterC" role="tab" aria-controls="register"
                                            aria-selected="true"><span>{{ __('global.register') }}</span></a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="loginC" role="tabpanel"
                                        aria-labelledby="login-tab">
                                        <form method="POST" action="{{ route('enrollLoginProcess') }}"
                                            class="row my-4 align-items-center">
                                            @csrf
                                            <input type="hidden" name="course_id" value="{{$course->id}}">
                                            <div class="mb-3 col-sm-12">
                                                <input class="form-control" type="email" name="email" required
                                                    placeholder="Email">
                                            </div>
                                            <div class="mb-3 col-sm-12">
                                                <input class="form-control" type="password" name="password" required
                                                    placeholder="Password">
                                            </div>
                                            <div class="col-sm-6 d-grid">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ __('global.signUp') }}</button>
                                            </div>
                                            <div class="col-sm-6 d-grid ">
                                                <a href="{{ route('forgetPassword') }}" style="text-align: right !important">@lang('global.forgetPass')</a>
                                            </div>
                                        </form>

                                    </div>

                                    <div class="tab-pane fade" id="enrollRegisterC" role="tabpanel"
                                        aria-labelledby="register-tab">
                                        <form action="{{ route('enrollRegisterStore') }}" method="post"
                                            class="row my-4 align-items-center">
                                            @csrf
                                            <input type="hidden" name="course_id" value="{{$course->id}}">
                                            <div class="mb-3 col-sm-12">
                                                <input type="text" name="name" class="form-control" placeholder="{{__('login_register.name')}} *" required>
                                                @if ($errors->has('name'))
                                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                                @endif
                                             </div>
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
                                            <div class="mb-3 col-sm-12 district_id">
                                                <select name="district_id" class="form-control single-select2" required>
                                                    <option value="">{{__('login_register.district')}}  *</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}">{{ config('app.locale')=='en' ? $district->name : $district->bn_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('district_id'))
                                                   <div class="alert alert-danger">{{ $errors->first('district_id') }}</div>
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
                <!--=================================
      Modal login -->

                <div class="widget widget-course-instructor">
                    <h6 class="widget-title">Course Instructor</h6>
                    <div class="widget-content">
                        {{-- <div class="row">
                            <div class="col-sm-4">
                                <img class="rounded-circle img-fluid mb-2" src="images/avatar/04.jpg" alt="">
                            </div>
                        </div> --}}
                        <span class="lead fw-6 text-dark">{{ $course->user->name }}</span>
                        <p class="mb-0">Member Since{{ $course->user->created_at->format('M, Y') }}</p>
                        <ul class="d-flex mb-0 list-unstyled mt-2">
                            </li>
                            <li><a class="btn btn-outline-primary-hover btn-sm py-1 px-2 mx-1" href="#">{{ $courseCount }}
                                    Courses</a></li>
                            <li><a class="btn btn-outline-dark-hover btn-sm py-1 px-2 mx-1" href="#">See all
                                    course</a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget widget-course-info">
                    <h6 class="widget-title">Course info</h6>
                    <div class="widget-content">
                        <ul class="list">
                            <li>
                                <b>Course Date :</b>
                                <span>{{ $course->created_at->format('M, Y') }}</span>
                            </li>
                            {{-- <li>
                                <b>Duration: </b>
                                <span>90 Hours</span>
                            </li> --}}
                            <li>
                                <b>Lectures :</b>
                                <span>{{ $lectureCount }}</span>
                            </li>
                            <li>
                                <b>Levels: </b>
                                <span>{{ $course->skill_level }}</span>
                            </li>
                            <li>
                                <b>Enrolled: </b>
                                <span>{{ $course->enrollCounts->count() }} Students</span>
                            </li>
                            {{-- <li>
                                <b>Video :</b>
                                <span>12 Hours</span>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                {{-- <div class="widget">
                    <h6 class="widget-title">Social share</h6>
                    <div class="widget-content">
                        <div class="social-icon-round">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
</section>
<!--=================================
      Course Details -->

@push('custom_scripts')


@endpush
@endsection
