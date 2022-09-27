@extends('admin.layout.master')
@section('title', 'Quiz')
@section('content')
@php $m='quiz'; $sm=''; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('course.index') }}">Course</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Create</li>
                </ul>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="card-title">Add Quiz</div>
                            <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#exampleModal">
                                Add Quiz
                              </button>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover" >
                                        <thead class="bg-secondary thw">
                                            {{-- <tr>
                                                <th>Name</th>
                                                <th>Skill level</th>
                                                <th>Language</th>
                                                <th class="no-sort" width="40px">Action</th>
                                            </tr> --}}
                                        </thead>
                                        <tbody>
                                            @php $i = 1 @endphp
                                            @foreach ($quizzes as $quiz)
                                            <tr class="bg-primary text-light">
                                                <td width="100px" style="font-weight: bold; font-size:15px">{{ $i++ }}</td>
                                                <td style="font-weight: bold; font-size:15px">{{ $quiz->ques }}</td>
                                                <td class="text-right">
                                                    <div class="form-button-action">
                                                        <span class="btn btn-danger btn-sm quesAns" data-toggle="modal" data-target="#quesAns" data-id="{{$quiz->id}}" data-qusAns="{{ $quiz->ques }}">Add Option</span>
                                                        <span class="btn btn-info btn-sm quesEdit" data-toggle="modal" data-target="#quesEdit" data-url="{{route('admin.quiz.quesUpdate', $quiz->id)}}" data-ques="{{$quiz->ques}}"><i class="fa fa-edit"></i></span>
                                                        <form action="{{ route('admin.quiz.quesDestroy', $quiz->id) }}" method="post">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('Are you sure?')">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @if ($quiz->options->count() > 0)
                                            @php $ii = 1 @endphp
                                            @foreach ($quiz->options as $option)
                                            <tr>
                                                <td class="text-right">{{ $ii++ }}</td>
                                                <td style="padding-left: 30px !important">{{ $option->option }} &nbsp; {!! $option->correct == 1 ? '<i class="fas fa-check-circle text-primary"></i>':''!!}</td>
                                                <td class="text-right">
                                                    <div class="form-button-action">
                                                        {{-- <span class="btn btn-danger btn-sm quesAns" data-toggle="modal" data-target="#quesAns" data-id="{{$quiz->id}}" data-qusAns="{{ $quiz->ques }}">Add Option</span> --}}
                                                        <span class="btn btn-link btn-info btn-sm optionEdit" data-toggle="modal" data-target="#optionEdit" data-url="{{route('admin.quiz.optionUpdate', [$option->id, $quiz->id])}}" data-option="{{$option->option}}" data-correct="{{$option->correct}}"><i class="fa fa-edit"></i></span>
                                                        <form action="{{ route('admin.quiz.optionDestroy', $option->id) }}" method="POST">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('Are you sure?')">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="text-center card-action">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Question Add -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.quiz.quesStore') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $course_id }}" name="course_id">
                  <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ques">Question <span class="t_r">*</span></label>
                                <input type="text" name="ques" class="form-control" value="{{ old('ques') }}"
                                    placeholder="Enter question" required>
                                @if ($errors->has('ques'))
                                <div class="alert alert-danger">{{ $errors->first('ques') }}</div>
                                @endif
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

<!-- Question Edit -->
<div class="modal fade" id="quesEdit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" autocomplete="off" id="quesEditForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel" style="color:red;">Edit Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ques">Question <span class="t_r">*</span></label>
                                <input type="text" name="ques" class="form-control" id="editQues" required>
                                @if ($errors->has('ques'))
                                <div class="alert alert-danger">{{ $errors->first('ques') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

  <!-- Option -->
  <div class="modal fade" id="quesAns" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.quiz.optionStore') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $course_id }}" name="course_id">
                <input type="hidden" id="quiz_id" name="quiz_id">
                  <div class="modal-body">
                      <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="option">Option <span class="t_r">*</span></label>
                                <input type="text" name="option" class="form-control" value="{{ old('option') }}"
                                    placeholder="Enter option" required>
                                @if ($errors->has('option'))
                                <div class="alert alert-danger">{{ $errors->first('option') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="correct">Correct <span class="t_r">*</span></label>
                                <input type="checkbox" name="correct" class="form-control" value="1"
                                    placeholder="Enter question">
                                @if ($errors->has('correct'))
                                <div class="alert alert-danger">{{ $errors->first('correct') }}</div>
                                @endif
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Option Edit -->
<div class="modal fade" id="optionEdit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" autocomplete="off" id="optionEditForm">
            @csrf
             <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel" style="color:red;">Edit Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="option">Option <span class="t_r">*</span></label>
                                <input type="text" name="option" class="form-control" id="editOption" required>
                                @if ($errors->has('option'))
                                <div class="alert alert-danger">{{ $errors->first('option') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="correct">Correct <span class="t_r">*</span></label>
                                <input type="checkbox" name="correct"  class="form-control" id="editCorrect">
                                @if ($errors->has('correct'))
                                <div class="alert alert-danger">{{ $errors->first('correct') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('custom_scripts')
<script>
    $(".quesAns").on('click', function(){
        $('#quiz_id').val($(this).data('id'));
        $('#q').val($(this).data('qusAns'));
    });

    $(".quesEdit").on('click', function(){
        $('#quesEditForm').attr('action',$(this).data('url'));
        $('#editQues').val($(this).data('ques'));
    });
    $(".optionEdit").on('click', function(){
        $('#optionEditForm').attr('action',$(this).data('url'));
        $('#editOption').val($(this).data('option'));
        $('#editCorrect').val($(this).data('correct'));
        if($(this).data('correct') == 1){
            $('#editCorrect').prop("checked", true);
        }else{
            $('#editCorrect').prop("checked", false);
        }
    });
</script>

@endpush
@endsection

