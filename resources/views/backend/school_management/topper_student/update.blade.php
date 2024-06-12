<div class="br-section-wrapper data-update">
    <h6 class="br-section-label text-center mb-4">Update Topper Student Info</h6>
    {{-- validate start --}}
    <div id="update_errors"></div>
    {{-- validate End --}}
  
    <!----- Start Add Category Form input ------->
    <div class="col-xl-12 mx-auto">
      <div class="form-layout form-layout-4 py-5">
        <form id="data-form-update" action="{{ route('admin.topper_student.update', $topper->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-sm-4">
              <label class="form-control-label">Student ID: </label>
              <div class="mg-t-10 mg-sm-t-0">
                <input type="number" id="student-id-input-edit" name="" value="{{ @$topper->student->student_id_number }}" class="form-control" />
              </div>
            </div>
            <div class="col-sm-4">
              <label class="form-control-label">Examination Name: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select id="examination-select-edit" name="examination_id" class="form-control form-select" required>
                  <option value=""> Select Examination</option>
                  @foreach ($examinations as $examination)
                  <option @if ($examination->id == $topper->examination_id) selected @endif value="{{ $examination->id }}">
                    {{ $examination->name }} ({{ @$examination->session->start_year }}-{{ @$examination->session->end_year }})
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <label class="form-control-label">Academic Year: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select name="academic_year_id" class="form-control form-select" required>
                  <option value=""> Select Academic Year</option>
                  @foreach ($academic_years as $academic_year)
                  <option @if ($academic_year->id == $topper->academic_year_id) selected @endif value="{{ $academic_year->id }}">
                    {{ $academic_year->year }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-4 mt-3">
              <label class="form-control-label">Class: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select id="class-select-edit" name="class_id" class="form-control form-select" required>
                  <option value=""> Select Class</option>
                  @foreach ($classes as $class)
                  <option @if ($class->id == $topper->class_id) selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-4 mt-3">
              <label class="form-control-label">Section: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select id="section-select-edit" name="section_id" class="form-control form-select">
                  <option value="">Select Section</option>
                  @foreach ($sections as $section)
                  <option @if ($section->id == $topper->section_id) selected @endif value="{{ $section->id }}" data-class-id="{{ $section->class_id }}">{{ $section->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-4 mt-3">
              <label class="form-control-label">Group: </label>
              <div class="mg-t-10 mg-sm-t-0">
                <select id="group-select-edit" name="group_id" class="form-control form-select">
                  <option value=""> Select Group</option>
                  @foreach ($groups as $group)
                  <option @if ($group->id == $topper->group_id) selected @endif value="{{ $group->id }}" data-class-id="{{ $group->class_id }}">{{ $group->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-4 mt-3">
              <label class="form-control-label">Student Name: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select id="student-select-edit" name="student_id" class="form-control form-select">
                  <option value=""> Select Student</option>
                  @foreach ($students as $student)
                  <option @if ($student->id == $topper->student_id) selected @endif value="{{ $student->id }}" data-class-id="{{ $student->class_id }}" data-group-id="{{ $student->group_id }}" data-section-id="{{ $student->section_id }}" data-student-id-number="{{ $student->student_id_number }}">
                    {{ $student->student_name }} - ({{ $student->class->name }} - Roll {{ $student->roll_number }})
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-4 mt-3">
              <label class="form-control-label">GPA: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <input name="result" type="text" value="{{ $topper->result }}" class="form-control" required/>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <label class="form-control-label">Details: </label>
              <div class="mg-t-10 mg-sm-t-0">
                <textarea name="details" type="text" class="form-control">{{ $topper->details }}</textarea>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
              <a href="javascript:void(0);" type="button" class="btn-cancel btn btn-secondary text-white mr-2">Cancel</a>
              <button type="submit" class="btn btn-info btn-update">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  