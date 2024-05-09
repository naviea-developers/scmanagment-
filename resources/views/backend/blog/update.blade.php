@section('title')
    Admin - Blog Edit
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('blog.index')}}"> <i class="icon ion-reply text-22"></i> All Blog</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update Blog</h6>
             {{-- validate start  --}}
             @if(count($errors) > 0)
             @foreach($errors->all() as $error)
                 <div class="alert alert-danger">{{ $error }}</div>
             @endforeach
             @endif
             {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-9 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- {{ method_field('PATCH') }} --}}
                        <div class="row">
                            <label class="col-sm-3 form-control-label">Category: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <select class="form-control " name="category_id" id="cat">
                                <option  value="">Select Category</option>
                                @foreach ($categories as $categorie)
                                @if ( $categorie->id == $cat_id )
                                <option selected value="{{$categorie->id}}">{{$categorie->name}}</option>
                                @else
                                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            </div>
                        </div><!-- row -->
                        <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <select class="form-control" name="sub_category_id" id="subCat">
                                <option  value="">Select Sub Category</option>
                                @foreach ($sub_categories as $categorie)
                                @if ( $categorie->id == $sub_cat_id)
                                <option selected value="{{$categorie->id}}">{{$categorie->name}}</option>
                                @else
                                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            </div>
                        </div><!-- row -->
                        <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">Topic: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select  class="form-control" name="topic_id">
                                    <option value="">------ Select Topic ------</option>
                                    @foreach ($topics as $topic)
                                    <option @if (@$blog->topic->id == $topic->id) Selected @endif value="{{ $topic->id }}">{{ $topic->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- row -->

                        <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">University: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select  class="form-control" name="university_id">
                                    <option value="">------ Select University ------</option>
                                    @foreach ($universities as $university)
                                    <option @if ($university->id == $blog->university_id) Selected @endif value="{{ $university->id }}">{{ $university->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- row -->

                        <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">Headline: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <input type="text" name="title" class="form-control" value="{{ $blog->title}}" required>
                            </div>
                        </div><!-- row -->
                        {{-- <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Short Description: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                               <textarea id="summernote_two" name="short_description">{!! $blog->sort_description !!}</textarea>
                            </div>
                        </div><!-- row --> --}}
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Description: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                               <textarea id="summernote" name="description">{!! $blog->description !!}</textarea>
                            </div>
                        </div><!-- row -->
                        {{-- <div class="row" id="menudropdown">
                            <label class="col-sm-3 form-control-label"><span class="tx-danger"></span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-1 mb-2">
                                <br>
                                <input type="radio" id="yes" name="sub_banner" value="1"
                                @if($blog->sub_banner==1) checked="checked" @endif>
                                <label for="top">Banner</label>
                                <input type="radio" id="no" name="sub_banner" value="0"
                                @if($blog->sub_banner==0) checked="checked" @endif>
                                <label for="bottom">Video</label>
                            </div>
                        </div> --}}
                        <div class="row mt-3" >
                            <label class="col-sm-3 form-control-label">Blog Image: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $blog->image_show }}" alt="">
                                        <input type="file" name="image" class="form-control upload-img" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                    </div>
                            </div>
                        </div><!-- row -->
                        {{-- <div class="row mt-3" id="menuvideothumbnail" @if($blog->sub_banner != '0') style="display: none;" @endif>
                            <label class="col-sm-3 form-control-label">Video Thumbnail: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $blog->video_thumbnail_show }}" alt="">
                                        <input type="file" name="video_thumbnail" class="form-control upload-img" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                    </div>
                            </div>
                        </div><!-- row -->
                        <div class="row mt-4" id="menuvideo" @if($blog->sub_banner != '0') style="display: none;" @endif>
                            <label class="col-sm-3 form-control-label">Video Link: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <input type="text" name="video_link" value="{{ $blog->video_link }}" class="form-control" >
                        </div>
                        </div><!-- row --> --}}
                        {{-- <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">Position: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <input type="text" name="position" class="form-control" value="{{ $blog->position}}" required>
                            </div>
                        </div><!-- row --> --}}
                        <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">Author Name: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <input value="{{ $blog->author }}" type="text" name="author" class="form-control" placeholder="Enter Author Name" required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">Author Image: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $blog->author_image_show }}" alt="">
                                    <input type="file" name="author_image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                          <label class="col-sm-3 form-control-label">Status: <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2" name="status">
                              <option @if($blog->status == 1) @selected(true) @endif value="1">Active</option>
                              <option @if($blog->status == 0) @selected(true) @endif value="0">Inactive</option>
                          </select>
                          </div>
                        </div><!-- row -->

                        <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">Tags: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select id="blog"  class="form-control multipleSelect2Search Select2 add-no-exists" name="tag[]" multiple>
                                    <option value="">Enter Tags</option>
                                    @foreach ($blog->tag as $item)
                                    {{-- <option  Selected value="{{ $item->id }}">{{ $item->name }}</option> --}}
                                    <option Selected value="{{$item->name}}">{{$item->name}}</option>
                                    {{-- <option value="{{ $item->id }}" {{ in_array($item->id, $blog->tag->pluck('id')->toArray()) ? 'selected' : '' }}> --}}
                                        
                                    </option>
                                    @endforeach 
                                    {{-- {{$item->where('blog_id', $item->id)->exists() ? 'Selected': ''}} --}}
                                </select>
                            </div>
                        </div>


                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('blog.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update changes</button>
                          </div>
                        </div>
                    {{-- </form> --}}

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection

  <!--- End Bootstrap Model Script-------->
  @section('script')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
  $(document).ready(function() {
      $('.multipleSelect2Search').select2();
  });
  $(document).ready(function() {
      $('.multipleSelectSearch').select2();
  });
  </script>



<script>
    $(document).ready(function() {
    $(".add-no-exists").select2({
         tags: true,
        createTag: function (params) {
            var term = $.trim(params.term);
            console.log(term);
            if (term === '') {
                return null;
            }
            return {
                id: term,
                text: term,
                newTag: true
            }
        },
        //tags: true
    }).on('select2:select', function(e){
        // console.log(e.params.data.tag)
        // console.log(e.params.data.newTag)
        // var select2element = $(this);
        // console.log( $(this).attr('id'));
        // if (e.params.data.newTag === true) {
        //     select2function(e.params.data.text,$(this).attr('id'),select2element)
        // }
    });

    function select2function(val,type,select2element){
        console.log(type);
        let url = '{{ url("add-new-select2-car") }}' ;
        let data = {val:val,'type':type};
        axios({
            method: 'post',
            url: url,
            data: data
        }).then(res => {
            if(res.data.status == "ok"){
                data = {
                    "id":res.data.res_data.id,
                    "text": res.data.res_data.name,
                }
                var selection = select2element.val();

                if ($(select2element).find("option[value='" + res.data.res_data.name + "']").length) {
                    $(select2element).find("option[value='" + res.data.res_data.name + "']").attr('value',res.data.res_data.id);
                    $(select2element).val(res.data.res_data.id).trigger('change');
                } else {
                    var option = new Option(res.data.res_data.name, res.data.res_data.id, true, true);
                    $(select2element).append(option).trigger('change');
                    // console.log("selection =", selection);
                }
                console.log("selection =", selection);
            }
        })
    }
});

</script>





  <script>
      $('document').ready(function () {
        $("input[name=sub_banner]:radio").change(function () {
        var data = $(this).val();
        if (data == 1) {
          $('#menuimage').show();
          $('#menuvideo').hide();
          $('#menuvideothumbnail').hide();
        } else {
          $('#menuvideo').show();
          $('#menuvideothumbnail').show();
          $('#menuimage').hide();
        }
      });
      });
  </script>
@endsection
