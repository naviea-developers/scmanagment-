
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Syllabus Info</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-12 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-update" action="{{ route('admin.syllabus.update', $syllabus->id) }}" method="post" enctype="multipart/form-data">
          @csrf


        <div class="row">
          <div class="col-sm-6 mt-3">
            <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
            <div class="mg-t-10 mg-sm-t-0">
              <select name="class_id" class="form-control" id="class">
                <option value=""> Select Class</option>
                @foreach ($classes as $class)
                <option @if ($class->id == $syllabus->class_id) Selected @endif  value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
              </select>
            </div>
          </div>


          <div class="col-sm-6 mt-3">
            <label class="form-control-label">Subject Name: <span class="tx-danger">*</span></label>
            <div class="mg-t-10 mg-sm-t-0">
              <select name="subject_id" class="form-control" id="subject">
                <option value=""> Select Subject</option>
                @foreach ($subjects as $subject)
                <option @if ($subject->id == $syllabus->subject_id) Selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-sm-6 mt-3">
            <label class="form-control-label">Lession Name: <span class="tx-danger">*</span></label>
            <div class="mg-t-10 mg-sm-t-0">
              <select name="lession_id" class="form-control" id="lession">
                <option value=""> Select Lession</option>
                @foreach ($lessionses as $lession)
                <option @if ($lession->id == $syllabus->lession_id) Selected @endif value="{{ $lession->id }}">{{ $lession->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-sm-6 mt-3">
            <label class="form-control-label">Lession Name: <span class="tx-danger">*</span></label>
            <div class="mg-t-10 mg-sm-t-0">
              <select name="examination_id" class="form-control" >
                <option value=""> Select Examination</option>
                @foreach ($examinations as $examination)
                <option @if ($examination->id == $syllabus->examination_id) Selected @endif value="{{ $examination->id }}">{{ $examination->name }}</option>
                @endforeach
              </select>
            </div>
          </div>


          <div class="col-sm-12 mt-3">
            <label class="form-control-label">lession Details: <span class="tx-danger">*</span></label>
            <div class="mg-t-10 mg-sm-t-0">
            <textarea type="text" id="summernote_two" name="lession_item" class="form-control">{{ $syllabus->lession_item }}</textarea>
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
       