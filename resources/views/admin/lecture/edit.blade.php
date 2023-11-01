@extends('admin.layout.master')
@section('title', 'Lecture Edit')
@section('content')
    @php
        $m = 'lecture';
        $sm = '';
        $ssm = '';
    @endphp
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item">Create</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit Lecture </div>
                            </div>
                            <form action="{{ route('admin.lecture.update', $lecture->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <input type="hidden" name="type" value="{{ $lecture->type }}">
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
                                                        <option value="{{ $course->id }}" @selected($course->id == $lecture->course_id)>
                                                            {{ $course->name }}</option>
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
                                                    @foreach ($chapters as $chapter)
                                                        <option value="{{ $chapter->id }}" @selected($lecture->chapter_id)>
                                                            {{ $chapter->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('chapter_id'))
                                                    <div class="alert alert-danger">{{ $errors->first('chapter_id') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name <span class="t_r">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $lecture->name }}" required>
                                                @if ($errors->has('name'))
                                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- <div class="form-group col-md-6">
                                            <label for="type">Lecture Type <span class="t_r">*</span></label>
                                            <select name="type" class="form-control @error('type') is-invalid @enderror"
                                                id="type" @selected('type' == old('type'))>
                                                <option value="">Select</option>
                                                <option value="1" @selected($lecture->type == 1)>Text</option>
                                                <option value="2" @selected($lecture->type == 2)>Video</option>
                                                <option value="3" @selected($lecture->type == 3)>PDF</option>
                                            </select>
                                            @error('type')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                        {{-- <div class="col-md-6 video_div" style="display: none">
                                            <div class="form-group">
                                                <label for="time">Time <span class="t_r">*</span></label>
                                                <input type="text" name="time" class="form-control video"
                                                    placeholder="1:30">
                                                @if ($errors->has('time'))
                                                    <div class="alert alert-danger">{{ $errors->first('time') }}</div>
                                                @endif
                                            </div>
                                        </div> --}}

                                        @if ($lecture->type == 1)
                                            <div class="col-md-12" id="text_div">
                                                <div class="form-group">
                                                    <label for="text">text </label>
                                                    <textarea name="text" class="form-control" id="text" rows="2" id="text">{!! $lecture->text !!}</textarea>
                                                    @if ($errors->has('text'))
                                                        <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                        @if ($lecture->type == 2)
                                            <div class="col-md-12 video_div">
                                                <div class="form-group">
                                                    <label for="text">Video link <span class="t_r">*</span></label>
                                                    <input type="text" name="text" class="form-control" id="video"
                                                        value="{!! $lecture->text !!}">
                                                    @if ($errors->has('text'))
                                                        <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="lectureDiv">
                                                <div class="form-group">
                                                    <label for="lectureText">text </label>
                                                    <textarea name="lectureText" class="form-control" id="lectureText" rows="2">{!! $lecture->text !!}</textarea>
                                                    @if ($errors->has('lectureText'))
                                                        <div class="alert alert-danger">{{ $errors->first('lectureText') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                        @if ($lecture->type == 3)
                                            <div class="col-md-12" id="pdf_div">
                                                <div class="form-group">
                                                    <label for="text">PDF <span class="t_r">*</span></label>
                                                    <input type="text" name="text" class="form-control" id="pdf"
                                                        value="{!! $lecture->text !!}"
                                                        placeholder="https://drive.google.com/file/d/1MkmX8AcvT7lv-_ljlN4zQ0wpL2yM-mJD/view?usp=sharing">
                                                    @if ($errors->has('text'))
                                                        <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="text-center card-action">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom_scripts')
        <script>
            CKEDITOR.replace('text');
            CKEDITOR.replace('lectureText');
            $("#type").change(function() {
                var type = $(this).val()
                if (type == 1) {
                    $(".video_div").hide()
                    $("#pdf_div").hide()
                    $("#text_div").show()
                    $("#lectureDiv").hide()

                    $("#text").attr("disabled", false)
                    $("#video").attr("disabled", true)
                    $("#pdf").attr("disabled", true)
                } else if (type == 2) {
                    $(".video_div").show()
                    $("#lectureDiv").show()
                    $("#pdf_div").hide()
                    $("#text_div").hide()

                    $("#video").attr("disabled", false)
                    $("#text").attr("disabled", true)
                    $("#pdf").attr("disabled", true)
                } else {
                    $(".video_div").hide()
                    $("#pdf_div").show()
                    $("#text_div").hide()
                    $("#lectureDiv").hide()

                    $("#pdf").attr("disabled", false)
                    $("#video").attr("disabled", true)
                    $("#text").attr("disabled", true)
                }
            })
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
