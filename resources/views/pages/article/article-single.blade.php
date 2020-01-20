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
							<li><a href="datatable_basic.html">Article</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

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
