
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Fee</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-7 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.fee_management.store') }}" method="post" enctype="multipart/form-data">
          @csrf

          
          <div class="row">
            <div class="col-sm-12 mt-3">
              <label class="form-control-label">Session: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select name="session_id" class="form-control">
                  <option value=""> Select Session</option>
                  @foreach ($sessions as $session)
                  <option value="{{ $session->id }}">{{ @$session->start_year }} - {{ @$session->end_year }}</option>
                  @endforeach
                </select>
              </div>
            </div>


            <div class="col-sm-12 mt-3">
              <label class="form-control-label">Class: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select name="class_id" class="form-control">
                  <option value=""> Select Class</option>
                  @foreach ($classes as $class)
                  <option value="{{ $class->id }}">{{ $class->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <label class="form-control-label">Fee Name: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select name="fee_id" class="form-control">
                  <option value=""> Select Fee</option>
                  @foreach ($fee_names as $fee_name)
                  <option value="{{ $fee_name->id }}">{{ $fee_name->particular_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

        
            <div class="col-sm-12 mt-3">
                <label class="form-control-label">Fee Amount: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <input type="number" name="fee_amount" class="form-control" placeholder="Enter Fee Amount" value="{{ old('fee_amount') }}" required>
                </div>
            </div>

              
          </div>


          <div class="row mt-3">
            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
              <a href="javascript:void(0);" type="button" class="btn btn-secondary text-white mr-2 btn-cancel" >Cancel</a>
              <button type="submit" class="btn btn-info btn-create">Save</button>
            </div>
          </div>
      </form>

    </div>
  </div>
</div>
       