@extends('admin.layout.master')
@section('title', 'Course')
@section('content')
    @php
        $m = 'lecture';
        $sm = '';
        $ssm = '';
    @endphp
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('admin.course.index') }}">Course</a></li>
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
                                    <button hretype="button" class="btn btn-primary btn-round ml-auto text-light"
                                        data-toggle="modal" data-target="#chapterModal" style="min-width: 200px">
                                        <i class="fa fa-plus"></i> Add New Chapter
                                    </button>
                                </div>
                            </div>
                            <form action="{{ route('admin.lecture.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
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

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name <span class="t_r">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                                @if ($errors->has('name'))
                                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- <div class="form-group col-md-6">
                                            <label for="type">Lecture Type <span class="t_r">*</span></label>
                                            <select name="type" class="form-control"
                                                id="type" @selected('type' == old('type')) required>
                                                <option value="">Select</option>
                                                <option value="1">Text</option>
                                                <option value="2">Video</option>
                                                <option value="3">PDF</option>
                                            </select>
                                            @if ($errors->has('type'))
                                                    <div class="alert alert-danger">{{ $errors->first('type') }}</div>
                                                @endif
                                        </div> --}}

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="time">Time</label>
                                                <input type="text" name="time" class="form-control video"
                                                    placeholder="1:30">
                                                @if ($errors->has('time'))
                                                    <div class="alert alert-danger">{{ $errors->first('time') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12 video_div">
                                            {{-- <div class="form-group"> --}}
                                                <label for="video">Video link</label>
                                                <textarea name="video" class="form-control" id="video" rows="3" placeholder='Youtube Video Embed Share Link. Ex: <iframe width="560" height="315" src="https://www.youtube.com/embed/c196ypgkeXc?si=ww4iXfz1W574XLOq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'></textarea>
                                                {{-- <input type="video" name="video" class="form-control" id="video"> --}}
                                                @if ($errors->has('video'))
                                                    <div class="alert alert-danger">{{ $errors->first('video') }}</div>
                                                @endif
                                            {{-- </div> --}}
                                        </div>

                                        <div class="col-md-12" id="pdf_div">
                                            <div class="form-group">
                                                <label for="pdf">PDF</label>
                                                <textarea name="pdf" class="form-control" id="pdf"
                                                placeholder="Google Drive PDF Share Link. Ex: https://drive.google.com/file/d/1MkmX8AcvT7lv-_ljlN4zQ0wpL2yM-mJD/view?usp=sharing" rows="3"></textarea>
                                                {{-- <input type="text" name="text" class="form-control" id="pdf"
                                                    placeholder="https://drive.google.com/file/d/1MkmX8AcvT7lv-_ljlN4zQ0wpL2yM-mJD/view?usp=sharing"> --}}
                                                @if ($errors->has('pdf'))
                                                    <div class="alert alert-danger">{{ $errors->first('pdf') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="text_div">
                                            <div class="form-group">
                                                <label for="text">Text </label>
                                                <textarea name="text" class="form-control" id="text" id="text"></textarea>
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
    <div class="modal fade" id="chapterModal" tabindex="-1" role="dialog" aria-labelledby="chapterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chapterModalLabel">Add New Chapter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.chapter.store') }}" method="post">
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
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Enter chapter name" required>
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
            CKEDITOR.replace('text');
            // CKEDITOR.replace('lectureText');
            // $("#type").change(function() {
            //     var type = $(this).val()
            //     if (type == 1) {
            //         $(".video_div").hide()
            //         $("#pdf_div").hide()
            //         $("#text_div").show()
            //         $("#lectureDiv").hide()

            //         $("#text").attr("disabled", false)
            //         $("#video").attr("disabled", true)
            //         $("#pdf").attr("disabled", true)
            //     } else if (type == 2) {
            //         $(".video_div").show()
            //         $("#lectureDiv").show()
            //         $("#pdf_div").hide()
            //         $("#text_div").hide()

            //         $("#video").attr("disabled", false)
            //         $("#text").attr("disabled", true)
            //         $("#pdf").attr("disabled", true)
            //     } else {
            //         $(".video_div").hide()
            //         $("#pdf_div").show()
            //         $("#text_div").hide()
            //         $("#lectureDiv").hide()

            //         $("#pdf").attr("disabled", false)
            //         $("#video").attr("disabled", true)
            //         $("#text").attr("disabled", true)
            //     }
            // })

            $('#course_id').on('change', function(e) {
                var courseId = $('#course_id').val();
                $.ajax({
                    url: '{{ route('admin.lecture.get.chapter') }}',
                    type: "get",
                    data: {
                        course_id: courseId
                    },
                    success: function(res) {
                        let opt = '<option disabled selected>Select chapter</option>';
                        $.each(res.chapters, function(i, v) {
                            opt += '<option value="' + v.id + '">' + v.name + '</option>';
                        });
                        $("#chapter").html(opt);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        </script>
    @endpush
@endsection
