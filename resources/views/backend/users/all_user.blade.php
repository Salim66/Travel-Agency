@extends('backend.admin_master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container-full">
    <!-- Content Header (Page header) -->
     

    <!-- Main content -->
    <section class="content">
      <div class="row">
           
     

        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Total User <span class="badge badge-pill badge-danger"> {{ count($users) }} </span> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Action</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $data)
                        <tr>
                            <td><img src="{{ (!empty($data->profile_photo_path))? url($data->profile_photo_path): url('upload/no_image.png') }}" width="50px" height="50px"> </td>
                            <td>{{ $data->name }}</td>
                            <td>
                                @if($data->category == 1)
                                <span class="badge badge-primary">Category</span>
                                @else
                                @endif

                                @if($data->tag == 1)
                                <span class="badge badge-info">Tag</span>
                                @else
                                @endif

                                @if($data->country == 1)
                                <span class="badge badge-success">Country</span>
                                @else
                                @endif

                                @if($data->packages == 1)
                                <span class="badge badge-warning">Packages</span>
                                @else
                                @endif

                                @if($data->post == 1)
                                <span class="badge badge-secondary">Post</span>
                                @else
                                @endif

                                @if($data->destination == 1)
                                <span class="badge badge-danger">Destination</span>
                                @else
                                @endif

                                @if($data->travel_gallery == 1)
                                <span class="badge badge-primary">Travel Gallery</span>
                                @else
                                @endif

                                @if($data->tour_guide == 1)
                                <span class="badge badge-info">Tour Guide</span>
                                @else
                                @endif

                                @if($data->reviewer == 1)
                                <span class="badge badge-danger">Reviewer</span>
                                @else
                                @endif

                                @if($data->users == 1)
                                <span class="badge badge-warning">Users</span>
                                @else
                                @endif

                                @if($data->settings == 1)
                                <span class="badge badge-danger">Settings</span>
                                @else
                                @endif

                                @if($data->contact_us == 1)
                                <span class="badge badge-primary">Contact Us</span>
                                @else
                                @endif

                                @if($data->booking_package == 1)
                                <span class="badge badge-secondary">Booking Package</span>
                                @else
                                @endif

                                @if($data->subscriber == 1)
                                <span class="badge badge-success">Subscriber</span>
                                @else
                                @endif

                            </td>                           
                            <td>
                        <a href="{{ route('edit.user', $data->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                        <a href="{{ route('delete.user', $data->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
                        <i class="fa fa-trash"></i></a>
                            </td>
                                                
                        </tr>
                        @endforeach
                    </tbody>
                     
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

                  
        </div>
        <!-- /.end col-12 -->







      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>
</div>
@endsection
