@extends('admin.layouts.app')
@section("title","Shopify Product");
@push('header')
<link rel="stylesheet" href="{{asset("assets/css/shopify/productMore.css")}}">
<link rel="stylesheet" href="{{asset("assets/css/shopify/galleryPictures.css")}}">
<style>
    .variants-delete-btn,
    .variants-add-btn,
    .variants-edit-btn,
    .product-edit-btn,
    .product-iamge-add,
    .header-edit-btn {

        cursor: pointer;
    }

    ul>li:first-child {
        list-style: none;
    }

    .img-delete-btn {
        cursor: pointer;
        border: 5px;
    }
</style>
@endpush
@section('content')
@include('admin.inc.navbar')
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    @include('admin.inc.headerBar')
    <!-- End Navbar -->
    <div class="container mt-5 mb-6">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="text-end ">
                            {{-- <svg class="product-edit-btn" width="17.5" height="17.5" version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 59.985 59.985" style="enable-background:new 0 0 59.985 59.985;"
                                xml:space="preserve">
                                <g>
                                    <path d="M5.243,44.844L42.378,7.708l9.899,9.899L15.141,54.742L5.243,44.844z" />
                                    <path d="M56.521,13.364l1.414-1.414c1.322-1.322,2.05-3.079,2.05-4.949s-0.728-3.627-2.05-4.949S54.855,0,52.985,0
                               s-3.627,0.729-4.95,2.051l-1.414,1.414L56.521,13.364z" />
                                    <path d="M4.099,46.527L0.051,58.669c-0.12,0.359-0.026,0.756,0.242,1.023c0.19,0.19,0.446,0.293,0.707,0.293
                               c0.106,0,0.212-0.017,0.316-0.052l12.141-4.047L4.099,46.527z" />
                                    <path d="M43.793,6.294l1.415-1.415l9.899,9.899l-1.415,1.415L43.793,6.294z" />
                                </g>
                            </svg> --}}
                            <svg class="product-iamge-add" width="17.5" height="17.5" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;"
                                xml:space="preserve">
                                <path d="M0,0v60h60V0H0z M51,32H32v19h-4V32H9v-4h19V9h4v19h19V32z" />
                            </svg>
                            <svg class="img-delete-btn" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-close-box" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M19,3H16.3H7.7H5A2,2 0 0,0 3,5V7.7V16.4V19A2,2 0 0,0 5,21H7.7H16.4H19A2,2 0 0,0 21,19V16.3V7.7V5A2,2 0 0,0 19,3M15.6,17L12,13.4L8.4,17L7,15.6L10.6,12L7,8.4L8.4,7L12,10.6L15.6,7L17,8.4L13.4,12L17,15.6L15.6,17Z" />
                            </svg>
                        </div>
                        <div class="main_image">
                            <img src="{{asset("storage/loader/loader.gif")}}" data-action="zoom"
                                class="main_product_image" id="" width="350">
                        </div>
                        <div class="thumbnail_images">
                            <ul id="thumbnail">
                                @foreach (json_decode($productImages) as $img)
                                <li id="{{$img->product_id}}">
                                    <img src="{{$img->src}}" id="{{'['.$img->product_id.','.$img->id.']'}}" width="70"
                                        alt="{{$img->id}}">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @foreach (json_decode($productSmall) as $item)
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-end">
                            <svg id="{{$item->id}}" class="header-edit-btn" width="17.5" height="17.5" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 59.985 59.985" style="enable-background:new 0 0 59.985 59.985;"
                                xml:space="preserve">
                                <g>
                                    <path d="M5.243,44.844L42.378,7.708l9.899,9.899L15.141,54.742L5.243,44.844z" />
                                    <path d="M56.521,13.364l1.414-1.414c1.322-1.322,2.05-3.079,2.05-4.949s-0.728-3.627-2.05-4.949S54.855,0,52.985,0
                           s-3.627,0.729-4.95,2.051l-1.414,1.414L56.521,13.364z" />
                                    <path d="M4.099,46.527L0.051,58.669c-0.12,0.359-0.026,0.756,0.242,1.023c0.19,0.19,0.446,0.293,0.707,0.293
                           c0.106,0,0.212-0.017,0.316-0.052l12.141-4.047L4.099,46.527z" />
                                    <path d="M43.793,6.294l1.415-1.415l9.899,9.899l-1.415,1.415L43.793,6.294z" />
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="title">{{$item->title}}</h3>
                        </div>
                        <div class="mt-2 pr-3 content body-html-style body-html">
                            {!!$item->body_html!!}
                        </div>
                        <div class="mt-2 pr-3 content">
                            <span>Status:&nbsp;</span><span><strong class="status">{{$item->status}}</strong></span>
                        </div>
                        <div class="mt-2 pr-3 content">
                            <span>published:&nbsp;</span><span><strong>{{$item->published_at}}</strong></span>
                        </div>
                    </div>
                    @endforeach
                    <div class="p-3 right-side col-10 d-flex justify-content-start">
                        <span class="p-2 w-70">
                            <select id="select-variant" class="form-select">
                                @foreach (json_decode($productvariants) as $key => $item)
                                <option value="{{$key}}">{{$item->options}}</option>
                                @endforeach
                            </select>
                        </span>
                    </div>
                    @foreach (json_decode($productvariants) as $key => $item)
                    @if ($key == 0)
                    <div class="p-3 right-side variants-main">
                        <h3 class="variants-price">{{$item->price}}</h3>
                        <input class="variants-image" type="hidden" value="{{$item->image_id}}">
                        <div class="mt-5">
                            <ul class="variants-ul-main">
                                <li>
                                    <div class="text-end">
                                        <span title="Edit Variants">
                                            <svg class="variants-edit-btn" width="17.5" height="17.5" version="1.1"
                                                id="{{serialize(array("product_id"=>$item->product_id,"id"=>$item->id))}}"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 59.985 59.985"
                                                style="enable-background:new 0 0 59.985 59.985;" xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M5.243,44.844L42.378,7.708l9.899,9.899L15.141,54.742L5.243,44.844z" />
                                                    <path d="M56.521,13.364l1.414-1.414c1.322-1.322,2.05-3.079,2.05-4.949s-0.728-3.627-2.05-4.949S54.855,0,52.985,0
                                                   s-3.627,0.729-4.95,2.051l-1.414,1.414L56.521,13.364z" />
                                                    <path d="M4.099,46.527L0.051,58.669c-0.12,0.359-0.026,0.756,0.242,1.023c0.19,0.19,0.446,0.293,0.707,0.293
                                                   c0.106,0,0.212-0.017,0.316-0.052l12.141-4.047L4.099,46.527z" />
                                                    <path
                                                        d="M43.793,6.294l1.415-1.415l9.899,9.899l-1.415,1.415L43.793,6.294z" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span title="Add Variants">
                                            <a href="{{route("variantAddShow",$item->product_id)}}">
                                                <svg class="variants-add-btn" width="17.5" height="17.5" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;"
                                                    xml:space="preserve">
                                                    <path
                                                        d="M0,0v60h60V0H0z M51,32H32v19h-4V32H9v-4h19V9h4v19h19V32z" />
                                                </svg>
                                            </a>
                                        </span>
                                        <span title="Delete Variants">
                                            <svg id="{{'['.$item->product_id.','.$item->id.']'}}"
                                                class="variants-delete-btn" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                id="mdi-close-box" width="24" height="24" viewBox="0 0 24 24">
                                                <path
                                                    d="M19,3H16.3H7.7H5A2,2 0 0,0 3,5V7.7V16.4V19A2,2 0 0,0 5,21H7.7H16.4H19A2,2 0 0,0 21,19V16.3V7.7V5A2,2 0 0,0 19,3M15.6,17L12,13.4L8.4,17L7,15.6L10.6,12L7,8.4L8.4,7L12,10.6L15.6,7L17,8.4L13.4,12L17,15.6L15.6,17Z" />
                                            </svg>
                                        </span>
                                    </div>
                                </li>
                                <li><span>Options:&nbsp;</span><span><strong
                                            class="li-options">{{$item->options}}</strong></span>

                                </li>
                                <li><span>Sku:&nbsp;</span><span><strong class="li-sku">{{$item->sku}}</strong></span>
                                </li>
                                <li><span>Inventory
                                        Quantity:&nbsp;</span><span><strong
                                            class="li-inventory__quantity">{{$item->inventory_quantity}}</strong></span>
                                </li>
                                <li><span>Inventory
                                        Policy:&nbsp;</span><span><strong
                                            class="li-inventory__policy">{{$item->inventory_policy}}</strong></span>
                                </li>
                                <li><span>Taxable:&nbsp;</span><span><strong
                                            class="li-taxable">{{$item->taxable}}</strong></span></li>
                                <li><span>Weight:&nbsp;</span><span><strong
                                            class="li-weight">{{$item->weight}}</strong></span></li>
                                <li><span>Weight Unit:&nbsp;</span><span><strong
                                            class="li-weight__unit">{{$item->weight_unit}}</strong></span>
                                </li>
                                <li><span>Created Time&nbsp;</span><span><strong
                                            class="li-created__at">{{$item->created_at}}</strong></span>
                                </li>
                                <li><span>Updated Time&nbsp;</span><span><strong
                                            class="li-updated__at">{{$item->updated_at}}</strong></span>
                                </li>
                            </ul>
                        </div>
                        {{-- <div class="buttons d-flex flex-row mt-5 gap-3"> <button class="btn btn-outline-dark">Buy
                                Now</button> <button class="btn btn-dark">Add to Basket</button> </div>
                        <div class="search-option"> <i class='bx bx-search-alt-2 first-search'></i>
                            <div class="inputs"> <input type="text" name=""> </div> <i
                                class='bx bx-share-alt share'></i>
                        </div> --}}
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.inc.modal.shopify.shopifyImageDestroy')
@include('admin.inc.modal.shopify.shopifyVariantsDestroy')
@endsection
@push('js')
<script src="{{asset("/assets/js/shopifyTable/productsMore.js")}}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        slideshow();
        imagedelete();
        variants(
            jQuery.parseJSON('<?= "$productvariants" ?>')
        );
        $(".variants-edit-btn").on("click", function() {
            var id = $(this).attr("id");
            var price = $(this).parents().eq(5).find(".variants-price").text();
            var image = $(this).parents().eq(5).find(".variants-image").val();
            var parenElm = $(this).parents().eq(3);
            token_();
            $.ajax({
                type: "post",
                url: "/private/admin/variant/edit/req",
                data: {
                    "id": id,
                    "option1": parenElm.find(".li-options").text(),
                    "price": price,
                    "sku": parenElm.find(".li-sku").text(),
                    "weight": parenElm.find(".li-weight").text(),
                    "image_id": image
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert("error" + " " + thrownError);
                    $("#loader").hide();
                },
                success: function() {
                    location.href = "/private/admin/variant/edit";
                },
            });
        });
        $(".header-edit-btn").on("click", function() {
            var id = $(this).attr("id");
            var parent = $(this).parents().eq(2);
            var title = parent.find(".title").text();
            var bodyHtml = parent.find(".body-html>*").text();
            var status = parent.find(".status").text();
            token_();
            $.ajax({
                type: "post",
                url: "/private/admin/header/edit/req",
                data: {
                    "id": id,
                    "title": title,
                    "bodyHtml": bodyHtml,
                    "status": status
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert("error" + " " + thrownError);
                    $("#loader").hide();
                },
                success: function() {
                    location.href = "/private/admin/header/edit";
                },
            });
        });
        $(".product-iamge-add").on("click", function() {
            window.location.href = "/private/admin/image/add/" + $(".thumbnail_images>ul>li").attr("id")
        });
    });
</script>
<script src="{{asset("assets/js/zoom.js")}}"></script>
@endpush
