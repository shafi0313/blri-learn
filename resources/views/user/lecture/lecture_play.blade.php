@extends('user.layout.lecture.master')
@section('title', 'Lecture')
@section('content')
    @php
        $m = 'lecture';
        $sm = '';
        $ssm = '';
    @endphp
    <link rel="stylesheet" href="{{ asset('backend/css/lecture_play.css') }}">

    @php $user = auth()->user(); @endphp
    <div class="sidebar" data-background-color="white">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-primary">
                    <li class="nav-item {{ $m == 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('user.dashboard') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @foreach ($chapters as $chapter)
                        <div class="chapter_div">
                            <p class="chapter">{{ $chapter->name }}</p>
                            @foreach ($chapter->lectures as $lecture)
                                {{-- @if ($lecture->type == 1) --}}
                                <a href="{{ route('user.lecture.lecturePlay', [$lecture->course_id, $lecture->id]) }}">
                                    <div class="lecture {{ $lecturePlay->id == $lecture->id ? 'lec_active' : '' }}">
                                        <p class="title"><i class="fas fa-file icon"></i> {{ $lecture->name }}</p>
                                        <p class="timeIcon">
                                            <i
                                                class="{{ $lecture->enroll?->status == 0 ? 'far fa-circle' : 'far fa-check-circle tIconD' }} tIcon"></i>
                                            </span>
                                        </p>
                                    </div>
                                </a>
                                {{-- @elseif ($lecture->type == 2)
                                    <a href="{{ route('user.lecture.lecturePlay', [$lecture->course_id, $lecture->id]) }}">
                                        <div class="lecture {{ $lecturePlay->id == $lecture->id ? 'lec_active' : '' }}">
                                            <p class="title"><i class="icon fab fa-youtube"></i>{{ $lecture->name }}</p>
                                            <p class="timeIcon">
                                                <span class="time riT">{{ $lecture->time }}
                                                    <i
                                                        class="{{ $lecture->enroll?->status == 0 ? 'far fa-circle' : 'far fa-check-circle tIconD' }} tIcon"></i>
                                                </span>
                                            </p>

                                        </div>
                                    </a>
                                @else
                                    <a href="{{ route('user.lecture.lecturePlay', [$lecture->course_id, $lecture->id]) }}">
                                        <div class="lecture {{ $lecturePlay->id == $lecture->id ? 'lec_active' : '' }}">
                                            <p class="title"><i class="fas fa-file-pdf icon"></i> {{ $lecture->name }}
                                            </p>
                                            <p class="timeIcon">
                                                <i
                                                    class="{{ $lecture->enroll?->status == 0 ? 'far fa-circle' : 'far fa-check-circle tIconD' }} tIcon"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </a>
                                @endif --}}
                            @endforeach
                        </div>
                    @endforeach
                    <div class="chapter_div">
                        <div class="chapter">কুইজ</div>
                        <a href="{{ route('user.quiz.quiz', [$lecture->course_id]) }}">
                            <div class="lecture ">
                                <div class="icon"><i class="fas fa-question"></i></div>
                                <div class="title">কুইজে অংশগ্রহণ করুন</div>
                            </div>
                        </a>
                    </div>
                </ul>
            </div>
        </div>
    </div>


    <div class="main-panel">
        <div class="content">
            <div class="row justify-content-end">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Lectures</h4>
                                {{-- <a href="{{ route('admin.lecture.create') }}" class="btn btn-primary' btn-round ml-auto text-light" style="min-width: 200px">
                                    <i class="fa fa-plus"></i> Add New Lecture
                                </a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <style>
                                .lec_video iframe {
                                    width: 100%;
                                    height: 600px !important;
                                }
                            </style>
                            @if ($lecturePlay->text)
                                <div>
                                    {!! $lecturePlay->text !!}
                                </div>
                            @endif
                            @if ($lecturePlay->video)
                                <div class="lec_video">
                                    {!! $lecturePlay->video !!}
                                </div>
                            @endif
                            @if ($lecturePlay->pdf)
                                <div>
                                    @if (substr($lecturePlay->pdf, -1) == 'g')
                                        @php $pdf = str_replace("view?usp=sharing", "preview", $lecturePlay->pdf) @endphp
                                    @else
                                        @php $pdf = str_replace("view", "preview", $lecturePlay->pdf) @endphp
                                    @endif
                                    {{-- <iframe src="http://docs.google.com/gview?url=http://infolab.stanford.edu/pub/papers/google.pdf&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe> --}}
                                    <iframe src="{{ $pdf }}" style="width:100%; height:500px;"
                                        frameborder="0"></iframe>
                                </div>
                            @endif
                            {{-- @if ($lecturePlay->lectureText)
                                <div>
                                    <p>{!! $lecturePlay->lectureText->text !!}</p>
                                </div>
                            @endif --}}
                            <br>
                            <br>
                            {{-- Time explode --}}
                            @php
                                $time = explode(':', $lecturePlay->time);
                            @endphp
                            {{-- @if ($courseEnroll->status != 1 || empty($courseEnroll)) --}}
                            {{-- @if ($lecturePlay->type == 2)
                                <h4>Registration closes in <span id="timer">{{ $lecturePlay->time }}<span> minutes!
                                </h4>
                            @else --}}
                            <form action="{{ route('user.lecture.lectureComplete') }}" method="post">
                                @csrf
                                <input type="hidden" name="course_id" class="form-control"
                                    value="{{ $lecturePlay->course_id }}">
                                <input type="hidden" name="lecture_id" class="form-control"
                                    value="{{ $lecturePlay->id }}">
                                @if ($courseEnroll?->status != 1 || empty($courseEnroll))
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fas fa-check-circle"></i> সমাপ্ত হিসাবে চিহ্নিত করুন</button>
                                @else
                                    <span class="alert alert-success mr-3">উক্ত লেকচারটি সম্পন্ন করেছেন! </span>
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fas fa-check-circle"></i> পরবর্তী</button>
                                @endif
                            </form>
                            {{-- @endif --}}
                            {{-- @else
                            <button class="btn btn-sm btn-primary"><i class="fas fa-check-circle"></i> সমাপ্ত</button>
                            @endif --}}


                            {{-- <form id="lectureComplete">
                                <input type="hidden" name="course_id" class="form-control"
                                    value="{{ $lecturePlay->course_id }}">
                                <input type="hidden" name="lecture_id" class="form-control"
                                    value="{{ $lecturePlay->id }}">
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.footer')
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @push('custom_scripts')
        @if ($lecturePlay->type == 2)
            <script>
                // Youtube auto play
                $("iframe")[0].src += "?autoplay=1";
                // $("iframe")[0].src += "?autoplay=1&mute=1&enablejsapi=1";

                window.onload = function() {
                    //  var hour = 4;
                    var minute = "{{ $time[0] }}";
                    var sec = "{{ $time[1] }}";
                    setInterval(function() {
                        document.getElementById("timer").innerHTML =
                            minute + " : " + sec;
                        if (minute >= 0 && sec >= 1) {
                            sec--;
                        }
                        if (sec == 00) {
                            if (minute > 0) {
                                minute--;
                                sec = 60;
                            }
                            if (minute >= 0) {
                                minute = 0;

                            }
                        }
                        if (minute >= 0 && sec == 0) {
                            minute--
                            lectureComplete();
                        }
                    }, 1000);
                };
            </script>
        @endif


        <script>
            function lectureComplete() {
                let course_id = $("input[name=course_id]").val();
                let lecture_id = $("input[name=lecture_id]").val();
                let _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('user.lecture.lectureComplete') }}",
                    type: "POST",
                    data: {
                        course_id: course_id,
                        lecture_id: lecture_id,
                        _token: _token
                    },
                    success: function(response) {
                        console.log(response);
                        if (response) {
                            $('.success').text(response.success);
                            $("#lectureComplete")[0].reset();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            };


            // $(".save-data").click(function(event){
            //     event.preventDefault();

            //     let name = $("input[name=name]").val();
            //     let email = $("input[name=email]").val();
            //     let mobile_number = $("input[name=mobile_number]").val();
            //     let message = $("input[name=message]").val();
            //     let _token   = $('meta[name="csrf-token"]').attr('content');

            //     $.ajax({
            //       url: "{{ route('user.lecture.lectureComplete') }}",
            //       type:"POST",
            //       data:{
            //         name:name,
            //         email:email,
            //         mobile_number:mobile_number,
            //         message:message,
            //         _token: _token
            //       },
            //       success:function(response){
            //         console.log(response);
            //         if(response) {
            //           $('.success').text(response.success);
            //           $("#lectureComplete")[0].reset();
            //         }
            //       },
            //       error: function(error) {
            //        console.log(error);
            //       }
            //      });
            // });
        </script>
    @endpush
@endsection
