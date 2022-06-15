@extends('admin.layouts.app')
@section("title","Shopify Collection");
@push('header')
<style>
    .menu-collection {
        cursor: pointer !important;
    }
</style>
<link rel="stylesheet" href="{{asset("assets/css/shopify/products.css")}}">
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
            </div>
            <div class="col-12">
                <table id="collectionShopifyTable" class="display" style="width:100%;">
                    <span style="cursor: pointer;" class="create-collection">
                        <svg width="20" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60"
                            style="enable-background:new 0 0 60 60;" xml:space="preserve">
                            <path d="M0,0v60h60V0H0z M51,32H32v19h-4V32H9v-4h19V9h4v19h19V32z" />
                        </svg>
                    </span>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Published Scope</th>
                            <th scope="col">Image</th>
                            <th scope="col">Published Time</th>
                            <th scope="col">Menu</th>
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
<script src="{{asset("/assets/js/shopifyTable/collectionData.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        collectionData(
            jQuery.parseJSON('<?= "$collectionData" ?>')
        );
    });
</script>
@endpush
