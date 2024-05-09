@section('title')
    Admin - Edit Master Course

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
            <h6 class="br-section-label text-center mb-4"> Edit Master Course</h6>
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4">

                    <form action="{{ route('admin.master_course.update',$course->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-4">

                            <div class="col-sm-12">
                                <label class="form-control-label"><b>Course Name</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="name" value="{{ $course->name }}" class="form-control" placeholder="Enter Course Name">
                                </div>
                            </div>

                            <div class="col-sm-6 mt-4">
                                <label class="form-control-label"><b>Category</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control " name="category_id" id="cat">
                                        <option  value="">Select Category</option>

                                        @foreach ( $categories as $categorie)
                                        <option @if($categorie->id == $course->category_id)  Selected @endif  value="{{ $categorie->id}}" >{{ $categorie->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                           

                            <div class="col-sm-6 mt-4">
                                <label class="form-control-label">Teacher Name: <span class="tx-danger">*</span></label>
                                <select  class="form-control" name="teacher_id" required>
                                    <option value="">Select Course</option>
                                    @foreach ($teachers as $teacher)
                                    <option @if($teacher->id == $course->teacher_id)  Selected @endif value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-sm-12 mt-4">
                                <label class="form-control-label"><b>Trailer Video URL</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="trailer_video_url" value="{{ $course->trailer_video_url }}" class="form-control" placeholder="Enter Trailer Video URL">
                                </div>
                            </div>
                        </div>


                        {{-- <div class="row mt-4"> --}}

                            

                            
                    {{-- Course Skills you will gain End --}}

                    {{-- Course Contents Start--}}
                    <div class="row mt-4">
                    <div class="col-sm-12">
                        <label class="form-control-label">Course Contents:</label>
                        <div class="mg-t-10 mg-sm-t-0 add-data-content">
                            @if($course->coursecontens->count() == 0)
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
                            @else
                            @foreach ($course->coursecontens as $k=>$courseconten)
                            <div class="d-flex align-items-center mt-2">
                                <div class="d-flex align-items-center select-add-section p-2" style="width: 50%;">
                                <input type="text" name="old_conten_name[{{ $courseconten->id }}]" value="{{ $courseconten->name }}" class="ml-2 form-control" placeholder="Course lesson Name">
                                </div>
                                <div class="d-flex align-items-center select-add-section p-2" style="width: 50%;">
                                <input type="text" name="old_conten_url[{{ $courseconten->id }}]" value="{{ $courseconten->conten_url }}" class="ml-2 form-control" placeholder="Course URL">
                                </div>

                            {{-- <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 110px;">
                                <img class="display-upload-img" style="width: 110px;height: 60px;" src="{{ $courseconten->conten_image_show }}" alt="">
                                    <input type="file" name="old_conten_image[{{ $courseconten->id }}]" class="form-control upload-img" placeholder="Enter Activity Image"
                                    style="position: absolute;top: 0;opacity: 0;height: 100%;">
                            </div> --}}
                            @if($k == $course->coursecontens->count() - 1)
                            <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                             @else
                             <a conten_id="{{ $courseconten->id }}" href="javascript:void(0)" class="minus-btn-data-old-conten px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                             @endif


                            </div>
                            @endforeach
                            @endif

                        </div>

                    </div>
                    </div><!-- row -->
                    {{-- Course Contents End--}}


                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Course About </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <textarea id="summernote" name="about">{!! $course->about !!}</textarea>
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
'                                                    <input  value="" type="text" name="lesson_names['+$(this).attr('tag_id')+'][]" class="form-control" placeholder="Enter Lesson Names">'+
''+
'                                                    <div class="col-sm-3">'+
'                                                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 100px;">'+
'                                                            <img class="display-upload-img" style="width: 100px;height: 70px;" src="{{ asset("public/frontend/images/no-video.jpg")}}" alt="">'+
'                                                            <input type="file" name="lesson_videos['+$(this).attr('tag_id')+'][]"  class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
'                                                        </div>'+
'                                                    </div>'+
'                                                    <a href="javascript:void(0)" class="minus-btn-data-lesson-videos px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                                </div>'+
'                                            </div>'+
'                                        </div>';


       $(this).parent().parent().parent().parent().prepend(out);
    });

    $(document).on('click','.minus-btn-data-lesson-videos',function(){
        $(this).parent().parent().parent().remove();
    });

    $(document).on('click','.minus-btn-data-old-lessonvideo',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_courselessonvideo[]" value="'+$(this).attr('courselessonvideo_id')+'">');
            $(this).parent().remove();
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
'                                                    <a tag_id="'+lesson+'" href="javascript:void(0)" class="plus-btn-data-detail plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>'+
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

    $(document).on('click','.minus-btn-data-old-lesson',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_courselesson[]" value="'+$(this).attr('courselesson_id')+'">');
            $(this).parent().remove();
        });


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

        $(document).on('click','.minus-btn-data-old',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_courserequisite[]" value="'+$(this).attr('courserequisite_id')+'">');
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

        $(document).on('click','.minus-btn-data-old-learn',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_learn[]" value="'+$(this).attr('courselearn_id')+'">');
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

        $(document).on('click','.minus-btn-data-old-outcome',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_outcome[]" value="'+$(this).attr('outcome_id')+'">');
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

        $(document).on('click','.minus-btn-data-old-skill',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_skill[]" value="'+$(this).attr('skill_id')+'">');
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

        $(document).on('click','.minus-btn-data-old-conten',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_conten[]" value="'+$(this).attr('conten_id')+'">');
            $(this).parent().remove();
        });


    });

//Course Contents start

</script>
@endsection
