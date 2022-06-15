@extends('admin.layouts.app')
@section("title","Shopify Collection Edit");
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
            <div class="col-7">
                <h4 class="mb-3">Edit Collection</h4>
                 @include('admin.shopify.collection.collectionForm.collectionForm')
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
       $(".variant-submit-form").html("Edit Collection");
       $('#contact_form').attr("action","{{route('collectionUpdate')}}");
    });
</script>
@endpush
