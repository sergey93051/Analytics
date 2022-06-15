@extends('admin.layouts.app')
@section("title","Shopify TenderTransaction");
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
                <h3 class="p-1 text-start">Tender Transaction</h3>
                <h6 class="text-start p-1  w-80">
                    Each tender transaction represents money passing between the merchant and a customer.
                    A tender transaction with a positive amount represents a transaction where the customer
                    paid money to the merchant. A negative amount represents a transaction where the merchant
                    refunded money back to the customer.
                    Tender transactions represent transactions that modify the shop's balance.
                </h6>
            </div>
            <div class="col-12">
                <table id="tenderTransaction-ShopifyTable" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Test</th>
                            <th scope="col">Payment Details</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Processed Time</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset("/assets/js/shopifyTable/tenders.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        tenderTransaction(
            jQuery.parseJSON('<?= "$tenderTransactionData" ?>')
        );
    });
</script>
@endpush
