@extends('admin.layout.master')
@section('title', 'Student History')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Student History</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Student History</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr>
                                            <th>SL</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                            <th>District</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x = 1; @endphp
                                        @foreach ($students as $student)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->gender==1?'Male':'Female' }}</td>
                                            <td>{{ $student->district->name }}</td>
                                            <td>{{ $student->address }}</td>
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
    @include('include.data_table_js')
@endpush
@endsection

