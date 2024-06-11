
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Subject Teacher Assent</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-7 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.subject_teacher_assent.update', $subject_teacher_assent->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-sm-12 mt-3">
                    <label class="form-control-label">Class Teacher Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                      <select name="teacher_id" class="form-control form-select select2">
                        <option value="0"> Select Teacher</option>
                        @foreach ($teachers as $teacher)
                        <option @if ($teacher->id == $subject_teacher_assent->teacher_id) Selected @endif value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-3">
                    <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                      <select name="class_id" class="form-control form-select select2" id="class-edit">
                        <option value="0"> Select Class</option>
                        @foreach ($classes as $class)
                        <option @if ($class->id == $subject_teacher_assent->class_id) Selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
             </div>

             <div class="row">
              <div class="col-sm-12 mt-3">
                  <label class="form-control-label">Select Subject : <span class="tx-danger">*</span></label>
                  <div class="mg-t-10 mg-sm-t-0">
                    <select name="subject_id" id="subject-edit" class="form-control form-select select2">
                      <option value="">Select Subject</option>
                      @foreach ($subjectName as $subject)
                          <option @if ($subject->id == $subject_teacher_assent->subject_id) Selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
            </div>

             <div class="row">
                <div class="col-sm-12 mt-3">
                    <label class="form-control-label">Sections Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                      <select name="section_id" class="form-control form-select select2" id="section-edit">
                        <option value="0"> Select Class</option>
                        @foreach ($sections as $section)
                        <option @if ($section->id == $subject_teacher_assent->section_id) Selected @endif value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
             </div>

             <div class="row">
                <div class="col-sm-12 mt-3">
                    <label class="form-control-label">Session Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                      <select name="session_id" class="form-control form-select select2">
                        <option value="0"> Select Session</option>
                        @foreach ($sessions as $session)
                        <option @if ($session->id == $subject_teacher_assent->session_id) Selected @endif value="{{ $session->id }}">{{ @$session->start_year }} - {{ @$session->end_year }}</option>
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

      </div><!-- form-layout -->
  </div><!-- col-6 -->
  <!----- Start Add Category Form input ------->
</div><!-- br-section-wrapper -->
        


















