
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update exam Schedule</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-12 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.examschedule.update', $editData->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row mb-3">

                <div class="col-md-3">
                    <label for="">Examination title :</label>
                    <select name="examination_id" id="examination" class="form-control form-select select2">
                        <option value="">Select Exam title</option>
                        @foreach (@$examinations as $examination)
                            <option @if($examination->id == $editData->examination_id)  Selected @endif value="{{ $examination->id }}">{{ $examination->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Select Class : </label>
                    <select name="class_id" id="class_exam" class="form-control form-select select2">
                        <option value="">Select Class</option>
                        @foreach ($className as $class)
                            <option @if($class->id == $editData->class_id)  Selected @endif value="{{ $class->id}}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Exam Subject :</label>
                    <select name="exam_class_id" id="examclassSub" class="form-control form-select select2">
                        <option value="">Select Exam subject</option>
                        @foreach (@$examClasss as $examClass)
                            <option @if($examClass->id == $editData->exam_class_id)  Selected @endif value="{{ $examClass->id }}">{{ @$examClass->subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                {{-- <div class="col-md-3">
                    <label>Sections : </label>
                    <select name="section_id" id="section" class="form-control form-select select2">
                        <option value="">Select section</option>
                        @foreach ($sections as $section)
                            <option @if($section->id == $editData->section_id)  Selected @endif value="{{ $section->id}}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="col-md-3">
                    <label>Select Buldings : </label>
                    <select name="bulding_id" id="bulding"class="form-control form-select select2">
                        <option value="">Select Buldings</option>
                        @foreach ($buldings as $bulding)
                            <option @if($bulding->id == $editData->bulding_id)  Selected @endif value="{{ $bulding->id }}">{{ $bulding->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <label>Select Floors : </label>
                    <select name="floor_id" id="floor" class="form-control form-select select2">
                        <option value="">Select Floors</option>
                        @foreach ($floors as $floor)
                            <option @if($floor->id == $editData->floor_id)  Selected @endif value="{{ $floor->id }}">{{ $floor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <label>Select Rooms : </label>
                    <select name="room_id" id="room"class="form-control form-select select2">
                        <option value="">Select Rooms</option>
                        @foreach ($rooms as $room)
                            <option @if($room->id == $editData->room_id)  Selected @endif value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
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
        
