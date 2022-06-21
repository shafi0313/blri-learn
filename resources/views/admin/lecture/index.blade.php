@extends('admin.layout.master')
@section('title', 'Lecture')
@section('content')
@php $m='lecture'; $sm=''; $ssm=''; @endphp

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Lecture</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="{{ route('lecture.create') }}" class="btn btn-primary btn-round ml-auto text-light" style="min-width: 200px">
                                    <i class="fa fa-plus"></i> Add New Lecture
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover" >
                                    <thead class="bg-secondary thw">
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Skill level</th>
                                            <th>Language</th>
                                            <th>Description</th>
                                            <th class="no-sort" width="40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $x = 1 @endphp
                                        @foreach ($lectures->groupBy('course_id') as $lecture)
                                        @php  $lec = $lecture->first(); @endphp
                                        <tr>
                                            <td class="text-center">{{ $x++ }}</td>
                                            <td>{{ $lec->course->name }}</td>
                                            <td>{{ $lec->course->skill_level }}</td>
                                            <td>{{ $lec->course->language }}</td>
                                            <td>{!! Str::limit($lec->course->description, 50) !!}</td>
                                            <td><a href="{{ route('lecture.show',$lec->course_id) }}">show</a></td>
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

