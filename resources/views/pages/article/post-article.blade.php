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
  							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Editors</span> - CKEditor</h4>
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
  							<li><a href="editors_ckeditor.html">Editors</a></li>
  							<li class="active">CKEditor</li>
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
            <form class="modal-body" method="POST" action="{{ route('post-article') }}" enctype="multipart/form-data">
              {{csrf_field()}}
            <!-- Live search support -->
            <div class="row">

			{{--	<div class="col-md-4">
            <div class="form-group">
              <label>Client</label><br>
              <select class="bootstrap-select" id="client_id" name="client_id" data-live-search="true" data-width="100%">
                  @foreach($client as $index=>$key)
                  <option value="{{ $key->id }}">{{ $key->name }}</option>
                  @endforeach
              </select>
            </div>
          </div> --}}

        <div class="col-md-4">
            <div class="form-group">
              <label>Province</label><br>
              <select class="bootstrap-select" id="location_id" name="location_id"  data-live-search="true" data-width="100%">
                  <option value="1">Bali</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Region</label><br>
              <select class="bootstrap-select" id="region_id" name="region_id"  data-live-search="true" data-width="100%">
                <option value="1">Canggu</option>
                <option value="2">Denpasar</option>
                <option value="3">Jimbaran</option>
                <option value="4">Kintamani</option>
                <option value="5">Kuta</option>
                <option value="6">Nusa Dua</option>
                <option value="7">Tabanan</option>
                <option value="8">Ubud</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Parent Category</label><br>
              <select class="bootstrap-select" id="parent_category_id" name="parent_category_id" data-live-search="true" data-width="100%">
                <option value="0">Homepage</option>
                <option value="1">Event</option>
                <option value="2">Food and Drink</option>
                <option value="3">Nightlife</option>
                <option value="4">Lifestyle</option>
                <option value="5">Fashion</option>
                <option value="6">Culture</option>
                <option value="7">Resources</option>
                <option value="8">Tips</option>
              </select>
            </div>
          </div>

     <div class="col-md-4">
            <div class="form-group">
              <label>Child Category</label><br>
              <select class="bootstrap-select" id="category_id" name="category_id"  data-live-search="true" data-width="100%">
                  <option value="6">Culture</option>
                  <option value="4">Lifestyle</option>
                  <option value="8">Tips</option>
                  <option value="9">Cafe</option>
                  <option value="10">Chilling</option>
                  <option value="11">Resto</option>
                  <option value="12">Healthy Food</option>
                  <option value="13">Nice Bar</option>
                  <option value="14">Good DJ</option>
                  <option value="15">Nightclubs</option>
                  <option value="16">Men's Fahion</option>
                  <option value="17">Women's Fahion</option>
                  <option value="18">Ticket</option>
                  <option value="19">Travel Gear</option>
                  <option value="20">Hotel & Villa</option>
                  <option value="21">Event Party</option>
                  <option value="22">Evennt Cultural</option>
              </select>
            </div>
          </div>

      {{-- <div class="col-md-4">
            <div class="form-group">
              <label>Author</label><br>
              <select class="bootstrap-select" data-live-search="true" data-width="100%" id="author_id" name="author_id">
                @foreach($author as $index=>$key)
                <option value="{{ $key->id }}">{{ $key->name }}</option>
                @endforeach
              </select>
            </div>
          </div> --}}

        </div>

            <!-- /live search support -->
            <br>
            <br>
            <label>Title</label>
              <input type="text" name="title" id="title" class="form-control">
              <br>
              <br>

            <label>Thumbnail Picture</label>
            <input type="file" name="thumbnail_pict" id="thumbnail_pict"  onchange="readURL(this);" accept="image/*" class="form-control">
               <img id="blah" name="thumbnail_pict" src="#" alt="add your image" />
            <br>
            <br>

            <label>Link Iframe Video</label>
            <input type="text" name="video" id="video" class="form-control">
            <br>
            <br>

            <label>Description</label>

            <textarea  name="description" class="form-control" id="description"  maxlength="200" rows="4">
            </textarea>
            <span id="text_counter"></span>
            <br>
            <br>

  					<!-- CKEditor default -->
  					<div class="panel panel-flat">
  						<div class="panel-heading">Content
  						</div>
              	<div class="panel-body">
								<div class="content-group">
									<textarea  name="editor-full" class="form-control" id="editor-full"  rows="4" cols="4">
                  </textarea>
					            </div>
						</div>
					</div>
          <div class="col-md-4">
            <div class="form-group">
                <input type="checkbox" name="active" id="active" value="1">Active
                <br>
                <input type="checkbox" name="is_homepage" id="is_homepage" value="1">Is Homepage
                <br>
                <input type="checkbox" name="is_page" id="is_page" value="1">Is Page
            </div>
          </div>

  					            <div class="text-right">
  						            <button type="submit" class="btn bg-teal-400">Publish<i class="icon-arrow-right14 position-right"></i></button>
  					            </div>
  				            </form>
                      <!-- Footer -->
                      @include('elements.footer')
                      <!-- /footer -->
  						</div>
  					</div>
  					<!-- /CKEditor default -->


		</div>

  				<!-- /content area -->

  			</div>
  			<!-- /main content -->

  		</div>
  		<!-- /page content -->

  	<!-- /page container -->
    <!-- <script>

    CKEDITOR.env.isCompatible = true;
    CKEDITOR.replace( 'editor-full' );

    $(document).ready(function () {
                $('#parent').on('change',function(e){
                // console.log(e);
                var cat_id = e.target.value;
                console.log(cat_id);
                //ajax
                $.get('/ajax-subcat?cat_id='+ cat_id,function(data){
                    //success data
                   //console.log(data);
                    var subcat =  $('#subcategory').empty();
                    $.each(data,function(create,subcatObj){
                        var option = $('<option/>', {id:create, value:subcatObj});
                        subcat.append('<option value ="'+subcatObj+'">'+subcatObj+'</option>');
                    });
                });
            });
        });
    </script> -->

    <script>

//ckeditor
    $(document).ready(function(){
    var left = 200
    $('#text_counter').text('Characters left: ' + left);

      $('#description').keyup(function () {

      left = 200 - $(this).val().length;

      $('#text_counter').text('Characters left: ' + left);
    });
  });

//image
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



   var editor = CKEDITOR.replace( 'editor-full', {
    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );

    </script>


  </body>
  </html>
