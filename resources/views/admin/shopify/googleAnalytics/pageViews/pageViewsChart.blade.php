<div class="col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Page View (Products,Search,Contact)</h4>
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
                    <canvas id="psc-chart"></canvas>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-md-4">
                        <label for="select-chart-pscView">choose charts</label>
                        <select id="select-chart-pscView" class="form-control">
                            <option value="7" selected>7 days</option>
                            <option value="14">14 days</option>
                            <option value="30">30 days</option>
                            <option value="60">60 days</option>
                            <option value="90">90 days</option>
                        </select>
                        <div class="col-md m-2">
                            <strong class="p-1 ">start:</strong>
                            <span class="start-date-psc"></span>
                            <strong class="p-1">end:</strong>
                            <span class="end-date-psc"></span>
                        </div>
                        <button class="btn btn-primery mb-4 mt-2 select-psc-btn">Find</button>
                    </div>
                    <div class="col-md-4 mt-8 p-1">
                        <button type="button" class="btn btn-primery  show-psc-table" data-toggle="modal">View
                            Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Any page</h4>
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
                    <canvas id="any-chart"></canvas>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-md-4">
                        <label for="select-anychart-pageView">choose charts</label>
                        <select id="select-anychart-pageView" class="form-control">
                            <option value="7" selected>7 days</option>
                            <option value="14">14 days</option>
                            <option value="30">30 days</option>
                            <option value="60">60 days</option>
                            <option value="90">90 days</option>
                        </select>
                        <div class="col-md m-2">
                            <strong class="p-1 ">start:</strong>
                            <span class="start-date-any"></span>
                            <strong class="p-1">end:</strong>
                            <span class="end-date-any"></span>
                        </div>
                        <button class="btn btn-primery mb-4 mt-2 select-anychart-btn">Find</button>
                    </div>

                    <div class="col-md-4 mt-7 mr-6">
                        <a href="{{route("anyPageViewsTable")}}">
                            <button type="button" class="btn btn-primery show-anypageviwes-table"
                                data-toggle="modal">View
                                Data</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.table.PSCTab')
