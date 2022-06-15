<div class="row mt-4">
    <div class="col-md col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Analytics of New Customers and their  Total Spendings</h4>
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
                        <canvas id="custSpent-chart"></canvas>
                    </div>
                    <div class="row">
                        <div class="col-md-4 date-filter ">
                            <label for="start-date-customersDetails">start date</label>
                            <input type="date" class="form-control" id="start-date-customersDetails" value="">
                            <label for="end-date-customersDetails">end date</label>
                            <input type="date" class="form-control" id="end-date-customersDetails" value="">
                            <button class="btn btn-primery btn-chart-customersDetails mt-2">Find</button>
                        </div>
                        <div class="col-md-4">
                            <label for="select-chart-customersDetails">choose charts</label>
                            <select id="select-chart-customersDetails" class="form-control">
                                <option value="all" selected>All</option>
                                <option value="New Customers">New Customers</option>
                                <option value="Total Spent">Total Spent</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-8 p-1">
                            <a href="{{route('shopifyCustomerShow')}}" type="button" class="btn btn-primery  show-overallTab-table"
                                data-toggle="modal">View  details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

