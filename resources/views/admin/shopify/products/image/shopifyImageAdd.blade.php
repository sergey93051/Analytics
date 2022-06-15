@extends('admin.layouts.app')
@section("title","Shopify Image Add");
@push('header')
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
                <h4 class="mb-3">Add a Image</h4>
                 @include('admin.shopify.products.image.formImage')
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
       $(".image-submit-form").html("Add Image");
       $('#contact_form').attr("action","{{route('imagecreate')}}");
    });
</script>
@endpush
