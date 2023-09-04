@extends('user.layout.master')
@section('title', 'Course')
@section('content')
@php $m='lecture'; $sm=''; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('user.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('course.index') }}">Course</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Create</li>
                </ul>
            </div>
            <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <button hretype="button" class="btn btn-primary btn-round ml-auto text-light"  data-toggle="modal" data-target="#chapterModal" style="min-width: 200px">
                                    <i class="fa fa-plus"></i> Add New Chapter
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('lecture.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="course_id">Courses <span class="t_r">*</span></label>
                                            <select class="form-control" name="course_id" id="course_id" required>
                                                <option selected value disabled>Select</option>
                                                @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('course_id'))
                                                <div class="alert alert-danger">{{ $errors->first('course_id') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="chapter_id">Chapter <span class="t_r">*</span></label>
                                            <select class="form-control" name="chapter_id" id="chapter" required>
                                            </select>
                                            @if ($errors->has('chapter_id'))
                                                <div class="alert alert-danger">{{ $errors->first('chapter_id') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name <span class="t_r">*</span></label>
                                            <input type="text" name="name" class="form-control" required>
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="video">Video link </label>
                                            <input type="text" name="video" class="form-control">
                                            @if ($errors->has('video'))
                                                <div class="alert alert-danger">{{ $errors->first('video') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pdf">PDF </label>
                                            <input type="file" name="pdf" class="form-control">
                                            @if ($errors->has('pdf'))
                                                <div class="alert alert-danger">{{ $errors->first('pdf') }}</div>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="text">text </label>
                                            <textarea name="text" class="form-control" id="text" rows="2" required></textarea>
                                            @if ($errors->has('text'))
                                                <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                                            @endif
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="text-center card-action">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="chapterModal" tabindex="-1" role="dialog" aria-labelledby="chapterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="chapterModalLabel">Add New Chapter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('chapter.store') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label for="course_id">Courses <span class="t_r">*</span></label>
                    <select class="form-control" name="course_id" id="course_id">
                        <option selected value disabled>Select</option>
                        @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('course_id'))
                        <div class="alert alert-danger">{{ $errors->first('course_id') }}</div>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label for="name">Chapter Name <span class="t_r">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter chapter name" required>
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>




@push('custom_scripts')
<script>
    CKEDITOR.replace( 'text' );
    // ClassicEditor.create( document.querySelector('#text'), {
    //     removePlugins: [  ],
    //     toolbar: ['Heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'Link','colors']
    // } )
    // .catch( error => {
    //     console.log( error );
    // });
    // Product Size

    $('#course_id').on('change',function(e) {
        var courseId = $('#course_id').val();
        $.ajax({
            url:'{{ route("get.chapter") }}',
            type:"get",
            data: {
                courseId: courseId
                },
            success:function (res) {
                res = $.parseJSON(res);
                $('#chapter').html(res.chapterName);
            }
        })
    });
</script>


@endpush
@endsection

