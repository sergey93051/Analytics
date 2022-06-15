<div class="row mt-4">
    <div class="col-md col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Analytics payment details (Prices,Taxes,Discounts)</h4>
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
                        <canvas id="line-chart-2"></canvas>
                    </div>
                    <div class="row">
                        <div class="col-md-4 date-filter ">
                            <label for="start-date-paymentDetails">start date</label>
                            <input type="date" class="form-control" id="start-date-paymentDetails" value="">
                            <label for="end-date-paymentDetails">end date</label>
                            <input type="date" class="form-control" id="end-date-paymentDetails" value="">
                            <button class="btn btn-primery btn-chart-paymentDetails mt-2">Find</button>
                        </div>
                        <div class="col-md-4">
                            <label for="select-chart-paymentDetails">choose charts</label>
                            <select id="select-chart-paymentDetails" class="form-control">
                                <option value="all" selected>All</option>
                                <option value="Prices">Total Price</option>
                                <option value="Taxes">Taxes</option>
                                <option value="Discounts">Total Discounts</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-8 p-1">
                            <a href="{{route('checkoutsShow')}}" type="button" class="btn btn-primery  show-overallTab-table"
                                data-toggle="modal">View  details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 2 --}}

    <div class="col-12">
        <div class="row mt-4 p-1 mb-4">
            <div class="col-md col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Count</h4>
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
                                <canvas id="line-chart"></canvas>
                            </div>
                            <div class="row">
                                <div class="col-md-4 date-filter-paymantCount">
                                    <label for="start-date-paymantCount">start date</label>
                                    <input type="date" class="form-control" id="start-date-paymantCount" value="">
                                    <label for="end-date-paymantCount">end date</label>
                                    <input type="date" class="form-control" id="end-date-paymantCount" value="">
                                    <button class="btn btn-primery find-date mt-2 btn-filter-paymantCount">Find</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

