@extends('layouts.admin')
@section('title', 'Products')

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            @can('add products')
                <div class="row mb-2">
                    <div class="col text-end">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                class='bx bxs-plus-square'></i>New Product</a>
                    </div>
                </div>
            @endcan

            @if (Auth::user()->hasRole('practician'))
                {{-- Entity products list --}}
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid"
                    id="products-show">
                    @foreach ($products as $product)
                        @php
                            if (count($product->pictures)) {
                                $img = 'products_uploads/' . $product->pictures[0]->picture;
                            } else {
                                $img = 'products_uploads/' . 'product.jpg';
                            }

                        @endphp

                        <div class="col">
                            <div class="card w-fit-content">
                                <img src="{{ asset($img) }}" class="card-img-top" alt="..." style="width:100% !important; height:192px !important;">
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                            class="">-10%</span></div>
                                </div>
                                <div class="card-body">
                                    <a href='{{ route('admin.product.show', $product) }}'>
                                        <h6 class="card-title cursor-pointer">{{ $product->title }}</h6>
                                    </a>

                                    <div class="clearfix">
                                        <p class="mb-0 float-start"><strong></strong> Sales
                                        </p>
                                        <p class="mb-0 float-end fw-bold"><span
                                                class="me-2 text-decoration-line-through text-secondary">${{ $product->price }}</span><span>${{ $product->price }}</span>
                                        </p>
                                    </div>
                                    @if (Auth::user()->hasRole('super admin'))
                                        <a href="{{ route('admin.product.edit', $product) }}" class="fs-small"
                                            style="font-size: smaller;"> Edit product details</a>
                                        <a href="{{ route('admin.product.destroy', $product) }}" class="text-danger ml-2"
                                            style="font-size: smaller;"> Delete product </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{--  --}}
            @endif

            @if (Auth::user()->hasRole('super admin'))
                {{-- Admin products Row --}}
                <div class="row ">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>S.R No.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Vendor</th>
                                    <th>V Price</th>
                                    <th>M Price</th>
                                    {{-- <th>Stock</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($products))
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ Str::limit($product->description, 30, '...') }}</td>
                                            <td>{{ $product->category ? $product->category->name : '' }}</td>
                                            <td>{{ $product->subcategory ? $product->subcategory->name : '' }}</td>
                                            <td>{{ $product->vendor ? $product->vendor->name : '' }}</td>
                                            <td>{{ $product->cost_price }}</td>
                                            <td>{{ $product->price }}</td>
                                            {{-- <td>{{ $product->inventory }}</td> --}}
                                            <td>
                                                @can('edit products')
                                                    <a href="{{ route('admin.product.edit', $product) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                @endcan
                                                @can('delete products')
                                                    <a href="{{ route('admin.product.destroy', $product) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                @endcan

                                                <a href="{{ route('admin.product.show', $product) }}"
                                                    class="btn btn-info btn-sm">View Details</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                @endif
                            </tbody>
                        </table>
                    </div>


                </div>

                <!--end row-->
            @endif



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
    {{-- <script>
        var queryElement = document.getElementById('query');

        queryElement.addEventListener('input', function(e) {
            e.preventDefault();
            // alert(queryElement.value);

            if (queryElement.value != '') {

                const data = {
                    _token: '{{ csrf_token() }}',
                    searchQuery: queryElement.value,
                }

                fetch('{{ route('fetch.products') }}', {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }).then(function(response) {
                    return response.json();
                }).then(function(result) {
                    if (result.success) {
                        let show_products = $('#products-show');
                        show_products.empty();
                        show_products.append(result.output);
                        console.log(result);

                    } else {

                    }

                });
            }else{
                const data = {
                    _token: '{{ csrf_token() }}',
                    getAll:true,
                }

                fetch('{{ route('fetch.products') }}', {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }).then(function(response) {
                    return response.json();
                }).then(function(result) {
                    if (result.success) {
                        let show_products = $('#products-show');
                        show_products.empty();
                        show_products.append(result.output);
                        console.log(result);

                    } else {

                    }

                });
            }

        });
    </script> --}}
@endsection
