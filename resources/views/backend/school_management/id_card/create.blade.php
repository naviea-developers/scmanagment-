@section('title')
    Admin - Make ID Card
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')


<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Make ID Card</h6>
            
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

                    <form action="{{ route('admin.id_card.show') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-4 ">
                                <label class="form-control-label">Student ID: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" id="student-id-input" name="" class="form-control" />
                                </div>
                            </div>

                            <div class="col-sm-4">
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

                            <div class="col-sm-4">
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
                                <label class="form-control-label">Group: <span class="tx-danger">*</span></label>
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
                            {{-- <div class="col-sm-4 mt-3">
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
                            </div> --}}

                        </div>

                </div>

            </div>

            <div class="row mt-3">
                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                    <button type="submit" class="btn btn-info ">Make ID Card</button>
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
