<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Page Engagement</h4>
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
                                <canvas id="pE-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-4">
                            <label for="select-chart-pE">choose days</label>
                            <select id="select-chart-pE" class="form-control">
                                <option value="day">day</option>
                                <option value="week">week</option>
                                <option value="days_28" selected>28 days</option>
                            </select>
                            <div class="col-md m-2">
                                <strong class="p-1">end time:</strong>
                                <span class="end-date"></span>
                            </div>
                            <button class="btn btn-primery mb-4 mt-2 select-pE-btn">Find</button>
                        </div>
                        <div class="col-md-6 mt-4">
                            <ul>
                                <li><span class="pEboxs-style0"></span>
                                    <span class="p-2">
                                        - The number of people who have interacted with your Page. Such actions include
                                        all clicks.
                                    </span>
                                </li>
                                <li>
                                    <span class="pEboxs-style1"></span>
                                    <span class="p-2">
                                        - The number of interactions with your posts (likes, comments, reposts, etc.).
                                    </span>
                                </li>
                                <li>
                                    <span class="pEboxs-style2"></span>
                                    <span class="p-2">- The number of clicks on any of your content.</span>
                                </li>
                                <li>
                                    <span class="pEboxs-style3"></span>
                                    <span class="p-2"> - The number of people who clicked on any of your content.
                                    </span>
                                </li>
                                <li>
                                    <span class="pEboxs-style4"></span>
                                    <span class="p-2"> - The number of negative actions (such as "Dislikes" or hiding
                                        the post).
                                    </span>
                                </li>
                                <li>
                                    <span class="pEboxs-style5"></span>
                                    <span class="p-2"> - The number of people who performed a negative action (for
                                        example, disliked or hid the post).
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- --}}
    <div class="col-12">
        <div class="row mt-4 p-1 mb-4">
            <div class="col-md col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">The number of new people who liked your Page,with paid and
                            unpaid.</h4>
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
                            <div>
                                <canvas id="chart-paid-unpiad"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
