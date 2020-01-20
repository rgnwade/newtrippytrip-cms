<!DOCTYPE html>
<html>
@include('layouts.app')

<body>
   @include('sweet::alert')
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">All Employee</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
                	<button type="button" class="btn bg-blue" data-toggle="modal" data-target="#modal-registration"><i class="icon-user position-left"></i>Add Employee</button>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="datatable_basic.html">All Employee</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">

						<table class="table datatable-sorting">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone Number</th>
                  <th>Roles</th>
                  <th>Last Login</th>
                  <th>Created at</th>
                  <th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                @foreach($all_admin as $index=>$key)
								<tr>
									<td>{{ $key->id }}</td>
									<td><a href="#">{{ $key->name }}</a></td>
									<td>{{ $key->email }}</td>
									<td>{{ $key->phone_num }}</td>
                  <td>{{ $key->roles[0]->name }}</td>
                  <td>{{ $key->last_login_at }}</td>
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
               <form class="modal-body" method="POST" action="{{ route('register-employee') }}">
                 {{csrf_field()}}
                 <div class="text-center">
                   <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                   <h5 class="content-group">Create Employee<small class="display-block">All fields are required</small></h5>
                 </div>

                 <div class="content-divider text-muted form-group"><span>Your credentials</span></div>

                 <div class="form-group has-feedback has-feedback-left">
                   <input type="text" id="name" name="name" class="form-control" placeholder="Full Name">
                   <div class="form-control-feedback">
                     <i class="icon-user-check text-muted"></i>
                   </div>
                 </div>

                 <div class="form-group has-feedback has-feedback-left">
                   <input type="email" id="email" name="email" class="form-control" placeholder="Your email">
                   <div class="form-control-feedback">
                     <i class="icon-mention text-muted"></i>
                   </div>
                 </div>

                 <div class="form-group has-feedback has-feedback-left">
                   <input type="password" id="password" name="password" class="form-control" placeholder="Create password">
                   <div class="form-control-feedback">
                     <i class="icon-user-lock text-muted"></i>
                   </div>
                 </div>

                 <div class="form-group has-feedback has-feedback-left">
                   <input type="text" id="phone_num" name="phone_num" class="form-control" placeholder="Phone Number">
                   <div class="form-control-feedback">
                     <i class="icon-user-check text-muted"></i>
                   </div>
                 </div>

                 <div class="form-group has-feedback has-feedback-left">
                   <label>Roles</label><br>
                   <select class="bootstrap-select" id="roles" name="roles" data-live-search="true" data-width="100%">
                      @foreach($all_roles as $index=>$key)
                       <option value="{{ $key->id }}">{{ $key->name }}</option>
                       @endforeach
                   </select>
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
