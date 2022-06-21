@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')
@php $m='myProfile'; $sm='profile'; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('admin.adminUser.index') }}">Amdmin User</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Create</li>
                </ul>
            </div>
            @include('include.profile')
        </div>
    </div>
    @include('admin.layout.footer')
</div>

@push('custom_scripts')


@endpush
@endsection

