<!DOCTYPE html>
<html lang="zxx">

@include('partials.head')

<body>

    <!--wrapper start-->
    <div class="wrapper">

        <!--== Start Header Wrapper ==-->
        @include('partials.navbar')
        <!--== End Header Wrapper ==-->

        @yield('content')

        <!--== Start Footer Area Wrapper ==-->
        @include('partials.footer')
        <!--== End Footer Area Wrapper ==-->

        <!--== Scroll Top Button ==-->
        <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

        <!--== Start Quick View Menu ==-->
        @include('partials.models.quick_view')
        <!--== End Quick View Menu ==-->

        <!--== Start Aside Cart Menu ==-->
        @include('partials.models.cart')

        <!--== End Aside Cart Menu ==-->

        <!--== Start Aside Search Menu ==-->
        @include('partials.models.search')

        <!--== End Aside Search Menu ==-->

        <!--== Start Side Menu ==-->
        @include('partials.side_menu')

        <!--== End Side Menu ==-->
    </div>

    <!--=======================Javascript============================-->
    @include('partials.scripts')
    @yield('custom_js')
</body>

</html>
