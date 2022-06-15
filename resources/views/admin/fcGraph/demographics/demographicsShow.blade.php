@extends('admin.layouts.app')
@section("title","fb Page View");
@push('header')
<link href="{{asset("/assets/css/navfcgraph.css")}}" rel="stylesheet" />
@endpush
@section('content')
@include('admin.inc.navbar')

<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    @include('admin.inc.headerBar')
    <!-- End Navbar -->
    <div class="container">
        <div class="row">
            <div class="col-md">
                @include('admin.inc.fbgraphNavBar')
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                @include('admin.fcGraph.demographics.demographicsChart')
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')

<script src="{{asset("assets/js/fcscript/navbarfc.js")}}" type="text/javascript"></script>

<script src="{{asset("assets/js/fcscript/fcdemographicsgraph.js")}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        demographics(
            jQuery.parseJSON('<?= "$demographicsData" ?>')
        );
    });
</script>
@endpush
