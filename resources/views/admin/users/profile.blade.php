@extends('layouts.admin')

@section('title', 'Profile Page')
{{-- @include('partials.backend.logout') --}}
@section('wrapper')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">{{ Auth::user()->name }}</span><span
                        class="text-black-50">{{ Auth::user()->email }}</span><span>
                    </span></div>
            </div>
            <div class="col ">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    @include('partials.alerts')
                    <form action="{{ route('admin.user.update', Auth::user()) }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels" for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="first name"
                                    value="{{ old('name') ? old('name') : Auth::user()->name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels" for="email">Email ID</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="enter email id"
                                    value="{{ old('email') ? old('email') : Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels" for="phone_no">Mobile Number</label>
                                <input type="text" id="phone_no" name="phone_no" class="form-control" placeholder="Enter Phone Number"
                                    value="{{ old('phone_no') ? old('phone_no') : Auth::user()->phone_no }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels" for="country">Country</label>
                                <input type="text" id="country" name="country" class="form-control" placeholder="Enter Country"
                                    value="{{ old('country') ? old('country') : Auth::user()->country }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label class="labels" for="postal_code">Postcode</label>
                                <input type="text" id="postal_code" name="postal_code" class="form-control" placeholder="Enter Postal code"
                                    value="{{ old('postal_code') ? old('postal_code') : Auth::user()->postal_code }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label class="labels" for="address">Address</label>
                                <textarea id="address" name="address" class="form-control"
                                    placeholder="Enter Address">{{ old('address') ? old('address') : Auth::user()->address }}</textarea>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
