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
                        {{-- <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="{{ route('course.create') }}" class="btn btn-{{$layout->create_btn??'primary'}} btn-round ml-auto text-light" style="min-width: 200px">
                                    <i class="fa fa-plus"></i> Add New
                                </a>
                            </div>
                        </div> --}}
                        <style>
                            .certificate {
                                max-width: 1113px;
                                border: 2px solid rgb(184, 182, 182);
                                text-align: center;
                            }
                            .certificate_2 {
                                border: 2px solid rgb(184, 182, 182);
                                margin: 10px;
                            }

                            .certificate .img img{
                                height: 80px;
                                margin: 40px 0;
                            }
                            .certificate .title {
                                font-size: 60px;
                            }
                            .certificate .presented_to {
                                font-size: 30px;
                            }
                            .certificate .student {
                                font-size: 40px;
                            }
                            .certificate .course {
                                font-size: 25px;
                            }
                            .certificate .signature {
                                border-top: 1px solid black;
                                font-size: 25px;
                                display: inline-block;
                                line-height: 0.82;
                                margin-top: 40px;
                            }
                            .certificate .signature_deg {
                                font-size: 25px;
                            }

                        </style>
                        <div class="card-body m-auto">
                            <div class="certificate">
                                <div class="certificate_2">
                                    <div class="img">
                                        <img src="{{ asset('uploads/images/icon/blri_learning_logo.png') }}" alt="">
                                    </div>
                                    <div class="title">CERTIFICATE OF COMPLETION</div>
                                    <div style="padding: 0 40px">
                                        <p class="presented_to">This certificate is proudly presented to</p>
                                        <p class="student">{{ auth()->user()->name_cer }}</p>
                                        <p class="course">To commemorate her successful completion of {{ $ansSheet->course->name }} on BLRI e-Learning platform</p>
                                        <img src="{{ asset('uploads/images/icon/breeding_logo.png') }}" width="80px"><br>
                                        <p class="signature">name</p>
                                        <p class="signature_deg">Chief Executive Officer (CEO)</p>
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

