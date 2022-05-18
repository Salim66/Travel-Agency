@extends('backend.admin_master')

@section('content')
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Single Top Destination View</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <table class="table table-stripe">
                        <thead class="thead-dark text-bold">
                            <tr>
                                <th width="40%"><strong>Destination Information</strong></th>
                                <th><strong>Destination Value</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Destination Title English</td>
                                <td>{{ $destination->title_en }}</td>
                            </tr>
                            <tr>
                                <td>Destination Title Arabic</td>
                                <td>{{ $destination->title_ar }}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{ $destination->categories->name_en }} | {{ $destination->categories->name_ar }}</td>
                            </tr>
                            <tr>
                                <td>Number of Place</td>
                                <td>{{ $destination->number_of_place }}</td>
                            </tr>
                            <tr>
                                <td>Number of Hotal</td>
                                <td>{{ $destination->number_of_hotal }} $</td>
                            </tr>
                            <tr>
                                <td>Rating</td>
                                <td>{{ $destination->rating }}</td>
                            </tr>
                            <tr>
                                <td>Destination English</td>
                                <td>{{ $destination->destination_en }}</td>
                            </tr>
                            <tr>
                                <td>Destination Arabic</td>
                                <td>{{ $destination->destination_ar }}</td>
                            </tr>
                            <tr>
                                <td>Departure English</td>
                                <td>{{ $destination->departure_en }}</td>
                            </tr>
                            <tr>
                                <td>Departure Arabic</td>
                                <td>{{ $destination->departure_ar }}</td>
                            </tr>
                            <tr>
                                <td>Departure Time</td>
                                <td>{{ $destination->departure_time }}</td>
                            </tr>
                            <tr>
                                <td>Return Time</td>
                                <td>{{ $destination->return_time }}</td>
                            </tr>
                            <tr>
                                <td>Details English</td>
                                <td>{!! $destination->detials_en !!}</td>
                            </tr>
                            <tr>
                                <td>Details Arabic</td>
                                <td>{!! $destination->detials_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Destination Image</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{ URL::to($destination->image) }}" class="view-thumbnail">
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
