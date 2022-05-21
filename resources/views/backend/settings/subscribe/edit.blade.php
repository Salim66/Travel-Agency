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
                     <h3 class="box-title">Edit Subscribe Section</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div>
                            <form action="{{ route('subscirbe-s.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Awesome Tour <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="awesome_tour" class="form-control" value="{{ $data->awesome_tour }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>New Destinations <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="new_destination" class="form-control" value="{{ $data->new_destination }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Years Experience <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="years_experiance" class="form-control" value="{{ $data->years_experiance }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Best Mountains <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="best_mountains" class="form-control" value="{{ $data->best_mountains }}">
                                            </div>
                                        </div>
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
