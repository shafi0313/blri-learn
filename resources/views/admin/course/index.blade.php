@extends('admin.layout.master')
@section('title', 'Course')
@section('content')
@php $m='course'; $sm=''; $ssm=''; @endphp

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Course</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="{{ route('admin.course.create') }}" class="btn btn-primary btn-round ml-auto text-light" style="min-width: 200px">
                                    <i class="fa fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="display table table-striped table-hover" >
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
                ajax: "{{ route('admin.course.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        title: 'SL',
                        className: "text-center",
                        width: "50px",
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                        title: 'Name',
                    },
                    {
                        data: 'skill_level',
                        name: 'skill_level',
                        title: 'Skill Level',
                    },
                    {
                        data: 'description',
                        name: 'description',
                        title: 'Description',
                    },
                    {
                        data: 'language',
                        name: 'language',
                        title: 'Language',
                    },
                    {
                        data: 'image',
                        name: 'image',
                        title: 'Image',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        title: 'Action',
                        className: "text-center",
                        width: "100px",
                        orderable: false,
                        searchable: false
                    },
                ],
                // fixedColumns: false,
                scroller: {
                    loadingIndicator: true
                },
                // order: [
                //     [1, 'asc']
                // ]
            });
        });
    </script>
@endpush
@endsection

