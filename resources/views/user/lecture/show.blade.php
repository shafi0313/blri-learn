@extends('user.layout.master')
@section('title', 'Lecture')
@section('content')
    @php
        $m = 'lecture';
        $sm = '';
        $ssm = '';
    @endphp
    <link rel="stylesheet" href="{{ asset('backend/css/lecture.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('backend/css/lecture_play.css') }}"> --}}
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
                                    <a href="{{ route('admin.lecture.create') }}"
                                        class="btn btn-primary' btn-round ml-auto text-light" style="min-width: 200px">
                                        <i class="fa fa-plus"></i> Add New Lecture
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($chapters as $chapter)
                                    <div class="chapter_div">
                                        <p class="chapter">{{ $chapter->name }}</p>
                                        @foreach ($chapter->lectures as $lecture)
                                            {{-- @if ($lecture->type == 1) --}}
                                                <a
                                                    href="{{ route('user.lecture.lecturePlay', [$lecture->course_id, $lecture->id]) }}">
                                                    <div class="lecture">
                                                        <p class="title"><i class="fas fa-file icon"></i>
                                                            {{ $lecture->name }}</p>
                                                        <p class="timeIcon">
                                                            <i
                                                                class="{{ $lecture->enroll?->status == 0 ? 'far fa-circle' : 'far fa-check-circle tIconD' }} tIcon"></i>
                                                            </span>
                                                        </p>
                                                    </div>
                                                </a>
                                            {{-- @elseif ($lecture->type == 2)
                                                <a
                                                    href="{{ route('user.lecture.lecturePlay', [$lecture->course_id, $lecture->id]) }}">
                                                    <div class="lecture">
                                                        <p class="title"><i
                                                                class="icon fab fa-youtube"></i>{{ $lecture->name }}</p>
                                                        <p class="timeIcon">
                                                            <span class="time riT">{{ $lecture->time }}
                                                                <i
                                                                    class="{{ $lecture->enroll->status == 0 ? 'far fa-circle' : 'far fa-check-circle tIconD' }} tIcon"></i>
                                                            </span>
                                                        </p>

                                                    </div>
                                                </a>
                                            @else
                                                <a
                                                    href="{{ route('user.lecture.lecturePlay', [$lecture->course_id, $lecture->id]) }}">
                                                    <div class="lecture">
                                                        <p class="title"><i class="fas fa-file-pdf icon"></i>
                                                            {{ $lecture->name }}
                                                        </p>
                                                        <p class="timeIcon">
                                                            <i
                                                                class="{{ $lecture->enroll->status == 0 ? 'far fa-circle' : 'far fa-check-circle tIconD' }} tIcon"></i>
                                                            </span>
                                                        </p>
                                                    </div>
                                                </a>
                                            @endif --}}
                                        @endforeach
                                    </div>
                                @endforeach

                                <div class="chapter_div">
                                    <div class="chapter">কুইজ</div>
                                    <a href="{{ route('user.quiz.quiz', [$lecture->course_id]) }}">
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
