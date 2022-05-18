@extends('backend.admin_master')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                        <h3 class="box-title">Tour Guide List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>instagram</th>
                                        <th>facebook</th>
                                        <th>twitter</th>
                                        <th>whatsapp</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <img src="{{ URL::to($data->image) }}" class="tour_guide_img" alt="">
                                        </td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->instagram_link }}</td>
                                        <td>{{ $data->facebook_link }}</td>
                                        <td>{{ $data->twitter_link }}</td>
                                        <td>{{ $data->whatsapp_number }}</td>
                                        <td>
                                            @if($data->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="action_class">
                                            <a title="Edit Data" href="{{ route('guide.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a title="Delete Data" href="{{ route('guide.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            @if($data->status == 1)
                                            <a title="Inactive Tour Guide" href="{{ route('guide.inactive', $data->id) }}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a title="Active Tour Guide" href="{{ route('guide.active', $data->id) }}" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                <div class="col-4">

                    <div class="box">
                       <div class="box-header with-border">
                         <h3 class="box-title">Add Tour Guide</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <div class="">
                               <form action="{{ route('guide.store') }}" method="POST" enctype="multipart/form-data">
                               @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Gallery Image <span class="text-danger">*</span><small>(Size 370x280)</small></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" id="guide_image_load">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <img src="" class="guide_image_preview" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Instagram Link <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="instagram_link" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Facebook Link <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="facebook_link" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Twitter Link <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="twitter_link" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Whatsapp Number <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="whatsapp_number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   <div class="text-xs-right">
                                       <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                   </div>
                                </form>
                           </div>
                       </div>
                       <!-- /.box-body -->
                     </div>
                </div>

                <!-- /.col -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
