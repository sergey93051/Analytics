<div class="row mt-4">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Checkout pages</h4>
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
						<canvas id="column-chart"></canvas>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label for="select-chart-checkoutView">choose days</label>
							<select id="select-chart-checkoutView" class="form-control">
								<option value="7" selected>7 days</option>
								<option value="14">14 days</option>
								<option value="30">30 days</option>
								<option value="60">60 days</option>
								<option value="90">90 days</option>
							</select>
                            <div class="col-md m-2">
                                <strong class="p-1 ">start:</strong>
                                <span class="start-date-checkout"></span>
                                <strong class="p-1">end:</strong>
                                <span class="end-date-checkout"></span>
                            </div>
							<button class="btn btn-primery mb-4 mt-2 select-chart-btn">Find</button>
						</div>
						<div class="col-md mt-8 p-1 d-flex justify-content-end">
							<button type="button" class="btn btn-primery  show-checkout-table" data-toggle="modal">View
								Data</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- cart --}}
	<div class="col-12">
		<div class="row mt-4 p-1 mb-4">
			<div class="col-md col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Cart page</h4>
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
								<div class="col-md-4 date-filter-cart">
									<label for="start-date-cart">start date</label>
									<input type="date" class="form-control" id="start-date-cart" value="">
									<label for="end-date-cart">end date</label>
									<input type="date" class="form-control" id="end-date-cart" value="">
									<button class="btn btn-primery mt-2 btn-filter-cart">Find</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('admin.table.checkoutTab')
