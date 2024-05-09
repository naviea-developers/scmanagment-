@section('title')
    Admin - Student Edit
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.founder.index')}}"> <i class="icon ion-reply text-22"></i> All Founder & CO-Founder</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update founder or co-founder Profile</h6>
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

                    <form action="{{ route('admin.founder.update', $founder->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-4">
                            <div class="col-sm-4" >
                                <label class="form-control-label">Founder or Co-Funder Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $founder->image_show }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <label class="form-control-label">Founder or Co-Founder Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $founder->name }}" required>
                            </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-control-label">Designation: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="designation" class="form-control" placeholder="Enter Designation" value="{{ $founder->designation }}" required>
                            </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class="form-control-label">Mobile Number: </label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                <input value="{{ $founder->mobile }}" type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" >
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class="form-control-label">Email: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $founder->email }}" type="email" name="email" class="form-control" placeholder="Enter Email" >
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class="form-control-label">Facebook URL: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $founder->facebook }}" type="text" name="facebook" class="form-control" placeholder="Enter facebook url" >
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class="form-control-label">Twitter URL: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $founder->twitter }}" type="text" name="twitter" class="form-control" placeholder="Enter twitter url" >
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class="form-control-label">Google Plus URL: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $founder->google_plus }}" type="text" name="google_plus" class="form-control" placeholder="Enter google plus url" >
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class="form-control-label">Linkedin URL: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $founder->linkedin }}" type="text" name="linkedin" class="form-control" placeholder="Enter linkedin url" >
                                </div>
                            </div>
                        </div>

                        
                       
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Description:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea id="summernote" type="text" name="about" class="form-control" placeholder="Enter description">{{ $founder->about }}</textarea>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.student.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
