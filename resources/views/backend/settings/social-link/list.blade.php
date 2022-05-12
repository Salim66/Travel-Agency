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
                    <h3 class="box-title">Social Link List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Facebook</th>
                                    <th>Instagram</th>
                                    <th>Twitter</th>
                                    <th>Whatsapp</th>
                                    <th>Pinterest</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $data->facebook }}</td>
                                    <td>{{ $data->instagram }}</td>
                                    <td>{{ $data->twitter }}</td>
                                    <td>{{ $data->whatsapp }}</td>
                                    <td>{{ $data->pintarest }}</td>
                                    <td width="15%">
                                        <a title="Edit Data" href="{{ route('social-link.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
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
