@extends('layouts.admin')
@section('style')
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            {{-- Row Start --}}
            <div class="row d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-1">Store Metrics</h5>
                                <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>in last 30 days revenue
                                </p>
                            </div>
                            <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-3 mt-4">
                            <div class="col">
                                <div>
                                    <p class="mb-0 text-secondary">Revenue</p>
                                    <h4 class="my-1">$4805</h4>
                                    <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>$1458
                                        Since last month</p>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <p class="mb-0 text-secondary">Total Customers</p>
                                    <h4 class="my-1">8.4K</h4>
                                    <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>12.3%
                                        Since last month</p>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <p class="mb-0 text-secondary">Total Annual Savings</p>
                                    <h4 class="my-1">59K</h4>
                                    <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>2.4%
                                        Since last month</p>
                                </div>
                            </div>
                        </div>
                        <div id="chart4"></div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script> --}}
    <script>
        // Wait for the document to load
        document.addEventListener("DOMContentLoaded", function() {
            // Chart options

            var options = {
                chart: {
                    type: "bar",
                    height: 350, // Set the height of the chart
                    toolbar: {
                        show: false // Hide the toolbar
                    }
                },
                series: [{
                    name: "Revenue",
                    data: [4805, 200, 400, 300, 700, 2000, 2500, 3000, 3500, 1500,
                        1800] // Add your revenue data here
                }],
                xaxis: {
                    categories: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec"
                    ] // Add your x-axis categories here
                }
            };

            // Create the chart
            var chart = new ApexCharts(document.querySelector("#chart4"), options);

            // Render the chart
            chart.render();
        });
    </script>
@endsection
