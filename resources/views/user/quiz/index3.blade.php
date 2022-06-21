@extends('user.layout.master')
@section('title', 'Quiz')
@section('content')
@php $m='course'; $sm=''; $ssm=''; @endphp

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

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Question</h4>
                                {{-- <h4 class="ml-auto" >/10 </h4> --}}

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                            <form action="{{ route('user.quiz.ans') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            @php $x = 1; @endphp
                                            @foreach ($quizzes as $quiz)
                                            <input type="hidden" value="{{$quiz->id}}" name="quiz_id[]">
                                            <input type="hidden" value="{{$quiz->course_id}}" name="course_id">
                                            <h2 class="quiz">প্রশ্ন {{$x++}}. {{ $quiz->ques }}</h2>
                                            @if ($quiz->options->count() > 0)
                                            <div class="row" style="margin-bottom: 20px">
                                            @foreach ($quiz->options as $option)
                                            <input type="hidden" value="{{$option->id}}" name="option_id">
                                            <div class="col-md-6 option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="qz_{{$quiz->id}}" id="exampleRadios{{$option->id}}" value="{{$option->id}}">
                                                    <label class="form-check-label" for="exampleRadios{{$option->id}}">
                                                        {{ $option->option }}
                                                    </label>
                                                </div>
                                            </div>

                                            @endforeach

                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <h4>Registration closes in <span id="timer">10:00<span> minutes!</h4>
                                {{-- <div class="d-flex justify-content-center">
                                    {!! $quizzes->links() !!}
                                </div> --}}
                                <div class="text-center card-action">
                                    <button type="submit"
                                        class="btn btn-{{$layout->submit_btn??'primary'}}">Submit</button>
                                    {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                </div>
                            </form>
                        </div>
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
    window.onload = function () {
    //    var hour = 4;
       let minute = 9;
       let sec = 60;
       setInterval(function () {
          document.getElementById("timer").innerHTML = minute + " : " + sec;
          if(minute >=0 && sec >= 1) {
              sec--;
          }
          if (sec == 00) {
              if(minute > 0){
                  minute--;
                  sec = 60;
              }
            //  if (minute >= 0) {
            //     minute = 0;
            //  }
          }
        //   if(minute>=0 && sec ==0){
        //       minute--
        //       lectureComplete();
        //   }
       }, 1000);
    };
  </script>



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
            success: function (response) {
                console.log(response);
                if (response) {
                    $('.success').text(response.success);
                    $("#lectureComplete")[0].reset();
                }
            },
            error: function (error) {
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

