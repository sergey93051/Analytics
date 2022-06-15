@extends('admin.layouts.app')
@section("title","pageView")
@section('content')
@include('admin.inc.navbar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('admin.inc.headerBar')
    {{-- ----------- --}}
    <div class="container-fluid py-2">
        <div class="app-content">
            <div class="column">
                <div class="content-wrapper">
                    <div class="content-wrapper-before"></div>
                    <div class="content-header row">
                        <div class="content-header-left col-md-5 col-12">
                            <h3 class="content-header-title p-1">Google Analytics</h3>
                        </div>
                    </div>
                    <div class="content-body">
                        <section>
                            <!-- Line Chart -->
                            @include('admin.shopify.googleAnalytics.pageViews.pageViewsChart')
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('js')

<script src="{{asset("assets/js/google/charts/pscChart.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/modalforcharts/pSCpageViwesModel.js")}}" type="text/javascript"></script>

<script src="{{asset("assets/js/google/charts/anyPagesView.js")}}" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        pscModel();
        anyPagesView(
            jQuery.parseJSON('<?= "$anyPageAlyticsData" ?>'),
            jQuery.parseJSON('<?= "$dateAnyPage" ?>')
        );
        pscChart(
            jQuery.parseJSON('<?= "$pscAlyticsData" ?>'),
            jQuery.parseJSON('<?= "$pscdate" ?>')
        );
    });
</script>

@endpush
