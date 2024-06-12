
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Designation Info</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-7 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.designation.update', $designation->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row">
                  <div class="col-sm-12">
                      <label class="form-control-label">Designation Name: <span class="tx-danger">*</span></label>
                      <div class="mg-t-10 mg-sm-t-0">
                      <input type="text" name="name" class="form-control" placeholder="Enter Bulding Name" value="{{ $designation->name }}" required>
                  </div>
                  </div>
              </div>

              <div class="row mt-3">
                <div class="col-sm-12 ">
                    <label class="form-control-label">Position: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input type="number" name="position" class="form-control" placeholder="Enter position" value="{{ $designation->position }}" required>
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
       