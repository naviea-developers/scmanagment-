
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Exams Subject</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-12 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.examclass.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <div class="col-md-3">
              <label for="">Exam title :</label>
              <select name="examination_id" id="" class="form-control form-select select2">
                  <option value="0">Select Exam title</option>
                  @foreach (@$examinations as $examination)
                      <option value="{{ $examination->id }}">{{ $examination->name }}</option>
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

          {{-- <div class="col-md-3">
              <label for="">Group :</label>
              <select name="group_id" id="group" class="form-control form-select select2">
                  <option value="0">Select group</option>
              </select>
          </div> --}}

          <div class="col-md-3">
              <label>Select Subject : </label>
              <select name="subject_id" id="subject" class="form-control form-select select2">
                  <option value="0">Select Subject</option>
                  {{-- @foreach ($subjectName as $subject)
                      <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                  @endforeach --}}
              </select>
          </div>

          <div class="col-md-3">
              <label>Select Exam Types : </label>
              <select name="examtype_id" id=""class="form-control form-select select2">
                  <option value="0">select exam type</option>
                  @foreach ($examTypes as $examType)
                      <option value="{{ $examType->id }}">{{ $examType->name }}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-3 mt-3">
              <label for="">Marke :</label>
              <input type="number" name="marke" class="form-control">
          </div>
          <div class="col-md-3 mt-3">
              <label for="">Pass Marke :</label>
              <input type="number" name="pass_marke" class="form-control">
          </div>
      
          <div class="col-md-3 mt-3">
              <label for="">Date :</label>
              <input type="date" name="date" class="form-control">
          </div>
          <div class="col-md-3 mt-3">
              <label for="">Start Time :</label>
              <input type="time" name="start_time" class="form-control">
          </div>
          <div class="col-md-3 mt-3">
              <label for="">End Time :</label>
              <input type="time" name="end_time" class="form-control">
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
     
