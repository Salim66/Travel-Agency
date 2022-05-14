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
                        <h3 class="box-title">Package List</h3>
                        <a title="Add Package" href="{{ route('package.add') }}" class="btn btn-info float-right"><i class="fa fa-plus"></i></a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Title English</th>
                                        <th>Package Title Arabic</th>
                                        <th>Package Amount</th>
                                        <th>Package Location</th>
                                        <th>Package Duration</th>
                                        <th>Banner Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->package_title_en }}</td>
                                        <td>{{ $data->package_title_ar }}</td>
                                        <td>{{ $data->package_amount }}</td>
                                        <td>{{ $data->districts->district_name_en }}, {{ $data->countries->country_name_en }}</td>
                                        <td>{{ $data->package_duration }}</td>
                                        <td>
                                            <img src="{{ URL::to($data->package_image) }}" alt="">
                                        </td>
                                        <td class="action_class">
                                            <a title="Edit Data" href="{{ route('package.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a title="Delete Data" href="{{ route('package.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
