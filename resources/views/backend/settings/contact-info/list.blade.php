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
                    <h3 class="box-title">Contact Information List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Email Address</th>
                                    <th>Visit Us Link</th>
                                    <th>Location Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $data->location }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->visit_us }}</td>
                                    <td width="40%">{{ $data->google_map_link }}</td>
                                    <td width="30%">
                                        <a title="Edit Data" href="{{ route('contact-info.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>

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
