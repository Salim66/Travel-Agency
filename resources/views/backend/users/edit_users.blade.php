@extends('backend.admin_master')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- /.col -->

                <div class="col-12">

                    <div class="box">
                       <div class="box-header with-border">
                         <h3 class="box-title">Edit User</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <div class="">
                               <form action="{{ route('update.user', $data->id) }}" method="POST" enctype="multipart/form-data">
                               @csrf
                               @method('PATCH')
                               
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <h3>User Permission</h3>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="category" id="checkbox_1" value="1" {{ ($data->category == 1)? 'checked': '' }}>
                                                        <label for="checkbox_1">Category</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="tag" id="checkbox_2" value="1" {{ ($data->tag == 1)? 'checked': '' }}>
                                                        <label for="checkbox_2">Tag</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="country" id="checkbox_3" value="1" {{ ($data->country == 1)? 'checked': '' }}>
                                                        <label for="checkbox_3">Country</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="packages" id="checkbox_4" value="1" {{ ($data->packages == 1)? 'checked': '' }}>
                                                        <label for="checkbox_4">Packages</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="post" id="checkbox_5" value="1" {{ ($data->post == 1)? 'checked': '' }}>
                                                        <label for="checkbox_5">Post</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="destination" id="checkbox_6" value="1" {{ ($data->destination == 1)? 'checked': '' }}>
                                                        <label for="checkbox_6">Destination</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="travel_gallery" id="checkbox_7" value="1" {{ ($data->travel_gallery == 1)? 'checked': '' }}>
                                                        <label for="checkbox_7">Travel Gallery</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="tour_guide" id="checkbox_8" value="1" {{ ($data->tour_guide == 1)? 'checked': '' }}>
                                                        <label for="checkbox_8">Tour Guide</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="reviewer" id="checkbox_9" value="1" {{ ($data->reviewer == 1)? 'checked': '' }}>
                                                        <label for="checkbox_9">Reviewer</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="users" id="checkbox_10" value="1" {{ ($data->users == 1)? 'checked': '' }}>
                                                        <label for="checkbox_10">Users</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="Settings" id="checkbox_11" value="1" {{ ($data->Settings == 1)? 'checked': '' }}>
                                                        <label for="checkbox_11">settings</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="contact_us" id="checkbox_12" value="1" {{ ($data->contact_us == 1)? 'checked': '' }}>
                                                        <label for="checkbox_12">Contact Us</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="booking_package" id="checkbox_13" value="1" {{ ($data->booking_package == 1)? 'checked': '' }}>
                                                        <label for="checkbox_13">Booking Package</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="subscriber" id="checkbox_14" value="1" {{ ($data->subscriber == 1)? 'checked': '' }}>
                                                        <label for="checkbox_14">Subscriber</label>
                                                    </fieldset>
                                                </div>
                                            </div>
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
