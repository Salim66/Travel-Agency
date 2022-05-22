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
                         <h3 class="box-title">Change Password</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <div class="">
                               <form action="{{ route('user.password-update', Auth::user()->id) }}" method="POST">
                               @csrf
                               @method('PATCH')
         
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Old Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="old_password" class="form-control">
                                                    @error('old_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>New Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="new_password" class="form-control">
                                                    @error('new_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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
