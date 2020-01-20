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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">All Client</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
                	<button type="submit" class="btn bg-blue" onclick="window.location.href='{{route('add-client')}}'"><i class="icon-user position-left"></i>Add Client</button>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="datatable_basic.html">All client</a></li>
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
                  <th>Countries</th>
                  <th>Location</th>
                  <th>Region</th>
                  <th>Contract Number</th>
                  <th>Created at</th>
                  <th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                @foreach($all_client as $index=>$key)
								<tr>
									<td>{{ $key->id }}</td>
									<td><a href="#">{{ $key->name }}</a></td>
                  <td>{{ $key->country[0]->name }}</td>
                  <td>{{ $key->location[0]->name }}</td>
                  <td>{{ $key->region[0]->name }}</td>
                  @if( $key->contract != null)
                  <td>{{ $key->contract[0]->contract_number }}</td>
                  @else
                  <td>No Contract</td>
                  @endif
                  <td>{{ $key->created_at }}</td>
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
													<li><a href="#"><i class="icon-file-pdf"></i> View</a></li>
													<li><a href="#"><i class="icon-file-excel"></i> Edit</a></li>
													<li><a href="#"><i class="icon-file-word"></i> Delete</a></li>
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

          <!-- Registration form -->
         <div id="modal-registration" class="modal fade">
           <div class="modal-dialog">
             <div class="modal-content login-form">

               <!-- Form -->
               <form class="modal-body" action="index.html">
                 <div class="text-center">
                   <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                   <h5 class="content-group">Add Client <small class="display-block">All fields are required</small></h5>
                 </div>

                 <div class="content-divider text-muted form-group"><span>Client Profile</span></div>

                 <div class="form-group has-feedback has-feedback-left">
                   <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                   <div class="form-control-feedback">
                     <i class="icon-user-check text-muted"></i>
                   </div>
                 </div>

                 <div class="form-group has-feedback has-feedback-left">
                   <input type="password" class="form-control" placeholder="Create password">
                   <div class="form-control-feedback">
                     <i class="icon-user-lock text-muted"></i>
                   </div>
                 </div>

                 <div class="form-group has-feedback has-feedback-left">
                   <input type="text" class="form-control" placeholder="Client email">
                   <div class="form-control-feedback">
                     <i class="icon-mention text-muted"></i>
                   </div>
                 </div>

                 <div class="form-group has-feedback has-feedback-left">
                   <input type="text" class="form-control" placeholder="Address">
                   <div class="form-control-feedback">
                     <i class="icon-mention text-muted"></i>
                   </div>
                 </div>
                 <div class="form-group has-feedback has-feedback-left">
                   <input type="text" class="form-control" placeholder="Phone number">
                   <div class="form-control-feedback">
                     <i class="icon-mention text-muted"></i>
                   </div>
                 </div>

                 <div class="content-divider text-muted form-group"><span>Additions</span></div>

                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" class="styled" checked="checked">
                       Send me <a href="#">test account settings</a>
                     </label>
                   </div>

                   <div class="checkbox">
                     <label>
                       <input type="checkbox" class="styled" checked="checked">
                       Subscribe to monthly newsletter
                     </label>
                   </div>

                   <div class="checkbox">
                     <label>
                       <input type="checkbox" class="styled">
                       Accept <a href="#">terms of service</a>
                     </label>
                   </div>
                 </div>

                 <div class="form-group">
                   <button type="submit" class="btn bg-blue btn-block">Register <i class="icon-circle-right2 position-right"></i></button>
                   <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
                 </div>

                 <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
               </form>
               <!-- /form -->

             </div>
           </div>
         </div>
         <!-- /registration form -->


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
