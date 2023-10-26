@extends('layouts.admin')

@section('title')
    Users - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">



            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title float-left">Users List</h4>
                                <p class="float-right mb-2">
                                    @can('add users')
                                        <a class="btn btn-primary text-white" href="{{ route('admin.user.create') }}">Create New
                                            User</a>
                                    @endcan
                                </p>
                                <div class="clearfix"></div>
                                <div class="data-tables">
                                    @include('partials.alerts')
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th width="5%">Sl</th>
                                                <th width="10%">Name</th>
                                                <th width="10%">Email</th>
                                                <th width="40%">Roles</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @foreach ($user->roles as $role)
                                                            <span class="badge badge-info mr-1"
                                                                style="background-color: blue;">
                                                                {{ $role->name }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @can('edit users')
                                                            <a class="btn btn-success text-white"
                                                                href="{{ route('admin.user.update', $user->id) }}"><i
                                                                    class="fa fa-pen"></i></a>
                                                        @endcan

                                                        @can('delete users')
                                                            <a class="btn btn-danger text-white"
                                                                href="{{ route('admin.user.delete', $user->id) }}"><i
                                                                    class="fa fa-trash"></i>

                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->

                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <!-- Start datatable js -->
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script> --}}

    <script>
        /*================================
                    datatable active
                    ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
    </script>
@endsection
