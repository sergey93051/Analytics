@extends('admin.layouts.app')
@section('title',"customerLead")
@section('content')
@include('admin.inc.navbar')
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    @include('admin.inc.headerBar')
    <div class="container-fluid py-4">
        <div class="row mt-2 p-1">
            <h4 class="p-1">Customer/Lead</h4>
            <table border="0" cellspacing="5" cellpadding="5" class="col-md-5 col-12 p-2 mb-3">
                <tbody>
                    <tr>
                        <td>Minimum date:</td>
                        <td><input type="date" id="min" name="min" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Maximum date:</td>
                        <td><input type="date" id="max" name="max" class="form-control"></td>
                    </tr>
                </tbody>
            </table>
            <table id="customerTable" class="display" style="width:100%;">
            </table>
        </div>
    </div>
    @include("admin.inc.modal.destroy")
</div>
@endsection
@push('js')
  <script>
    $(document).ready(function() {
        var db = dbtable();
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = parseInt($('#min').val(), 10);
                var max = parseInt($('#max').val(), 10);
                var date = parseFloat(data[3]) || 0; // use data for the age column
                if ((isNaN(min) && isNaN(max)) ||
                    (isNaN(min) && date <= max) ||
                    (min <= date && isNaN(max)) ||
                    (min <= date && date <= max)) {
                    return true;
                }
                return false;
            }
        );
        var table = $('#customerTable').DataTable({
            data: db,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 80]
            ],
            columns: [
                {
                    title: "Name Surname"
                },
                {
                    title: "Email"
                },
                {
                    title: "Customer/Lead"
                },
                {
                    title: "date"
                },
                {
                    title: "delete"
                }
            ]
        });
        $('#min, #max').change(function(e) {
            table.draw();
        });
        deleteItem($(".delete-customer"), "/private/admin/orders/");
    });
  </script>
@endpush
