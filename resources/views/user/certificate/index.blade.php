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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr>
                                            <th>SL</th>
                                            <th>Course Name</th>
                                            <th>Mark</th>
                                            <th>Try</th>
                                            <th class="no-sort" width="40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x = 1; @endphp
                                        @foreach ($ansSheets as $ansSheet)
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td>{{ $ansSheet->course->name }}</td>
                                            <td>{{ $ansSheet->mark }}</td>
                                            <td>{{ $ansSheet->times }}</td>
                                            <td>
                                                <a href="{{ route('user.certificate.show', $ansSheet->course_id) }}">Certificate</a>
                                                <a href="{{ route('user.certificate.pdf', $ansSheet->course_id) }}">Download</a>
                                            </td>
                                            {{-- <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('course.edit', $course->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('course.destroy', $course->id) }}" method="post">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onClick="return confirm('Are you sure')">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>


                                                </div>
                                            </td> --}}
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

