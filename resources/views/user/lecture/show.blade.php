@extends('user.layout.master')
@section('title', 'Lecture')
@section('content')
@php $m='lecture'; $sm=''; $ssm=''; @endphp
<link rel="stylesheet" href="{{ asset('backend/css/lecture.css') }}">
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('user.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Lecture</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Lectures</h4>
                                <a href="{{ route('lecture.create') }}" class="btn btn-{{$layout->create_btn??'primary'}} btn-round ml-auto text-light" style="min-width: 200px">
                                    <i class="fa fa-plus"></i> Add New Lecture
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($chapters as $chapter)
                            <div class="chapter_div">
                                <div class="chapter">{{ $chapter->name }}</div>
                                @foreach ($chapter->lectures as $lecture)
                                @if ($lecture->type == 2)
                                <a href="{{ route('user.lecture.lecturePlay',[$lecture->course_id, $lecture->id]) }}">
                                    <div class="lecture ">
                                        <div class="icon"><i class="fab fa-youtube"></i></div>
                                        <div class="title">{{ $lecture->name }}</div>
                                        <div class="time">time</div>
                                    </div>
                                </a>
                                @elseif($lecture->type == 3)
                                <a href="{{ route('user.lecture.lecturePlay',[$lecture->course_id, $lecture->id]) }}">
                                    <div class="lecture ">
                                        <div class="icon"><i class="fas fa-file-pdf"></i></div>
                                        <div class="title">{{ $lecture->name }}</div>
                                    </div>
                                </a>
                                @else
                                <a href="{{ route('user.lecture.lecturePlay',[$lecture->course_id, $lecture->id]) }}">
                                    <div class="lecture ">
                                        <div class="icon"><i class="fas fa-file"></i></div>
                                        <div class="title">{{ $lecture->name }}</div>
                                    </div>
                                </a>
                                @endif
                                @endforeach
                            </div>
                            @endforeach

                            <div class="chapter_div">
                                <div class="chapter">কুইজ</div>
                                <a href="{{ route('user.quiz.quiz',[$lecture->course_id]) }}">
                                    <div class="lecture ">
                                        <div class="icon"><i class="fas fa-question"></i></div>
                                        <div class="title">কুইজে অংশগ্রহণ করুন</div>
                                    </div>
                                </a>
                            </div>
                            <div class="course_about">About this course</div>
                            <hr>
                            <div class="description">
                                <div class="row">
                                    <div class="col-md-2">By the numbers</div>
                                    <div class="col-md-5">
                                        <ul>
                                            <li>Skill level: {{ $chapters->first()->course->skill_level }}</li>
                                            <li>Students part:</li>
                                            <li>Language part: {{ $chapters->first()->course->language }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-5">
                                        <ul>
                                            <li>Lectures part: {{ $chapters->first()->course->skill_level }}</li>
                                            <li>Add Video: </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="description">
                                <div class="row">
                                    <div class="col-md-2">Descriptions</div>
                                    <div class="col-md-10">{!! $chapters->first()->course->description !!}</div>
                                    <div class="col-md-5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @include('admin.layout.footer')
</div>

@push('custom_scripts')
@endpush
@endsection

