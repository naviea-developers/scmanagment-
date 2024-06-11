
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Exams Schedule</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-12 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.examschedule.store') }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="row mb-3">
      
            <div class="col-md-3">
                <label for="">Examination title :</label>
                <select name="examination_id" id="examination" class="form-control form-select select2">
                    <option value="">Select Exam title</option>
                    @foreach (@$examinations as $examination)
                        <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Select Class : </label>
                <select name="class_id" id="class_exam" class="form-control form-select select2">
                    <option value="">Select Class</option>
                    {{-- @foreach ($className as $class)
                        <option value="{{ $class->id}}">{{ $class->name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <div class="col-md-3">
                <label for="">Exam Subject :</label>
                <select name="exam_class_id" id="examclassSub" class="form-control form-select select2">
                    <option value="">Select Exam subject</option>
                    {{-- @foreach (@$examClasss as $examClass)
                        <option value="{{ $examClass->id }}">{{ @$examClass->subject->name }}</option>
                    @endforeach --}}
                </select>
            </div>
            

            {{-- <div class="col-md-3">
                <label>Sections : </label>
                <select name="section_id" id="section" class="form-control form-select select2">
                    <option value="">Select section</option>
                </select>
            </div> --}}
            

            <div class="col-md-3">
                <label>Select Buldings : </label>
                <select name="bulding_id" id="bulding"class="form-control form-select select2">
                    <option value="">Select Buldings</option>
                    @foreach ($buldings as $bulding)
                        <option value="{{ $bulding->id }}">{{ $bulding->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mt-3">
                <label>Select Floors : </label>
                <select name="floor_id" id="floor" class="form-control form-select select2">
                    <option value="">Select Floors</option>
                    {{-- @foreach ($floors as $floor)
                        <option value="{{ $floor->id }}">{{ $floor->name }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="col-md-3 mt-3">
                <label>Select Rooms : </label>
                <select name="room_id" id="room"class="form-control form-select select2">
                    <option value="">Select Rooms</option>
                    {{-- @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach --}}
                </select>
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
     
