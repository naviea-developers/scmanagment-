
<div class="br-section-wrapper data-create" style="display: none;">
    <h6 class="br-section-label text-center mb-4"> Add New Testimonial</h6>
    {{-- validate start  --}}
    <div id="create_errors"></div>
    {{-- validate End  --}}
  
  
    <div class="col-xl-12 mx-auto">
        <div class="form-layout form-layout-4 py-5">

            <form id="data-form-create" action="{{ route('admin.add_new_testimonial_stor') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mt-3">
                    <label class="col-sm-3 form-control-label">Image: <span class="tx-danger">*</span></label>
                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                <input  type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                            </div>
                    </div>
                </div><!-- row -->

                <div class="row">
                    <label class="col-sm-3 form-control-label mt-3">Person Name : <span class="tx-danger">*</span></label>
                    <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                    <input value="{{ old('name') }}" type="text" name="name" class="form-control" placeholder="Enter Person Name" required>
                    </div>
                </div><!-- row -->

                <div class="row">
                    <label class="col-sm-3 form-control-label mt-3">Person Designation: <span class="tx-danger">*</span></label>
                    <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                    <input value="{{ old('designation') }}" type="text" name="designation" class="form-control" placeholder="Enter Person Designation" required>
                    </div>
                </div><!-- row -->

                <div class="row">
                    <label class="col-sm-3 form-control-label mt-3">Star: <span class="tx-danger">*</span></label>
                    <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                    {{-- <input value="{{ old('star') }}" type="number" name="star" class="form-control" placeholder="Enter Star Number Like- 1, 2, 3, 4, 5" required> --}}
                    <select  class="form-control" name="star">
                        <option value="">Select Star</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Star</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                    </select>
                
                
                </div>
                </div><!-- row -->


                <div class="row mt-3">
                    <label class="col-sm-3 form-control-label">Description: <span class="tx-danger">*</span></label>
                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                        <textarea id="summernote" name="comment">{{ old('comment') }}</textarea>
                    </div>
                </div><!-- row -->

                <div class="row mt-4">
                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                    <a href="javascript:void(0);" type="button" class="btn btn-secondary text-white mr-2 btn-cancel" >Cancel</a>
                    <button type="submit" class="btn btn-info btn-create">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
        