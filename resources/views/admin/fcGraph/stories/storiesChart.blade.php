<div class="row mt-4">
    <div class="col-12">
        <div class="row mt-4 p-1 mb-4">
            <div class="col-md col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Stories</h4>
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
                        <div class="card-body chartjs">
                            <div class="col">
                                <canvas id="chart-stories"></canvas>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-4">
                                <label for="select-chart-stories">choose days</label>
                                <select id="select-chart-stories" class="form-control">
                                    <option value="day">day</option>
                                    <option value="week">week</option>
                                    <option value="days_28" selected>28 days</option>
                                </select>
                                <div class="col-md m-2">
                                    <strong class="p-1">end time:</strong>
                                    <span class="end-date"></span>
                                </div>
                                <button class="btn btn-primery mb-4 mt-2 select-stories-btn">Find</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
