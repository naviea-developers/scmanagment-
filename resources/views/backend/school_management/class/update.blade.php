
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Class Info</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-7 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.class.update', $class->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <label class="col-sm-3 form-control-label">Image: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                            <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ @$class->image_show }}" alt="">
                            <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                        </div>
                </div>
             </div><!-- row -->

              <div class="row">
                  <div class="col-sm-12 mt-3">
                      <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
                      <div class="mg-t-10 mg-sm-t-0">
                      <input type="text" name="name" class="form-control" placeholder="Enter Class Name" value="{{ @$class->name }}" required>
                  </div>
                  </div>
                 
              </div>

              <div class="row">
                  <div class="col-sm-12 mt-3">
                      <label class="form-control-label">Class Teacher Name: <span class="tx-danger">*</span></label>
                      <div class="mg-t-10 mg-sm-t-0">
                        <select name="class_teacher_id" class="form-control">
                          <option value=""> Select Teacher</option>
                          @foreach ($teachers as $teacher)
                          <option @if ($teacher->id == $class->class_teacher_id) Selected @endif value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
              </div>

              <div class="row mt-4">
                <div class="col-sm-12">
                    <label class="form-control-label"><b>Class Details </b><span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <textarea id="summernote" name="details">{{ @$class->details }}</textarea>
                    </div>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-sm-12">
                    <label class="form-control-label"><b>School Guardian Policy </b><span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <textarea id="summernote_two" name="gargent_policy">{{ @$class->gargent_policy }}</textarea>
                    </div>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-sm-12">
                    <label class="form-control-label"><b>Daily Class Video Details </b><span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <textarea id="summernote_three" name="daily_class_details">{{ @$class->daily_class_details }}</textarea>
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
        




















