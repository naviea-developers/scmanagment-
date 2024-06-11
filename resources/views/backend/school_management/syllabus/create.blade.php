
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Syllabus</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-12 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.syllabus.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
          <div class="col-sm-6 mt-3">
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


          <div class="col-sm-6 mt-3">
            <label class="form-control-label">Subject Name: <span class="tx-danger">*</span></label>
            <div class="mg-t-10 mg-sm-t-0">
              <select name="subject_id" class="form-control" id="subject">
                <option value="">Select Subject</option>
                {{-- @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach --}}
              </select>
            </div>
          </div>


          <div class="col-sm-6 mt-3">
            <label class="form-control-label">Lession Name: <span class="tx-danger">*</span></label>
            <div class="mg-t-10 mg-sm-t-0">
              <select name="lession_id" class="form-control" id="lession">
                <option value="">Select Lession</option>
                {{-- @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach --}}
              </select>
            </div>
          </div>


          <div class="col-sm-6 mt-3">
            <label class="form-control-label">Examination Name: <span class="tx-danger">*</span></label>
            <div class="mg-t-10 mg-sm-t-0">
              <select name="examination_id" class="form-control">
                <option value="">Select Examination</option>
                @foreach ($examinations as $examination)
                <option value="{{ $examination->id }}">{{ $examination->name }} ({{ @$examination->session->start_year }}-{{ @$examination->session->end_year }})</option>
                @endforeach
              </select>
            </div>
          </div>



        
          <div class="col-sm-12 mt-3">
              <label class="form-control-label">Lession Details: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <textarea type="text" name="lession_item" id="summernote" class="form-control" placeholder="Enter lession Item" required></textarea>
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
        
