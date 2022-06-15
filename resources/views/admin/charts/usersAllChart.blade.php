<div class="col-md col-sm-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Users</h4>
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
				<div class="d-flex justify-content-center">
					<canvas id="simple-pie-chart-3" width="600" height="450"></canvas>
				</div>
			</div>
			<div class="row justify-content-end ">
				<div class="col-md-4 mt-4 p-1" style="margin-right: 80px;">
					<button type="button" class="btn btn-primery float-right show-users-table" data-toggle="modal">View
						Data</button>
				</div>
			</div>
		</div>
	</div>
</div>
@include('admin.table.usersTab')
