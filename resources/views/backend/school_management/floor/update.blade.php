<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Floor Info</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-7 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.floor.update', $floor->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-sm-12">
                    <label class="form-control-label">Bulding Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                      <select name="bulding_id" class="form-control">
                        <option value=""> Select Bulding</option>
                        @foreach ($buldings as $bulding)
                        <option @if ($bulding->id == $floor->bulding_id) Selected @endif value="{{ $bulding->id }}">{{ $bulding->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
            </div>

              <div class="row">
                  <div class="col-sm-12 mt-3">
                      <label class="form-control-label">Floor Name: <span class="tx-danger">*</span></label>
                      <div class="mg-t-10 mg-sm-t-0">
                      <input type="text" name="name" class="form-control" placeholder="Enter Floor Name" value="{{ $floor->name }}" required>
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

      </div><!-- form-layout -->
  </div><!-- col-6 -->
  <!----- Start Add Category Form input ------->
</div><!-- br-section-wrapper -->
        









