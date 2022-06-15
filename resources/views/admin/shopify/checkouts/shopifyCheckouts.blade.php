@extends('admin.layouts.app')
@section("title","Shopify Checkouts");
@push('header')
@endpush
@section('content')
@include('admin.inc.navbar')
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    @include('admin.inc.headerBar')
    <!-- End Navbar -->
    <div class="container-fluid">
        <div class="row mt-6 p-1">
            @include('admin.shopify.checkouts.checkoutTable')
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset("/assets/js/shopifyTable/checkoutData.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        checkoutData(
            jQuery.parseJSON('<?= "$checkoutsData" ?>')
        );
    });
</script>
@endpush
