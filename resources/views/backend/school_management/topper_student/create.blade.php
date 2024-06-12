
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Topper Student</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-12 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.topper_student.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">


          <div class="col-sm-4 ">
              <label class="form-control-label">Student ID (Search): </label>
              <div class="mg-t-10 mg-sm-t-0">
                  <input type="number" id="student-id-input" name="" class="form-control" />
              </div>
          </div>

          <div class="col-sm-4">
              <label class="form-control-label">Examination Name: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                  <select id="" name="examination_id" class="form-control form-select" required>
                      <option value=""> Select Examination</option>
                      @foreach ($examinations as $examination)
                      <option value="{{ $examination->id }}"> {{ $examination->name }} ({{ @$examination->session->start_year }}-{{ @$examination->session->end_year }})
                      </option>
                      @endforeach
                  </select>
              </div>
          </div>

          <div class="col-sm-4">
              <label class="form-control-label">Academic Year: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                  <select name="academic_year_id" class="form-control form-select" required>
                      <option value=""> Select Class</option>
                      @foreach ($academic_years as $academic_year)
                      <option @if ($academic_year->is_current == 1) Selected @endif value="{{ $academic_year->id }}">{{ $academic_year->year }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <div class="col-sm-4 mt-3">
              <label class="form-control-label">Class: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                  <select id="class-select" name="class_id" class="form-control form-select" required>
                      <option value=""> Select Class</option>
                      @foreach ($classes as $class)
                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <div class="col-sm-4 mt-3">
              <label class="form-control-label">Section: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                  <select id="section-select" name="section_id" class="form-control form-select">
                      <option value="">Select Section</option>
                      @foreach ($sections as $section)
                      <option value="{{ $section->id }}" data-class-id="{{ $section->class_id }}">{{ $section->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <div class="col-sm-4 mt-3">
              <label class="form-control-label">Group: </label>
              <div class="mg-t-10 mg-sm-t-0">
                  <select id="group-select" name="group_id" class="form-control form-select">
                      <option value=""> Select Group</option>
                      @foreach ($groups as $group)
                      <option value="{{ $group->id }}" data-class-id="{{ $group->class_id }}">{{ $group->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <div class="col-sm-4 mt-3">
              <label class="form-control-label">Student Name: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                  <select id="student-select" name="student_id" class="form-control form-select">
                  {{-- <select id="student-select" name="student_id" class="form-control form-select select2"> --}}
                      <option value=""> Select Student</option>
                      @foreach ($students as $student)
                      <option value="{{ $student->id }}" data-class-id="{{ $student->class_id }}" data-group-id="{{ $student->group_id }}" data-section-id="{{ $student->section_id }}" data-student-id-number="{{ $student->student_id_number }}">
                          {{ $student->student_name }} - ({{ $student->class->name }} - Roll {{ $student->roll_number }})
                      </option>
                      @endforeach
                  </select>
              </div>
          </div>

         

          <div class="col-sm-4 mt-3">
              <label class="form-control-label">GPA: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                 <input name="result" type="text" class="form-control" required/>
              </div>
          </div>

          <div class="col-sm-12 mt-3">
              <label class="form-control-label">Details: </label>
              <div class="mg-t-10 mg-sm-t-0">
                 <textarea name="details" type="text" class="form-control"></textarea>
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
     
