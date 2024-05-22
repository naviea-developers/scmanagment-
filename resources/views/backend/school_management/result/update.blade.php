@section('title')
    Admin - Edit Designation
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.exam_result.index')}}"> <i class="icon ion-reply text-22"></i> All Designations</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update Designation Info</h6>
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

                    <form action="{{ route('admin.exam_result.update', $result->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                          <div class="row">
                            <div class="col-sm-4">
                              <label class="form-control-label"><b>Student Name :</b></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input type="text" readonly name="obtained_marke" value="{{ @$result->admissionStudent->student_name }}" class="form-control" placeholder="Enter Student Name">
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <label class="form-control-label"><b>Roll :</b></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input type="text" readonly name="obtained_marke" value="{{ @$result->admissionStudent->roll_number }}" class="form-control" placeholder="Enter roll">
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <label class="form-control-label"><b>Mark :</b></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input type="text" readonly name="obtained_marke" value="{{ @$result->marke }}" class="form-control" placeholder="Enter Marke">
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label"><b>Pass Mark :</b></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input type="text" readonly name="obtained_marke" value="{{ @$result->pass_marke }}" class="form-control" placeholder="Enter Pass Marke">
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label"><b>Obtained Marke :</b></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input type="number" name="obtained_marke" value="{{ $result->obtained_marke }}" class="form-control" placeholder="Enter Obtained Marke">
                              </div>
                          </div>
                           
                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.exam_result.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
