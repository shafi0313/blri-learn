@extends('user.layout.master')
@section('title', 'Quiz')
@section('content')
    @php
        $m = 'myCourse';
        $sm = '';
        $ssm = '';
    @endphp

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('user.dashboard') }}"><i class="flaticon-home"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item">Quiz</li>
                    </ul>
                </div>
                <style>
                    .option {
                        border: 1px solid rgb(218, 218, 218);
                        padding: 5px 10px 7px 29px;
                        margin: 0 0px 10px 0;
                        border-radius: 3px;
                    }

                    /* .option input[type=checkbox],
                    input[type=radio] {
                        width: 16px;
                        height: 16px;
                        padding-top: 5px !important;
                    } */

                    .option .form-check-label {
                        padding-left: 5px !important;
                        font-weight: 400 !important;
                    }
                </style>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Question</h4>
                                </div>
                            </div>
                            <form action="{{ route('user.quiz.ans') }}" method="post" id="ans">
                                @csrf
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            @php $x = 1; @endphp
                                            @foreach ($quizzes as $quiz)
                                                <input type="hidden" value="{{ $quiz->id }}" name="quiz_id[]">
                                                <input type="hidden" value="{{ $quiz->course_id }}" name="course_id">
                                                <h2 class="quiz">প্রশ্ন {{ $x++ }}. {{ $quiz->ques }}</h2>
                                                @if ($quiz->options->count() > 0)
                                                    <div class="row" style="margin-bottom: 20px">
                                                        @foreach ($quiz->options as $option)
                                                        <input type="hidden" value="{{ $option->id }}" name="option_id">
                                                        @if ($quiz->correct_options_count >= 2)
                                                        <div class="col-md-6">
                                                            <div class="option">
                                                                <input class="form-check-input" type="checkbox" name="qz_{{ $quiz->id }}" id="quiz{{ $option->id }}" value="{{ $option->id }}">
                                                                <label class="form-check-label" for="quiz{{ $option->id }}">{{ $option->option }}</label>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="col-md-6">
                                                            <div class="option">
                                                                <input class="form-check-input" type="radio" name="qz_{{ $quiz->id }}" id="quiz{{ $option->id }}" value="{{ $option->id }}">
                                                                <label class="form-check-label" for="quiz{{ $option->id }}">{{ $option->option }}</label>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <h4>@lang('quiz.quizTime') <span id="timer">10:00<span></h4>
                                </div>

                                {{-- <div class="d-flex justify-content-center">
                                {!! $quizzes->links() !!}
                            </div> --}}
                                <div class="text-center card-action">
                                    <button type="submit"
                                        class="btn btn-primary">Submit</button>
                                    {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>

    @push('custom_scripts')
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script>
            // window.onload = function() {
            //     //    var hour = 4;
            //     let minute = 10;
            //     let sec = 00;
            //     setInterval(function() {
            //         document.getElementById("timer").innerHTML = minute + " : " + sec;
            //         if (minute >= 0 && sec >= 1) {
            //             sec--;
            //         }
            //         if (sec == 00) {
            //             if (minute > 0) {
            //                 minute--;
            //                 sec = 60;
            //             }
            //             //  if (minute >= 0) {
            //             //     minute = 0;
            //             //  }
            //         }
            //         if (minute >= 0 && sec == 0) {
            //             minute--
            //             lectureComplete();
            //         }
            //     }, 1000);
            // };
        </script>



        <script>
            function lectureComplete() {
                // $('#ans').on('submit',function(e){
                // e.preventDefault();
                let data = $('#ans').serialize();
                let url = $('#ans').attr('action');
                let method = $('#ans').attr('method');
                var request = $.ajax({
                    url: url,
                    method: method,
                    data: data,
                    success: res => {
                        // let id = v.id;
                        let url = '{{ route('user.quiz.result', [auth()->user()->id, $quiz->course_id]) }}';
                        window.location.replace(url);
                        // url = url.replace(':id', id);
                        // toast('success', 'Success!');
                        // clear();
                        // question()
                        // $(".trData").remove();
                        // if(res.status == 200){
                        //     toast('success','Success!');
                        //     clear();
                        //     question()

                        //  toast('success', res.message);
                        // }else{
                        //     toast('error',res.message);
                        // }
                    },
                    error: err => {
                        $.each(err.responseJSON.errors, (i, v) => {
                            toast('error', v);
                        })
                    }
                });
            }
        </script>
    @endpush
@endsection
