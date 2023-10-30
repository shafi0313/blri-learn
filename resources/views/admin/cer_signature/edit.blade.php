@extends('admin.layout.master')
@section('title', 'Certificate Signature')
@section('content')
@php $m='frontend'; $sm='slider'; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('admin.certificate-signature.index') }}">Certificate Signature</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Edit</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Certificate Signature</div>
                        </div>
                        <form action="{{ route('admin.certificate-signature.update', $cerSignature->id) }}" method="post" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="t_r">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{ $cerSignature->name }}" required>
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="designation">Designation <span class="t_r">*</span></label>
                                            <input type="designation" name="designation" class="form-control" value="{{ $cerSignature->designation }}" required>
                                            @if ($errors->has('designation'))
                                                <div class="alert alert-danger">{{ $errors->first('designation') }}</div>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <img src="{{ asset('uploads/images/signature/'. $cerSignature->image) }}" height="80px" alt="">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Signature <span class="t_r">*</span></label>
                                            <input type="file" name="image" class="form-control">
                                            @if ($errors->has('image'))
                                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
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


@endpush
@endsection

