<div class="row mt-4 p-1 mb-4">
    <div class="col-md col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users Visits</h4>
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
                    <div class="height-500">
                        <canvas id="usersVisits"></canvas>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-4 date-filter ">
                            <label for="start-date-5">start date</label>
                            <input type="date" class="form-control" id="start-date-5" value="">
                            <label for="end-date-5">end date</label>
                            <input type="date" class="form-control" id="end-date-5" value="">
                            <button class="btn btn-primery find-date mt-2">Find</button>
                        </div>
                        <div class="col-md-4 mt-8 p-1">
                            <button type="button" class="btn btn-primery  show-usersvisits-table"
                                data-toggle="modal">View
                                Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users Channel Groupings</h4>
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
                        <canvas id="channel-chart"></canvas>
                    </div>
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-4">
                            <label for="select-chart-channelshow">choose days</label>
                            <select id="select-chart-channelshow" class="form-control">
                                <option value="7" selected>7 days</option>
                                <option value="14">14 days</option>
                                <option value="30">30 days</option>
                                <option value="60">60 days</option>
                                <option value="90">90 days</option>
                            </select>
                            <div class="col-md m-2">
                                 <strong class="p-1 ">start:</strong>
                                    <span class="start-date"></span>
                                    <strong class="p-1">end:</strong>
                                    <span class="end-date"></span>
                           </div>
                            <button class="btn btn-primery mb-4 mt-2 select-channel-btn">Find</button>
                        </div>
                        <div class="col-md-6 mt-4">
                            <ul>
                                <li><strong>Direct</strong> - when users navigate directly to your URL. This may happen
                                    by
                                    typing it directly into their browsers or bookmarketing it. There is also
                                    speculation that
                                    a good portion of this traffic comes from “dark” sources (i.e., those that are
                                    untrackable),
                                    such as text messages, instant messengers, and secure searches.
                                </li>
                                <li>
                                    <strong>Paid Search</strong> - traffic from pay per click campaigns run in search
                                    results
                                </li>
                                <li>
                                    <strong>Organic Search</strong> - unpaid search sources such as Google, Bing, Yahoo,
                                    etc
                                </li>
                                <li>
                                    <strong>Referrals</strong> - traffic from links clicked on other websites, not
                                    including major search engines
                                </li>
                                <li>
                                    <strong>Email</strong> - traffic from links clicked in email messages, whether those
                                    are campaigns through a
                                    platform like MailChimp or Klaviyo, or an individual email
                                </li>
                                <li>
                                    <strong>Display</strong> - traffic from display advertising, such as Google Display
                                    Network campaigns
                                </li>
                                <li>
                                    <strong>Social</strong> - traffic from social sources, such as Facebook, Twitter,
                                    Instagram, Yelp, etc.
                                </li>
                                <li>
                                    <strong>Affiliates</strong> - traffic from affiliate marketing efforts
                                </li>
                                <li>
                                    <strong>Other Advertising</strong> - traffic from other online advertising outside
                                    of search and display, such as cost-per-view video advertising
                                </li>
                                <li>
                                    <strong>Other</strong> - traffic sources that don’t match any of the above
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('admin.table.usersVisitsTab') --}}
