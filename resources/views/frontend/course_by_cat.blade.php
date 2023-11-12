@extends('frontend.layouts.app')
@section('title', '')
@section('content')

    <!--=================================
    Inner Header -->
    <section class="inner-header bg-holder bg-overlay-black-90">
        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="col-md-12 text-center text-md-start mb-2 mb-md-0">
              <h1 class="breadcrumb-title mb-0 text-white text-center">{{ $course->name }}</h1>
            </div>
          </div>
        </div>
      </section>
      <!--=================================
      Inner Header -->
<section class="space-ptb">
    <div class="container">
        <div class="row">
            <div class="all_course ">
                @foreach ($courses as $course)
                <div class="col-md-3">
                    <div class="border border-round">
                        <a href="{{ route('courseDetails', $course->id) }}">
                            <div class="card" style="">
                                <img src="{{ asset('uploads/images/course/'.$course->image) }}" height="200px"
                                    class="card-img-top" alt="{{ $course->name }}">
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
                                    <p title="Teacher" class="m-0"><i class="fas fa-chalkboard-teacher"></i>
                                        {{$course->user->name}}</p>
                                    <p title="মোট অংশগ্রহণকারী"><i class="fas fa-user-graduate"></i>
                                        {{$course->enrollCounts->groupBy('course_id')->count()}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@push('custom_scripts')
@endpush
@endsection
