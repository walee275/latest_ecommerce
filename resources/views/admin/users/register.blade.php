<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practician Registeration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="" crossorigin="anonymous">

</head>
<body>
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5 text-cent">
                <div class="card w-75 m-auto">
                    <div class="card-body">
                        <h2 class="header-title text-center mb-5">Practician Registeration Form</h2>
                        @include('partials.alerts')
                        <form action="{{ route('user_registration.form')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <p>Already Registered? <a href="{{ route('login') }}">Login Here</a></p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels" for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="first name"
                                        value="{{ old('name') ? old('name') :'' }}">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                       @enderror
                                    </div>
                                <div class="col-md-6">
                                    <label class="labels" for="email">Email ID</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="enter email id"
                                        value="{{ old('email') ? old('email') :''  }}">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                       @enderror
                                    </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Phone Number"
                                        >
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                       @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="labels" for="password_confirmation">Confirm Password</label>
                                    <input type="password" id="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter Phone Number"
                                        >
                                        @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                       @enderror
                                </div>


                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels" for="phone_no">Mobile Number</label>
                                    <input type="text" id="phone_no" name="phone_no" class="form-control @error('phone_no') is-invalid @enderror" placeholder="Enter Phone Number"
                                        value="{{ old('phone_no') ? old('phone_no') :''  }}">
                                        @error('phone_no')
                                        <p class="text-danger">{{ $message }}</p>
                                       @enderror
                                    </div>
                                <div class="col-md-6">
                                    <label class="labels" for="country">Country</label>
                                    <input type="text" id="country" name="country" class="form-control @error('country') is-invalid @enderror" placeholder="Enter Country"
                                        value="{{ old('country') ? old('country') :''  }}">
                                        @error('country')
                                        <p class="text-danger">{{ $message }}</p>
                                       @enderror
                                    </div>


                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="labels" for="postal_code">Postcode</label>
                                    <input type="text" id="postal_code" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Enter Postal code"
                                        value="{{ old('postal_code') ? old('postal_code') :''  }}">
                                        @error('postal_code')
                                        <p class="text-danger">{{ $message }}</p>
                                       @enderror
                                    </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label class="labels" for="address">Address</label>
                                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Enter Address">{{ old('address') ? old('address') :''  }}</textarea>
                                        @error('address')
                                         <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                            </div>
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Submit Form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>

</body>
</html>
