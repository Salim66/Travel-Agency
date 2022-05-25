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
                         <h3 class="box-title">Add Package</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <div>
                               <form action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
                               @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Package Title English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="package_title_en" class="form-control">
                                                    @error('package_title_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Package Title Arabic <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="package_title_ar" class="form-control">
                                                    @error('package_title_ar')
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
                                                <h5>Package Category <span class="text-danger">*</span></h5>
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
                                                <h5>Package Duration <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="package_duration" class="form-control">
                                                    @error('package_duration')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $all_country = \App\Models\Country::all();
                                    @endphp

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Select Country <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select class="form-control select2" name="country_id" style="width: 100%;">
                                                        <option selected="selected">--Select--</option>
                                                        @foreach ($all_country as $country)
                                                            <option value="{{ $country->id }}">{{ $country->country_name_en }} | {{ $country->country_name_ar }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Select District <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="district_id" id="select" class="form-control">
                                                        <option value="" selected disabled>Select District</option>

                                                    </select>
                                                    @error('district_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Package Amount <span class="text-danger">*</span><small>( For Adult )</small></h5>
                                                <div class="controls">
                                                    <input type="text" name="package_amount_adult" class="form-control">
                                                    @error('package_amount_adult')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Package Amount <small>( For Child )</small></h5>
                                                <div class="controls">
                                                    <input type="text" name="package_amount_child" class="form-control">
                                                    @error('package_amount_child')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Package Group Size <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="package_group_size" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Package Tour Guide <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="package_tour_guide" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Package Rating <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="package_rating" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Package Image <span class="text-danger">*</span><small>(Size 770x410)</small></h5>
                                                <div class="controls">
                                                    <input type="file" name="package_image" class="form-control" id="package_image_load">
                                                    @error('package_image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <img src="" class="package_image_preview" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Package Multiple Image <small>( Image size 370x263  )</small></h5>
                                                <div class="controls">
                                                    <input type="file" name="package_tour_gallery[]" class="form-control" multiple id="multiImg" />
                                                    @error('package_tour_gallery')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div class="row" id="preview_img"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"> <!-- start 8th row -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Travel Plan Details English <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <textarea name="package_travel_plan_detials_en" id="editor1" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Travel Plan Details Arabic <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <textarea name="package_travel_plan_detials_ar" id="editor2" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end 8th row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Package Location Link <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="package_location_link" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Package Information
                                                        </a>
                                                    </h5>
                                                    </div>

                                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">

                                                        <div class="row"> <!-- start 8th row -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>Information Details English <span class="text-danger"></span></h5>
                                                                    <div class="controls">
                                                                        <textarea name="information_details_en" id="editor3" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>Information Details Arabic <span class="text-danger"></span></h5>
                                                                    <div class="controls">
                                                                        <textarea name="information_details_ar" id="editor4" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end 8th row -->

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
                                                                    <h5>Depature English <span class="text-danger"></span></h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="depature_en" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>Depature Arabic <span class="text-danger"></span></h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="depature_ar" class="form-control">
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
                                                                    <h5>Included English <span class="text-danger"></span></h5>
                                                                    <div class="controls">
                                                                        <textarea name="included_en" id="editor5" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>Included Arabic <span class="text-danger"></span></h5>
                                                                    <div class="controls">
                                                                        <textarea name="included_ar" id="editor6" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end 8th row -->

                                                        <div class="row"> <!-- start 8th row -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>Excluded English <span class="text-danger"></span></h5>
                                                                    <div class="controls">
                                                                        <textarea name="excluded_en" id="editor7" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>Excluded Arabic <span class="text-danger"></span></h5>
                                                                    <div class="controls">
                                                                        <textarea name="excluded_ar" id="editor8" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end 8th row -->

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>Travel With English <span class="text-danger"></span></h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="travel_with_en" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>Travel With Arabic <span class="text-danger"></span></h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="travel_with_ar" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="package_holiday_offer" id="checkbox_5" value="1">
                                                        <label for="checkbox_5">Holiday Offer</label>
                                                    </fieldset>
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
