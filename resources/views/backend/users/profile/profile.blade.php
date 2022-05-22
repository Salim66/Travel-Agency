@extends('backend.admin_master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container-full">
    <!-- Content Header (Page header) -->
     

    <section class="content">

		  <div class="row d-flex justify-content-center">
			  <div class="col-12 col-lg-5 col-xl-4">
				  
					


				  <!-- /.box -->
				 <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
					  <h3 class="widget-user-username">{{ $data->name }}</h3>
					  <h6 class="widget-user-desc">{{ $data->email }}</h6>
                      <a href="{{ route('user.profile.edit', $data->id) }}" class="float-right btn btn-primary btn-sm">Edit Profile</a>
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{ (!empty($data->profile_photo_path))? url($data->profile_photo_path): url('upload/no_image.png') }}" alt="User Avatar">
					</div>
                    <br>
					<div class="box-footer">
					  <div class="row">
						
					  </div>
					  <!-- /.row -->
					</div>
				  </div>

				

				


			 
			 
			</div>			  
		  </div>
		  <!-- /.row -->

		</section>
  
  </div>
</div>
@endsection
