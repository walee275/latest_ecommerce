@extends('layouts.admin')
@section('title', 'Products')

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">


            <div class="row">
                <div class="col-12">
                    @include('partials.alerts')

                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <table class="tabel">
                                <thead>
                                    <tr>
                                        <th>S.R No.</th>
                                        <th>Value</th>
                                        <th>Product</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')

@endsection
