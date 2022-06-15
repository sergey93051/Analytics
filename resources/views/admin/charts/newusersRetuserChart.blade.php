<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Users and Returning Users</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="height-400">
                        <canvas id="column-chart-2"></canvas>
                    </div>
                    <div class="row">
                        <div class="col-md-4 date-filter">
                            <label for="start-date-4">start date</label>
                            <input type="date" class="form-control" id="start-date-4" value="">
                            <label for="end-date-4">end date</label>
                            <input type="date" class="form-control" id="end-date-4" value="">
                        </div>
                        <div class="col-md-4">
                            <label for="select-chart-item-4">choose charts</label>
                            <select id="select-chart-item-4" class="form-control">
                                <option value="all" selected>All</option>
                                <option value="New Users">New Users</option>
                                <option value="Retuming Users">Returning Users</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-8 p-1">
                            <button type="button" class="btn btn-primery  show-retuser-table" data-toggle="modal">View
                                Data</button>
                        </div>
                        {{-- <div class="col-md-4">
                        <label for="select-chart-count-1">date last</label>
                        <select id="select-chart-count-1" class="form-control">
                            <option value="7" selected>7</option>
                            <option value="14">14</option>
                            <option value="30">30</option>
                        </select>
                       </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.table.retuserTab')
