@extends('backend.admin_master')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                        <h3 class="box-title">Top Destination List</h3>
                        <a title="Add Package" href="{{ route('destination.add') }}" class="btn btn-info float-right"><i class="fa fa-plus"></i></a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>D.Title English</th>
                                        <th>D.Title Arabic</th>
                                        <th>N.of Place</th>
                                        <th>N.of Hotal</th>
                                        <th>Banner Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->categories->name_en }}</td>
                                        <td>{{ $data->title_en }}</td>
                                        <td>{{ $data->title_ar }}</td>
                                        <td>{{ $data->number_of_pace }}</td>
                                        <td>{{ $data->number_of_hotal }}</td>
                                        <td>
                                            <img src="{{ URL::to($data->image) }}" alt="">
                                        </td>
                                        <td>
                                            @if($data->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="action_class">
                                            <a title="View Destination" href="{{ route('destination.view', $data->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a title="Edit Data" href="{{ route('destination.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a title="Delete Data" href="{{ route('destination.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            @if($data->status == 1)
                                            <a title="Inactive Destination" href="{{ route('destination.inactive', $data->id) }}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a title="Active Destination" href="{{ route('destination.active', $data->id) }}" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
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

                <!-- /.col -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
