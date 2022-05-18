@extends('backend.admin_master')

@section('content')
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Single Package View</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <table class="table table-stripe">
                        <thead class="thead-dark text-bold">
                            <tr>
                                <th width="40%"><strong>Package Information</strong></th>
                                <th><strong>Package Value</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Package Title English</td>
                                <td>{{ $package->package_title_en }}</td>
                            </tr>
                            <tr>
                                <td>Package Title Arabic</td>
                                <td>{{ $package->package_title_ar }}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{ $package->categories->name_en }} | {{ $package->categories->name_ar }}</td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>{{ $package->countries->country_name_en }} | {{ $package->countries->country_name_ar }}</td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td>{{ $package->districts->district_name_en }} | {{ $package->districts->district_name_ar }}</td>
                            </tr>
                            <tr>
                                <td>Package Duration</td>
                                <td>{{ $package->package_duration }}</td>
                            </tr>
                            <tr>
                                <td>Package Amount</td>
                                <td>{{ $package->package_amount }} $</td>
                            </tr>
                            <tr>
                                <td>Package Group Size</td>
                                <td>{{ $package->package_group_size }} Person</td>
                            </tr>
                            <tr>
                                <td>Package Tour Guide</td>
                                <td>{{ $package->package_tour_guide }} Person</td>
                            </tr>
                            <tr>
                                <td>Package Rating</td>
                                <td>{{ $package->package_rating }}</td>
                            </tr>
                            <tr>
                                <td>Information Detials English</td>
                                <td>{!! $package->information_details_en !!}</td>
                            </tr>
                            <tr>
                                <td>Information Detials Arabic</td>
                                <td>{!! $package->information_details_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Destination English</td>
                                <td>{{ $package->destination_en }}</td>
                            </tr>
                            <tr>
                                <td>Destination Arabic</td>
                                <td>{{ $package->destination_ar }}</td>
                            </tr>
                            <tr>
                                <td>Depature English</td>
                                <td>{{ $package->depature_en }}</td>
                            </tr>
                            <tr>
                                <td>Depature Arabic</td>
                                <td>{{ $package->depature_ar }}</td>
                            </tr>
                            <tr>
                                <td>Depature Time</td>
                                <td>{{ $package->departure_time }}</td>
                            </tr>
                            <tr>
                                <td>Return Time</td>
                                <td>{{ $package->return_time }}</td>
                            </tr>
                            <tr>
                                <td>Included English</td>
                                <td>{!! $package->included_en !!}</td>
                            </tr>
                            <tr>
                                <td>Included Arabic</td>
                                <td>{!! $package->included_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Excluded English</td>
                                <td>{!! $package->excluded_en !!}</td>
                            </tr>
                            <tr>
                                <td>Excluded Arabic</td>
                                <td>{!! $package->excluded_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Traval With English</td>
                                <td>{!! $package->travel_with_en !!}</td>
                            </tr>
                            <tr>
                                <td>Traval With Arabic</td>
                                <td>{!! $package->travel_with_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Travel Plan Details English</td>
                                <td>{!! $package->package_travel_plan_detials_en !!}</td>
                            </tr>
                            <tr>
                                <td>Travel Plan Details Arabic</td>
                                <td>{!! $package->package_travel_plan_detials_ar !!}</td>
                            </tr>
                            <tr>
                                <td>Holiday Offer</td>
                                <td>
                                    @if($package->package_holiday_offer == 1)
                                    <span class="text-success">Yes</span>
                                    @else
                                    <span class="text-danger">No</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Package Image</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{ URL::to($package->package_image) }}" class="view-thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Package Multiple Images</td>
                                <td>
                                    @php
                                        $all_gallery = json_decode($package->package_tour_gallery);
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
