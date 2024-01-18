@extends('admin.layout.master')
@section('title', 'Student List')
@section('content')

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                        <li class="separator"><i class="flaticon-right-arrow"></i></li>
                        <li class="nav-item">Student List</li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Student List</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="data_table" class="display table table-striped table-hover">
                                        <thead class="bg-secondary thw">
                                        </thead>
                                        <tbody>
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
        <script>
            $(function() {
                $('#data_table').DataTable({
                    processing: true,
                    serverSide: true,
                    deferRender: true,
                    ordering: true,
                    responsive: true,
                    scrollY: 400,
                    ajax: "{{ route('admin.student.lists') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            className: 'text-center',
                            width: '60px',
                            title: 'SL',
                            orderable: false,
                            searchable: false,
                        },
                        {
                            data: 'name',
                            name: 'name',
                            title: 'Student Name',
                        },
                        {
                            data: 'email',
                            name: 'email',
                            title: 'Email',
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            title: 'Phone',
                        },
                        {
                            data: 'gender',
                            name: 'gender',
                            title: 'Gender',
                        },
                        {
                            data: 'district.name',
                            name: 'district.name',
                            title: 'District',
                        },
                        {
                            data: 'address',
                            name: 'address',
                            title: 'Address',
                        },
                    ],
                    scroller: {
                        loadingIndicator: true
                    }
                });
            });
        </script>
    @endpush
@endsection
