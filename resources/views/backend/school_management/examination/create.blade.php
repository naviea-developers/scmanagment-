@section('title')
    Admin - Add New Examination
@endsection
@section('style')
<style>
    .select2-container--default .select2-selection--single {
        height: 41px;}
</style>
@endsection
@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.examination.index')}}"> <i class="icon ion-reply text-22"></i> All Examinations</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Examination</h6>
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

                    <form action="{{ route('admin.examination.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                          <div class="col-sm-12">
                              <label class="form-control-label">Examination Name: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <input type="text" name="name" class="form-control" placeholder="Enter Examination Name" value="{{ old('name') }}" required>
                              </div>
                          </div>
                      </div>

                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Academic Year: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="academin_year_id" class="form-control form-select select2">
                                    <option value=""> Select Year</option>
                                    @foreach ($academin_years as $y)
                                    <option value="{{ $y->id }}">{{ $y->year }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Session: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="session_id" class="form-control form-select select2">
                                    <option value=""> Select Session</option>
                                    @foreach ($sessions as $session)
                                    <option value="{{ $session->id }}">{{ @$session->start_year }} - {{ @$session->end_year }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                        </div>



                        
                        <div class="row">
                            <div class="col-sm-6 mt-3">
                                <label class="form-control-label">Start Date: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                                </div>
                            </div>
                        {{-- </div>

                        <div class="row"> --}}
                            <div class="col-sm-6 mt-3">
                                <label class="form-control-label">End Date: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Class Teacher Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="class_teacher_id" class="form-control">
                                    <option value=""> Select Teacher</option>
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                        </div> --}}
                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.examination.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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

