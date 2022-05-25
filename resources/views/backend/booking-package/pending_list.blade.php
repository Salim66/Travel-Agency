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
                        <h3 class="box-title">Pending Booking Package List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-hover display nowrap margin-top-10 w-p100 table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>P.Name</th>
                                        <th>P.Category</th>
                                        <th>C.Name</th>
                                        <th>C.Email</th>
                                        <th>C.Phone</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->packages->package_title_en }}</td>
                                        <td>{{ $data->packages->categories->name_en }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ date('d-m-Y', strtotime($data->date)) }}</td>
                                        <td>
                                            @if($data->status == 0)
                                            <span class="badge badge-pill badge-danger">Pending</span>
                                            @endif
                                        </td>
                                        <td class="action_class">
                                            <a title="View Book Package" href="{{ route('pending.booking.package.view', $data->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a title="Package Completed" href="{{ route('booking.package.completed', $data->id) }}" class="btn btn-success"><i class="fa fa-arrow-down"></i></a>
                                            <a title="Delete Data" href="{{ route('booking.package.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
