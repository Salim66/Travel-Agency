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
                        <h3 class="box-title">Reviewer List</h3>
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
                                        <th>Rating</th>
                                        <th>Message</th>
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
                                        <td>{{ $data->rating }}</td>
                                        <td>{{ $data->message }}</td>
                                        <td>
                                            @if($data->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="action_class">
                                            <a title="Edit Data" href="{{ route('reviewer.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a title="Delete Data" href="{{ route('reviewer.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            @if($data->status == 1)
                                            <a title="Inactive Reviewer" href="{{ route('reviewer.inactive', $data->id) }}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a title="Active Reviewer" href="{{ route('reviewer.active', $data->id) }}" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
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
                         <h3 class="box-title">Add Reviewer</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <div class="">
                               <form action="{{ route('reviewer.store') }}" method="POST" enctype="multipart/form-data">
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
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Reviewer Rating <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="rating" class="form-control">
                                                    @error('rating')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Reviewer Message <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="message" class="form-control"></textarea>
                                                    @error('message')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Reviewer Image <span class="text-danger">*</span><small>(Size 370x320)</small></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" id="reviewer_image_load">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <img src="" class="reviewer_image_preview" alt="">
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
