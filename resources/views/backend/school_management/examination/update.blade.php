
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Examination Info</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-7 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-update" action="{{ route('admin.examination.update', $exam->id) }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="col-sm-12">
                <label class="form-control-label">Examination Name: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                <input type="text" name="name" class="form-control" placeholder="Enter Examination Name" value="{{ $exam->name }}" required>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-sm-12 mt-3">
                <label class="form-control-label">Academic Year: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select name="academin_year_id" class="form-control form-select select2">
                    <option value=""> Select Year</option>
                    @foreach ($academin_years as $y)
                    <option @if ($y->id == $exam->academin_year_id) Selected @endif  value="{{ $y->id }}">{{ $y->year }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-sm-12 mt-3">
                <label class="form-control-label">Session: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select name="session_id" class="form-control form-select select2">
                    <option value=""> Select Session</option>
                    @foreach ($sessions as $session)
                    <option @if ($session->id == $exam->session_id) Selected @endif value="{{ $session->id }}">{{ @$session->start_year }} - {{ @$session->end_year }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
          </div>


          <div class="row">
            <div class="col-sm-12 mt-3">
                <label class="form-control-label">Exam Priority: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select name="exam_priority" class="form-control form-select" required>
                    <option value=""> Select Exam Priority</option>
                    <option @if ($exam->exam_priority == 'main') Selected @endif value="main"> Main Exam</option>
                    <option @if ($exam->exam_priority == 'secondary') Selected @endif value="secondary"> Secondary Exam</option>
                  </select>
                </div>
              </div>
          </div>

          
          <div class="row">
            <div class="col-sm-6 mt-3">
                <label class="form-control-label">Start Date: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                    <input type="date" name="start_date" class="form-control" value="{{ $exam->start_date }}" required>
                </div>
            </div>
  
            <div class="col-sm-6 mt-3">
                <label class="form-control-label">End Date: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                    <input type="date" name="end_date" class="form-control" value="{{ $exam->end_date }}" required>
                </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
              <a href="javascript:void(0);" type="button" class="btn-cancel btn btn-secondary text-white mr-2" >Cancel</a>
              <button type="submit" class="btn btn-info btn-update">Update</button>
            </div>
          </div>
      </form>

    </div>
  </div>
</div>
        