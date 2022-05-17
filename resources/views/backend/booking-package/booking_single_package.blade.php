@extends('backend.admin_master')

@section('content')
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Booking Single Package View</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <table class="table table-stripe">
                        <thead>
                            <tr>
                                <th width="40%"><strong>Customer Information</strong></th>
                                <th><strong></strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Customer Name</td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td>Customer Email</td>
                                <td>{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <td>Customer Phone</td>
                                <td>{{ $data->phone }}</td>
                            </tr>
                            <tr>
                                <td>Person</td>
                                <td>{{ $data->adult }}</td>
                            </tr>
                            <tr>
                                <td>Child</td>
                                <td>{{ $data->child }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{ $data->date }}</td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>{{ $data->message }}</td>
                            </tr>
                        </tbody>

                        <br />

                        <thead class="thead-dark text-bold">
                            <tr>
                                <th width="40%"><strong>Package Information</strong></th>
                                <th><strong>Package Value</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Package Title English</td>
                                <td>{{ $data->packages->package_title_en }}</td>
                            </tr>
                            <tr>
                                <td>Package Title Arabic</td>
                                <td>{{ $data->packages->package_title_ar }}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{ $data->packages->categories->name_en }} | {{ $data->packages->categories->name_ar }}</td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>{{ $data->packages->countries->country_name_en }} | {{ $data->packages->countries->country_name_ar }}</td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td>{{ $data->packages->districts->district_name_en }} | {{ $data->packages->districts->district_name_ar }}</td>
                            </tr>
                            <tr>
                                <td>Package Duration</td>
                                <td>{{ $data->packages->package_duration }}</td>
                            </tr>
                            <tr>
                                <td>Package Amount</td>
                                <td>{{ $data->packages->package_amount }} $</td>
                            </tr>
                            <tr>
                                <td>Package Group Size</td>
                                <td>{{ $data->packages->package_group_size }} Person</td>
                            </tr>
                            <tr>
                                <td>Package Tour Guide</td>
                                <td>{{ $data->packages->package_tour_guide }} Person</td>
                            </tr>
                            <tr>
                                <td>Package Rating</td>
                                <td>{{ $data->packages->package_rating }}</td>
                            </tr>
                            <tr>
                                <td>Information Detials English</td>
                                <td>{!! $data->packages->information_details_en !!}</td>
                            </tr>
                            <tr>
                                <td>Information Detials Arabic</td>
                                <td>{!! $data->packages->information_details_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Destination English</td>
                                <td>{{ $data->packages->destination_en }}</td>
                            </tr>
                            <tr>
                                <td>Destination Arabic</td>
                                <td>{{ $data->packages->destination_ar }}</td>
                            </tr>
                            <tr>
                                <td>Depature English</td>
                                <td>{{ $data->packages->depature_en }}</td>
                            </tr>
                            <tr>
                                <td>Depature Arabic</td>
                                <td>{{ $data->packages->depature_ar }}</td>
                            </tr>
                            <tr>
                                <td>Depature Time</td>
                                <td>{{ $data->packages->departure_time }}</td>
                            </tr>
                            <tr>
                                <td>Return Time</td>
                                <td>{{ $data->packages->return_time }}</td>
                            </tr>
                            <tr>
                                <td>Included English</td>
                                <td>{!! $data->packages->included_en !!}</td>
                            </tr>
                            <tr>
                                <td>Included Arabic</td>
                                <td>{!! $data->packages->included_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Excluded English</td>
                                <td>{!! $data->packages->excluded_en !!}</td>
                            </tr>
                            <tr>
                                <td>Excluded Arabic</td>
                                <td>{!! $data->packages->excluded_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Traval With English</td>
                                <td>{!! $data->packages->travel_with_en !!}</td>
                            </tr>
                            <tr>
                                <td>Traval With Arabic</td>
                                <td>{!! $data->packages->travel_with_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Travel Plan Details English</td>
                                <td>{!! $data->packages->package_travel_plan_detials_en !!}</td>
                            </tr>
                            <tr>
                                <td>Travel Plan Details Arabic</td>
                                <td>{!! $data->packages->package_travel_plan_detials_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Holiday Offer</td>
                                <td>
                                    @if($data->packages->package_holiday_offer == 1)
                                    true
                                    @else
                                    false
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Package Image</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{ URL::to($data->packages->package_image) }}" class="view-thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Package Multiple Images</td>
                                <td>
                                    @php
                                        $all_gallery = json_decode($data->packages->package_tour_gallery);
                                    @endphp
                                    <div class="row">
                                        @foreach($all_gallery as $img)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{ URL::to($img) }}" class="view-thumbnail">
                                            </div>
                                        </div>
                                        @endforeach
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
