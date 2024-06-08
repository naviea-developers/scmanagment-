@section('title')
    Admin - Edit Topper
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')


<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>            
            <a class="breadcrumb-item" href="{{route('admin.topper_student.index')}}"> <i class="icon ion-reply text-22"></i> All Toppers</a>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Edit Topper Info</h6>
            
            {{-- validate start  --}}
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.topper_student.update', $topper->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-4 ">
                                <label class="form-control-label">Student ID: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" id="student-id-input" name="" value="{{ @$topper->student->student_id_number }}" class="form-control" />
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label">Examination Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="" name="examination_id" class="form-control form-select" required>
                                        <option value=""> Select Examination</option>
                                        @foreach ($examinations as $examination)
                                        <option @if ($examination->id == $topper->examination_id) Selected @endif value="{{ $examination->id }}"> {{ $examination->name }} ({{ @$examination->session->start_year }}-{{ @$examination->session->end_year }})
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
                                        <option @if ($academic_year->id == $topper->academic_year_id) Selected @endif value="{{ $academic_year->id }}">{{ $academic_year->year }}</option>
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
                                        <option @if ($class->id == $topper->class_id) Selected @endif  value="{{ $class->id }}">{{ $class->name }}</option>
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
                                        <option @if ($section->id == $topper->section_id) Selected @endif value="{{ $section->id }}" data-class-id="{{ $section->class_id }}">{{ $section->name }}</option>
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
                                        <option @if ($group->id == $topper->group_id) Selected @endif value="{{ $group->id }}" data-class-id="{{ $group->class_id }}">{{ $group->name }}</option>
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
                                        <option @if ($student->id == $topper->student_id) Selected @endif value="{{ $student->id }}" data-class-id="{{ $student->class_id }}" data-group-id="{{ $student->group_id }}" data-section-id="{{ $student->section_id }}" data-student-id-number="{{ $student->student_id_number }}">
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

                </div>

            </div>

            <div class="row mt-3">
                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                  <a href="{{route('admin.topper_student.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                  <button type="submit" class="btn btn-info ">Save</button>
                </div>
              </div>
            </form>

        </div><!-- form-layout -->
    </div><!-- col-6 -->
    <!----- Start Add Category Form input ------->
</div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#class-select').on('change', function() {
            var classId = $(this).val();
            filterSectionsByClass(classId);
            filterGroupsByClass(classId);
            filterStudents();
        });

        $('#group-select').on('change', function() {
            filterStudents();
        });

        $('#section-select').on('change', function() {
            filterStudents();
        });

        $('#student-id-input').on('input', function() {
            var studentIdNumber = $(this).val();
            updateSelectionsByStudentIdNumber(studentIdNumber);
        });

        function filterGroupsByClass(classId) {
            $('#group-select option').each(function() {
                var groupClassId = $(this).data('class-id');
                if (groupClassId == classId || $(this).val() == "") {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $('#group-select').val('');
        }

        function filterSectionsByClass(classId) {
            $('#section-select option').each(function() {
                var sectionClassId = $(this).data('class-id');
                if (sectionClassId == classId || $(this).val() == "") {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $('#section-select').val('');
        }

        function filterStudents() {
            var classId = $('#class-select').val();
            var groupId = $('#group-select').val();
            var sectionId = $('#section-select').val();
            $('#student-select option').each(function() {
                var studentClassId = $(this).data('class-id');
                var studentGroupId = $(this).data('group-id');
                var studentSectionId = $(this).data('section-id');
                if ((classId == "" || studentClassId == classId) && (groupId == "" || studentGroupId == groupId) && (sectionId == "" || studentSectionId == sectionId)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $('#student-select').val('');
        }

        function updateSelectionsByStudentIdNumber(studentIdNumber) {
            $('#student-select option').each(function() {
                if ($(this).data('student-id-number') == studentIdNumber) {
                    var classId = $(this).data('class-id');
                    var groupId = $(this).data('group-id');
                    var sectionId = $(this).data('section-id');
                    $('#class-select').val(classId).trigger('change');
                    $('#group-select').val(groupId).trigger('change');
                    $('#section-select').val(sectionId).trigger('change');
                    $('#student-select').val($(this).val());
                    return false; // Break the loop once the student is found
                }
            });
        }
    });
</script>
@endsection
