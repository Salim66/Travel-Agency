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
                        <h3 class="box-title">Travel Gallery List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Gallery Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <img src="{{ URL::to($data->image) }}" class="travel_gallery_img" alt="">
                                        </td>
                                        <td>
                                            @if($data->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="action_class">
                                            <a title="Edit Data" href="{{ route('gallery.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a title="Delete Data" href="{{ route('gallery.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            @if($data->status == 1)
                                            <a title="Inactive Gallery" href="{{ route('gallery.inactive', $data->id) }}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a title="Active Gallery" href="{{ route('gallery.active', $data->id) }}" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
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
                         <h3 class="box-title">Add Travel Gallery</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <div class="">
                               <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                               @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Gallery Image <span class="text-danger">*</span><small>(Size 370x270)</small></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" id="travel_gallery_image_load">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <img src="" class="travel_gallery_image_preview" alt="">
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
