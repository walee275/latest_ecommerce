@extends('layouts.admin')
@section('title', 'Edit Sub-Category')

@section('style')

@endsection

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('admin.subcategories') }}" class="btn btn-primary"> Back</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Edit Category</h5>
                    <hr />
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.subcategory.edit', $category) }}" method="POST" id="form">
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Categories Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Enter Categorie Name"
                                                value="{{ old('name') ? old('name') : $category->name }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!--end row-->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="parent_category" class="form-label">Parent Category</label>
                                            <select name="parent_category" id="parent_category" class="form-select">
                                                <option value="">Select Parent Category</option>
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_category ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!--end row-->
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>


        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')
@endsection
