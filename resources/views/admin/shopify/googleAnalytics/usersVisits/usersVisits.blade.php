@extends('admin.layouts.app')
@section("title","usersVisits");
@section('content')
@include('admin.inc.navbar')
<main class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    @include('admin.inc.headerBar')
    <!-- End Navbar -->
    <div class="container-fluid">
        <div class="row mt-6 p-1">
            <div class="col-12">
                <table id="visits-Table" class="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Users</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
@push('js')
<script src="{{asset("/assets/js/modalforcharts/usersVisitsModel.js")}}" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        usersVisitsModel(
            jQuery.parseJSON('<?= "$analyticsData" ?>')
        );
    });
</script>
@endpush
