@extends('user.layout.master')
@section('title', 'Quiz')
@section('content')
@php $m='myCourse'; $sm=''; $ssm=''; @endphp

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

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">কুইজের মূল্যায়ন সম্পন্ন হয়েছে!</h4>
                                {{-- <a href="{{ route('lecture.create') }}" class="btn btn-{{$layout->create_btn??'primary'}} btn-round ml-auto text-light" style="min-width: 200px">
                                    <i class="fa fa-plus"></i> Add New Lecture
                                </a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-{{$layout->tbl}} table-striped table-hover" >
                                                <tr>
                                                    <th>মোট প্রশ্ন: </th>
                                                    <th>১০ টি</th>
                                                </tr>
                                                <tr>
                                                    <th>মোট নম্বর: </th>
                                                    <th>১০</th>
                                                </tr>
                                                <tr>
                                                    <th>সময়: </th>
                                                    <th>১০ মিনিট</th>
                                                </tr>
                                                <tr>
                                                    <th>পাস নম্বর: </th>
                                                    <th>১০%</th>
                                                </tr>
                                                <tr>
                                                    <th>পুনঃচেষ্টার সুযোগ: </th>
                                                    <th>৩ বার</th>
                                                </tr>
                                                <tr>
                                                    <th>চেষ্টা করেছেন: </th>
                                                    <th>{{ $result->times }} বার</th>
                                                </tr>
                                                <tr>
                                                    <th>প্রাপ্ত নম্বর: </th>
                                                    <th>{{ $result->mark }} ({{ $result->mark*100/10 }}%)</th>
                                                </tr>
                                        </table>
                                    </div>
                                    <div class="text-right">
                                        আপনার আরও {{ 3 - $result->times }} বার অংশগ্রহণ করার সুযোগ রয়েছে &nbsp;&nbsp;<a href="{{ route('user.quiz.quiz',[$result->course_id]) }}" class="btn btn-{{$result->times==3?'danger':'primary'}}" style="{{$result->times==3?'pointer-events: none;':''}}" >আবার চেষ্টা করুন </a>
                                    </div>

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
    <!-- Datatables -->
    {{-- @include('include.data_table_js') --}}
@endpush
@endsection

