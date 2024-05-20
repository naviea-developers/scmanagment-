@section('title')
    Admin - Add New Session
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.session.index')}}"> <i class="icon ion-reply text-22"></i> All Sessions</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Session</h6>
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

                  @php
                  $currentYear = date("Y");
                  $previewYears = 100;
                  $nextYears = 10; 
                  @endphp

                    <form action="{{ route('admin.session.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                 
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-control-label">Start Session: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                  <div class="mg-t-10 mg-sm-t-0">
                                    <select name="start_month" class="form-control">
                                      <option value=""> Select Month</option>
                                      <option value="1"> January</option>
                                      <option value="2"> February</option>
                                      <option value="3"> March</option>
                                      <option value="4"> April</option>
                                      <option value="5"> May</option>
                                      <option value="6"> June</option>
                                      <option value="7"> July</option>
                                      <option value="8"> August</option>
                                      <option value="9"> September</option>
                                      <option value="10"> October</option>
                                      <option value="11"> November</option>
                                      <option value="12"> December</option>
                                    </select>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm-6" style="margin-top: 20px">
                                <div class="mg-t-10 mg-sm-t-0">
                                  <div class="mg-t-10 mg-sm-t-0">
                                    <select name="start_year" class="form-control">
                                      <option value=""> Select Year</option>
                                      {{-- @foreach ($years as $year)
                                      <option value="{{ $year->id }}">{{ $year->year }}</option>
                                      @endforeach --}}
                                      @foreach (range($currentYear - $previewYears, $currentYear + $nextYears) as $year)
                                          <option value="{{ $year }}" @if($year == $currentYear) selected @endif>{{ $year }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-6">
                              <label class="form-control-label">End Session: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="end_month" class="form-control">
                                    <option value=""> Select Month</option>
                                    <option value="1"> January</option>
                                    <option value="2"> February</option>
                                    <option value="3"> March</option>
                                    <option value="4"> April</option>
                                    <option value="5"> May</option>
                                    <option value="6"> June</option>
                                    <option value="7"> July</option>
                                    <option value="8"> August</option>
                                    <option value="9"> September</option>
                                    <option value="10"> October</option>
                                    <option value="11"> November</option>
                                    <option value="12"> December</option>
                                  </select>
                                </div>
                              </div>
                          </div>

                          <div class="col-sm-6" style="margin-top: 20px">
                              <div class="mg-t-10 mg-sm-t-0">
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="end_year" class="form-control">
                                    <option value=""> Select Year</option>
                                    {{-- @foreach ($years as $year)
                                  <option value="{{ $year->id }}">{{ $year->year }}</option>
                                  @endforeach --}}
                                  @foreach (range($currentYear - $previewYears, $currentYear + $nextYears) as $year)
                                  <option value="{{ $year }}" @if($year == $currentYear) selected @endif>{{ $year }}</option>
                                  @endforeach
                                  </select>
                                </div>
                              </div>
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
                            <a href="{{route('admin.session.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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

