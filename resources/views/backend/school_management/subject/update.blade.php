
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Subject Info</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-7 mx-auto">
      <div class="form-layout form-layout-4 py-5">

        <form id="data-form-update" action="{{ route('admin.subject.update', $subject->id) }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row">
              <div class="col-sm-4" >
                  <label class="form-control-label">Subject Image: <span class="tx-danger">*</span></label>
                  <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                      <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $subject->image_show }}" alt="">
                      <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 mt-3">
                <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select name="class_id" class="form-control" id="class-edit">
                    <option value=""> Select Class</option>
                    @foreach ($classes as $class)
                    <option @if ($class->id == $subject->class_id) Selected @endif  value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>


              <div class="col-sm-12 mt-3">
                  <label class="form-control-label">Subject Name: <span class="tx-danger">*</span></label>
                  <div class="mg-t-10 mg-sm-t-0">
                  <input type="text" name="name" class="form-control" placeholder="Enter Subject Name" value="{{ $subject->name }}" required>
                </div>
              </div>
                
            

              <div class="col-sm-12 mt-3">
                <label class="form-control-label">Group Name: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select name="group_id" class="form-control" id="group-edit">
                    <option value=""> Select Group</option>
                    @foreach ($groups as $group)
                    <option @if ($group->id == $subject->group_id) Selected @endif value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                  </select>
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

      </div>
  </div>
</div>
        