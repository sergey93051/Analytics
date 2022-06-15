@extends('admin.layouts.app')
@section("title","choose Products");
@push('header')

@endpush
@section('content')
@include('admin.inc.navbar')
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    @include('admin.inc.headerBar')
    <!-- End Navbar -->
    <div class="container-fluid">
        <form role="form" id="contact_form" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="row mt-6 p-1">
            <div class="col-12">
                <table id="productaddCollectionTable" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>choose</th>
                            <th scope="col">Title</th>
                            <th scope="col">Template Suffix</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (json_decode($productsData) as $item)
                        <tr>
                            <td>
                            @csrf
                            <input type="hidden" name="collect_id" value="{{$collect_id}}">
                            <input type="checkbox" name="chooseproducts[]" id="chooseproducts" value="{{$item->id}}">
                            </td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->template_suffix}}</td>
                            <td>{{$item->status}}</td>
                            <td><img width='150' src="{{$item->src}}" alt=""></td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6 col-sm-offset-3 d-flex mb-4">
                <button type="submit" class="m-1 btn bg-gradient-info w-100 my-4 mb-2 productsAdd-submit-form"></button>
                <a class="m-1 btn bg-gradient-danger w-100 my-4 mb-2"
                    href="{{route('shopifyCollectionShow')}}">back</a>
            </div>
        </div>
        </form>
    </div>
</div>
@include('admin.inc.modal.destroy')
@endsection
@push('js')
{{-- <script src="{{asset("/assets/js/shopifyTable/collectionAddProduct.js")}}" type="text/javascript"></script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#productaddCollectionTable').DataTable({
            "scrollX": true,
            'columnDefs': [{
                'targets': [0,2,3, 4, 5],
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
