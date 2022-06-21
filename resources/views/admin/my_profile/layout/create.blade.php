@extends('admin.layout.master')
@section('title', 'Layout')
@section('content')
@php $m='myProfile'; $sm='layout'; $ssm=''; @endphp
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Layout</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Layout</div>
                        </div>
                        <div class="card-body">
                            @php
                                $user = auth()->user();
                                $layout = App\Models\Layout::where('user_id',$user->id)->first();
                            @endphp

<style>
    .cus button {
        height: 30px !important;
        width: 30px !important;
        border: 1px solid gray;
        margin: 5px;
        border-radius: 50% !important;
    }

</style>

    <div class="row">
        <div class="col-md-6 py-3">
            <h4>Logo Header</h4>
            <form action="{{ route('admin.logoHeaderStore') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="btnSwitch cus">
                    <button name="logo_header" value="dark" class="{{$layout->logo_header=='dark'?'selected':''}} changeLogoHeaderColor" data-color="dark"></button>
                    <button name="logo_header" value="blue" class="{{$layout->logo_header=='blue'?'selected':''}} changeLogoHeaderColor" data-color="blue"></button>
                    <button name="logo_header" value="purple" class="{{$layout->logo_header=='purple'?'selected':''}} changeLogoHeaderColor" data-color="purple"></button>
                    <button name="logo_header" value="light-blue" class="{{$layout->logo_header=='light-blue'?'selected':''}} changeLogoHeaderColor" data-color="light-blue"></button>
                    <button name="logo_header" value="green" class="{{$layout->logo_header=='green'?'selected':''}} changeLogoHeaderColor" data-color="green"></button>
                    <button name="logo_header" value="orange" class="{{$layout->logo_header=='orange'?'selected':''}} changeLogoHeaderColor" data-color="orange"></button>
                    <button name="logo_header" value="red" class="{{$layout->logo_header=='red'?'selected':''}} changeLogoHeaderColor" data-color="red"></button>
                    <button name="logo_header" value="white" class="{{$layout->logo_header=='white'?'selected':''}} changeLogoHeaderColor" data-color="white"></button>
                    <br />
                    <button name="logo_header" value="dark2" class="{{$layout->logo_header=='dark2'?'selected':''}} changeLogoHeaderColor" data-color="dark2"></button>
                    <button name="logo_header" value="blue2" class="{{$layout->logo_header=='blue2'?'selected':''}} changeLogoHeaderColor" data-color="blue2"></button>
                    <button name="logo_header" value="purple2" class="{{$layout->logo_header=='purple2'?'selected':''}} changeLogoHeaderColor" data-color="purple2"></button>
                    <button name="logo_header" value="light-blue2" class="{{$layout->logo_header=='light-blue2'?'selected':''}} changeLogoHeaderColor" data-color="light-blue2"></button>
                    <button name="logo_header" value="green2" class="{{$layout->logo_header=='green2'?'selected':''}} changeLogoHeaderColor" data-color="green2"></button>
                    <button name="logo_header" value="orange2" class="{{$layout->logo_header=='orange2'?'selected':''}} changeLogoHeaderColor" data-color="orange2"></button>
                    <button name="logo_header" value="red2" class="{{$layout->logo_header=='red2'?'selected':''}} changeLogoHeaderColor" data-color="red2"></button>
                </div>
            </form>
        </div>

        <div class="col-md-6 py-3">
            <h4>Navbar Header</h4>
            <form action="{{route('admin.navbarHeaderStore')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="btnSwitch cus">
                    <button name="navbar_header" value="dark" class="{{$layout->navbar_header=='dark'?'selected':''}} changeTopBarColor" data-color="dark"></button>
                    <button name="navbar_header" value="blue" class="{{$layout->navbar_header=='blue'?'selected':''}} changeTopBarColor" data-color="blue"></button>
                    <button name="navbar_header" value="purple" class="{{$layout->navbar_header=='purple'?'selected':''}} changeTopBarColor" data-color="purple"></button>
                    <button name="navbar_header" value="light-blue" class="{{$layout->navbar_header=='light-blue'?'selected':''}} changeTopBarColor" data-color="light-blue"></button>
                    <button name="navbar_header" value="orange" class="{{$layout->navbar_header=='orange'?'selected':''}} changeTopBarColor" data-color="orange"></button>
                    <button name="navbar_header" value="red" class="{{$layout->navbar_header=='red'?'selected':''}} changeTopBarColor" data-color="red"></button>
                    <button name="navbar_header" value="white" class="{{$layout->navbar_header=='white'?'selected':''}} changeTopBarColor" data-color="white"></button>
                    <br />
                    <button name="navbar_header" value="dark2" class="{{$layout->navbar_header=='dark2'?'selected':''}} changeTopBarColor" data-color="dark2"></button>
                    <button name="navbar_header" value="blue2" class="{{$layout->navbar_header=='blue2'?'selected':''}} changeTopBarColor" data-color="blue2"></button>
                    <button name="navbar_header" value="purple2" class="{{$layout->navbar_header=='purple2'?'selected':''}} changeTopBarColor" data-color="purple2"></button>
                    <button name="navbar_header" value="light-blue2" class="{{$layout->navbar_header=='light-blue2'?'selected':''}} changeTopBarColor" data-color="light-blue2"></button>
                    <button name="navbar_header" value="green2" class="{{$layout->navbar_header=='green2'?'selected':''}} changeTopBarColor" data-color="green2"></button>
                    <button name="navbar_header" value="orange2" class="{{$layout->navbar_header=='orange2'?'selected':''}} changeTopBarColor" data-color="orange2"></button>
                    <button name="navbar_header" value="red2" class="{{$layout->navbar_header=='red2'?'selected':''}} changeTopBarColor" data-color="red2"></button>
                </div>
            </form>
        </div>

        <div class="col-md-6 py-3">
            <h4>Sidebar</h4>
            <form action="{{route('admin.sidebarStore')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="btnSwitch cus">
                    <button name="sidebar" value="white" class="{{$layout->sidebar=='white'?'selected':''}} changeSideBarColor" data-color="white"></button>
                    <button name="sidebar" value="dark" class="{{$layout->sidebar=='dark'?'selected':''}} changeSideBarColor" data-color="dark"></button>
                    <button name="sidebar" value="dark2" class="{{$layout->sidebar=='dark2'?'selected':''}} changeSideBarColor" data-color="dark2"></button>
                </div>
            </form>
        </div>

        <div class="col-md-6 py-3">
            <h4>Background</h4>
            <form action="{{route('admin.backgroundStore')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="btnSwitch cus">
                    <button name="background" value="bg2" class="{{$layout->sidebar=='bg2'?'selected':''}} changeBackgroundColor" data-color="bg2"></button>
                    <button name="background" value="bg1"  class="{{$layout->sidebar=='bg1'?'selected':''}} changeBackgroundColor" data-color="bg1"></button>
                    <button name="background" value="bg3" class="{{$layout->sidebar=='bg3'?'selected':''}} changeBackgroundColor" data-color="bg3"></button>
                    <button name="background" value="dark" class="{{$layout->sidebar=='dark'?'selected':''}} changeBackgroundColor" data-color="dark"></button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <style>
        .ac{
            border: 3px solid rgb(161, 139, 139) !important;
        }
        .layout-btn button {
            height: 30px !important;
            width: 30px !important;
            border: 1px solid rgb(161, 161, 161);
            margin: 5px;
            border-radius: 50% !important;
        }
    </style>
