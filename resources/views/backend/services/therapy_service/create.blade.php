@section('title')
    Admin - Add New Therapy Service
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
            <a class="breadcrumb-item" href="{{route('admin.therapy_service.index')}}"> <i class="icon ion-reply text-22"></i> All Therapy Service</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Therapist Service</h6>
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

                    <form action="{{ route('admin.therapy_service.store') }}" method="post" enctype="multipart/form-data">
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
                                        <option value="{{ $therapist->id }}">{{ $therapist->fname}} {{ $therapist->lname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label">Service Name:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="therapy_name" class="form-control" placeholder="Enter First Name" value="{{ old('pherapy_name') }}">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Loction:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                            <input type="text" name="loction" class="form-control" placeholder="Enter Loction" value="{{ old('loction') }}">
                            </div>
                            </div>
                            

                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Address:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                            <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ old('address') }}">
                            </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label">Experience Year: </label>
                              <div class="cmg-t-10 mg-sm-t-0">
                               <input type="number" name="experience_year" class="form-control" placeholder="Enter Experience Year" value="{{ old('experience') }}">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Price: </label>
                              <div class="cmg-t-10 mg-sm-t-0">
                               <input type="number" name="price" class="form-control" placeholder="Enter Price" value="{{ old('price') }}">
                            </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label">Therapy Details:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                            <textarea name="details" id="summernote_two" class="form-control" placeholder="Enter Therapy Details">{{ old('details') }}</textarea>
                        </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.therapy_service.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
    {{-- doctor_schedule --}}
@endsection

@section('script')



@endsection


