<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="#" class="text-muted">Home</a>
                    <span></span> Shop
                    <span></span> <i style="color: #F15412">Checkout</i>
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                @if (!Auth::user())
                    <div class="row">
                        <div class="col-lg-6 mb-sm-15">
                            <div class="toggle_info">
                                <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Already have an
                                        account?</span>
                                    <a href="#loginform" data-bs-toggle="collapse" class="collapsed"
                                        aria-expanded="false">Click
                                        here to login</a></span>
                            </div>
                            <div class="panel-collapse collapse login_form" id="loginform">
                                <div class="panel-body">
                                    <p class="mb-30 font-sm">If you have shopped with us before, please enter your
                                        details
                                        below. If you are a new customer, please proceed to the Billing &amp; Shipping
                                        section.
                                    </p>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" name="email" placeholder="Username Or Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                                        id="remember" value="">
                                                    <label class="form-check-label" for="remember"><span>Remember
                                                            me</span></label>
                                                </div>
                                            </div>
                                            <a href="#">Forgot password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-md" name="login">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">


                        </div>
                    </div>
                @else
                @endif
                {{-- <div class="row">
                <div class="col-12">
                    <div class="divider mt-50 mb-50"></div>
                </div>
            </div> --}}
                <div class="row bg-secondary">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 bg-body">
                                    {{-- <div class="card"> --}}
                                    @if (!Auth::user())
                                        <div class="card-body">
                                            <form action="#" method="post">
                                                @csrf
                                                <div class="mb-15">
                                                    <h4>Contact Details</h4>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-floating mb-3">
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" id="email" placeholder="Jhon@example.com"
                                                            value="{{ old('email') }}">
                                                        <label for="email">Email</label>
                                                        @error('email')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-15">
                                                    <h4>Shipping Details</h4>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text"
                                                                    class="form-control @error('fname') is-invalid @enderror"
                                                                    name="fname" id="fname" placeholder="Jhon"
                                                                    value="{{ old('fname') }}">
                                                                <label for="fname">First Name</label>
                                                                @error('fname')
                                                                    {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text"
                                                                    class="form-control @error('lname') is-invalid @enderror"
                                                                    name="lname" id="lname" placeholder="Smith"
                                                                    value="{{ old('lname') }}">
                                                                <label for="lname">Last Name</label>
                                                                @error('lname')
                                                                    {{ $message }}
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text"
                                                                    class="form-control @error('city') is-invalid @enderror"
                                                                    name="city" id="city" placeholder="City / Town"
                                                                    value="{{ old('city') }}">
                                                                <label for="city">City</label>
                                                                @error('city')
                                                                    {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text"
                                                                    class="form-control @error('postal_code') is-invalid @enderror"
                                                                    name="postal_code" id="postcode"
                                                                    placeholder="postcode"
                                                                    value="{{ old('postal_code') }}">
                                                                <label for="postcode">Postal Code</label>
                                                                @error('postal_code')
                                                                    {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text"
                                                        class="form-control @error('aaddress') is-invalid @enderror"
                                                        name="address" id="address" placeholder="street-2,ghaziabad.."
                                                        value="{{ old('aaddress') }}">
                                                    <label for="address">Address</label>
                                                    @error('address')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <select
                                                                class="form-select text-muted @error('country') is-invalid @enderror"
                                                                name="country"
                                                                style="height:60px; border:1px solid #f0e9ff"
                                                                value="{{ old('country') }}">
                                                                <option value="Pakistan">Pakistan</option>
                                                            </select>
                                                            @error('country')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text"
                                                                    class="form-control @error('phone_no') is-invalid @enderror"
                                                                    name="phone_no" id="phone_no"
                                                                    placeholder="Phone No."
                                                                    value="{{ old('phone_no') }}">
                                                                <label for="phone_no">Phone No</label>
                                                                @error('phone_no')
                                                                    {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <select
                                                        class="form-select text-muted @error('payment_method') is-invalid @enderror"
                                                        name="payment_method"
                                                        style="height:60px; border:1px solid #f0e9ff">
                                                        <option value="1">COD</option>
                                                    </select>
                                                    @error('payment_method')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input class="" type="checkbox" name="save_information"
                                                        id="save_information"
                                                        style="width: 6%!important; height:15px!important">
                                                    <label for="checkbox">Save information for next time?</label>

                                                </div>
                                                {{-- <div class="form-group">
                                            <div class="checkbox">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                                    <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="createaccount"><span>Create an account?</span></label>
                                                </div>
                                            </div>
                                            </div>
                                            <div id="collapsePassword" class="form-group create-account collapse in">
                                                <input required="" type="password" placeholder="Password" name="password">
                                            </div> --}}

                                                <div class="row">
                                                    <div class="col text-start">
                                                        {{-- <a href="#" class="page-link">Return Back</a> --}}
                                                    </div>
                                                    <div class="col text-end">
                                                        <input type="submit" class="btn btn-fill-out btn-block "
                                                            value="Place Order" name="submit">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <div class="card-body">
                                            <?php $name = explode(' ', Auth::user()->name);
                                            $fname = $name[0];
                                            $lname = $name[1]; ?>
                                            <form method="post" action="">
                                                <div class="mb-15">
                                                    <h4>Contact Details</h4>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" id="email"
                                                            placeholder="Jhon@example.com"
                                                            value="{{ Auth::user()->email }}">
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                                <div class="mb-15">
                                                    <h4>Shipping Details</h4>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name=""
                                                                    id="fname" placeholder="Jhon"
                                                                    value="{{ $fname }}">
                                                                <label for="fname">First Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name=""
                                                                    id="lname" placeholder="Smith"
                                                                    value="{{ $lname }}">
                                                                <label for="lname">Last Name</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name=""
                                                                    id="city" placeholder="City / Town"
                                                                    value="{{ Auth::user()->city }}">
                                                                <label for="city">City</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name=""
                                                                    id="postcode" placeholder="postcode"
                                                                    value="{{ Auth::user()->postalcode }}">
                                                                <label for="postcode">Postal Code</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name=""
                                                        id="address" placeholder="street-2,ghaziabad.."
                                                        value="{{ Auth::user()->address }}">
                                                    <label for="address">Address</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <select class="form-select text-muted"
                                                                style="height:60px; border:1px solid #f0e9ff">
                                                                <option value="Pakistan">Pakistan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name=""
                                                                    id="phone_no" placeholder="Phone No."
                                                                    value="{{ Auth::user()->phone_no }}">
                                                                <label for="phone_no">Phone No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-select text-muted"
                                                        style="height:60px; border:1px solid #f0e9ff">
                                                        <option value="cod">COD</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <div class="custome-checkbox">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="save_information" id="save_information">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group">
                                                <div class="checkbox">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                                        <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="createaccount"><span>Create an account?</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsePassword" class="form-group create-account collapse in">
                                                <input required="" type="password" placeholder="Password" name="password">
                                            </div> --}}
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="toggle_info">
                                                            <span><i class="fi-rs-label mr-10"></i><span
                                                                    class="text-muted">Have a
                                                                    coupon?</span> <a href="#coupon"
                                                                    data-bs-toggle="collapse" class="collapsed"
                                                                    aria-expanded="false">Click
                                                                    here to enter your code</a></span>
                                                        </div>
                                                        <div class="panel-collapse collapse coupon_form " id="coupon">
                                                            <div class="panel-body">
                                                                <p class="mb-30 font-sm">If you have a coupon code,
                                                                    please apply it
                                                                    below.</p>
                                                                <form method="post">
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            placeholder="Enter Coupon Code...">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button class="btn  btn-md" name="login">Apply
                                                                            Coupon</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-start">
                                                        {{-- <a href="#" class="page-link">Return Back</a> --}}
                                                    </div>
                                                    <div class="col text-end">
                                                        <input type="submit" value="Place Order"
                                                            class="btn btn-fill-out btn-block ">

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-3 text-start">
                                            <a href="#" class="page-link">Back to Cart</a>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                </div>
                                <div class="col-md-6 bg-light">
                                    <div class="mb-10 mt-2">
                                        <h4>Your Orders</h4>
                                    </div>
                                    <div class="table-responsive order_table text-center">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @if ($cart_items && count($cart_items) > 0) --}}
                                                    @php $total = 0; @endphp
                                                    {{-- @foreach ($cart_items as $items) --}}
                                                        <tr>
                                                            <td class="image product-thumbnail"><img
                                                                    src="{{ asset('usertemplate/assets/imgs/shop/product-1-1.jpg') }}"
                                                                    alt="#"></td>
                                                            <td>
                                                                <h5><a
                                                                        href="product-details.html">test 1</a>
                                                                </h5>
                                                                <span class="product-qty">x 1</span>
                                                            </td>
                                                            <td>¢500</td>
                                                        </tr>

                                                    {{-- @endforeach --}}
                                                {{-- @else
                                                    <div class="alert alert-danger">
                                                        Empty
                                                    </div>
                                                @endif --}}
                                                <tr>
                                                    <th>SubTotal</th>
                                                    <td class="product-subtotal" colspan="2">${{ $total }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td colspan="2"><em>Free Shipping</em></td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td colspan="2" class="product-subtotal"><span
                                                            class="font-xl text-brand fw-900">${{ $total }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


