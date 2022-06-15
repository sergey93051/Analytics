@extends('admin.layouts.app')
@section("title","Shopify Products");
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
            <div class="col-12">
                <table id="productShopifyTable" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Template Suffix</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created Image Time</th>
                            <th scope="col">Created Product Time</th>
                            <th scope="col">Details</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.inc.modal.destroy')
@endsection
@push('js')
<script src="{{asset("/assets/js/shopifyTable/productsData.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        productsData(
            jQuery.parseJSON('<?= "$takeProduct" ?>')
        );
    });
</script>
@endpush
