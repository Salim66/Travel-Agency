@extends('backend.admin_master')

@section('content')
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Single Post View</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <table class="table table-stripe">
                        <thead class="thead-dark text-bold">
                            <tr>
                                <th width="40%"><strong>Post Information</strong></th>
                                <th><strong>Post Value</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Post Title English</td>
                                <td>{{ $post->title_en }}</td>
                            </tr>
                            <tr>
                                <td>Post Title Arabic</td>
                                <td>{{ $post->title_ar }}</td>
                            </tr>
                            <tr>
                                <td>Post Create</td>
                                <td>{{ $post->users->name }}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{ $post->categories->name_en }} | {{ $post->categories->name_ar }}</td>
                            </tr>
                            <tr>
                                <td>Tag</td>
                                <td>{{ $post->tags->name_en }} | {{ $post->tags->name_ar }}</td>
                            </tr>
                            <tr>
                                <td>Details English</td>
                                <td>{!! $post->details_en !!}</td>
                            </tr>
                            <tr>
                                <td>Details Arabic</td>
                                <td>{!! $post->details_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Post Image</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{ URL::to($post->image) }}" class="view-thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
</div>

@endsection
