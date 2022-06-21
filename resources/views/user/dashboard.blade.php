@extends('user.layout.master')
@section('title', 'Dashboard')
@section('content')
@php $m='dashboard'; $sm=''; $ssm=''; @endphp

<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-5">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-running"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">{{__('dashboard.userRunningCourse')}}</p>
                                        <h4 class="card-title">{{ $runningCourse->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">{{__('dashboard.userCompletedCourse')}}</p>
                                        <h4 class="card-title">{{ $completeCourses->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-times-circle"></i>
                                    </div>
                                </div>
                                <div class="col col-stats">
                                    <div class="numbers">
                                        <p class="card-category">{{__('dashboard.userUncompletedCourse')}}</p>
                                        <h4 class="card-title">{{ $uncompletedCourses->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<style>
    .nav li a{
        padding: 15px 25px;
    }
    .tab_course a:hover {
        text-decoration: none;
    }
</style>
            @include('user.include.course_nav')


            <div class="row mt-2">
                {{-- <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Teacher overall statistics</div>
                            <div class="card-category">Daily information about statistics in system</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-1"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Course</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-2"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Sales</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-3"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Subscribers</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Total income & spend statistics</div>
                            <div class="row py-3">
                                <div class="col-md-4 d-flex flex-column justify-content-around">
                                    <div>
                                        <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                                        <h3 class="fw-bold">$9.782</h3>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
                                        <h3 class="fw-bold">$1,248</h3>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div id="chart-container">
                                        <canvas id="totalIncomeChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @include('admin.layout.footer')
</div>

@push('custom_scripts')

@endpush
@endsection

