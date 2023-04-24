@extends('user.layout.master')
@section('title', 'My Profile')
@section('content')
@php $m='myProfile'; $sm=''; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('user.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">My Profile</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Update</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">My Profile</div>
                        </div>
                        <form action="{{ route('user.myProfile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="t_r">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_b">Name (Bangla) </label>
                                            <input type="text" name="name_b" class="form-control" value="{{ $user->name_b }}">
                                            @if ($errors->has('name_b'))
                                                <div class="alert alert-danger">{{ $errors->first('name_b') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_cer">Name (according to certificate) <span class="t_r">*</span></label>
                                            <input type="text" name="name_cer" class="form-control" value="{{ $user->name_cer }}" required>
                                            @if ($errors->has('name_cer'))
                                                <div class="alert alert-danger">{{ $errors->first('name_cer') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fa_name">Father's Name </label>
                                            <input type="text" name="fa_name" class="form-control" value="{{ $user->fa_name }}">
                                            @if ($errors->has('fa_name'))
                                                <div class="alert alert-danger">{{ $errors->first('fa_name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mo_name">Mother's Name </label>
                                            <input type="text" name="mo_name" class="form-control" value="{{ $user->mo_name }}">
                                            @if ($errors->has('mo_name'))
                                                <div class="alert alert-danger">{{ $errors->first('mo_name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="d_o_b">Date of Birth <span class="t_r">*</span></label>
                                            <input type="date" name="d_o_b" class="form-control" value="{{ $user->d_o_b }}" required>
                                            @if ($errors->has('d_o_b'))
                                                <div class="alert alert-danger">{{ $errors->first('d_o_b') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender <span class="t_r">*</span></label>
                                            <select class="form-control" name="gender">
                                                <option selected value disabled>Select</option>
                                                <option value="1" {{$user->gender=="1"?"selected":""}}>Male</option>
                                                <option value="2" {{$user->gender=="2"?"selected":""}}>Female</option>
                                                <option value="3" {{$user->gender=="3"?"selected":""}}>Other</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <div class="alert alert-danger">{{ $errors->first('gender') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nid">NID No </label>
                                            <input type="text" name="nid" class="form-control" value="{{ $user->nid }}">
                                            @if ($errors->has('nid'))
                                                <div class="alert alert-danger">{{ $errors->first('nid') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <img src="{{ asset('uploads/images/users/'.$user->image) }}" alt="" width="150px">
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Image </label>
                                            <input type="file" name="image" class="form-control">
                                            @if ($errors->has('image'))
                                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="text">Address </label>
                                            <textarea name="text" class="form-control" id="text" rows="2">{{ $user->text }}</textarea>
                                            @if ($errors->has('text'))
                                                <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center card-action">
                                <button type="submit" class="btn btn-{{$layout->submit_btn??'primary'}}">Submit</button>
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

