<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="running-tab" data-toggle="tab" href="#running" role="tab" aria-controls="running" aria-selected="true"><i class="fas fa-running"></i> {{__('dashboard.userRunningCourse')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false"><i class="fas fa-check-circle"></i> {{__('dashboard.userCompletedCourse')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="uncompleted-tab" data-toggle="tab" href="#uncompleted" role="tab" aria-controls="uncompleted" aria-selected="false"><i class="fas fa-times-circle"></i> {{__('dashboard.userUncompletedCourse')}}</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="running" role="tabpanel" aria-labelledby="running-tab">
                <div class="row tab_course mt-3">
                    @foreach ($runningCourse as $runningCoursee)
                    @php $runningFirst = $runningCoursee->first() @endphp
                    <a href="{{ route('user.lecture.show',$runningFirst->course_id) }}">
                        <div class="col-md-3">
                            <div class="card" style="width: 220px;">
                                <img class="card-img-top m-auto" style="padding:10px; max-width: 200px;max-height: 160px" src="{{ asset('uploads/images/course/'.$runningFirst->course->image)}}" alt="{{$runningFirst->course->name}}">
                                <div class="card-body border-top">
                                  <h5 class="card-title">{{$runningFirst->course->name}}</h5>
                                  {{-- For ratings --}}
                                  @php
                                    $coursesReviews = App\Models\CourseReview::whereCourse_id($runningFirst->course_id)->get();
                                    $star5 = $coursesReviews->where('course_id',$runningFirst->course_id)->where('ratings','=',5)->count();
                                    $star4 = $coursesReviews->where('course_id',$runningFirst->course_id)->where('ratings','=',4)->count();
                                    $star3 = $coursesReviews->where('course_id',$runningFirst->course_id)->where('ratings','=',3)->count();
                                    $star2 = $coursesReviews->where('course_id',$runningFirst->course_id)->where('ratings','=',2)->count();
                                    $star1 = $coursesReviews->where('course_id',$runningFirst->course_id)->where('ratings','=',1)->count();
                                    $totalRatings = ($star5*5)+($star4*4)+($star3*3)+($star2*2)+($star1*1);
                                    $ratingCount = $coursesReviews->count()*5;
                                    if($coursesReviews->count() > 0){
                                        $avgRating = number_format($totalRatings/$ratingCount*5,1);
                                    }else{
                                        $avgRating = 0;
                                    }
                                @endphp
                                <div class="d-flex align-items-center">
                                    {{-- <span class="text-warning h6 mb-0 me-2">{{ $avgRating }}</span> --}}
                                    <ul class="list-unstyled d-flex mb-0 me-2">
                                        <li><i class="{{ $avgRating>=1?'fas':'far' }} fa-star  text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=2?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=3?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=4?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=5?'fas':'far' }} fa-star text-warning"></i></li>
                                    </ul>
                                </div>
                                </div>
                              </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                <div class="row tab_course mt-3">
                    @foreach ($completeCourses as $completeCourse)
                    <a href="{{ route('user.lecture.show',$completeCourse->course_id) }}">
                        <div class="col-md-3">
                            <div class="card" style="width: 220px;">
                                <img class="card-img-top m-auto" style="padding:10px; max-width: 200px;max-height: 160px" src="{{ asset('uploads/images/course/'.$completeCourse->course->image)}}" alt="{{$completeCourse->course->name}}">
                                <div class="card-body border-top">
                                  <h5 class="card-title">{{$completeCourse->course->name}}</h5>
                                  {{-- For ratings --}}
                                  @php
                                    $coursesReviews = App\Models\CourseReview::whereCourse_id($completeCourse->course_id)->get();
                                    $star5 = $coursesReviews->where('course_id',$completeCourse->course_id)->where('ratings','=',5)->count();
                                    $star4 = $coursesReviews->where('course_id',$completeCourse->course_id)->where('ratings','=',4)->count();
                                    $star3 = $coursesReviews->where('course_id',$completeCourse->course_id)->where('ratings','=',3)->count();
                                    $star2 = $coursesReviews->where('course_id',$completeCourse->course_id)->where('ratings','=',2)->count();
                                    $star1 = $coursesReviews->where('course_id',$completeCourse->course_id)->where('ratings','=',1)->count();
                                    $totalRatings = ($star5*5)+($star4*4)+($star3*3)+($star2*2)+($star1*1);
                                    $ratingCount = $coursesReviews->count()*5;
                                    if($coursesReviews->count() > 0){
                                        $avgRating = number_format($totalRatings/$ratingCount*5,1);
                                    }else{
                                        $avgRating = 0;
                                    }
                                @endphp
                                <div class="d-flex align-items-center">
                                    {{-- <span class="text-warning h6 mb-0 me-2">{{ $avgRating }}</span> --}}
                                    <ul class="list-unstyled d-flex mb-0 me-2">
                                        <li><i class="{{ $avgRating>=1?'fas':'far' }} fa-star  text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=2?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=3?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=4?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=5?'fas':'far' }} fa-star text-warning"></i></li>
                                    </ul>
                                </div>
                                </div>
                              </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="uncompleted" role="tabpanel" aria-labelledby="uncompleted-tab">
                <div class="row tab_course mt-3">
                    @foreach ($uncompletedCourses as $uncompletedCourse)
                    <a href="{{ route('user.lecture.show',$uncompletedCourse->course_id) }}">
                        <div class="col-md-3">
                            <div class="card" style="width: 220px;">
                                <img class="card-img-top m-auto" style="padding:10px; max-width: 200px;max-height: 160px" src="{{ asset('uploads/images/course/'.$completeCourse->course->image)}}" alt="{{$completeCourse->course->name}}">
                                <div class="card-body border-top">
                                  <h5 class="card-title">{{$uncompletedCourse->course->name}}</h5>
                                  {{-- For ratings --}}
                                  @php
                                    $coursesReviews = App\Models\CourseReview::whereCourse_id($uncompletedCourse->course_id)->get();
                                    $star5 = $coursesReviews->where('course_id',$uncompletedCourse->course_id)->where('ratings','=',5)->count();
                                    $star4 = $coursesReviews->where('course_id',$uncompletedCourse->course_id)->where('ratings','=',4)->count();
                                    $star3 = $coursesReviews->where('course_id',$uncompletedCourse->course_id)->where('ratings','=',3)->count();
                                    $star2 = $coursesReviews->where('course_id',$uncompletedCourse->course_id)->where('ratings','=',2)->count();
                                    $star1 = $coursesReviews->where('course_id',$uncompletedCourse->course_id)->where('ratings','=',1)->count();
                                    $totalRatings = ($star5*5)+($star4*4)+($star3*3)+($star2*2)+($star1*1);
                                    $ratingCount = $coursesReviews->count()*5;
                                    if($coursesReviews->count() > 0){
                                        $avgRating = number_format($totalRatings/$ratingCount*5,1);
                                    }else{
                                        $avgRating = 0;
                                    }
                                @endphp
                                <div class="d-flex align-items-center">
                                    {{-- <span class="text-warning h6 mb-0 me-2">{{ $avgRating }}</span> --}}
                                    <ul class="list-unstyled d-flex mb-0 me-2">
                                        <li><i class="{{ $avgRating>=1?'fas':'far' }} fa-star  text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=2?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=3?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=4?'fas':'far' }} fa-star text-warning"></i></li>
                                        <li><i class="{{ $avgRating>=5?'fas':'far' }} fa-star text-warning"></i></li>
                                    </ul>
                                </div>
                                </div>
                              </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
          </div>
    </div>
</div>
