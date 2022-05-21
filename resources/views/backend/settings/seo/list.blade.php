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
                    <h3 class="box-title">SEO List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>M.Title</th>
                                    <th>M.Author</th>
                                    <th>M.Keyword</th>
                                    <th>M.Description</th>
                                    <th>G.Analytics</th>
                                    <th>F.Description</th>
                                    <th>Logo</th>
                                    <th>Facicon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $data->meta_title }}</td>
                                    <td>{{ $data->meta_author }}</td>
                                    <td>{{ $data->meta_keyword }}</td>
                                    <td>{{ $data->meta_description }}</td>
                                    <td>{{ $data->google_analytics }}</td>
                                    <td>{{ $data->footer_description }}</td>
                                    <td>
                                        <img src="{{ URL::to($data->logo) }}" alt="">
                                    </td>
                                    <td>
                                        <img src="{{ URL::to($data->favicon) }}" alt="">
                                    </td>
                                    <td width="30%">
                                        <a title="Edit Data" href="{{ route('seo.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
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
