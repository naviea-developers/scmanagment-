
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Continent Info</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-7 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('continent.update', $continent->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              {{-- {{ method_field('PATCH') }} --}}
                        
              <div class="row mt-3" id="menuimage">
                  <label class="col-sm-3 form-control-label">Continent Image: <span class="tx-danger">*</span></label>
                  <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                      <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                              <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $continent->image_show}}" alt="">
                              <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                          </div>
                  </div>
              </div><!-- row -->
                <div class="row mt-4">
                  <label class="col-sm-3 form-control-label">Continent Name: <span class="tx-danger">*</span></label>
                  <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <input type="text" name="name" value="{{ $continent->name }}" class="form-control" placeholder="Enter Package Name" required>
              </div>
              </div><!-- row -->

             

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
        
