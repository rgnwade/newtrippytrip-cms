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
  							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Forms</span> - Basic Inputs</h4>
  						</div>

  						<div class="heading-elements">
  							<div class="heading-btn-group">
  								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
  								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
  								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
  							</div>
  						</div>
  					</div>

  					<div class="breadcrumb-line">
  						<ul class="breadcrumb">
  							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
  							<li><a href="form_inputs_basic.html">Forms</a></li>
  							<li class="active">Add Client</li>
  						</ul>

  						<ul class="breadcrumb-elements">
  							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
  							<li class="dropdown">
  								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  									<i class="icon-gear position-left"></i>
  									Settings
  									<span class="caret"></span>
  								</a>

  								<ul class="dropdown-menu dropdown-menu-right">
  									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
  									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
  									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
  									<li class="divider"></li>
  									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
  								</ul>
  							</li>
  						</ul>
  					</div>
  				</div>
  				<!-- /page header -->


  				<!-- Content area -->
  				<div class="content">

  					<!-- Form horizontal -->
  					<div class="panel panel-flat">
  						<div class="panel-heading">
  							<h5 class="panel-title">Add Client</h5>
  							<div class="heading-elements">
  								<ul class="icons-list">
  			                		<li><a data-action="collapse"></a></li>
  			                		<li><a data-action="reload"></a></li>
  			                		<li><a data-action="close"></a></li>
  			                	</ul>
  		                	</div>
  						</div>

  						<div class="panel-body">

  							<form class="form-horizontal" method="POST" action="{{ route('register-client') }}">
                    {{csrf_field()}}
  								<fieldset class="content-group">

  									<div class="form-group">
  										<label class="control-label col-lg-2">Name</label>
  										<div class="col-lg-10">
  											<input type="text" id="name" name="name" class="form-control">
  										</div>
  									</div>

  									<div class="form-group">
  										<label class="control-label col-lg-2">Email</label>
  										<div class="col-lg-10">
  											<input type="email" id="email" name="email"class="form-control">
  										</div>
  									</div>

  									<div class="form-group">
  										<label class="control-label col-lg-2">Address</label>
  										<div class="col-lg-10">
  											<input type="text" id="address" name="address" class="form-control">
  										</div>
  									</div>

  									<div class="form-group">
  										<label class="control-label col-lg-2">Phone Number</label>
  										<div class="col-lg-10">
  											<input type="text" id="phone_number" name="phone_number" class="form-control">
  										</div>
  									</div>

                                <div class="form-group">
                                  <label class="control-label col-lg-2">Location</label>
                                  <div class="col-lg-10">
                                      <select id="location_id" name="location_id" class="form-control">
                                        @foreach($location as $index=>$key)
                                          <option value="{{ $key->id }}">{{ $key->name }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                </div>


  								<div class="text-right">
  									<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
  								</div>
  							</form>
  						</div>
  					</div>
  					<!-- /form horizontal -->

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
