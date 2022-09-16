@extends('user.layout.master')
@section('title', 'Certificate')
@section('content')
@php $m='certificate'; $sm=''; $ssm=''; @endphp

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('user.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Certificate</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('user.certificate.css')
                        <div class="card-body m-auto">
                            <div class="certificate">
                                <img class="bg_image" src="{{ asset('uploads/images/icon/breeding_logo.png') }}" alt="">
                                <div class="certificate_2" style="">
                                    <div class="img">
                                        <img src="{{ asset('uploads/images/icon/mojib.jpg') }}" alt="">
                                        <img src="{{ asset('uploads/images/icon/breeding_logo.png') }}" alt="">
                                        <img src="{{ asset('uploads/images/icon/bangladeshs.jpg') }}" alt="">
                                    </div>
                                    <div class="title">বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট</div>
                                    <div style="padding: 0 40px">
                                        <p class="presented_to">সাভার, ঢাকা।</p>
                                        <p class="presented_to">সনদপত্র</p>
                                        <p class="student">{{ auth()->user()->name_cer }}</p>
                                        <p class="student">{{ auth()->user()->fa_name }}</p>
                                        <p class="student">{{ auth()->user()->mo_name }}</p>
                                        <p class="student">{{ auth()->user()->text }}</p>
                                        <p class="course">বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট এর উদ্যোগে ২০-২২ ডিসেম্বর, ২০২১ খ্রিঃ মেয়াদে অনুষ্ঠিত “{{ $ansSheet->course->name }}” শীর্ষক প্রশিক্ষণ কোর্স সাফল্যের সহিত সম্পন্ন করিয়াছেন। <br>আমি তার উত্তোরোত্তর সমৃদ্ধি কামনা করছি</p>

                                    </div>
                                    <div class="signature">
                                        <div class="sig_left">
                                            <img src="{{ asset('uploads/images/signature/s.png') }}" alt="">
                                            <p>Test</p>
                                            <p>Test</p>
                                        </div>
                                        <div class="sig_rig">
                                            <img src="{{ asset('uploads/images/signature/s.png') }}" alt="">
                                            <p>Test</p>
                                            <p>Test</p>
                                        </div>

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
    @include('user.include.data_table_js')

@endpush
@endsection

