
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Alumni Info</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-12 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-update" action="{{ route('admin.alumni.update', $alumni->id) }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-sm-4" >
                    <label class="form-control-label">Alumni Image: <span class="tx-danger">*</span></label>
                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $alumni->image_show }}" alt="">
                        <input type="file" accept="image/*" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                    <input type="text" name="name" class="form-control" placeholder="Enter Alumni Name" value="{{ $alumni->name }}" required>
                </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                    <div class="cmg-t-10 mg-sm-t-0">
                    <input value="{{ $alumni->mobile }}" type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $alumni->email }}" type="email" name="email" class="form-control" placeholder="Enter Email" required>
                    </div>
                </div>


                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Session: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                     <select name="session_id" class="form-control" required>
                        <option value=""> Select Session</option>
                        @foreach ($sessions as $session)
                        <option @if ($session->id == $alumni->session_id) Selected @endif value="{{ $session->id }}">{{ $session->start_year }}-{{ $session->end_year }}</option>
                        @endforeach
                   </select>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Class: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                     <select name="class_id" class="form-control class_fee_edit" required>
                        <option value=""> Select Class</option>
                        @foreach ($classes as $class)
                        <option @if ($class->id == $alumni->class_id) Selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                   </select>
                    </div>
                </div>

               

                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Roll Number: </label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $alumni->roll_number }}" type="number" name="roll_number" class="form-control" placeholder="Enter your Roll Number" >
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">Fees: <span class="tx-danger">*</span></label>
                    <select class="form-control" name="reg_fee_id" id="fee_edit">
                        <option value="">Select Fee</option>
                        @foreach ($fees as $fee)
                        <option  @if ($fee->id == $alumni->reg_fee_id) Selected @endif value="{{ $fee->id }}">{{ @$fee->fee->particular_name }} ({{ $fee->fee_amount }})</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Designation: </label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $alumni->designation }}" type="text" name="designation" class="form-control" placeholder="Enter Your Designation">
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <label class="form-control-label">Company Name: </label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $alumni->company_name }}" type="text" name="company_name" class="form-control" placeholder="Enter Your Company Name">
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <label class="form-control-label">Address: </label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="{{ $alumni->address }}" type="text" name="address" class="form-control" placeholder="Enter Your Address">
                    </div>
                </div>

                <div class="col-sm-12 mt-3">
                    <label class="form-control-label">Description: </label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <textarea type="text" name="description" rows="5" class="form-control" placeholder="Describe yourself">{{ $alumni->description }}</textarea>
                    </div>
                </div>
               

                <div>
                    <h4 class="mt-3">Social Links</h4>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Facebook</label>
                    <input type="text" class="form-control mb-2 " name="facebook_id" value="{{ $alumni->facebook_id }}" placeholder="Facebook URL"/>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Twitter</label>
                    <input type="text" class="form-control mb-2 " name="twitter_id" value="{{ $alumni->twitter_id }}" placeholder="Twitter URL"/>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Google Plus</label>
                    <input type="text" class="form-control mb-2 " name="google_id" value="{{ $alumni->google_id }}" placeholder="Google Plus URL"/>
                </div>
                <div class="col-md-6">
                    <label class="mb-2">Linkedin</label>
                    <input type="text" class="form-control mb-2 " name="linkedin_id" value="{{ $alumni->linkedin_id }}" placeholder="Linkedin URL"/>
                </div>


                <div class="col-sm-4 mt-3">
                    <label class=" form-control-label">Approval: <span class="tx-danger">*</span></label>
                    <select class="form-control" name="is_alumni" >
                        <option value="">Select Alumni Status</option>
                        <option @if ($alumni->is_alumni == 0) Selected @endif value="0">Panding</option>
                        <option @if ($alumni->is_alumni == 1) Selected @endif value="1">Approve</option>
                    </select>
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
        
