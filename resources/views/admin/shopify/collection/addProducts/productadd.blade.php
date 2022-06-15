@extends('admin.layouts.app')
@section("title","Shopify products Add");
@push('header')
<style>
</style>
@endpush
@section('content')
@include('admin.inc.navbar')
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    @include('admin.inc.headerBar')
    <!-- End Navbar -->
    <div class="container-fluid">
        <div class="row mt-6 p-1 d-flex justify-content-center">
            <div class="col-md-10">
                <h4 class="mb-3">Add Products</h4>
                 @include('admin.shopify.collection.addProducts.formAddProducts')
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
       $(".productsAdd-submit-form").html("Add Products");
       $('#contact_form').attr("action","{{route('collectionaddProducts')}}");
    });
</script>
@endpush
