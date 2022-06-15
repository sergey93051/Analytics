@extends('admin.layouts.app')
@section("title","fb Dashboard");
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
            @include('admin.fcGraph.ribbons.ribbons')
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset("assets/js/fcscript/navbarfc.js")}}" type="text/javascript"></script>

@endpush
