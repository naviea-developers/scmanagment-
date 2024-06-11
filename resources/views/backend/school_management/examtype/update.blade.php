
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Exam Type</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-7 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.examtype.update', $examtype->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-sm-12">
                    <label class="form-control-label">Exam Type Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                    <input type="text" name="name" class="form-control" placeholder="Enter exam type Name" value="{{ $examtype->name }}" required>
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
        
