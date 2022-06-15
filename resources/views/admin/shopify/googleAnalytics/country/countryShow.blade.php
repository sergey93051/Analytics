@extends('admin.layouts.app')
@section("title","country and city")
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
                        <div class="content-header-left col-md-5 col-12 ">
                            <h3 class="content-header-title p-3">Analytics</h3>
                        </div>
                    </div>
                    <div class="content-body">
                        <section id="chartjs-bar-charts">
                            <!-- Column Chart -->
                            <div class="row">
                                @include('admin.shopify.googleAnalytics.country.countryChart')
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
<script src="{{asset("assets/js/google/charts/city.js")}}" type="text/javascript"></script>
<script src="{{asset("/assets/js/modalforcharts/checkoutModel.js")}}" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        country(
            jQuery.parseJSON('<?= "$countryAnalyticsData" ?>'),
            jQuery.parseJSON('<?= "$dateCountry" ?>')
        );
        city(
            jQuery.parseJSON('<?= "$cityAnalyticsData" ?>'),
            jQuery.parseJSON('<?= "$dateCity" ?>')
        );
    });
</script>

@endpush
