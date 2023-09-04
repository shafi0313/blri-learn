@extends('user.layout.master')
@section('title', 'Course')
@section('content')
@php $m='course'; $sm=''; $ssm=''; @endphp
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
                            <div class="card-title">Add New Course</div>
                        </div>
                        <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="t_r">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name" required>
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="language">Language <span class="t_r">*</span></label>
                                            <select class="form-control" name="language">
                                                <option selected value disabled>Select</option>
                                                <option value="Bangle">Bangle</option>
                                                <option value="English">English</option>
                                            </select>
                                            @if ($errors->has('language'))
                                                <div class="alert alert-danger">{{ $errors->first('language') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="skill_level">Skill level <span class="t_r">*</span></label>
                                            <input type="text" name="skill_level" class="form-control" value="{{ old('skill_level') }}" placeholder="Enter skill level" required>
                                            @if ($errors->has('skill_level'))
                                                <div class="alert alert-danger">{{ $errors->first('skill_level') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Image <span class="t_r">* (Height: 310px, Width: 580px)</span></label>
                                            <input type="file" name="image" class="form-control">
                                            @if ($errors->has('image'))
                                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alt">Image name <span class="t_r">*</span></label>
                                            <input type="text" name="alt" class="form-control" value="{{ old('alt') }}" placeholder="Enter image name" required>
                                            @if ($errors->has('alt'))
                                                <div class="alert alert-danger">{{ $errors->first('alt') }}</div>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description <span class="t_r">*</span></label>
                                            <textarea name="description" class="form-control" id="description" rows="2" required></textarea>
                                            @if ($errors->has('description'))
                                                <div class="alert alert-danger">{{ $errors->first('description') }}</div>
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

@push('custom_scripts')
<script>
    CKEDITOR.replace( 'description' );
    // ClassicEditor.create( document.querySelector('#description'), {
    //     removePlugins: [  ],
    //     toolbar: ['Heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'Link','colors']
    // } )
    // .catch( error => {
    //     console.log( error );
    // });
</script>

@endpush
@endsection

