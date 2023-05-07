@extends('user.layout.master')
@section('title', 'Certificate')
@section('content')
    @php
        $m = 'certificate';
        $sm = '';
        $ssm = '';
    @endphp

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
                                    <img class="bg_image" src="{{ asset('uploads/images/icon/breeding_logo.png') }}">
                                    <div class="certificate_2" style="">
                                        <div class="img">
                                            <img src="{{ asset('uploads/images/icon/breeding_logo.png') }}">
                                        </div>
                                        <div class="serial_no">ক্রমিক নং- BLRI{{ $ansSheet->course->id }}{{ user()->id }}
                                        </div>
                                        <div class="title">বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট</div>
                                        <div style="padding: 0 40px">
                                            <p class="presented_to">সাভার, ঢাকা।</p>
                                            <p class="presented_to presented_to_cert">সনদপত্র</p>
                                            <table>
                                                <tr>
                                                    <th class="tr">নামঃ</th>
                                                    <th class="tl">{{ user()->name_cer }}</th>
                                                </tr>
                                                <tr>
                                                    <th class="tr">পিতা/স্বামীর নামঃ</th>
                                                    <th class="tl">{{ user()->fa_name }}</th>
                                                </tr>
                                                <tr>
                                                    <th class="tr">ঠিকানাঃ</th>
                                                    <th class="tl">{{ user()->text }}</th>
                                                </tr>
                                            </table>
                                            <p class="course">
                                                বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট এর উদ্যোগে
                                                {{ monthInBangla(carbon($ansSheet->updated_at)->format('n')) }},
                                                {{ digitInBangla(carbon($ansSheet->updated_at)->format('Y')) }} খ্রিঃ মেয়াদে
                                                অনুষ্ঠিত
                                                “{{ $ansSheet->course->name }}”
                                                শীর্ষক প্রশিক্ষণ কোর্স সাফল্যের সহিত সম্পন্ন করিয়াছেন।
                                                <br>আমি তার উত্তোরোত্তর সমৃদ্ধি কামনা করছি।
                                            </p>
                                        </div>
                                        <div class="signature">
                                            <div class="sig_left">
                                                <img src="{{ asset('uploads/images/signature/' . $signatures->where('id', 1)->first()->image) }}"
                                                    alt="" height="50px">
                                                <p>{{ $signatures->where('id', 1)->first()->name }}</p>
                                                <p>{{ $signatures->where('id', 1)->first()->designation }}</p>
                                            </div>
                                            <div class="sig_rig">
                                                <img src="{{ asset('uploads/images/signature/' . $signatures->where('id', 2)->first()->image) }}"
                                                    alt="" height="50px">
                                                <p>{{ $signatures->where('id', 2)->first()->name }}</p>
                                                <p>{{ $signatures->where('id', 2)->first()->designation }}</p>
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
