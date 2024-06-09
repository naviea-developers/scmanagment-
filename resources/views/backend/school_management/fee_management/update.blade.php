@section('title')
    Admin - Edit Fee
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.fee_management.index')}}"> <i class="icon ion-reply text-22"></i> All Fee Managements</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update Fee  Info</h6>
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

                    <form action="{{ route('admin.fee_management.update', $fee_management->id) }}" method="post" enctype="multipart/form-data">
                        @csrf


                      <div class="row">

                        <div class="col-sm-12">
                          <label class="form-control-label">Session: <span class="tx-danger">*</span></label>
                          <div class="mg-t-10 mg-sm-t-0">
                            <select name="session_id" class="form-control">
                              <option value=""> Select Session</option>
                              @foreach ($sessions as $session)
                              <option @if ($session->id == $fee_management->session_id) Selected @endif value="{{ $session->id }}">{{ @$session->start_year }} - {{ @$session->end_year }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                          <label class="form-control-label">Class: <span class="tx-danger">*</span></label>
                          <div class="mg-t-10 mg-sm-t-0">
                            <select name="class_id" class="form-control">
                              <option value=""> Select Class</option>
                              @foreach ($classes as $class)
                              <option @if ($class->id == $fee_management->class_id) Selected @endif  value="{{ $class->id }}">{{ $class->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>




                        @if ($fee_management->fee->is_constant == 1 || $fee_management->fee->is_constant == 2)
                        <div class="col-sm-12 mt-3">
                            <label class="form-control-label">Fee Name: <span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select name="fee_id_disabled" class="form-control" disabled>
                                    <option value="">Select Fee</option>
                                    @foreach ($fee_names as $fee_name)
                                        <option @if ($fee_name->id == $fee_management->fee_id) selected @endif value="{{ $fee_name->id }}">{{ $fee_name->particular_name }}</option>
                                    @endforeach
                                </select>
                                <!-- Hidden input to hold the value -->
                                <input type="hidden" name="fee_id" value="{{ $fee_management->fee_id }}">
                            </div>
                        </div>
                    @else
                        <div class="col-sm-12 mt-3">
                            <label class="form-control-label">Fee Name: <span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select name="fee_id" class="form-control">
                                    <option value="">Select Fee</option>
                                    @foreach ($fee_names as $fee_name)
                                        @if ($fee_name->is_constant == 0)
                                            <option @if ($fee_name->id == $fee_management->fee_id) selected @endif value="{{ $fee_name->id }}">{{ $fee_name->particular_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    
                    


                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Fee Amount: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="number" name="fee_amount" class="form-control" placeholder="Enter Fee Amount Name" value="{{ $fee_management->fee_amount }}" required>
                            </div>
                            </div>
                           
                       

                      

                      </div>


                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.fee_management.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
