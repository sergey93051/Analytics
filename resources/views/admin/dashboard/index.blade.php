@extends('admin.layouts.app')
@section("title","main")

@section('content')
@include('admin.inc.navbar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    @include('admin.inc.headerBar')
    {{-- ----------- --}}
    <div class="container-fluid py-4">
        <div class="app-content">
            <div class="column">
                <div class="content-wrapper">
                    <div class="content-wrapper-before"></div>
                    <div class="content-header row">
                        <div class="content-header-left col-md-5 col-12">
                            <h4 class="content-header-title p-3">Analytics 3 months</h4>
                        </div>
                    </div>
                    <div class="content-body">
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col text-center">
                                        <strong>Country visits</strong>
                                    </div>
                                    <div class="height-400 mt-2 d-flex justify-content-center">
                                        <canvas id="country-chart"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col text-center">
                                        <strong>Users visits</strong>
                                    </div>
                                    <div class="height-400 d-flex justify-content-center">
                                        <canvas id="usersVisits"></canvas>
                                    </div>
                                </div>
                                {{-- @include('admin.shopify.googleAnalytics.country.countryChart') --}}
                            </div>
                        </section>
                        <section>
                            <div class="row md-6 p-1">
                                @include('admin.shopify.checkouts.checkoutTable')
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <div class="col-md">
                                    <div class="col text-center">
                                        <strong>Payment Count</strong>
                                    </div>
                                    <div class="height-400 mt-2 d-flex justify-content-center">
                                        <canvas id="line-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('js')

<script src="{{asset("assets/js/google/charts/country.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/google/charts/pscChart.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/google/charts/dayVisits.js")}}" type="text/javascript"></script>
<script src="{{asset("/assets/js/shopifyTable/checkoutData.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/google/charts/paymant.js")}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        country(
            jQuery.parseJSON('<?= "$countryAnalytics" ?>')
        );
        dayVisits(
            jQuery.parseJSON('<?= "$userVisitsAnalytics" ?>')
        );
        checkoutData(
            jQuery.parseJSON('<?= "$checkoutsData" ?>')
        );
        paymant(
            jQuery.parseJSON('<?= "$paymantAnalyticsData" ?>')
        );
    });
</script>

@endpush
