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
                         <h3 class="box-title">Add Top Destination</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <div class="table-responsive">
                               <form action="{{ route('destination.store') }}" method="POST" enctype="multipart/form-data">
                               @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Destination Title English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="title_en" class="form-control">
                                                    @error('title_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Destination Title Arabic <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="title_ar" class="form-control">
                                                    @error('title_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $all_cat = \App\Models\Category::all();
                                    @endphp

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Destination Category <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select class="form-control select2" name="category_id" style="width: 100%;">
                                                        <option selected="selected">--Select--</option>
                                                        @foreach ($all_cat as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->name_en }} | {{ $cat->name_ar }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Number of Place <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="number_of_place" class="form-control">
                                                    @error('number_of_place')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Number of Hotal <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="number_of_hotal" class="form-control">
                                                    @error('number_of_hotal')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Destination Rating <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="rating" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Destination Image <span class="text-danger">*</span><small>(Size 770x400)</small></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" id="destination_image_load">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <img src="" class="destination_image_preview" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Destination English <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="destination_en" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Destination Arabic <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="destination_ar" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Departure English <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="departure_en" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Departure Arabic <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="departure_ar" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Depature Time <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="datetime-local" name="departure_time" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Return Time <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="datetime-local" name="return_time" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row"> <!-- start 8th row -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Details English <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <textarea name="detials_en" id="editor9" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Details Arabic <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <textarea name="detials_ar" id="editor10" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end 8th row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Destination Location Embed Link <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="destination_map_link" class="form-control">
                                                </div>
                                            </div>
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

<script type="text/javascript">
    $(document).ready(function() {

        // district find
        $('select[name="country_id"]').on('change', function(){
            var country_id = $(this).val();
            if(country_id) {
                $.ajax({
                    url: "{{  url('/countries/district/ajax') }}/"+country_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name_en + '</option>');
                            });
                    },
                });
            } else {
                alert('danger');
            }
        });

        // sub sub category find
        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/subsubcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                            });
                    },
                });
            } else {
                alert('danger');
            }
        });

  });
</script>

<script>

    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

</script>

@endsection
