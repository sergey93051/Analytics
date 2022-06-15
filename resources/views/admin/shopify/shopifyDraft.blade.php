@extends('admin.layouts.app')
@section("title","Shopify Drafts");
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

                <table id="draftShopifyTable" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Taxes Included</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Subtotal Price</th>
                            <th scope="col">Total Tax</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Completed date</th>
                            <th scope="col">Created date</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset("/assets/js/shopifyTable/shopifyDraft.js")}}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        shopifyDraft(
            jQuery.parseJSON('<?= "$draftsData" ?>')
        );
    });
</script>
@endpush
