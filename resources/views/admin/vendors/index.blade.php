@extends('layouts.admin')
@section('title', 'Vendors')

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="row">
                <div class="col text-end">
                    <a href="{{ route('admin.vendor.create') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                            class='bx bxs-plus-square'></i>New Vendor</a>
                </div>


            </div>

            <div class="row ">
                <div class="col">

                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <th># S.R No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @if (count($vendors))

                                @foreach ($vendors as $vendor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $vendor->name }}</td>
                                        <td>{{ $vendor->email }}</td>
                                        <td>{{ $vendor->phone }}</td>
                                        <td>{{ $vendor->city }}</td>
                                        <td>{{ $vendor->state }}</td>
                                        <td>{{ $vendor->country }}</td>
                                        <td>{{ Str::limit($vendor->address,20, '...') }}</td>
                                        <td>{{ $vendor->created_at }}</td>
                                        <td> <a href="{{ route('admin.vendor.edit', $vendor) }}"
                                                class="btn btn-sm btn-primary">Edit</a> <a
                                                href="{{ route('admin.vendor.destroy', $vendor) }}"
                                                class="btn btn-sm btn-danger">Delete</a></td>

                                    </tr>
                                @endforeach
                            @else
                            @endif
                        </tbody>
                    </table>
                </div>

          </div>
            <!--end row-->


        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')

<script>

    $(document).ready(function(){

        $('#datatable').DataTable();
    });
</script>
@endsection
