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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead class="bg-secondary thw">
                                            <tr>
                                                <th>SL</th>
                                                <th>Course Name</th>
                                                <th>Mark</th>
                                                <th>Try</th>
                                                <th class="no-sort" width="40px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $x = 1; @endphp
                                            @foreach ($ansSheets as $ansSheet)
                                                <tr>
                                                    <td class="text-center">{{ $x++ }}</td>
                                                    <td>{{ $ansSheet->course->name }}</td>
                                                    <td>{{ $ansSheet->mark }}</td>
                                                    <td>{{ $ansSheet->times }}</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('user.certificate.show', $ansSheet->course_id) }}">Certificate</a>
                                                        <a
                                                            href="{{ route('user.certificate.pdf', $ansSheet->course_id) }}">Download</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
