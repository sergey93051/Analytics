@extends('admin.layouts.app')
@section("title","Shopify ShippingAddress");
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
            <div class="col-12 mb-5">
                <h3 class="p-1 text-start">Shipping Address</h3>
            </div>
            <div class="col-12">
                <table id="Checkouts-ShopifyTable" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">Country</th>
                            <th scope="col">City</th>
                            <th scope="col">Province</th>
                            <th scope="col">Address1</th>
                            <th scope="col">Address2</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Postal Code</th>
                            <th scope="col">Company</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
{{-- <script src="{{asset("/assets/js/shopifyTable/tenderTransaction.js")}}" type="text/javascript"></script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        var data = jQuery.parseJSON('<?= "$takeShippingAddressData" ?>');
        var table = $('#Checkouts-ShopifyTable').DataTable({
            "scrollX": true,
            "processing": true,
            "bInfo": false,
            "paging": false,
            "searching": false,
            data: data,
            columns: [{
                    data: "country"
                },
                {
                    data: "city"
                },
                {
                    data: "province"
                },
                {
                    data: "address1"
                },
                {
                    data: "address2"
                },
                {
                    data: "phone"
                },
                {
                    data: "Postal_code"
                },
                {
                    data: "company"
                },
            ],
            'columnDefs': [{
                'targets': [0, 1, 2, 3, 4, 5, 6, 7],
                'orderable': false,
            }],
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "pageLength": 10,
        });
    });
</script>
@endpush
