@extends('admin.layout.master')
@section('title', 'Visitor Info')
@section('content')
@php $m='visitor'; $sm=''; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="{{ route('admin.dashboard')}}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Visitor Info</a>
                    </li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('admin.visitorInfo.destroySelected')}}" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Visitor Info</h4>
                                    <button type="submit" class="btn btn-warning btn-round ml-auto">Delete Selected</button>

                                    <a class="btn btn-danger btn-round " href="{{ route('admin.visitorInfo.destroyAll') }}">
                                        <i class="fa fa-plus"></i>
                                        Delete All
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead class="bg-secondary thw">
                                            <tr>
                                                <th>
                                                    <label><input  type="checkbox" id="checkAll"> &nbsp;&nbsp; SL</label>
                                                </th>
                                                <th>IP</th>
                                                <th>Country Name</th>
                                                <th>Region Name</th>
                                                <th>City Name</th>
                                                <th>Zip Code</th>
                                                <th>Latitude</th>
                                                <th>Longitude </th>
                                                <th>currency</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($visitors as $key=>$visitor)
                                            <tr>
                                                <td>
                                                    <label><input value="{{$visitor->id}}" type="checkbox" name="id[]" class="child" > &nbsp;&nbsp; {{$key+1}}</label>
                                                </td>
                                                <td>{{$visitor->ip}} </td>
                                                <td>
                                                    <span><i class="{{strtolower($visitor->country)}} flag"></i></span>
                                                    {{$visitor->country}}
                                                </td>
                                                <td>{{$visitor->state_name}} </td>
                                                <td>{{$visitor->city}} </td>
                                                <td>{{$visitor->postal_code}} </td>
                                                <td>{{$visitor->lat}} </td>
                                                <td>{{$visitor->lon}} </td>
                                                <td>{{$visitor->currency}} </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 @include('admin.layout.footer')
</div>

@push('custom_scripts')
<script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control form-control-sm"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
                ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>
<script>
    $(function () {
        $("#checkAll").on("click", function () {
            if($(this).is(":checked")){
                $('.child').prop('checked', true);
            } else {
                $('.child').prop('checked', false);
            }
        })
    });
</script>
@endpush
@endsection

