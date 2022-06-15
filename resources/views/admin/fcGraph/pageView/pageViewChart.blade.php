<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Page View</h4>
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
                    <div class="row">
                        <div class="col-md">
                            <div>
                                <canvas id="pageView-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-4">
                            <label for="select-chart-view">choose days</label>
                            <select id="select-chart-view" class="form-control">
                                <option value="day">day</option>
                                <option value="week">week</option>
                                <option value="days_28" selected>28 days</option>
                            </select>
                            <div class="col-md m-2">
                                <strong class="p-1">end time:</strong>
                                <span class="end-date"></span>
                            </div>
                            <button class="btn btn-primery mb-4 mt-2 select-view-btn">Find</button>
                        </div>
                        <div class="col-md-6 mt-4">
                            <ul>
                                <li><span class="pvboxs-style0"></span>
                                    <span class="p-2">
                                        - The number of page views by both signed-in and non-signed-in users.
                                    </span>
                                </li>
                                <li>
                                    <span class="pvboxs-style1"></span>
                                    <span class="p-2">
                                        - The number of page views by users who are signed in to Facebook.
                                    </span>
                                </li>
                                <li>
                                    <span class="pvboxs-style2"></span>
                                    <span class="p-2"> - The number of people who are logged into Facebook and have
                                        viewed the Page. </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">The number of people who viewed each tab on profile page.</h4>
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
                    <div class="row">
                        <div class="col-md">
                            <div>
                                <canvas id="profileTabView-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-4">
                            <label for="select-chart-profTab">choose days</label>
                            <select id="select-chart-profTab" class="form-control">
                                <option value="day">day</option>
                                <option value="week">week</option>
                                <option value="days_28" selected>28 days</option>
                            </select>
                            <div class="col-md m-2">
                                <strong class="p-1">end time:</strong>
                                <span class="end-date-profTab"></span>
                            </div>
                            <button class="btn btn-primery mb-4 mt-2 select-profTab-btn">Find</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
