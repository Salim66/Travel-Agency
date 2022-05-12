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
                        <h3 class="box-title">Hero Banner List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Banner Title English</th>
                                        <th>Banner Title Arabic</th>
                                        <th>Banner Description English</th>
                                        <th>Banner Description Arabic</th>
                                        <th>Banner Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->hero_title_en }}</td>
                                        <td>{{ $data->hero_title_ar }}</td>
                                        <td>{{ Str::words($data->hero_short_des_en, 5, '...') }}</td>
                                        <td>{{ Str::words($data->hero_short_des_ar, 5, '...') }}</td>
                                        <td>
                                            <img src="{{ URL::to($data->hero_banner) }}" alt="">
                                        </td>
                                        <td class="action_class">
                                            <a title="Edit Data" href="{{ route('banner.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a title="Delete Data" href="{{ route('banner.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

                <!-- /.col -->

                <div class="col-4">

                    <div class="box">
                       <div class="box-header with-border">
                         <h3 class="box-title">Add Hero Banner</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <div class="table-responsive">
                               <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                               @csrf
                                    <div class="form-group">
                                        <h5>Banner Title English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="hero_title_en" class="form-control">
                                            @error('hero_title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Banner Title Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="hero_title_ar" class="form-control">
                                            @error('hero_title_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Banner Description English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="hero_short_des_en" id="textarea" class="form-control"></textarea>
                                            @error('hero_short_des_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Banner Description Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="hero_short_des_ar" id="textarea" class="form-control"></textarea>
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
                                        <img src="" class="banner_image_preview" alt="">
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

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
