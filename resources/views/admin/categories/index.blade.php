@extends('layouts.admin')
@section('title', 'Products')

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-xl-2">
                                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                            class='bx bxs-plus-square'></i>New Category</a>
                                </div>
                                <div class="col-lg-9 col-xl-10">
                                    {{-- <form class="float-lg-end" id="search_form">
                                        @csrf
                                        <div class="row row-cols-lg-auto g-2">
                                            <div class="col-12">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control ps-5" name="query"
                                                        id="query" placeholder="Search Product..."> <span
                                                        class="position-absolute top-50 product-show translate-middle-y"><i
                                                            class="bx bx-search"></i></span>
                                                </div>
                                            </div>


                                        </div>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col">

                    <table class="table table-bordered">
                        <thead>
                            <th># S.R No.</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @if (count($categories))

                           @foreach ($categories as $category )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td> <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-sm btn-primary">Edit</a>  <a href="{{ route('admin.category.destroy', $category) }}" class="btn btn-sm btn-danger">Delete</a></td>

                            </tr>
                           @endforeach
                            @else

                            @endif
                        </tbody>
                    </table>
                </div>

                {{-- <div class="col">
						<div class="card">
							<img src="assets/images/products/02.png" class="card-img-top" alt="...">
							<div class="">
								<div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
							</div>
							<div class="card-body">
								<a href='{{ url('ecommerce-products-details')}}'>
									<h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
								</a>
								<div class="clearfix">
									<p class="mb-0 float-start"><strong>134</strong> Sales</p>
									<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span></p>
								</div>
								<div class="d-flex align-items-center mt-3 fs-6">
								  <div class="cursor-pointer">
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-secondary'></i>
								  </div>
								  <p class="mb-0 ms-auto">4.2(182)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<img src="assets/images/products/03.png" class="card-img-top" alt="...">
							<div class="">
								<div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
							</div>
							<div class="card-body">
								<a href='{{ url('ecommerce-products-details')}}'>
									<h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
								</a>
								<div class="clearfix">
									<p class="mb-0 float-start"><strong>134</strong> Sales</p>
									<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span></p>
								</div>
								<div class="d-flex align-items-center mt-3 fs-6">
								  <div class="cursor-pointer">
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-secondary'></i>
								  </div>
								  <p class="mb-0 ms-auto">4.2(182)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<img src="assets/images/products/04.png" class="card-img-top" alt="...">
							<div class="">
								<div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
							</div>
							<div class="card-body">
								<a href='{{ url('ecommerce-products-details')}}'>
									<h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
								</a>
								<div class="clearfix">
									<p class="mb-0 float-start"><strong>134</strong> Sales</p>
									<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span></p>
								</div>
								<div class="d-flex align-items-center mt-3 fs-6">
								  <div class="cursor-pointer">
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-secondary'></i>
								  </div>
								  <p class="mb-0 ms-auto">4.2(182)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<img src="assets/images/products/05.png" class="card-img-top" alt="...">
							<div class="">
								<div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
							</div>
							<div class="card-body">
								<a href='{{ url('ecommerce-products-details')}}'>
									<h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
								</a>
								<div class="clearfix">
									<p class="mb-0 float-start"><strong>134</strong> Sales</p>
									<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span></p>
								</div>
								<div class="d-flex align-items-center mt-3 fs-6">
								  <div class="cursor-pointer">
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-secondary'></i>
								  </div>
								  <p class="mb-0 ms-auto">4.2(182)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<img src="assets/images/products/06.png" class="card-img-top" alt="...">
							<div class="">
								<div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
							</div>
							<div class="card-body">
								<a href='{{ url('ecommerce-products-details')}}'>
									<h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
								</a>
								<div class="clearfix">
									<p class="mb-0 float-start"><strong>134</strong> Sales</p>
									<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span></p>
								</div>
								<div class="d-flex align-items-center mt-3 fs-6">
								  <div class="cursor-pointer">
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-secondary'></i>
								  </div>
								  <p class="mb-0 ms-auto">4.2(182)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<img src="assets/images/products/07.png" class="card-img-top" alt="...">
							<div class="">
								<div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
							</div>
							<div class="card-body">
								<a href='{{ url('ecommerce-products-details')}}'>
									<h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
								</a>
								<div class="clearfix">
									<p class="mb-0 float-start"><strong>134</strong> Sales</p>
									<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span></p>
								</div>
								<div class="d-flex align-items-center mt-3 fs-6">
								  <div class="cursor-pointer">
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-secondary'></i>
								  </div>
								  <p class="mb-0 ms-auto">4.2(182)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<img src="assets/images/products/08.png" class="card-img-top" alt="...">
							<div class="">
								<div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
							</div>
							<div class="card-body">
								<a href='{{ url('ecommerce-products-details')}}'>
									<h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
								</a>
								<div class="clearfix">
									<p class="mb-0 float-start"><strong>134</strong> Sales</p>
									<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span></p>
								</div>
								<div class="d-flex align-items-center mt-3 fs-6">
								  <div class="cursor-pointer">
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-secondary'></i>
								  </div>
								  <p class="mb-0 ms-auto">4.2(182)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<img src="assets/images/products/09.png" class="card-img-top" alt="...">
							<div class="">
								<div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
							</div>
							<div class="card-body">
								<a href='{{ url('ecommerce-products-details')}}'>
									<h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
								</a>
								<div class="clearfix">
									<p class="mb-0 float-start"><strong>134</strong> Sales</p>
									<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span></p>
								</div>
								<div class="d-flex align-items-center mt-3 fs-6">
								  <div class="cursor-pointer">
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-secondary'></i>
								  </div>
								  <p class="mb-0 ms-auto">4.2(182)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<img src="assets/images/products/10.png" class="card-img-top" alt="...">
							<div class="">
								<div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
							</div>
							<div class="card-body">
								<a href='{{ url('ecommerce-products-details')}}'>
									<h6 class="card-title cursor-pointer">Nest Shaped Chair</h6>
								</a>
								<div class="clearfix">
									<p class="mb-0 float-start"><strong>134</strong> Sales</p>
									<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>$240</span></p>
								</div>
								<div class="d-flex align-items-center mt-3 fs-6">
								  <div class="cursor-pointer">
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-secondary'></i>
								  </div>
								  <p class="mb-0 ms-auto">4.2(182)</p>
								</div>
							</div>
						</div>
					</div> --}}
            </div>
            <!--end row-->


        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')

@endsection
