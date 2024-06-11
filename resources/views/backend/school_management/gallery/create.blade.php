
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New gallery</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-7 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-12 ">
              <label class="form-control-label">Name: </label>
              <div class="mg-t-10 mg-sm-t-0">
                  <input type="text" name="name" class="form-control" placeholder="Enter Item Name" value="{{ old('name') }}">
              </div>
          </div>
      </div>

      <div class="row mt-3">
          <div class="col-sm-12">
              <label class="form-control-label">Select Type: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                  <div class="custom-control custom-radio">
                      <input type="radio" id="imageRadio" name="media_type" value="image" class="custom-control-input" checked>
                      <label class="custom-control-label" for="imageRadio">Image</label>
                  </div>
                  <div class="custom-control custom-radio">
                      <input type="radio" id="videoRadio" name="media_type" value="video" class="custom-control-input">
                      <label class="custom-control-label" for="videoRadio">Video</label>
                  </div>
              </div>
          </div>
      </div>

      <div class="row mt-3" id="imageUpload">
          <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
          <div class="col-sm-9 mg-t-10 mg-sm-t-0">
              <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                  <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset('public/frontend/images/No-image.jpg') }}" alt="">
                  <input type="file" accept="image/png, image/gif, image/jpeg" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
              </div>
          </div>
      </div>

      <div class="row mt-3 d-none" id="videoUpload">
        
          <label class="form-control-label">Video Thumbnail: <span class="tx-danger">*</span></label>
          <div class="col-sm-9 mg-t-10 mg-sm-t-0">
              <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                  <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset('public/frontend/images/No-image.jpg') }}" alt="">
                  <input type="file" accept="image/png, image/gif, image/jpeg" name="thumbnail" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
              </div>
          </div>

          <label class="form-control-label mt-2">Video: <span class="tx-danger">*</span></label>
          <div class="col-sm-9 mg-t-10 mg-sm-t-0">
              <input type="file" name="video" accept="video/*" class="form-control">
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
     
