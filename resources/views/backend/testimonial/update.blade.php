@section('title')
    Admin - Edit Testimonial
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.manage_testimonial')}}"> <i class="icon ion-reply text-22"></i> All Testimonial</a>
          </nav>
        </div><!-- br-pageheader -->

            {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
            {{-- success message start --}}


        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Update Testimonial</h6>
            {{-- validate start  --}}
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            {{-- validate End  --}}
            <!----- Start Add Category Form input ------->
            <div class="col-xl-9 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.update_testimonial', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-3">
                          <label class="col-sm-3 form-control-label">Image: <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                              <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                      <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $testimonial->image_show }}" alt="">
                                      <input  type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                  </div>
                          </div>
                        </div><!-- row -->

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Person Name : <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $testimonial->name }}" type="text" name="name" class="form-control" placeholder="Enter Person Name" required>
                            </div>
                        </div><!-- row -->

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Person Designation: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $testimonial->designation }}" type="text" name="designation" class="form-control" placeholder="Enter Person Designation" required>
                            </div>
                        </div><!-- row -->

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Star: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            {{-- <input value="{{ $testimonial->star }}" type="number" name="star" class="form-control" placeholder="Enter Star Number Like, 1, 2, 3, 4, 5" required> --}}
                            
                            <select  class="form-control" name="star" >
                                <option value="">Select Star</option>
                                <option @if ($testimonial->star == 1) Selected @endif value="1">1 Star</option>
                                <option @if ($testimonial->star == 2) Selected @endif value="2">2 Star</option>
                                <option @if ($testimonial->star == 3) Selected @endif value="3">3 Star</option>
                                <option @if ($testimonial->star == 4) Selected @endif value="4">4 Star</option>
                                <option @if ($testimonial->star == 5) Selected @endif value="5">5 Star</option>
                            </select>
                        
                        
                        </div>
                        </div><!-- row -->


                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Description: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                               <textarea id="summernote" name="comment">{{ $testimonial->comment }}</textarea>
                            </div>
                        </div><!-- row -->

                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.manage_testimonial')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
