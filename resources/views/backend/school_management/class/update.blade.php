@section('title')
    Admin - Edit Class
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.class.index')}}"> <i class="icon ion-reply text-22"></i> All Classes</a>
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
            <div class="col-xl-9 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.class.update', $class->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                          <label class="col-sm-3 form-control-label">Image: <span class="tx-danger">*</span></label>
                          <div class="mg-t-10 mg-sm-t-0">
                              <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                      <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ @$class->image_show }}" alt="">
                                      <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                  </div>
                          </div>
                       </div><!-- row -->

                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" class="form-control" placeholder="Enter Class Name" value="{{ @$class->name }}" required>
                            </div>
                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Class Teacher Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="class_teacher_id" class="form-control">
                                    <option value=""> Select Teacher</option>
                                    @foreach ($teachers as $teacher)
                                    <option @if ($teacher->id == $class->class_teacher_id) Selected @endif value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                        </div>

                        <div class="row mt-4">
                          <div class="col-sm-12">
                              <label class="form-control-label"><b>Class Details </b><span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <textarea id="summernote" name="details">{{ @$class->details }}</textarea>
                              </div>
                          </div>
                        </div>

                        <div class="row mt-4">
                          <div class="col-sm-12">
                              <label class="form-control-label"><b>School Gargent Policy </b><span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <textarea id="summernote_two" name="gargent_policy">{{ @$class->gargent_policy }}</textarea>
                              </div>
                          </div>
                        </div>

                        <div class="row mt-4">
                          <div class="col-sm-12">
                              <label class="form-control-label"><b>Daily Class Video Details </b><span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                  <textarea id="summernote_three" name="daily_class_details">{{ @$class->daily_class_details }}</textarea>
                              </div>
                          </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.class.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
