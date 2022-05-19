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
                         <h3 class="box-title">Add Post</h3>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                           <div class="table-responsive">
                               <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                               @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Title English <span class="text-danger">*</span></h5>
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
                                                <h5>Post Title Arabic <span class="text-danger">*</span></h5>
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
                                        $all_tag = \App\Models\Tag::all();
                                    @endphp

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Post Category <span class="text-danger">*</span></h5>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Post Tag <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select class="form-control select2" name="tag_id" style="width: 100%;">
                                                        <option selected="selected">--Select--</option>
                                                        @foreach ($all_tag as $tag)
                                                            <option value="{{ $tag->id }}">{{ $tag->name_en }} | {{ $tag->name_ar }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('tag_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Post Image <span class="text-danger">*</span><small>(Size 770x350)</small></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" id="post_image_load">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <img src="" class="post_image_preview" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"> <!-- start 8th row -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Details English <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <textarea name="details_en" id="editor9" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Details Arabic <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <textarea name="details_ar" id="editor10" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end 8th row -->

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
