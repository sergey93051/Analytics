<div class="row mt-4 p-1 mb-4">
    <div class="col-md-12 col-sm-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Browser Statistics</h4>
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
                    <div class="height-400 d-flex justify-content-center">
                        <canvas id="browser-chart"></canvas>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-4">
                            <label for="select-chart-browsershow">choose days</label>
                            <select id="select-chart-browsershow" class="form-control">
                                <option value="7" selected>7 days</option>
                                <option value="14">14 days</option>
                                <option value="30">30 days</option>
                                <option value="60">60 days</option>
                                <option value="90">90 days</option>
                            </select>
                            <div class="col-md m-2">
                                <strong class="p-1 ">start:</strong>
                                <span class="start-date-browser"></span>
                                <strong class="p-1">end:</strong>
                                <span class="end-date-browser"></span>
                            </div>
                            <button class="btn btn-primery mb-4 mt-2 select-browser-btn">Find</button>
                        </div>
                        <div class="col-md-2 mt-8">
                            <button type="button" class="btn btn-primery  show-browser-table" data-toggle="modal">View
                                details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.table.browserTab')
