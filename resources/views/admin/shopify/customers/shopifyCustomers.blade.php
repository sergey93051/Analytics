@extends('admin.layouts.app')
@section("title","Shopify Customers");
@push('header')
<style>
     .select-allCustumers-but{
          display: flex;
     }
     #customerInputAll{
         margin-top: 14px;
     }

</style>
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
                <table id="customersShopifyTable" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">
                               <div class="select-allCustumers-but">
                                <input type="checkbox" class="customerInputAll" id="customerInputAll">
                                <p style='cursor: pointer;' class="customerInputAll m-2">All</p>
                               </div>
                            </th>
                            <th scope="col">count</th>
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
                            <th scope="col">menu</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <button type="button" class="btn csvFile">Download CSV Files</button>
            </div>
        </div>
    </div>
</div>
@include('admin.inc.modal.destroy')
@endsection
@push('js')
<script src="{{asset("/assets/js/shopifyTable/shopifyCustomer.js")}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        shopifyCustomer(
            jQuery.parseJSON('<?= "$customersData" ?>')
        );
    });
</script>
@endpush
