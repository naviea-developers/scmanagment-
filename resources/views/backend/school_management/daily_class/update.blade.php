
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Daily Class Info</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-12 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.daily_class.update',$daily_class->id) }}" method="post" enctype="multipart/form-data">
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
                        <select class="form-control form-select select2" name="teacher_id">
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
                        <select id="class-edit"  class="form-control form-select select2" name="class_id">
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
                        <select id="section-edit"  class="form-control form-select select2" name="section_id">
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
                        <select id="group-edit"  class="form-control form-select select2" name="group_id">
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
                        <select id="subject-edit"  class="form-control form-select select2" name="subject_id">
                            <option value="">Select subject</option>
                            @foreach ($subjects as $subject)
                            <option @if($subject->id == $daily_class->subject_id)  Selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <label class="form-control-label"><b>Lession Name :</b><span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <select id="lession-edit"  class="form-control form-select select2" name="lession_id">
                            <option value="">Select lession</option>
                            @foreach ($lessions as $lession)
                            <option @if($lession->id == $daily_class->lession_id)  Selected @endif value="{{ $lession->id }}">{{ $lession->name }}</option>
                            @endforeach
                        </select>
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
                    <label for="image">Video</label>
                    <input style="margin-left:28px;" type="radio" id="no" name="sub_banner" value="2" 
                    @if($daily_class->sub_banner==2) checked="checked" @endif >
                    <label for="video">Video Url</label>
                </div>
            </div>

            <div class="row mt-3" id="menuimage" @if($daily_class->sub_banner != '1') style="display: none;" @endif>
                {{-- <label class="form-control-label">Video: <span class="tx-danger">*</span></label> --}}
                {{-- <div class="col-sm-8 mg-t-10">
                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ @$daily_class->video_show }}" alt="">
                        <input type="file" name="video" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                    </div>
                    <input type="file" name="video" value="{{ @$daily_class->video }}" class="form-control">
                </div> --}}
                <div class="d-flex mt-2">
                    <div class="col-sm-8 ">
                      <label class="form-control-label">Video: </label>
                      <div class=" mg-t-10 mg-sm-t-0">
                          <input type="file" name="video" accept="video/*" class="form-control">
                      </div>
                    </div>
                    
                    <div class="col-sm-2 ">
                      <label class="form-control-label"><b>Play:</b></label>
                      <div class="align-items-center select-add-section">
                          <a class="btn btn-primary"  data-toggle="modal" data-target="#audio_content"> &nbsp;<i class="fa fa-solid fa-play" style="color: white"></i></a>
                      </div>
                    </div>
                </div>

                  <div class="modal fade" id="audio_content" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="audioModalLabel">{{ $daily_class->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <!-- Embed your audio here -->
                        <video controls style="width: 100%">
                            <source src="{{ $daily_class->video_show }}" type="video/mp4">
                            Your browser does not support the audio tag.
                        </video>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div><!-- row -->

            

            <div class="row mt-3" id="menuvideo" @if($daily_class->sub_banner != '2') style="display: none;" @endif>
                {{-- <div class="col-sm-4">
                    <label class="form-control-label">Video Thumbnail: <span class="tx-danger">*</span></label>
                    <div class="col-sm-9 mg-t-10">
                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                            <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ @$daily_class->video_thumbnail_show }}" alt="">
                            <input type="file" name="video_thumbnail" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                        </div>
                    </div>
                </div> --}}

                <div class="col-sm-12">
                    <label class="form-control-label">Video Url: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10">
                    <input type="text" name="video_url" value="{{ @$daily_class->video_url }}" class="form-control" placeholder="Enter Video Link">
                     </div>
                </div>

            </div>    

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label class="form-control-label"><b>Details </b><span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <textarea id="summernote_two" name="details">{{ @$daily_class->details }}</textarea>
                    </div>
                </div>
            </div>


             

              <div class="row mt-3">
                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                  <a href="javascript:void(0);" type="button" class="btn-cancel btn btn-secondary text-white mr-2" >Cancel</a>
                  <button type="submit" class="btn btn-info btn-update">Update</button>
                </div>
              </div>
          </form>

      </div><!-- form-layout -->
  </div><!-- col-6 -->
  <!----- Start Add Category Form input ------->
</div><!-- br-section-wrapper -->
        
