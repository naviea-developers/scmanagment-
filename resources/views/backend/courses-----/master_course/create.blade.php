@section('title')
    Admin - Add New Master Course

@endsection

@extends('Backend.layouts.layouts')
@section('style')
<style>
    .select2-selection__rendered {
    line-height: 40px !important;
}
.select2-container .select2-selection--single {
    height: 45px !important;
}
.select2-selection__arrow {
    height: 44px !important;
}
form label{
    color: #111;
    font-weight: 500;
}
</style>
@endsection
@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.master_course.index')}}"> <i class="icon ion-reply text-22"></i> All Master Course</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Master Course</h6>
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif

            {{-- validate start  --}}
            @if(session()->has('error_message'))
            <div class="alert alert-danger">{{ session()->get('error_message') }}</div>
            @endif
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            {{-- validate End  --}}
            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4">

                    <form action="{{ route('admin.master_course.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="row align-items-end">
                            <div class="col-sm-4">
                                <label class="form-control-label">Course Image: <span class="tx-danger">*</span></label>
                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                        <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                    </div>
                            </div>
                        </div> --}}

                        <div class="row mt-4">
                         

                                <div class="col-sm-12">
                                    <label class="form-control-label"><b>Course Name</b><span class="tx-danger">*</span></label>
                                    <div class="mg-t-10 mg-sm-t-0">
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Course Name">
                                    </div>
                                </div>
                         
                            <div class="col-sm-6 mt-4">
                                <label class="form-control-label"><b>Category</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="cat"  class="form-control" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-sm-4">
                                <label class="form-control-label"><b>Sub Category</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="subCat"  class="form-control" name="sub_category_id">
                                        <option value="">------ Select Sub category ------</option>
                                    </select>
                                </div>
                            </div> --}}

                             <div class="col-sm-6 mt-4">
                                <label class="form-control-label">Teacher Name: <span class="tx-danger">*</span></label>
                                <select  class="form-control" name="teacher_id" required>
                                    <option value="">Select Course</option>
                                    @foreach ($teachers as $teacher)
                                    <option  value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-sm-12 mt-4">
                                <label class="form-control-label"><b>Trailer Video URL</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="trailer_video_url" value="{{ old('trailer_video_url') }}" class="form-control" placeholder="Enter Trailer Video URL">
                                </div>
                            </div>

                        </div>


                        
                     <br>
                        
                   

                    {{-- Course Contents Start--}}
                    <div class="row mt-4">
                    <div class="col-sm-12">
                        <label class="form-control-label"><b>Course lessons:</b></label>
                        <div class="mg-t-10 mg-sm-t-0 add-data-content">
                            <div class="d-flex align-items-center mt-2">

                                <div class="d-flex align-items-center select-add-section p-2" style="width: 50%;">
                                <input type="text" name="conten_name[]" value="{{ old('conten_name') }}" class="ml-2 form-control" placeholder="Course lesson Name">
                            </div>
                                <div class="d-flex align-items-center select-add-section p-2" style="width: 50%;">
                                <input type="text" name="conten_url[]" value="{{ old('conten_url') }}" class="ml-2 form-control" placeholder="Course URL">
                            </div>

                            {{-- <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 110px;">
                                <img class="display-upload-img" style="width: 110px;height: 60px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                    <input type="file" name="conten_image[]" value="{{ old('conten_image') }}" class="form-control upload-img" placeholder="Enter Activity Image"
                                    style="position: absolute;top: 0;opacity: 0;height: 100%;">
                            </div> --}}

                            <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                            </div>

                        </div>

                    </div>

                    </div><!-- row -->
                    {{-- Course Contents End--}}


                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Course About </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <textarea id="summernote" name="about">{{ old('about') }}</textarea>
                            </div>
                        </div>
                    </div>




                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.master_course.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Close</a>
                            <button type="submit" class="btn btn-info ">Save</button>
                          </div>
                        </div>
                    </form>

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->







@endsection

@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

