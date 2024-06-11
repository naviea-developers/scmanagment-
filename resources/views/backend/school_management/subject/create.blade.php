
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Bulding</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-7 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.subject.store') }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="col-sm-4" >
                <label class="form-control-label">Subject Image: <span class="tx-danger">*</span></label>
                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg") }}" alt="">
                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 mt-3">
              <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select name="class_id" class="form-control" id="class">
                  <option value=""> Select Class</option>
                  @foreach ($classes as $class)
                  <option value="{{ $class->id }}">{{ $class->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

        
            <div class="col-sm-12 mt-3">
                <label class="form-control-label">Subject Name: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <input type="text" name="name" class="form-control" placeholder="Enter Subject Name" value="{{ old('name') }}" required>
                </div>
            </div>




            <div class="col-sm-12 mt-3">
              <label class="form-control-label">Group Name: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select name="group_id" class="form-control" id="group">
                  <option value=""> Select Group</option>
                  {{-- @foreach ($groups as $group)
                  <option value="{{ $group->id }}">{{ $group->name }}</option>
                  @endforeach --}}
                </select>
              </div>
            </div>
              
              
          </div>


          <div class="row mt-3">
            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
              <a href="javascript:void(0);" type="button" class="btn btn-secondary text-white mr-2 btn-cancel" >Cancel</a>
              <button type="submit" class="btn btn-info btn-create">Save</button>
            </div>
          </div>
      </form>

    </div>
  </div>
</div>
       