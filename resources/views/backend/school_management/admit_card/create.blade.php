@section('title')
    Admin - Add New Admit Card
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.admit.index')}}"> <i class="icon ion-reply text-22"></i> All Admit Cards</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Make Admit Card</h6>
               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-7 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.admit.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="row">
                            <div class="col-sm-4" >
                                <label class="form-control-label">room Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg") }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>

                        </div> --}}
						<div class="col-sm-12 mt-3">
							<label class="form-control-label">Student ID: </label>
							<div class="mg-t-10 mg-sm-t-0">
								<input type="number" id="student-id-input" name="" class="form-control"/>
							</div>
						</div>
						
						<div class="col-sm-12 mt-3">
							<label class="form-control-label">Class: <span class="tx-danger">*</span></label>
							<div class="mg-t-10 mg-sm-t-0">
								<select id="class-select" name="class_id" class="form-control form-select">
									<option value=""> Select Class</option>
									@foreach ($classes as $class)
										<option value="{{ $class->id }}">{{ $class->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="col-sm-12 mt-3">
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
						
						<div class="col-sm-12 mt-3">
							<label class="form-control-label">Student Name: <span class="tx-danger">*</span></label>
							<div class="mg-t-10 mg-sm-t-0">
								<select id="student-select" name="student_id" class="form-control form-select">
									<option value=""> Select Student</option>
									@foreach ($students as $student)
										<option value="{{ $student->id }}" data-class-id="{{ $student->class_id }}" data-group-id="{{ $student->group_id }}" data-student-id-number="{{ $student->student_id_number }}">
											{{ $student->student_name }} - ({{ $student->class->name }} - Roll {{ $student->roll_number }})
										</option>
									@endforeach
								</select>
							</div>
						</div>
                        

                     
						{{-- <div class="col-sm-12 mt-3">
							<label class="form-control-label">Room Name: <span class="tx-danger">*</span></label>
							<div class="mg-t-10 mg-sm-t-0">
								<input type="text" name="name" class="form-control" placeholder="Enter Room Name" value="{{ old('name') }}" required>
							</div>
						</div> --}}


                           
                        </div>

                        
                        

                        </div>




                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.room.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
            
            // Filter groups based on the selected class
            filterGroupsByClass(classId);
            
            // Filter students based on the selected class and group
            filterStudents();
        });

        $('#group-select').on('change', function() {
            // Filter students based on the selected class and group
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
            
            // Reset the group select value
            $('#group-select').val('');
        }

        function filterStudents() {
            var classId = $('#class-select').val();
            var groupId = $('#group-select').val();
            
            $('#student-select option').each(function() {
                var studentClassId = $(this).data('class-id');
                var studentGroupId = $(this).data('group-id');
                
                if ((classId == "" || studentClassId == classId) && (groupId == "" || studentGroupId == groupId)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Reset the student select value
            $('#student-select').val('');
        }

        function updateSelectionsByStudentIdNumber(studentIdNumber) {
            $('#student-select option').each(function() {
                if ($(this).data('student-id-number') == studentIdNumber) {
                    var classId = $(this).data('class-id');
                    var groupId = $(this).data('group-id');
                    $('#class-select').val(classId).trigger('change');
                    $('#group-select').val(groupId).trigger('change');
                    $('#student-select').val($(this).val());
                    return false; // Break the loop once the student is found
                }
            });
        }
    });
</script>
@endsection