@section('title')
    Admin - Add New University Program

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

.select2-container--default .select2-selection--multiple .select2-selection__choice{
	background-color: #13bbd1!important;
	border: 1px solid #010142!important;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{
	background-color: #6f76db!important;
    color: #070707!important;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
	color: #060505!important;
	border-right:1px solid #010142!important;
}
</style>

@endsection
@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.u_course.index')}}"> <i class="icon ion-reply text-22"></i> All Programs</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New University Course</h6>
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

                    <form action="{{ route('admin.u_course.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Department :</b> <span class="tx-danger">*</span></label>
                                <select  class="form-control" name="department_id" id="department" onchange="showCourseFields()">
                                    <option value="">Select departmend</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Degree :</b> <span class="tx-danger">*</span></label>
                                <select id="degree"  class="form-control" name="degree_id">
                                    <option value="">Select degree</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label"><b>University Name :</b><span class="tx-danger">*</span></label>
                                <select  class="form-control" name="university_id" id="type" onchange="showCourseFields()">
                                    <option  value="">select university</option>
                                    @foreach ($universities as $university)
                                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Program Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="course_name" value="{{ old('name') }}" class="form-control" placeholder="Enter Course Name">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Section :</b> <span class="tx-danger">*</span></label>
                                <select  class="form-control" name="section_id">
                                    <option value="">Select section</option>
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Consultancy fee :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" name="consultancy_fee" value="{{ old('consultancy_fee') }}" class="form-control" placeholder="Enter consultancy fee">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Tuition Fee :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" name="tuition_fee" value="{{ old('tuition_fee') }}" class="form-control" placeholder="Enter tuition fee">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Semester Fee :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" name="semester_fee" value="{{ old('fee') }}" class="form-control" placeholder="Enter Course Fee">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Yearly Fee :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" name="year_fee" value="{{ old('fee') }}" class="form-control" placeholder="Enter Course Fee">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Program Discount :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" name="discount" value="{{ old('discount') }}" class="form-control" placeholder="Enter Course Discount">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Program Discount Type :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select class="form-control" name="discount_type">
                                    <option value="">Select Discount type</option>
                                    <option value="0">Percent(%)</option>
                                    <option value="1">Fixed</option>
                                  </select>
                                </div>
                              </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Program Type :</b> </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select class="form-control" name="course_type">
                                    <option value="">Select Course type</option>
                                    <option value="1">Our Top Picks</option>
                                    <option value="2">Most Popular</option>
                                    <option value="3">Fastest Admissions</option>
                                    <option value="4">Highest Rating</option>
                                    <option value="5">Top Ranked</option>
                                  </select>
                                </div>
                              </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Reference Organization Name :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="organization_name" value="{{ old('organization_name') }}" class="form-control" placeholder="Organization Name">
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Program Duration:</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" name="course_duration" value="{{ old('course_duration') }}" class="form-control" placeholder="Course duration Year">
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Application Start Date:</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="date" name="next_start_date" value="{{ old('next_start_date') }}" class="form-control" placeholder="Course next start date">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Application Deadline:</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="date" name="application_deadline" value="{{ old('application_deadline') }}" class="form-control" placeholder="Course application deadline">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Course Language :</b><span class="tx-danger">*</span></label>
                                <select  class="form-control" name="language_id" id="type" onchange="showCourseFields()">
                                    <option  value="">select Course Language</option>
                                    @foreach ($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            
                        {{-- </div>


                        <div class="row mt-4"> --}}

                            {{-- <div class="col-sm-4 ">
                                <label class="form-control-label"><b>Program Language :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="language" class="form-control multipleSelect2Search Select2 add-no-exists" name="language[]" multiple>
                                        <option value="">Enter Language</option>

                                    </select>
                                </div>
                            </div>  --}}

                            
                            
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Category :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="cat"  class="form-control" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Sub Category :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="subCat"  class="form-control" name="sub_category_id">
                                        <option value="">Select Sub category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Child Category :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="childCat"  class="form-control" name="child_category_id">
                                        <option value="">Select Child category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Pro Child Category :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="proChildCat"  class="form-control" name="pro_child_category_id">
                                        <option value="">Select Pro Child category</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label"><b>Related Programs :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <select class="form-control multipleSelect2Search custom-select" name="relatedcourse_id[]" multiple>
                                    <option value="">Select type</option>
                                    @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>


                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label"><b>Video URL :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="trailer_video_url" placeholder="Enter Youtube Video link"/>
                                </div>
                            </div>

                            {{-- <div class="col-sm-4 mt-3" >
                                <label class="form-control-label">Progtam Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $university->banner_image_show }}" alt="">
                                    <input type="file" name="banner_image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div> --}}

                        </div>

                        {{-- <div class="row mt-4">
                            <div class="col-sm-6">
                                <label class="form-control-label"><b>Related Courses :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <select class="form-control multipleSelect2Search custom-select" name="relatedcourse_id[]" multiple>
                                    <option value="">Select type</option>
                                    @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div> --}}

                        <br>
                        {{-- Topics for this course Start --}}
                        <h4>Topics for this semester course :</h4>
                        <div class="show-add-tagline-data">
                            <div class="d-flex mt-3">
                                <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                    <div class="row mt-3">

                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                <input  value="" type="text" name="semester_name[0]" class="form-control" placeholder="Enter Semester Name">
                                                </div>
                                                <div class="col-sm-6">
                                                <input  value="" type="text" name="duration[0]" class="form-control" placeholder="Enter Semester duration">
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="width:95%;">
                                    </div>

                                    <div class="show-add-list-data">
                                        <div class="row mt-3">
                                            <label class="col-sm-3 form-control-label"> </label>
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                                <div class="d-flex align-items-center ">
                                                    <input  value="" type="text" name="subject_name[0][]" class="form-control mr-2" placeholder="Enter Subject Name">
                                                    <input  value="" type="text" name="credit[0][]" class="form-control mr-2" placeholder="Enter credit ">
                                                    <a tag_id="0" href="javascript:void(0)" class="plus-btn-data-detail plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <a id="plus-btn-data-tagline" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                            </div>



                        </div>
                         {{-- Topics for this course End --}}
                         <br>
                        
                    

                         {{-- Pre resource file start --}}
                         <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label">Program resource files :</label>
                                <div class="mg-t-10 mg-sm-t-0 add-resourcefile">
                                    <div class="d-flex align-items-center mt-2">
                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                        <input type="file" name="resourcefile[]" value="{{ old('resourcefile') }}" class="ml-2 form-control" placeholder="Enter Pre resource files">
                                    </div>
                                    <a id="plus-btn-resourcefile" href="javascript:void(0)" class="plus-btn-resourcefile px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- row -->
                         {{-- Pre resource file End --}}

                      {{-- Pre Requisites start --}}
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label">Pre Requisites :</label>
                                <div class="mg-t-10 mg-sm-t-0 add-data">
                                    <div class="d-flex align-items-center mt-2">
                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                        <input type="text" name="requisites[]" value="{{ old('$requisites') }}"  class="ml-2 form-control" placeholder="Enter Pre Requisites">
                                    </div>
                                    <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- row -->
                      {{-- Pre Requisites End --}}

                       {{-- What Will I Learn start --}}
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label">Course Learn :</label>
                                <div class="mg-t-10 mg-sm-t-0 add-data-learn">
                                    <div class="d-flex align-items-center mt-2">
                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                        <input type="text" name="course_learn[]" value="{{ old('$course_learn') }}" class="ml-2 form-control" placeholder="Enter Course Learn">
                                    </div>
                                    <a id="plus-btn-data-learn" href="javascript:void(0)" class="plus-btn-data-learn px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- row -->
                       {{-- What Will I Learn End --}}


                       {{-- Course Learner Career Outcomes start --}}
                       <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label">Course Learner Career Outcomes :</label>
                            <div class="mg-t-10 mg-sm-t-0 add-data-outcome">
                                <div class="d-flex align-items-center mt-2">
                                 <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                    <input type="text" name="course_outcome[]" value="{{ old('$course_outcome') }}" class="ml-2 form-control" placeholder="Enter Course outcome">
                                </div>
                                <a id="plus-btn-data-outcome" href="javascript:void(0)" class="plus-btn-data-outcome px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                       </div><!-- row -->
                       {{-- Course Learner Career Outcomes  End --}}

                        {{-- Course Skills you will gain start --}}
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label">Skills you will gain:</label>
                                <div class="mg-t-10 mg-sm-t-0 add-data-skill">
                                    <div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                        <input type="text" name="course_skill[]" value="{{ old('$course_skill') }}" class="ml-2 form-control" placeholder="Enter Course skill">
                                    </div>
                                    <a id="plus-btn-data-skill" href="javascript:void(0)" class="plus-btn-data-skill px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- row -->

                   
                    {{-- Course Skills you will gain End --}}


                    {{-- Course Contents End--}}
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Introduction </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <textarea id="summernotefour" name="introduction">{{ old('introduction') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Admission Process </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <textarea id="summernote" name="admission_process">{{ old('admission_process') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Accommodation </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <textarea id="summernote_two" name="accommodation">{{ old('accommodation') }}</textarea>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>About This Program / Overview</b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <textarea id="summernote_three" name="about">{{ old('about') }}</textarea>
                            </div>
                        </div>
                    </div>

                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.u_course.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Close</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>


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
        let url = '{{ url("add-new-select2-language") }}' ;
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
    function showCourseFields() {
      var generalCourseFields = document.getElementById("generalCourseFields");
      var masterCourseFields = document.getElementById("masterCourseFields");
      var selectedValue = document.getElementById("type").value;

      if (selectedValue === "0") {
        generalCourseFields.style.display = "block";
        masterCourseFields.style.display = "none";
      } else {
        generalCourseFields.style.display = "none";
        masterCourseFields.style.display = "block";
      }
    }
  </script>




<script>
var lesson =1;
    $(document).on('click','.plus-btn-data-detail',function(){
        let out = '<div class="row mt-3">'+
'                                            <label class="col-sm-3 form-control-label"> </label>'+
'                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">'+
'                                                <div class="d-flex align-items-center ">'+
'                                                    <input  value="" type="text" name="subject_name['+$(this).attr('tag_id')+'][]" class="form-control mr-2" placeholder="Enter Subject Names">'+
'                                                    <input  value="" type="text" name="credit['+$(this).attr('tag_id')+'][]" class="form-control mr-2" placeholder="Enter credit">'+
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
'                                        <div class="col-sm-12">'+
'                                           <div class="row">'+
'                                             <div class="col-sm-6">'+
'                                                 <input  value="" type="text" name="semester_name['+lesson+']" class="form-control" placeholder="Enter Semester Name">'+
'                                              </div>'+
'                                              <div class="col-sm-6">'+
'                                                <input  value="" type="text" name="duration['+lesson+']" class="form-control" placeholder="Enter Semester duration">'+
'                                              </div>'+
'                                            </div>'+
'                                        </div>'+
'                                        <hr style="width:95%;">'+
'                                    </div>'+
''+
'                                    <div class="show-add-list-data">'+
'                                        <div class="row mt-3">'+
'                                            <label class="col-sm-3 form-control-label"> </label>'+
'                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">'+
'                                                <div class="d-flex align-items-center ">'+
'                                                    <input  value="" type="text" name="subject_name['+lesson+'][]" class="form-control mr-2" placeholder="Enter Subject Names">'+
'                                                    <input  value="" type="text" name="credit['+lesson+'][]" class="form-control mr-2" placeholder="Enter credit">'+
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

// Topics for this course End


//Course resource file start
$(document).ready(function() {
        $('#plus-btn-resourcefile').on('click',function(){

            var myvar = '<div class="d-flex align-items-center mt-2">'+
'                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">'+
'                                       <input type="file" name="resourcefile[]" class="ml-2 form-control" placeholder="Enter Pre Requisites">'+
''+
''+
'                                    </div>'+
''+
'                                      <a href="javascript:void(0)" class="minus-btn-resourcefile px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';



        $('.add-resourcefile').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-resourcefile',function(){
            $(this).parent().remove();
        });

    });

    //Course resource file End

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
'                                      <a href="javascript:void(0)" class="minus-btn-data-requisites px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';



        $('.add-data').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-data-requisites',function(){
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

    $('body').on("change",'#department',function(){
            let id = $(this).val();
            console.log(id);
            getDegree(id,"degree");
        });

        function getDegree(id,outid){
            let url = '{{ url("/get/degree/") }}/' + id;
            axios.get(url)
                .then(res => {
                    console.log(res);
                $('#'+outid).empty();
                    let html = '';
                    html += '<option value="">Select degree</option>'
                    res.data.forEach(element => {
                        html += "<option value=" + element.id + ">" + element.name + "</option>"
                    });


                    $('#'+outid).append(html);
                    $('#'+outid).val("").change();
                });
        }

 <!--- End ajax Sub Category Get Script-------->

</script>



@endsection
