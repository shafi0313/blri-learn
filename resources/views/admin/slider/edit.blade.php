@extends('admin.layout.master')
@section('title', 'Slider')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item"><a href="{{ route('admin.slider.index') }}">Slider</a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item">Edit</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit Slider</div>
                            </div>
                            <form action="{{ route('admin.slider.update', $slider->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Title </label>
                                                <input type="text" name="title" class="form-control"
                                                    value="{{ $slider->title }}" placeholder="Enter title">
                                                @if ($errors->has('title'))
                                                    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="link">Link </label>
                                                <input type="text" name="link" class="form-control"
                                                    value="{{ $slider->link }}" placeholder="https://softgiantbd.com/">
                                                @if ($errors->has('link'))
                                                    <div class="alert alert-danger">{{ $errors->first('link') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="text">Text </label>
                                                <input type="text" name="text" class="form-control"
                                                    value="{{ $slider->text }}" placeholder="text">
                                                @if ($errors->has('text'))
                                                    <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <img src="{{ asset('uploads/images/slider/' . $slider->image) }}" height="150px"
                                                alt="">
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="image">Image <span class="t_r">Width: 1920 Height: 1080
                                                        *</span></label>
                                                <input type="file" name="image" class="form-control">
                                                @if ($errors->has('image'))
                                                    <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Status <span class="t_r">*</span></label>
                                                <select class="form-control" name="status">
                                                    {{-- <option selected value disabled>Select</option> --}}
                                                    <option value="1">Published</option>
                                                    <option value="0">Unpublished</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                    <div class="alert alert-danger">{{ $errors->first('status') }}</div>
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
    @endpush
@endsection
