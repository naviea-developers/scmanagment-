
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update exam Subject</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-12 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.examclass.update', $editData->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row mb-3">

                <div class="col-md-3">
                    <label for="">Exam title :</label>
                    <select name="examination_id" id="" class="form-control form-select select2">
                        <option value="0">Select Exam title</option>
                        @foreach (@$examinations as $examination)
                            <option @if($examination->id == $editData->examination_id)  Selected @endif value="{{ $examination->id }}">{{ $examination->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Select Class : </label>
                    <select name="class_id" id="class-edit" class="form-control form-select select2">
                        <option value="0">Select Class</option>
                        @foreach ($className as $class)
                            <option @if($class->id == $editData->class_id)  Selected @endif value="{{ $class->id}}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="col-md-3">
                    <label for="">Group :</label>
                    <select name="group_id" id="group" class="form-control form-select select2">
                        <option value="0">Select group</option>
                        @foreach (@$groups as $group)
                            <option @if($group->id == $editData->group_id)  Selected @endif value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="col-md-3">
                    <label>Select Subject : </label>
                    <select name="subject_id" id="subject-edit" class="form-control form-select select2">
                        <option value="0">Select Subject</option>
                        @foreach ($subjectName as $subject)
                            <option @if($subject->id == $editData->subject_id)  Selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Select Exam Types : </label>
                    <select name="examtype_id" id=""class="form-control form-select select2">
                        <option value="0">select exam type</option>
                        @foreach ($examTypes as $examType)
                            <option @if($examType->id == $editData->examtype_id)  Selected @endif value="{{ $examType->id }}">{{ $examType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="">Marke :</label>
                    <input type="number" value="{{ $editData->marke }}" name="marke" class="form-control">
                </div>
                <div class="col-md-3 mt-3">
                    <label for="">Pass Marke :</label>
                    <input type="number" value="{{ $editData->pass_marke }}" name="pass_marke" class="form-control">
                </div>
            
                <div class="col-md-3 mt-3">
                    <label for="">Date :</label>
                    <input type="date" value="{{ $editData->date }}" name="date" class="form-control">
                </div>
                <div class="col-md-3 mt-3">
                    <label for="">Start Time :</label>
                    <input type="time" value="{{ $editData->start_time }}" name="start_time" class="form-control">
                </div>
                <div class="col-md-3 mt-3">
                    <label for="">End Time :</label>
                    <input type="time" value="{{ $editData->end_time }}" name="end_time" class="form-control">
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
        