var lesson =1;
    $(document).on('click','.plus-btn-data-detail',function(){
        let out = '<div class="row mt-3">'+
'                                            <label class="col-sm-3 form-control-label"> </label>'+
'                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">'+
'                                                <div class="d-flex align-items-center ">'+
'                                                    <input  value="" type="text" name="lesson_names[0][]" class="form-control" placeholder="Enter Lesson Names">'+
''+
'                                                    <div class="col-sm-3">'+
'                                                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 100px;">'+
'                                                            <img class="display-upload-img" style="width: 100px;height: 70px;" src="{{ asset("public/frontend/images/no-video.jpg")}}" alt="">'+
'                                                            <input type="file" name="lesson_videos[0][]" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
'                                                        </div>'+
'                                                    </div>'+
'                                                    <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                                </div>'+
'                                            </div>'+
'                                        </div>';


       $(this).parent().parent().parent().parent().prepend(out);
    });

    $(document).on('click','.minus-btn-data',function(){
        $(this).parent().parent().parent().remove();
    });





    $('#plus-btn-data-tagline').on('click',function(){

        var myvar = '<div class="d-flex mt-3">'+
'                                <div class="" style="border: 1px solid;padding:10px;width: 97%;">'+
'                                    <div class="row mt-3">'+
''+
'                                        <div class="col-sm-9">'+
'                                            <input  value="" type="text" name="capter_name[]" class="form-control" placeholder="Enter Capter Name">'+
'                                        </div>'+
'                                        <hr style="width:95%;">'+
'                                    </div>'+
''+
'                                    <div class="show-add-list-data">'+
'                                        <div class="row mt-3">'+
'                                            <label class="col-sm-3 form-control-label"> </label>'+
'                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">'+
'                                                <div class="d-flex align-items-center ">'+
'                                                    <input  value="" type="text" name="lesson_names['+lesson+'][]" class="form-control" placeholder="Enter Lesson Names">'+
''+
'                                                    <div class="col-sm-3">'+
'                                                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 100px;">'+
'                                                            <img class="display-upload-img" style="width: 100px;height: 70px;" src="{{ asset("public/frontend/images/no-video.jpg")}}" alt="">'+
'                                                            <input type="file" name="lesson_videos['+lesson+'][]" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
'                                                        </div>'+
'                                                    </div>'+
'                                                    <a tag_id="0" href="javascript:void(0)" class="plus-btn-data-detail plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>'+
'                                                </div>'+
'                                            </div>'+
'                                        </div>'+
'                                    </div>'+
''+
'                                </div>'+
'                               <a href="javascript:void(0)" class="minus-btn-data-tagline px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                            </div>';


        $('.show-add-tagline-data').prepend(myvar);
        lesson++;
        $(this).focus();
    });
    $(document).on('click','.minus-btn-data-tagline',function(){
        $(this).parent().remove();
    });

// Topics for this course Start
// var tagline =1;
//     $(document).on('click','.plus-btn-data-detail',function(){

//         let out = '<div class="row mt-3">'+
// '                                            <label class="col-sm-3 form-control-label"> </label>'+
// '                                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">'+
// '                                                <div class="d-flex align-items-center ">'+
// '                                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 100px;">'+
// '                                                        <img class="display-upload-img" style="width: 100px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">'+
// '                                                        <input type="file" name="lesson_video[0][]" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
// '                                                    </div>'+
// '                                                    <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
// '                                                </div>'+
// '                                            </div>'+
// '                                        </div>';

//        $(this).parent().parent().parent().parent().prepend(out);
//     });

//     $(document).on('click','.minus-btn-data',function(){
//         $(this).parent().parent().parent().remove();
//     });





//     $('#plus-btn-data-tagline').on('click',function(){


//         var myvar = '<div class="d-flex mt-3">'+
// '                                <div class="" style="border: 1px solid;padding:10px;width: 97%;">'+
// '                                    <div class="row mt-3">                                   '+
// '                                        <div class="col-sm-8">'+
// '                                            <input  value="" type="text" name="lesson_name[]" class="form-control" placeholder="Enter Lesson Name">'+
// '                                        </div>'+
// '                                        <div class="col-sm-4">'+
// '                                            <input  value="" type="number" name="lesson_number[]" class="form-control" placeholder="Enter Lesson Number">'+
// '                                        </div>'+
// '                                        <hr style="width:95%;">'+
// '                                    </div>'+
// ''+
// '                                    <div class="show-add-list-data">'+
// '                                        <div class="row mt-3">'+
// '                                            <label class="col-sm-3 form-control-label"> </label>'+
// '                                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">'+
// '                                                <div class="d-flex align-items-center ">'+
// '                                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 100px;">'+
// '                                                        <img class="display-upload-img" style="width: 100px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">'+
// '                                                        <input type="file" name="lesson_video['+tagline+'][]" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
// '                                                    </div>'+
// '                                                    <a tag_id="'+tagline+'" href="javascript:void(0)" class="plus-btn-data-detail plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>'+
// '                                                </div>'+
// '                                            </div>'+
// '                                        </div>'+
// '                                    </div>'+
// ''+
// '                                </div>'+
// '                                <a href="javascript:void(0)" class="minus-btn-data-tagline px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
// '                            </div>';

