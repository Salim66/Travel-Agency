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
                     <h3 class="box-title">Edit About</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{ route('about.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Yours Experience <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="yours_experience" class="form-control" value="{{ $data->yours_experience }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Your Guide <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="your_guide" class="form-control" value="{{ $data->your_guide }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Travelar Connect <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="travelar_connect" class="form-control" value="{{ $data->travelar_connect }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row"> <!-- start 8th row -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Description <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <textarea name="description" id="editor15" class="form-control">{{ $data->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end 8th row -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Image One <span class="text-danger">*</span><small>(Size 430x290)</small></h5>
                                            <div class="controls">
                                                <input type="file" name="image_one" class="form-control" id="ione_image_load">
                                                @error('image_one')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <img src="{{ URL::to($data->image_one) }}" class="ione_image_preview" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Image Two <span class="text-danger">*</span><small>(Size 270x250)</small></h5>
                                            <div class="controls">
                                                <input type="file" name="image_two" class="form-control" id="itwo_image_load">
                                                @error('image_two')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <img src="{{ URL::to($data->image_two) }}" class="itwo_image_preview" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Image Three <span class="text-danger">*</span><small>(Size 270x250)</small></h5>
                                            <div class="controls">
                                                <input type="file" name="image_three" class="form-control" id="ithree_image_load">
                                                @error('image_three')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <img src="{{ URL::to($data->image_three) }}" class="ithree_image_preview" alt="">
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
