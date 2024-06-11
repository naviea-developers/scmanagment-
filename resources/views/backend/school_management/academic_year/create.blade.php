
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Year</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-7 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.academic_year.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-12">
              <label class="form-control-label">Academic Year: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                  <input type="number" name="year" class="form-control" placeholder="Enter Year Only" value="{{ old('year') }}" required>
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

    </div><!-- form-layout -->
  </div><!-- col-6 -->

</div><!-- br-section-wrapper -->
     


















