
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Class Routine</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-12 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.routine.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <div class="col-md-3">
              <label for="">Session :</label>
              <select name="session_id" id="" class="form-control form-select select2">
                  <option value="0">Select Session</option>
                  @foreach (@$sessions as $session)
                      <option value="{{ $session->id }}">{{ @$session->start_year }} - {{ @$session->end_year }}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-3">
              <label>Select Class : </label>
              <select name="class_id" id="class" class="form-control form-select select2">
                  <option value="0">Select Class</option>
                  @foreach ($className as $class)
                      <option value="{{ $class->id}}">{{ $class->name }}</option>
                  @endforeach
              </select>
          </div>

         
          <div class="col-sm-3">
              <label >Sections Name :</label>
              <select name="section_id"  id="section" class="form-control form-select select2">
              <option value="0"> Select section</option>
              {{-- @foreach ($sections as $section)
              <option value="{{ $section->id }}">{{ $section->name }}</option>
              @endforeach --}}
              </select>
          </div>
       

           <div class="col-md-3">
              <label>Select Subject : </label>
              <select name="subject_id" id="subject" class="form-control form-select select2">
                  <option value="0">Select Subject</option>
                  {{-- @foreach ($subjectName as $subject)
                      <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                  @endforeach --}}
              </select>
          </div>

          <div class="col-md-3 mt-3">
              <label>Select Teacher : </label>
              <select name="teacher_id" id=""class="form-control form-select select2">
                  <option value="0">Select Teacher</option>
                  @foreach ($teachers as $teacher)
                      <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-3 mt-3">
              <label>Select Rooms : </label>
              <select name="room_id" id=""class="form-control form-select select2">
                  <option value="0">Select Rooms</option>
                  @foreach ($rooms as $room)
                      <option value="{{ $room->id }}">{{ $room->name }}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-3 mt-3">
              <label>Select Period : </label>
              <select name="class_duration_id" id=""class="form-control form-select select2">
                  <option value="0">Select period</option>
                  @foreach ($class_durations as $class_duration)
                      <option value="{{ $class_duration->id }}">{{ $class_duration->name }} ({{date('h:i:A',strtotime($class_duration->start_time))}} - {{date('h:i:A',strtotime($class_duration->end_time))}})</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-3 mt-3">
              <label>Select Day : </label>
              <select name="day_id" id=""class="form-control form-select select2">
                  <option value="0">Select Day</option>
                  <option value="1">Saturday</option>
                  <option value="2">Sunday</option>
                  <option value="3">Monday</option>
                  <option value="4">Tuesday</option>
                  <option value="5">Wednesday</option>
                  <option value="6">Thursday</option>
                  <option value="7">Friday</option>
              </select>
          </div>
          
          {{-- <div class="col-md-3 mt-3">
              <label for="">Class Type :</label>
              <select name="class_type" id="" class="form-control form-select">
                  <option value="">Select class type</option>
                  <option value="1">Online</option>
                  <option value="2">Offline</option>
              </select>
          </div> --}}
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
     
