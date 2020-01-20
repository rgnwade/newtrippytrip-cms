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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">All Media</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
                	<button type="button" class="btn bg-blue" data-toggle="modal" data-target="#modal-registration"><i class="icon-user position-left"></i>Add Media</button>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="datatable_basic.html">All Media</a></li>
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
									<th>Link</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                @foreach($media as $index=>$key)
								<tr>
									<td>{{ $key->id }}</td>
									<td><a href="#">{{ $key->name }}</a></td>
									<td>{{ $key->link }}</td>
									<td><a href="#" class="icon-eye"></td>
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


           <form class="modal-body" method="POST" action="{{ route('post-media') }}" enctype="multipart/form-data">
                 {{csrf_field()}}
                 <div class="text-center">
                   <div class="icon-object border-success text-success"><i class="icon-stack4"></i></div>
                   <h5 class="content-group">Add Media<small class="display-block">All fields are required</small></h5>
                 </div>

                 <div class="content-divider text-muted form-group"><span>Add Images</span></div>

                 <div class="form-group has-feedback has-feedback-left">
                   <input type="text" id="name" name="name" class="form-control" placeholder="File Name">
                   <div class="form-control-feedback">
                     <i class="icon-stack text-muted"></i>
                   </div>
                 </div>

                 <div class="form-group has-feedback has-feedback-left">
                   <input type="file" name="link" id="link" onchange="readURL(this);"  accept="image/*" class="form-control">
                   <img id="blah" name="link" src="#" alt="add your image" />
                   <div class="form-control-feedback">
                     <i class="icon-stack text-muted"></i>
                   </div>

        \
                 </div>


                 <div class="form-group">
                   <button type="submit" class="btn bg-blue btn-block">Submit<i class="icon-circle-right2 position-right"></i></button>
                   <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
                 </div>

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

<script>
function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#blah')
                   .attr('src', e.target.result)
                   .width(250)
                   .height(200);
           };

           reader.readAsDataURL(input.files[0]);
       }
   }
</script>
</html>
