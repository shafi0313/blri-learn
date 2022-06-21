@extends('user.layout.master')
@section('title', 'My Course')
@section('content')
@php $m='myCourse'; $sm=''; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
<style>
    .nav li a{
        padding: 15px 25px;
    }
    .tab_course a:hover {
        text-decoration: none;
    }
</style>
<div class="page-inner mt-2">
    @include('user.include.course_nav')
        </div>
    </div>
    @include('user.layout.footer')
</div>

@push('custom_scripts')

@endpush
@endsection

