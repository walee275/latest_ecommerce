
@extends('layouts.admin')


@section('title')
permission Page - Admin Panel
@endsection

@section('styles')

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
                    <h4 class="header-title float-left">Permissions List</h4>
                    <p class="float-right mb-2">
                        {{-- @if (Auth::guard('admin')->user()->can('permission.create')) --}}
                            <a class="btn btn-primary text-white" href="{{ route('admin.permissions.create') }}">Create New Permission</a>
                        {{-- @endif --}}
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('partials.alerts')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($permissions as $permission)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        {{-- @if (Auth::guard('admin')->user()->can('admin.edit')) --}}
                                            <a class="btn btn-success text-white" href="{{ route('admin.permissions.update', $permission) }}"><i class="fa fa-pen"></i></a>
                                        {{-- @endif --}}

                                        {{-- @if (Auth::guard('admin')->user()->can('admin.edit')) --}}
                                            <a class="btn btn-danger text-white" href="{{ route('admin.permissions.delete', $permission) }}">
                                                <i class="fa fa-trash"></i>

                                            </a>
                                        {{-- @endif --}}
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

     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

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
