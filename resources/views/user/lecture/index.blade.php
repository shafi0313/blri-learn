@extends('user.layout.master')
@section('title', 'Lecture')
@section('content')
@php $m='lecture'; $sm=''; $ssm=''; @endphp

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
                                <table id="multi-filter-select" class="display table table-{{$layout->tbl}} table-striped table-hover" >
                                    <thead class="bg-{{$layout->tbl_bg}} text-{{$layout->tbl_text}}">
                                        <tr>
                                            <th>Name</th>
                                            <th>Skill level</th>
                                            <th>Language</th>
                                            <th>Description</th>
                                            {{-- <th>Text</th> --}}
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
                                        @foreach ($lectures->groupBy('course_id') as $lecture)
                                        @php  $lec = $lecture->first(); @endphp
                                        <tr>
                                            <td>{{ $lec->course->name }}</td>
                                            <td>{{ $lec->course->skill_level }}</td>
                                            <td>{{ $lec->course->language }}</td>
                                            <td>{!! $lec->course->description !!}</td>
                                            <td><a href="{{ route('lecture.show',$lec->course_id) }}">show</a></td>
                                        {{-- <td>{{ $course->chapter }}</td>
                                            <td>{{ $course->language }}</td>
                                            <td>{!! $course->description !!}</td>
                                            <td><img src="{{ asset('uploads/images/course/'. $course->image) }}" alt="{{ $course->alt }}" width="80px"></td>
                                            <td>{{ $course->alt }}</td>
                                            <td>
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

