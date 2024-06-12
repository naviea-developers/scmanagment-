<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Designation</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-7 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.designation.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-sm-12 ">
                  <label class="form-control-label">Designation Name: <span class="tx-danger">*</span></label>
                  <div class="mg-t-10 mg-sm-t-0">
                      <input type="text" name="name" class="form-control" placeholder="Enter Designation Name" value="{{ old('name') }}" required>
                  </div>
              </div>
          </div>

          <div class="row mt-3">
            <div class="col-sm-12 ">
                <label class="form-control-label">Position: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                    <input type="number" max="100" min="1" name="position" class="form-control" placeholder="Enter position" value="{{ old('position') }}" required>
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
       