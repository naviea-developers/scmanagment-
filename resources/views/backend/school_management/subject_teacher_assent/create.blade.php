
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Subject Teacher Assent</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-7 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.subject_teacher_assent.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-12 mt-3">
              <label class="form-control-label">Class Teacher Name: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select style="width: 458px;" name="teacher_id" class="form-control form-select select2">
                  <option value=""> Select Teacher</option>
                  @foreach ($teachers as $teacher)
                  <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mt-3">
                <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select style="width: 458px;" name="class_id" id="class" class="form-control form-select select2">
                    <option value=""> Select Class</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
         </div>

          <div class="row">
            <div class="col-sm-12 mt-3">
                <label class="form-control-label">Select Subject : <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select style="width: 458px;" name="subject_id" id="subject" class="form-control form-select select2">
                    <option value="">Select Subject</option>
                    {{-- @foreach ($subjectName as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach --}}
                </select>
                </div>
              </div>
          </div>

         <div class="row">
            <div class="col-sm-12 mt-3">
                <label class="form-control-label">Sections Name: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select style="width: 458px;" name="section_id"  id="section" class="form-control form-select select2">
                    <option value=""> Select Class</option>
                    {{-- @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach --}}
                  </select>
                </div>
              </div>
         </div>


         <div class="row">
          <div class="col-sm-12 mt-3">
              <label class="form-control-label">Session Name: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select style="width: 458px;" name="session_id" class="form-control form-select select2">
                  <option value=""> Select Session</option>
                  @foreach ($sessions as $session)
                  <option @if ($session->is_current == '1') Selected @endif value="{{ $session->id }}">{{ @$session->start_year }} - {{ @$session->end_year }}</option>
                  @endforeach
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

    </div><!-- form-layout -->
  </div><!-- col-6 -->

</div><!-- br-section-wrapper -->
     
