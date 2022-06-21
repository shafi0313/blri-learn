@extends('admin.layout.master')
@section('title', 'Backup')
@section('content')
@php $m='backup'; $sm=''; $ssm=''; @endphp

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">App Backup</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Backup Database/Files</h4>
                                <div style="display:inline-block" class="ml-auto mr-5">
                                    <form action="{{route('admin.backup.db')}}" method="POST">
                                        @csrf
                                        <input onClick="return wait()" type="submit" class="btn btn-{{$layout->create_btn??'primary'}} btn-round ml-auto text-light" style="min-width: 200px" value="Backup Database">
                                    </form>
                                </div>

                                <div style="display:inline-block">
                                    <form action="{{route('admin.backup.files')}}" method="POST">
                                        @csrf
                                        <input onClick="return wait()" type="submit" class="btn btn-{{$layout->create_btn??'primary'}} btn-round ml-auto text-light" style="min-width: 200px" value="Backup Program File">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h1 id="msg" class="text-center text-danger"></h1>
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-{{$layout->tbl}} table-striped table-hover" >
                                    <thead class="bg-{{$layout->tbl_bg}} text-{{$layout->tbl_text}}">
                                        <tr>
                                            <th>File name</th>
                                            <th>File size</th>
                                            <th>Type</th>
                                            <th class="no-sort" width="70px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($backups as $backup)
                                        <tr>
                                            <td>{{ preg_replace("/[^0-9 -]+/", "", $backup['filename']) }}</td>
                                            <td>{{readableSize($backup['size'])}}</td>
                                            <td>{{ preg_replace("/[^A-Z]+/", "", $backup['filename']) }}</td>
                                            <td>
                                                <div style="display: inline-block">
                                                    <form action="{{route('admin.backup.download',['name'=> $backup['filename'],'ext'=>$backup['extension']])}}" method="post">
                                                        @csrf
                                                        <button class="btn btn-info btn-sm"><i class="fa fa-download"></i></button>
                                                    </form>
                                                </div>
                                                <div style="display: inline-block">
                                                    <form action="{{route('admin.backup.delete',['name'=> $backup['filename'],'ext'=>$backup['extension']])}}" method="post">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
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
    <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>
    <script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
            // "pageLength": 5,
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
    });
</script>
<script>
    function wait(){
        $("#msg").html('Don\'t do any other action until download Complete.')
    }
</script>
@endpush
@endsection

