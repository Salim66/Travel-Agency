@extends('backend.admin_master')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                        <h3 class="box-title">Country List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Country</th>
                                        <th>District Name English</th>
                                        <th>District Name Arabic</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_data as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->countries->country_name_en }}</td>
                                        <td>{{ $data->district_name_en }}</td>
                                        <td>{{ $data->district_name_ar }}</td>
                                        <td width="30%">
                                            <a title="Edit Data" href="{{ route('district.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a title="Delete Data" href="{{ route('district.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

                @php
                    $all_country = \App\Models\Country::all();
                @endphp

                <div class="col-4">

                    <div class="box">
                       <div class="box-header with-border">
                         <h3 class="box-title">Add District</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <div class="table-responsive">
                               <form action="{{ route('district.store') }}" method="POST">
                               @csrf

                                    <div class="form-group">
                                        <h5>Select Country <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select class="form-control select2" name="country_id" style="width: 100%;">
                                                <option selected="selected">--Select--</option>
                                                @foreach ($all_country as $coun)
                                                    <option value="{{ $coun->id }}">{{ $coun->country_name_en }} | {{ $coun->country_name_ar }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>District Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="district_name_en" class="form-control">
                                            @error('district_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>District Name Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="district_name_ar" class="form-control">
                                            @error('district_name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                   <div class="text-xs-right">
                                       <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                   </div>
                                </form>
                           </div>
                       </div>
                       <!-- /.box-body -->
                     </div>
                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
