@extends('admin.layouts.app')
@section("title","Orders")
@push('header')
<!-- Style -->
<link rel="stylesheet" href="{{asset("orders/css/style.css")}}">
@endpush
@section('content')
@include('admin.inc.navbar')
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    @include('admin.inc.headerBar')
    <!-- End Navbar -->
    <div class="container-fluid">
        <div class="row mt-6 p-1">
            <table id="orderTable" class="display" style="width:100%;">
            </table>
            @include('admin.inc.modal.destroy')
        </div>
        <div class="row mt-4 p-1 mb-3">
            <h2 class="mb-5">Table #2</h2>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <label class="control control--checkbox">
                                    <input type="checkbox" class="js-check-all" />
                                    <div class="control__indicator"></div>
                                </label>
                            </th>
                            <th scope="col">Order</th>
                            <th scope="col">Name</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Education</th>
                            <th scope="col">
                                <label class="custom-control ios-switch" style="position: relative; top: 10px;">
                                    <input type="checkbox" class="ios-switch-control-input js-ios-switch-all">
                                    <span class="ios-switch-control-indicator"></span>
                                </label>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row" class="active">
                            <td>
                                <label class="control control--checkbox">
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                            </td>
                            <td>
                                1392
                            </td>
                            <td class="pl-0">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="name">James Yates</a>
                                </div>
                            </td>
                            <td>
                                Web Designer
                                <small class="d-block">Far far away, behind the word mountains</small>
                            </td>
                            <td>+63 983 0962 971</td>
                            <td>NY University</td>
                            <td>
                                <label class="custom-control ios-switch">
                                    <input type="checkbox" class="ios-switch-control-input" checked="">
                                    <span class="ios-switch-control-indicator"></span>
                                </label>
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                <label class="control control--checkbox">
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                            </td>
                            <td>4616</td>
                            <td class="pl-0">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="name">Matthew Wasil</a>
                                </div>
                            </td>
                            <td>
                                Graphic Designer
                                <small class="d-block">Far far away, behind the word mountains</small>
                            </td>
                            <td>+02 020 3994 929</td>
                            <td>London College</td>
                            <td>
                                <label class="custom-control ios-switch">
                                    <input type="checkbox" class="ios-switch-control-input" checked="">
                                    <span class="ios-switch-control-indicator"></span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control control--checkbox">
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                            </td>
                            <td>9841</td>
                            <td class="pl-0">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="name">Sampson Murphy</a>
                                </div>
                            </td>
                            <td>
                                Mobile Dev
                                <small class="d-block">Far far away, behind the word mountains</small>
                            </td>
                            <td>+01 352 1125 0192</td>
                            <td>Senior High</td>
                            <td>
                                <label class="custom-control ios-switch">
                                    <input type="checkbox" class="ios-switch-control-input">
                                    <span class="ios-switch-control-indicator"></span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control control--checkbox">
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                            </td>
                            <td>9548</td>
                            <td class="pl-0">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="name">Gaspar Semenov</a>
                                </div>
                            </td>
                            <td>
                                Illustrator
                                <small class="d-block">Far far away, behind the word mountains</small>
                            </td>
                            <td>+92 020 3994 929</td>
                            <td>College</td>
                            <td>
                                <label class="custom-control ios-switch">
                                    <input type="checkbox" class="ios-switch-control-input">
                                    <span class="ios-switch-control-indicator"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        var db = dbordertable();
        var table = $('#orderTable').DataTable({
            data: db,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 80]
            ],
            columns: [{
                    title: "order"
                },
                {
                    title: "date"
                },
                {
                    title: "email"
                },
                {
                    title: "Payment status"
                },
                {
                    title: "Fulfillment status"
                },
                {
                    title: "Total"
                },
                {
                    title: "selecte"
                },
                {
                    title: "delete"
                },
            ]
        });

        $('#min, #max').change(function(e) {
            table.draw();
        });

        $(".accept").on("click", function() {
            $(this).parent().parent().find("p").html("fulfilled").css("color", "green");
        });

        deleteItem($(".delete-order"), "/private/admin/orders/");
    });
</script>
<script src="{{asset("orders/js/main.js")}}"></script>
@endpush
