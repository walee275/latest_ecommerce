
@extends('layouts.admin')


@section('title')
Permission Create - Admin Panel
@endsection

@section('styles')
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
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
                    <h4 class="header-title">Create New permission</h4>
                    @include('partials.alerts')

                    <form action="{{ route('admin.permissions.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">permission Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : '' }}" placeholder="Enter a permission Name">
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save permission</button>
                    </form>
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
@endsection
