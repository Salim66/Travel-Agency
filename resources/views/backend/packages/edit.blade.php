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
                     <h3 class="box-title">Edit Category</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{ route('banner.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <h5>Banner Title English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="hero_title_en" class="form-control" value="{{ $data->hero_title_en }}">
                                        @error('hero_title_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Banner Title Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="hero_title_ar" class="form-control"  value="{{ $data->hero_title_ar }}">
                                        @error('hero_title_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Banner Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="hero_short_des_en" id="textarea" class="form-control">{{ $data->hero_short_des_en }}</textarea>
                                        @error('hero_short_des_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Banner Description Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="hero_short_des_ar" id="textarea" class="form-control">{{ $data->hero_short_des_ar }}</textarea>
                                        @error('hero_short_des_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Banner Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="hero_banner" class="form-control" id="banner_image_load">
                                        @error('hero_banner')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img src="{{ URL::to($data->hero_banner) }}" class="banner_image_preview" alt="">
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
