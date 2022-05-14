@extends('backend.admin_master')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
          <div class="row">


            @php
                $all_country = \App\Models\Country::all();
            @endphp

            <!-- Edit Contact Info Page  -->
            <div class="col-12">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Edit District</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{ route('district.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <h5>Select Country <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select class="form-control select2" name="country_id" style="width: 100%;">
                                            <option selected="selected">--Select--</option>
                                            @foreach ($all_country as $coun)
                                                <option value="{{ $coun->id }}" {{ ($coun->id == $data->country_id)? 'selected' : '' }}>{{ $coun->country_name_en }} | {{ $coun->country_name_ar }}</option>
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
                                        <input type="text" name="district_name_en" class="form-control" value="{{ $data->district_name_en }}">
                                        @error('district_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>District Name Arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="district_name_ar" class="form-control" value="{{ $data->district_name_ar }}">
                                        @error('district_name_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                               <div class="text-xs-right">
                                   <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
