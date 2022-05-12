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
                  <h3 class="box-title">Contact Us List <span class="badge badge-pill badge-danger"> {{ count($all_data) }} </span> </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_data as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td width="50%">{{ $data->message }}</td>
                                <td>
                                    <a title="Delete Data" href="{{ route('contact-us.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

            <!-- Add Category Page  -->

          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
@endsection
