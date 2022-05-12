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
                     <h3 class="box-title">Edit Social Link Information</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{ route('social-link.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <h5>Facebook Link <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="facebook" class="form-control" value="{{ $data->facebook }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Instagram Link <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="instagram" class="form-control" value="{{ $data->instagram }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Twitter Link <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="twitter" class="form-control" value="{{ $data->twitter }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Whatsapp Link <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="whatsapp" class="form-control" value="{{ $data->whatsapp }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Pinterest Link <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="pintarest" class="form-control" value="{{ $data->pintarest }}">
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
