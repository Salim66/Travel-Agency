@extends('backend.admin_master')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
          <div class="row">

            <!-- Edit Contact Info Page  -->
            <div class="col-12">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Edit Contact Information</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{ route('contact-info.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <h5>Location <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="location" class="form-control" value="{{ $data->location }}">
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Phone Number <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="phone" class="form-control" value="{{ $data->phone }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Email Address <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="email" class="form-control" value="{{ $data->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Visit Us Link <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="visit_us" class="form-control" value="{{ $data->visit_us }}">
                                        @error('visit_us')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Location Link <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="google_map_link" class="form-control" value="{{ $data->google_map_link }}">
                                        @error('google_map_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                               <div class="text-xs-right">
                                   <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                               </div>
                            </form>
                       </div>
                   </div>
                   <!-- /.box-body -->
                 </div>
               </div>
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
@endsection
