@section('title')
    Admin - Edit Therapist Service
@endsection

@extends('Backend.layouts.layouts')
@section('style')
<style>
    .select2-selection__rendered {
    line-height: 40px !important;
}
.select2-container .select2-selection--single {
    height: 45px !important;
}
.select2-selection__arrow {
    height: 44px !important;
}
form label{
    color: #111;
    font-weight: 500;
}
</style>
@endsection

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.therapy.index')}}"> <i class="icon ion-reply text-22"></i> All Therapy</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Edit Therapist Service</h6>
             {{-- validate start  --}}
             @if(session()->has('error_message'))
             <div class="alert alert-danger">{{ session()->get('error_message') }}</div>
             @endif
             @if(count($errors) > 0)
             @foreach($errors->all() as $error)
                 <div class="alert alert-danger">{{ $error }}</div>
             @endforeach
             @endif
             {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.therapy_service.update', $therapyservice->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="row mt-3">
                            <div class="col-sm-12">
                                <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg") }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div> --}}

                       

                        <div class="row mt-4">

                            <div class="col-sm-4">
                                <label class="form-control-label">Therapist Name:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <select class="form-control" name="therapist_id">
                                    <option value="">Select Therapist</option>
                                    @foreach ($therapists as $therapist)
                                    <option @if($therapyservice->therapist_id == $therapist->id) selected @endif value="{{ $therapist->id }}">{{ $therapist->fname }} {{ $therapist->lname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label">Service Name:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input value="{{ $therapyservice->therapy_name }}" type="text" name="therapy_name" class="form-control" placeholder="Enter First Name">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Loction:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                            <input value="{{ $therapyservice->loction }}" type="text" name="loction" class="form-control" placeholder="Enter Loction">
                            </div>
                            </div>
                            

                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Address:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                            <input value="{{ $therapyservice->address }}" type="text" name="address" class="form-control" placeholder="Enter Address">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Experience Year: </label>
                              <div class="cmg-t-10 mg-sm-t-0">
                               <input value="{{ $therapyservice->experience_year }}" type="number" name="experience_year" class="form-control" placeholder="Enter Experience Year">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Price: </label>
                              <div class="cmg-t-10 mg-sm-t-0">
                               <input value="{{ $therapyservice->price }}" type="number" name="price" class="form-control" placeholder="Enter Price">
                            </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label">Therapy Details:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                            <textarea name="details" id="summernote_two" class="form-control" placeholder="Enter Therapy Details">{!! $therapyservice->details !!}</textarea>
                        </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.nany.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update</button>
                          </div>
                        </div>
                    {{-- </form> --}}

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection



