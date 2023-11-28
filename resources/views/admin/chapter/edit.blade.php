@extends('admin.layout.master')
@section('title', 'Chapter Edit')
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
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item">Create</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit Chapter </div>
                            </div>
                            <form action="{{ route('admin.chapter.update', $chapter->id) }}" method="post">
                                @csrf @method('PUT')
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
                                                        <option value="{{ $course->id }}" @selected($course->id == $chapter->course_id)>
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
                                                <label for="name">Name <span class="t_r">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $chapter->name }}" required>
                                                @if ($errors->has('name'))
                                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>
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
            // $(document).ready(function() {
            //     let type = $('#type').val();
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
