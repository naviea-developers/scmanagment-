@section('title')
    Admin - Add New Affiliate
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.affiliate.index')}}"> <i class="icon ion-reply text-22"></i> All Affiliate</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Affiliate</h6>
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

                    <form action="{{ route('admin.affiliate.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-4">
                            <div class="col-sm-4" >
                                <label class="form-control-label">Affiliate Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg") }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>

                            {{-- <div class="col-sm-4" >
                                <label class="form-control-label">Teacher Video: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/no-video.jpg") }}" alt="">
                                    <input type="file" name="video" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div> --}}
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Affiliate Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" class="form-control" placeholder="Enter Teacher Name" value="{{ old('name') }}" required>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                <input value="{{ old('mobile') }}" type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('email') }}" type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class=" form-control-label">NID:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('nid') }}" type="text" name="nid" class="form-control" placeholder="Enter NID">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Gender:</label>
                                <select  class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option  value="0">Male</option>
                                    <option  value="1">Female</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Date of Birth:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('dob') }}" type="date" name="dob" class="form-control" placeholder="Enter Date of Birth">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                           






                            <div class="col-sm-4">
                                <label class=" form-control-label">Address:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('address') }}" type="text" name="address" class="form-control" placeholder="Enter address">
                                </div>
                            </div>

                        </div>


                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Description:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea value="{{ old('description') }}" id="summernote" type="text" name="description" class="form-control" placeholder="Enter description"></textarea>
                                </div>
                            </div>

                        </div>




                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.affiliate.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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

