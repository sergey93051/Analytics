<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Page video views</h4>
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
                                <canvas id="pvv-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-start mt-6">
                        <div class="col-md-4">
                            <label for="select-chart-pvv">choose days</label>
                            <select id="select-chart-pvv" class="form-control">
                                <option value="day">day</option>
                                <option value="week">week</option>
                                <option value="days_28" selected>28 days</option>
                            </select>
                            <div class="col-md m-2">
                                <strong class="p-1">end time:</strong>
                                <span class="end-date"></span>
                            </div>
                            <button class="btn btn-primery mb-4 mt-2 select-pvv-btn">Find</button>
                        </div>
                        <div class="col-md-6 mt-4">
                            <ul>
                                <li><span class="pvvboxs-style0"></span>
                                    <span class="p-2">
                                        - The number of times your Page's videos have been viewed for at least 3
                                        seconds, or almost completely if they're shorter than 3 seconds. During a single
                                        playback event, video views are counted separately, replay time is excluded.
                                    </span>
                                </li>
                                <li>
                                    <span class="pvvboxs-style1"></span>
                                    <span class="p-2">
                                        - The number of times your Page's promoted videos have been viewed for at least
                                        3 seconds, or nearly all if they're shorter than 3 seconds. For each video
                                        impression, views are counted separately, the time spent on replays is not taken
                                        into account.
                                    </span>
                                </li>
                                <li>
                                    <span class="pvvboxs-style2"></span>
                                    <span class="p-2">
                                        - The number of times your Page's videos have been viewed for at least 3
                                        seconds, or almost completely if they're shorter than 3 seconds, within organic
                                        reach. When analyzing a single case of video playback, the time spent on
                                        repetitions is not taken into account. </span>
                                </li>
                                <li>
                                    <span class="pvvboxs-style3"></span>
                                    <span class="p-2">
                                        - The number of times your autoplay videos have been viewed for at least 3
                                        seconds, or almost completely if they're shorter than 3 seconds. When analyzing
                                        a single case of video playback, the time spent on repetitions is not taken into
                                        account.
                                    </span>
                                </li>
                                <li>
                                    <span class="pvvboxs-style4"></span>
                                    <span class="p-2">
                                        - The number of times your Page's video was viewed by clicking the Play button
                                        for at least 3 seconds, or nearly all if shorter than 3 seconds. When analyzing
                                        a single case of video playback, the time spent on repetitions is not taken into
                                        account.
                                    </span>
                                </li>
                                <li>
                                    <span class="pvvboxs-style5"></span>
                                    <span class="p-2">
                                        - The number of people who watched your Page's videos for at least 3 seconds, or
                                        nearly all of them if they were shorter than 3 seconds. When analyzing a single
                                        case of video playback, the time spent on repetitions is not taken into account.
                                    </span>
                                </li>
                                <li>
                                    <span class="pvvboxs-style6"></span>
                                    <span class="p-2">
                                        - The number of times your Page's videos were revisited for at least 3 seconds,
                                        or almost completely if they were shorter than 3 seconds.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{----}}
    <div class="col-12">
        <div class="row mt-4 p-1 mb-4">
            <div class="col-md col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">30s video views</h4>
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
                            <div class="row">
                                <canvas id="chart-video-30s"></canvas>
                            </div>
                            <div class="row d-flex justify-content-start mt-6">
                                <div class="col-md-4">
                                    <label for="select-chart-pv30s">choose days</label>
                                    <select id="select-chart-pv30s" class="form-control">
                                        <option value="day">day</option>
                                        <option value="week">week</option>
                                        <option value="days_28" selected>28 days</option>
                                    </select>
                                    <div class="col-md m-2">
                                        <strong class="p-1">end time:</strong>
                                        <span class="end-date-pv30s"></span>
                                    </div>
                                    <button class="btn btn-primery mb-4 mt-2 select-pv30s-btn">Find</button>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <ul>
                                        <li><span class="pv3cboxs-style0"></span>
                                            <span class="p-2">
                                                - The number of times your Page's videos have been viewed for at least
                                                30 seconds, or almost completely if they're shorter than 30 seconds.
                                                When analyzing a single case of video playback, the time spent on
                                                repetitions is not taken into account.
                                            </span>
                                        </li>
                                        <li>
                                            <span class="pv3cboxs-style1"></span>
                                            <span class="p-2">
                                                - The number of times your Page's promoted videos have been viewed for
                                                at least 30 seconds, or almost completely if they're shorter than 30
                                                seconds. For each video showing, views are counted separately, replay
                                                time is excluded.
                                            </span>
                                        </li>
                                        <li>
                                            <span class="pv3cboxs-style2"></span>
                                            <span class="p-2">
                                                - The number of times your Page's videos have been viewed for at least
                                                30 seconds, or almost completely if they're shorter than 30 seconds,
                                                within organic reach. During a single playback event, video views are
                                                counted separately, replay time is excluded.
                                            </span>
                                        </li>
                                        <li>
                                            <span class="pv3cboxs-style3"></span>
                                            <span class="p-2"> - The number of times your autoplay videos have been
                                                viewed for at least 30 seconds, or almost completely if they're shorter
                                                than 30 seconds. When analyzing a single case of video playback, the
                                                time spent on repetitions is not taken into account.
                                            </span>
                                        </li>
                                        <li>
                                            <span class="pv3cboxs-style4"></span>
                                            <span class="p-2"> - The number of times your Page's video was viewed by
                                                clicking the Play button for at least 30 seconds, or nearly all if
                                                shorter than 30 seconds. During a single playback event, video views are
                                                counted separately, replay time is excluded.
                                            </span>
                                        </li>
                                        <li>
                                            <span class="pv3cboxs-style5"></span>
                                            <span class="p-2"> - The number of people who watched your Page's videos for
                                                at least 30 seconds, or nearly all of them if they were shorter than 30
                                                seconds. When analyzing a single case of video playback, the time spent
                                                on repetitions is not taken into account.
                                            </span>
                                        </li>
                                        <li>
                                            <span class="pv3cboxs-style6"></span>
                                            <span class="p-2"> - The number of times your Page's videos were revisited
                                                for at least 30 seconds, or almost completely if they're shorter than 30
                                                seconds.
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
    </div>
</div>
