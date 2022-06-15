@extends('admin.layouts.app')
@section("title","Shopify Customer");
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
                <table id="customersitemShopifyTable" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Accepts Marketing</th>
                            <th scope="col">Orders Count</th>
                            <th scope="col">Total Spent</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Tax Exempt</th>
                            <th scope="col">Order Time</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
{{-- <script src="{{asset("/assets/js/shopifyTable/shopifyCustomer.js")}}" type="text/javascript"></script> --}}
<script>
    $(document).ready(function() {

       var data = jQuery.parseJSON('<?= "$customersItemData"  ?>');

            var table = $('#customersitemShopifyTable').DataTable({
                "scrollX": true,
                "processing": true,
                "bInfo": false,
                "paging": false,
                "searching": false,
                data: data,
                columns: [
                    {
                        data: "first_name",
                    },
                    {
                        data: "last_name"
                    },
                    {
                        data: "email"
                    },
                    {
                        data: "phone"
                    },
                    {
                        data: "accepts_marketing"
                    },
                    {
                        data: "orders_count"
                    },
                    {
                        data: "total_spent"
                    },
                    {
                        data: "currency"
                    },
                    {
                        data: "tax_exempt"
                    },
                    {
                        data: "created_at"
                    },
                ],
                drawCallback: function() {
                    $('[data-toggle="popover"]').popover();
                },
                'columnDefs': [{
                    'targets': [1, 2, 3, 4, 5, 6, 7, 8, 9],
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
