<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->title }}</title>
    <link rel="stylesheet" href="{{ asset('product_details_assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('product_details_assets/css/custom.css') }}">
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }



        .detail-gallery .slick-slider {
            background-color: transparent !important;
        }
    </style>
</head>

<body>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('admin.dashboard') }}" rel="nofollow">Home</a>
                    <span></span> <a href="{{ route('admin.products') }}">Products</a>
                    <span></span> {{ $product->title }}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery" style="">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            @if (count($product_pictures))
                                                @foreach ($product_pictures as $picture)
                                                    <figure class="border-radius-10">
                                                        <img src="{{ asset('products_uploads/' . $picture->picture) }}"
                                                            alt="product image">
                                                    </figure>
                                                @endforeach
                                            @else
                                                <figure class="border-radius-10">
                                                    <img src="{{ asset('products_uploads/product.jpg') }}"
                                                        alt="product image">
                                                </figure>
                                            @endif
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            @if ($product_pictures)
                                                @foreach ($product_pictures as $picture)
                                                    <div><img src="{{ asset('products_uploads/' . $picture->picture) }}"
                                                            alt="product image"></div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                    <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Share this:</strong></li>
                                            <li class="social-facebook"><a href="#"><img
                                                        src="{{ asset('product_details_assets/imgs/theme/icons/icon-facebook.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-twitter"> <a href="#"><img
                                                        src="{{ asset('product_details_assets/imgs/theme/icons/icon-twitter.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img
                                                        src="{{ asset('product_details_assets/imgs/theme/icons/icon-instagram.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img
                                                        src="{{ asset('product_details_assets/imgs/theme/icons/icon-pinterest.svg') }}"
                                                        alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @if ($product)
                                @endif
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ Str::ucfirst($product->title) }}</h2>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <h5>Category</h5>
                                                <p>{{ $product->category->name }}</p>
                                            </div>
                                            <div class="col">
                                                <h5>Sub Category</h5>
                                                <p>{{ $product->subcategory ? $product->subcategory->name : '' }}</p>
                                            </div>
                                            <div class="col">
                                                <h5>Vendor</h5>
                                                <p>{{ $product->vendor ? $product->vendor->name : '' }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div>
                                                <h5 class="py-1 d-inline text-dark">Vendor Price &nbsp;</h5>
                                                <p class="d-inline text-dark">
                                                    <strike>${{ $product->cost_price }}</strike>
                                                </p>
                                            </div>
                                            <div class="">
                                                <h3 class="py-1 mt-1 d-inline text-primary">Medicus Price
                                                    &nbsp;&nbsp;</h3>
                                                <h3 class="d-inline text-primary pb-2">${{ $product->price }}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3 class="text-muted">Product Sizes </h3>
                                        @if (count($product->sizes))
                                            {{-- @dd($product->sizes[0]->value) --}}
                                            <figure class="w-100 h-100">
                                                <img src="{{ asset($product->sizes[0]->value) }}" alt=""
                                                    style="">
                                            </figure>
                                        @else
                                            <div class="alert alert-light">
                                                No Sizes specified
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col">


                                </div>
                            </div> --}}

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Vendor JS-->
    <script src="{{ asset('product_details_assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('product_details_assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->

    <script src="{{ asset('product_details_assets/js/main.js?v=3.3') }}"></script>
    <script src="{{ asset('product_details_assets/js/shop.js?v=3.3') }}"></script>
    <script src="{{ asset('product_details_assets/js/custom.js') }}"></script>
</body>

</html>
