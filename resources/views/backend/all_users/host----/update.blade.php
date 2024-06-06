@section('title')
    Admin - Host Edit
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.host.index')}}"> <i class="icon ion-reply text-22"></i> All Host</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update Host</h6>
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

                    <form action="{{ route('admin.host.update', $host->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-4">
                            <div class="col-sm-4" >
                                <label class="form-control-label">Host Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $host->image_show }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Host Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" class="form-control" placeholder="Enter host Name" value="{{ $host->name}}" required>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                <input value="{{ $host->mobile}}" type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $host->email }}" type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class=" form-control-label">NID:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $host->nid }}" type="text" name="nid" class="form-control" placeholder="Enter NID">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Gender:</label>
                                <select  class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option  value="0" @if ($host->gender=='0') Selected  @endif>Male</option>
                                    <option  value="1" @if ($host->gender=='1') Selected  @endif>Female</option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label class=" form-control-label">Date of Birth:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $host->dob }}" type="date" name="dob" class="form-control" placeholder="Enter Date of Birth">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class=" form-control-label">Institution:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $host->institution}}" type="text" name="institution" class="form-control" placeholder="Enter institution name">
                                </div>
                            </div>




                            <div class="col-sm-4">
                                <label class=" form-control-label">Designation:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $host->designation }}" type="text" name="designation" class="form-control" placeholder="Enter designation">
                                </div>
                            </div>







                            <div class="col-sm-4">
                                <label class=" form-control-label">Address:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $host->address }}" type="text" name="address" class="form-control" placeholder="Enter address">
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                            <label class="form-control-label">Status: </label>
                            <div class=" mg-t-10 mg-sm-t-0">
                              <select class="form-control" name="status">
                                <option @if($host->status == 1) @selected(true) @endif value="1">Active</option>
                                <option @if($host->status == 0) @selected(true) @endif value="0">Inactive</option>
                            </select>
                            </div>
                            </div>

                        </div>


                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Description:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea id="summernote" type="text" name="description" class="form-control" placeholder="Enter description">{{ $host->description }}</textarea>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.host.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update changes</button>
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
