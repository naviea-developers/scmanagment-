
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Class Routine</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-12 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.routine.update', $editData->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row mb-3">
                <div class="col-md-3">
                    <label for="">Session :</label>
                    <select name="session_id" id="" class="form-control form-select select2">
                        <option value="0">Select Session</option>
                        @foreach (@$sessions as $session)
                            <option @if($session->id == $editData->session_id)  Selected @endif value="{{ $session->id }}">{{ @$session->start_year }} - {{ @$session->end_year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Select Class : </label>
                    <select name="class_id" id="class" class="form-control form-select select2">
                        <option value="0">Select Class</option>
                        @foreach ($className as $class)
                            <option @if($class->id == $editData->class_id)  Selected @endif value="{{ $class->id}}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <label >Sections Name :</label>
                    <select name="section_id"  id="section" class="form-control form-select select2">
                    <option value="0"> Select section</option>
                        @foreach ($sections as $section)
                        <option @if($section->id == $editData->section_id)  Selected @endif value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Select Subject : </label>
                    <select name="subject_id" id="subject" class="form-control form-select select2">
                        <option value="0">Select Subject</option>
                        @foreach ($subjectName as $subject)
                            <option @if($subject->id == $editData->subject_id)  Selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <label>Select Teacher : </label>
                    <select name="teacher_id" id=""class="form-control form-select select2">
                        <option value="0">Select Teacher</option>
                        @foreach ($teachers as $teacher)
                            <option @if($teacher->id == $editData->teacher_id)  Selected @endif value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <label>Select Rooms : </label>
                    <select name="room_id" id=""class="form-control form-select select2">
                        <option value="0">Select Rooms</option>
                        @foreach ($rooms as $room)
                            <option @if($room->id == $editData->room_id)  Selected @endif value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <label>Select Period : </label>
                    <select name="class_duration_id" id=""class="form-control form-select select2">
                        <option value="0">Select period</option>
                        @foreach ($class_durations as $class_duration)
                            <option @if($class_duration->id == $editData->class_duration_id)  Selected @endif value="{{ $class_duration->id }}">{{ $class_duration->name }} ({{date('h:i:A',strtotime($class_duration->start_time))}} - {{date('h:i:A',strtotime($class_duration->end_time))}})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <label>Select Day : </label>
                    <select name="day_id" id=""class="form-control form-select select2">
                        <option value="0">Select Day</option>
                        <option @if($editData->day_id == '1')  Selected @endif value="1">Saturday</option>
                        <option @if($editData->day_id == '2')  Selected @endif value="2">Sunday</option>
                        <option @if($editData->day_id == '3')  Selected @endif value="3">Monday</option>
                        <option @if($editData->day_id == '4')  Selected @endif value="4">Tuesday</option>
                        <option @if($editData->day_id == '5')  Selected @endif value="5">Wednesday</option>
                        <option @if($editData->day_id == '6')  Selected @endif value="6">Thursday</option>
                        <option @if($editData->day_id == '7')  Selected @endif value="7">Friday</option>
                    </select>
                </div>

                {{-- <div class="col-md-4">
                    <label for="">Class Type :</label>
                    <select name="class_type" id="" class="form-select">
                        <option value="">Select class type</option>
                        <option @if($editData->class_type == '1')  Selected @endif value="1">Online</option>
                        <option @if($editData->class_type == '2')  Selected @endif value="2">Offline</option>
                    </select>
                </div> --}}
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
        
