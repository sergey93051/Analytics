<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Page CTA Clicks</h4>
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
                        <canvas id="cta-chart"></canvas>
                    </div>
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-4">
                            <label for="select-chart-cta">choose days</label>
                            <select id="select-chart-cta" class="form-control">
                                <option value="day" >day</option>
                                <option value="week">week</option>
                                <option value="days_28" selected>28 days</option>
                            </select>
                            <div class="col-md m-2">
                                <strong class="p-1">end time:</strong>
                                <span class="end-date"></span>
                            </div>
                            <button class="btn btn-primery mb-4 mt-2 select-cta-btn">Find</button>
                        </div>
                        <div class="col-md-6 mt-4">
                            <ul>
                                <li>
                                    <span class="boxs-style0"></span>
                                    <span class="p-2">
                                        - The number of clicks on your Page's contact information and call-to-action
                                        button.
                                    </span>
                                </li>
                                <li>
                                    <span class="boxs-style1"></span>
                                    <span class="p-2">
                                        - The number of people who signed in to Facebook and clicked the Get Directions
                                        button.
                                    </span>
                                </li>
                                <li>
                                    <span class="boxs-style2"></span>
                                    <span class="p-2">- The number of people who logged into Facebook and clicked the
                                        "Visit Site" call-to-action button.</span>
                                </li>
                                <li>
                                    <span class="boxs-style3"></span>
                                    <span class="p-2"> - The number of people who logged into Facebook and clicked the
                                        Call button.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
