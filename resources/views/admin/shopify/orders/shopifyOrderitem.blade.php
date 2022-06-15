@extends('admin.layouts.app')
@section("title","Shopify Order");
@push('header')
<!-- Style -->
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
                <h4>Last Order</h4>
                <table id="orderItemShopifyTable" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Total Weight</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Estimated Taxes</th>
                            <th scope="col">Financial Status</th>
                            <th scope="col">Current Total Price</th>
                            <th scope="col">Total Price Usd</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Current Total Tax</th>
                            <th scope="col">Total Discounts</th>
                            <th scope="col">created_at</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset("/assets/js/shopifyTable/ordersDataItem.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        ordersDataItem(
            jQuery.parseJSON('<?= "$orderData" ?>')
        );
    });
</script>
@endpush
