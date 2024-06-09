@section('title')
    Admin - Add New Alumni
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.alumni.index')}}"> <i class="icon ion-reply text-22"></i> All Alumni</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Alumni</h6>
               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.alumni.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-4" >
                                <label class="form-control-label">Alumni Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg") }}" alt="">
                                    <input type="file" accept="image/*" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" class="form-control" placeholder="Enter Alumni Name" value="{{ old('name') }}" required>
                            </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                <input value="{{ old('mobile') }}" type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('email') }}" type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                </div>
                            </div>


                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Session: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                 <select name="session_id" class="form-control" required>
                                    <option value=""> Select Session</option>
                                    @foreach ($sessions as $session)
                                    <option value="{{ $session->id }}">{{ $session->start_year }} - {{ $session->end_year }}</option>
                                    {{-- <option @if ($session->id == $admin->session_id) Selected @endif value="{{ $session->id }}">{{ $session->start_year }}-{{ $session->end_year }}</option> --}}
                                    @endforeach
                               </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Class: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                 <select name="class_id" class="form-control class_fee" required>
                                    <option value=""> Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                               </select>
                                </div>
                            </div>

                           

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Roll Number: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('roll_number') }}" type="number" name="roll_number" class="form-control" placeholder="Enter your Roll Number" >
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">Fees: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="reg_fee_id" id="fee">
                                    <option value="">Select Fee</option>
                                    {{-- @foreach ($fees as $fee)
                                    <option value="{{ $fee->id }}">{{ $fee->fee_amount }}</option>
                                    @endforeach --}}
                                </select>
                                </div>


                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Designation: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('designation') }}" type="text" name="designation" class="form-control" placeholder="Enter Your Designation">
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Company Name: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('company_name') }}" type="text" name="company_name" class="form-control" placeholder="Enter Your Company Name">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Address: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('address') }}" type="text" name="address" class="form-control" placeholder="Enter Your Address">
                                </div>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Description: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea type="text" name="description" rows="5" class="form-control" placeholder="Describe yourself">{{ old('description') }}</textarea>
                                </div>
                            </div>
                           
                            <div>
                                    <h4 class="mt-3">Social Links</h4>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Facebook</label>
                                <input type="text" class="form-control mb-2 " name="facebook_id"  placeholder="Facebook URL"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Twitter</label>
                                <input type="text" class="form-control mb-2 " name="twitter_id"  placeholder="Twitter URL"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Google Plus</label>
                                <input type="text" class="form-control mb-2 " name="google_id"  placeholder="Google Plus URL"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Linkedin</label>
                                <input type="text" class="form-control mb-2 " name="linkedin_id"  placeholder="Linkedin URL"/>
                            </div>

                        </div>

                        </div>




                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('backend.manage_admin')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Save</button>
                          </div>
                        </div>
                    </form>

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('script')
<script>

$('body').on("change",'.class_fee',function(){
    let id = $(this).val();
     console.log(id);
     getFees(id,"fee");
});

function getFees(id,outid){
    let url = '{{ url("get/fee_management/") }}/' + id;
    axios.get(url)
        .then(res => {
            console.log(res);
        $('#'+outid).empty();
            let html = '';
            html += '<option value="">Select Fee</option>'
            res.data.forEach(element => {
                html += "<option value=" + element.id + ">" + element.fee.particular_name +" "+"("+ element.fee_amount+ ")" + "</option>"
            });


            $('#'+outid).append(html);
            $('#'+outid).val("").change();
        });
}

</script>
@endsection