@section('title')
    Admin - Edit Class Duration
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.class_duration.index')}}"> <i class="icon ion-reply text-22"></i> All Class Duration</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update Class Info</h6>
             {{-- validate start  --}}
             @if(count($errors) > 0)
             @foreach($errors->all() as $error)
                 <div class="alert alert-danger">{{ $error }}</div>
             @endforeach
             @endif
             {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-7 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.class_duration.update', $class_duration->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" class="form-control" placeholder="Enter Class Name" value="{{ $class_duration->name }}" required>
                            </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-12">
                              <label class="form-control-label">Start Time: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="time" name="start_time" class="form-control" placeholder="Enter Class Name" value="{{ $class_duration->start_time }}" required>
                          </div>
                          </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-sm-12">
                            <label class="form-control-label">End Time: <span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                            <input type="time" name="end_time" class="form-control" placeholder="Enter Class Name" value="{{ $class_duration->end_time }}" required>
                        </div>
                        </div>
                    </div>


                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.class_duration.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update</button>
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