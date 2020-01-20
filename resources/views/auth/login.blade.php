<!DOCTYPE html>
<html>
@include('layouts.app')
<body class="login-container bg-slate-800">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<form method="POST" action="{{ route('login-admin') }}">
            {{csrf_field()}}
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-logo"><img class="icon-login" src="{{ url('') }}/images/logo-icon.png" alt=""></div>
								<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="email" id="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" id="password"class="form-control" placeholder="Password" name="password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										<label class="checkbox-inline">
											<input type="checkbox" class="styled" checked="checked">
											Remember
										</label>
									</div>

									<!-- <div class="col-sm-6 text-right">
										<a href="login_password_recover.html">Forgot password?</a>
									</div> -->
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn bg-blue btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
							</div>

							</div>
					</form>
					<!-- /advanced login -->

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