<div class="text-center p-3" style="font-size: 20px">Teble Design</div>
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 py-2">
                <form action="{{ route('layout.table')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="layout-btn">
                        <h4>Table Color</h4>
                        <button name="tbl" value="light" class="bg-light ac"></button>
                        <button name="tbl" value="dark" class="bg-dark ac"></button>
                        <button name="tbl" value="primary" class="bg-primary ac"></button>
                        <button name="tbl" value="secondary" class="bg-secondary"></button>
                        <button name="tbl" value="info" class="bg-info"></button>
                        <button name="tbl" value="success" class="bg-success"></button>
                        <button name="tbl" value="danger" class="bg-danger"></button>
                        <button name="tbl" value="warning" class="bg-warning"></button>
                    </div>
                </form>
            </div>
            <div class="col-md-12 py-2">
                <form action="{{ route('layout.tableBg')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="layout-btn">
                        <h4>Table Head Background</h4>
                        <button name="tbl_bg" value="light" class="bg-light ac"></button>
                        <button name="tbl_bg" value="dark" class="bg-dark ac"></button>
                        <button name="tbl_bg" value="primary" class="bg-primary ac"></button>
                        <button name="tbl_bg" value="secondary" class="bg-secondary"></button>
                        <button name="tbl_bg" value="info" class="bg-info"></button>
                        <button name="tbl_bg" value="success" class="bg-success"></button>
                        <button name="tbl_bg" value="danger" class="bg-danger"></button>
                        <button name="tbl_bg" value="warning" class="bg-warning"></button>
                    </div>
                </form>
            </div>
            <div class="col-md-12  py-2">
                <form action="{{ route('layout.tableText')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="layout-btn">
                        <h4>Color Input</h4>
                        <button name="tbl_text" value="light" class="bg-light ac"></button>
                        <button name="tbl_text" value="dark" class="bg-dark ac"></button>
                        <button name="tbl_text" value="primary" class="bg-primary ac"></button>
                        <button name="tbl_text" value="secondary" class="bg-secondary"></button>
                        <button name="tbl_text" value="info" class="bg-info"></button>
                        <button name="tbl_text" value="success" class="bg-success"></button>
                        <button name="tbl_text" value="danger" class="bg-danger"></button>
                        <button name="tbl_text" value="warning" class="bg-warning"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="table-responsive">
            <table id="multi-filter-select" class="display table table-{{$layout->tbl}} table-striped table-hover" >
                <thead class="bg-{{$layout->tbl_bg}} text-{{$layout->tbl_text}}">
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th class="no-sort" width="40px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>
                            <div class="form-button-action">
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>
                            <div class="form-button-action">
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>
                            <div class="form-button-action">
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>
                            <div class="form-button-action">
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6">
        <form action="{{ route('layout.submitBtn')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="layout-btn">
                <h4>Submit Button</h4>
                <button name="submit_btn"  value="light" class="bg-light"></button>
                <button name="submit_btn"  value="dark" class="bg-dark"></button>
                <button name="submit_btn"  value="primary" class="bg-primary"></button>
                <button name="submit_btn"  value="secondary" class="bg-secondary"></button>
                <button name="submit_btn"  value="info" class="bg-info"></button>
                <button name="submit_btn"  value="success" class="bg-success"></button>
                <button name="submit_btn"  value="danger" class="bg-danger"></button>
                <button name="submit_btn"  value="warning" class="bg-warning"></button>
            </div>
        </form>
        <button class="btn btn-{{$layout->submit_btn??'primary'}} btn-sm">Submit</button>
    </div>
    <div class="col-md-6">
        <form action="{{ route('layout.createBtn')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="layout-btn">
                <h4>Add Button</h4>
                <button name="create_btn" value="light" class="bg-light"></button>
                <button name="create_btn" value="dark" class="bg-dark"></button>
                <button name="create_btn" value="primary" class="bg-primary"></button>
                <button name="create_btn" value="secondary" class="bg-secondary"></button>
                <button name="create_btn" value="info" class="bg-info"></button>
                <button name="create_btn" value="success" class="bg-success"></button>
                <button name="create_btn" value="danger" class="bg-danger"></button>
                <button name="create_btn" value="warning" class="bg-warning"></button>
            </div>
        </form>
        <button class="btn btn-{{$layout->create_btn??'primary'}} btn-sm btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
            <i class="fa fa-plus"></i>Add Row
        </button>
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





@endpush
@endsection

