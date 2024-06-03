@extends('user.layouts.master-layout')

@section('title','- edit_daily_class')
@section('head')
<link href="{{asset('public/backend')}}/lib/summernote/summernote-bs4.css" rel="stylesheet">
@endsection
@section('main_content')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel p-4">
    

    <div class="br-pagebody card shadow p-3" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
      <div class="br-section-wrapper">
        <h5 class="br-section-label text-center mb-4"> Edit Daily Class</h5>
         {{-- <p  class="br-section-label text-center mb-1">Add Class Exam For Students</p> --}}
        <hr>

        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @endif

        {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button> --}}
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
        {{-- success message start --}}


        <!----- Start Add Product Form input ------->
        <div class="col-xl-12 mx-auto">
            <div class="form-layout form-layout-4">
                <form action="{{ route('instructor.daily_class.update',$daily_class->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">

                        <div class="col-sm-4">
                            <label class="form-control-label"><b>Title: </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" value="{{ @$daily_class->name }}" class="form-control" placeholder="Enter title" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label class="form-control-label"><b>Teacher Name :</b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select id="cat"  class="form-control form-select select2" name="teacher_id">
                                    <option value="">Select teacher</option>
                                    @foreach ($teachers as $teacher)
                                    <option @if($teacher->id == $daily_class->teacher_id)  Selected @endif value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label class="form-control-label"><b>Class Name :</b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select id="class"  class="form-control form-select select2" name="class_id">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $class)
                                    <option @if($class->id == $daily_class->class_id)  Selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Section Name :</b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select id="section"  class="form-control form-select select2" name="section_id">
                                    <option value="">Select section</option>
                                    @foreach ($sections as $section)
                                    <option @if($section->id == $daily_class->section_id)  Selected @endif value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Group Name :</b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select id="group"  class="form-control form-select select2" name="group_id">
                                    <option value="">Select group</option>
                                    @foreach ($groups as $group)
                                    <option  @if($group->id == $daily_class->group_id)  Selected @endif value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Session Name :</b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select name="session_id" class="form-control form-select select2">
                                    <option value=""> Select Session</option>
                                    @foreach ($sessions as $session)
                                    <option @if($session->id == $daily_class->session_id)  Selected @endif value="{{ $session->id }}">{{ @$session->start_year }} - {{ @$session->end_year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Subject Name :</b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select id="subject"  class="form-control form-select select2" name="subject_id">
                                    <option value="">Select subject</option>
                                    @foreach ($subjects as $subject)
                                    <option @if($subject->id == $daily_class->subject_id)  Selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Lesson: </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="lesson" value="{{ @$daily_class->lesson }}" class="form-control" placeholder="Enter Lesson" required>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Page: </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="page_number" value="{{ @$daily_class->page_number }}" value="{{ old('page_number') }}" class="form-control" placeholder="Enter Page" required>
                            </div>
                        </div>

                    </div>

                    <div class="row" id="menudropdown">
                        <label class="form-control-label"><span class="tx-danger"></span></label>
                        <div class="col-sm-9 mg-t-10">
                            <br>
                            <input type="radio" id="yes" name="sub_banner" value="1" 
                            @if($daily_class->sub_banner==1) checked="checked" @endif >
                            <label for="image">Video Image</label>
                            <input style="margin-left:28px;" type="radio" id="no" name="sub_banner" value="0" 
                            @if($daily_class->sub_banner==0) checked="checked" @endif >
                            <label for="video">Video</label>
                        </div>
                    </div>

                    <div class="row mt-3" id="menuimage" @if($daily_class->sub_banner != '1') style="display: none;" @endif>
                        <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10">
                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ @$daily_class->image_show }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                        </div>
                    </div><!-- row -->

                    <div class="row mt-3" id="menuvideo" @if($daily_class->sub_banner != '0') style="display: none;" @endif>
                        <div class="col-sm-4">
                            <label class="form-control-label">Video Thumbnail: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ @$daily_class->video_thumbnail_show }}" alt="">
                                    <input type="file" name="video_thumbnail" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <label class="form-control-label">Video Url: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10">
                            <input type="text" name="video_url" value="{{ @$daily_class->video_url }}" class="form-control" placeholder="Enter Video Link">
                             </div>
                        </div>

                    </div>    

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Details </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <textarea id="summernote" name="details">{{ @$daily_class->details }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                        <a href="{{route('admin.daily_class.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
<script src="{{asset('public/backend')}}/lib/summernote/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        $('.multipleSelect2Search').select2();
    });
    $(document).ready(function() {
        $('.multipleSelectSearch').select2();
    });
    
</script>

<script>
    $('document').ready(function () {
      $("input[name=sub_banner]:radio").change(function () {
      var data = $(this).val();
      if (data == 1) {
        $('#menuimage').show();
        $('#menuvideo').hide();

      } else {
        $('#menuvideo').show();
        $('#menuimage').hide();
      }
    });
    });
</script>

<!--- Start Summernote Editor Js ---->
<script>

    $(document).ready(function() {
        /*** summernote editor one ***/
        $('#summernote').summernote({
            height: 150
        })
        /*** summernote editor two ***/
        $('#summernote_two').summernote({
            height: 150
        })

        $('#summernote_three').summernote({
            height: 150
        })
        $('#summernote_four').summernote({
            height: 150
        })

    });

    </script>
<!--- End Summernote Editor Js ---->
@endsection