//         $('.show-add-tagline-data').prepend(myvar);
//         tagline++;
//         $(this).focus();
//     });
//     $(document).on('click','.minus-btn-data-tagline',function(){
//         $(this).parent().remove();
//     });

// Topics for this course End







//Course Pre Requisites start
$(document).ready(function() {
        $('#plus-btn-data').on('click',function(){

            var myvar = '<div class="d-flex align-items-center mt-2">'+
'                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">'+
'                                       <input type="text" name="requisites[]" class="ml-2 form-control" placeholder="Enter Pre Requisites">'+
''+
''+
'                                    </div>'+
''+
'                                      <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';



        $('.add-data').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-data',function(){
            $(this).parent().remove();
        });

    });

    //Course Pre Requisites End


    //Course What Will I Learn start
$(document).ready(function() {
        $('#plus-btn-data-learn').on('click',function(){

            var myvar = '<div class="d-flex align-items-center mt-2">'+
'                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">'+
'                                       <input type="text" name="course_learn[]" class="ml-2 form-control" placeholder="Enter Course Learn">'+
''+
''+
'                                    </div>'+
''+
'                                      <a href="javascript:void(0)" class="minus-btn-data-learn px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';



        $('.add-data-learn').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-data-learn',function(){
            $(this).parent().remove();
        });

    });

    //Course What Will I Learn End


// Course Learner Career Outcomes start
$(document).ready(function() {
        $('#plus-btn-data-outcome').on('click',function(){

            var myvar = '<div class="d-flex align-items-center mt-2">'+
'                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">'+
'                                       <input type="text" name="course_outcome[]" class="ml-2 form-control" placeholder="Enter Course outcome">'+
''+
''+
'                                    </div>'+
''+
'                                      <a href="javascript:void(0)" class="minus-btn-data-outcome px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';



        $('.add-data-outcome').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-data-outcome',function(){
            $(this).parent().remove();
        });

    });

    // Course Learner Career Outcomes  End


    // Course Skills you will gain start  start
$(document).ready(function() {
        $('#plus-btn-data-skill').on('click',function(){

            var myvar = '<div class="d-flex align-items-center mt-2">'+
'                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">'+
'                                       <input type="text" name="course_skill[]" class="ml-2 form-control" placeholder="Enter Course skill">'+
''+
''+
'                                    </div>'+
''+
'                                      <a href="javascript:void(0)" class="minus-btn-data-skill px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';



        $('.add-data-skill').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-data-skill',function(){
            $(this).parent().remove();
        });

    });

    // Course Skills you will gain start   End



//Course Contents start
    $(document).ready(function() {
        $(document).on('click','#plus-btn-data-content',function(){



var myvar = '<div class="d-flex align-items-center mt-2">'+
''+
'                                     <div class="d-flex align-items-center select-add-section p-2" style="width: 50%;">'+
'                                        <input type="text" name="conten_name[]" class="ml-2 form-control" placeholder="Course lesson Name">'+
'                                    </div>'+
'                                     <div class="d-flex align-items-center select-add-section p-2" style="width: 50%;">'+
'                                        <input type="text" name="conten_url[]" class="ml-2 form-control" placeholder="Course URL">'+
'                                    </div>'+
''+
// '                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 110px;">'+
// '                                        <img class="display-upload-img" style="width: 110px;height: 60px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">'+
// '                                            <input type="file" name="conten_image[]" class="form-control upload-img" placeholder="Enter Vontent Image"'+
// '                                            style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
// '                                    </div>'+
''+
'                                   <a href="javascript:void(0)" class="minus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';


$('.add-data-content').prepend(myvar);
            //console.log();
        });

        $(document).on('click','.minus-btn-data-content',function(){
            $(this).parent().remove();
        });


    });

//Course Contents start

</script>

















@endsection
