@extends('layouts.admin')
@section('title', 'Sub-Categories')

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="row mb-2">
                <div class="col text-end"><a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                        class='bx bxs-plus-square'></i>New Category</a></div>


            </div>

            <div class="row ">
                <div class="col">

                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <th># S.R No.</th>
                            <th>Category Name</th>
                            <th>Parent Category Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @if (count($categories))

                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->parent->name }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td> <a href="{{ route('admin.subcategory.edit', $category) }}"
                                                class="btn btn-sm btn-primary">Edit</a> <a
                                                href="{{ route('admin.subcategory.destroy', $category) }}"
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
        $(document).ready(function() {

            $('#datatable').DataTable();
        });
    </script>

@endsection
