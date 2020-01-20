<!DOCTYPE html>
<html>
@include('layouts.app')

<body>
  @include('elements.main_navbar')


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            @include('elements.sidebar')
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">All User</span></h4>
						</div>


					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="datatable_basic.html">All user</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">

						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Gender</th>
									<th>Phone Number</th>
                  <th>Country</th>
                  <th>Last Login</th>
                  <th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                @foreach($all_user as $index=>$key)
								<tr>
                  <td>{{ $key->id }}</td>
                  <td><a href="#">{{ $key->name }}</a></td>
                  <td>{{ $key->email }}</td>
                  <td>{{ $key->gender }}</td>
                  <td>{{ $key->phone_number }}</td>
                  <td>{{ $key->location_id }}</td>
                  <td>{{ $key->last_login_at }}</td>
                  @if( $key->active == 1 )
                  <td><span class="label label-success">Active</span></td>
                  @else
                  <td><span class="label label-danger">Inactive</span></td>
                  @endif
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
													<li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
													<li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>
						         @endforeach
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->

			@include('elements.footer')

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
