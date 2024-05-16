@section('title')
    Admin - Add New subject teacher assent
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.subject_teacher_assent.index')}}"> <i class="icon ion-reply text-22"></i> All Subject Teacher Assent</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Subject Teacher Assent</h6>
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

                    <form action="{{ route('admin.subject_teacher_assent.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                              <label class="form-control-label">Class Teacher Name: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                <select name="teacher_id" class="form-control">
                                  <option value=""> Select Teacher</option>
                                  @foreach ($teachers as $teacher)
                                  <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                      </div>

                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="class_id" id="class" class="form-control">
                                    <option value=""> Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                         </div>

                         <div class="row">
                          <div class="col-sm-12 mt-3">
                              <label class="form-control-label">Sections Name: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                <select name="section_id"  id="section" class="form-control">
                                  <option value=""> Select Class</option>
                                  {{-- @foreach ($sections as $section)
                                  <option value="{{ $section->id }}">{{ $section->name }}</option>
                                  @endforeach --}}
                                </select>
                              </div>
                            </div>
                       </div>


                         <div class="row">
                          <div class="col-sm-12 mt-3">
                              <label class="form-control-label">Session Name: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                <select name="session_id" class="form-control">
                                  <option value=""> Select Session</option>
                                  @foreach ($sessions as $session)
                                  <option value="{{ $session->id }}">{{ @$session->start_year->year }} - {{ @$session->end_year->year }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                       </div>

                        
                         
                       

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.subject_teacher_assent.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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

