@section('title')
    Admin - Add New Ebook Video
@endsection
@extends('Backend.layouts.layouts')
@section('style')
<style>
    .select2-container--default .select2-selection--single {
        height: 41px;}
</style>
@endsection
@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.daily_class.index')}}"> <i class="icon ion-reply text-22"></i> All Daily Class</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Daily Class</h6>
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

                    <form action="{{ route('admin.daily_class.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="row align-items-end">
                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Image: </b><span class="tx-danger">*</span></label>
                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                        <input type="file" accept="image/*" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;" required>
                                    </div>
                            </div>
                        </div> --}}

                        <div class="row mt-4">

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Title: </b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter title" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Teacher Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="cat"  class="form-control form-select select2" name="teacher_id">
                                        <option value="">Select teacher</option>
                                        @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Class Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="class"  class="form-control form-select select2" name="class_id">
                                        <option value="">Select Class</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Section Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="section"  class="form-control form-select select2" name="section_id">
                                        <option value="">Select section</option>
                                        {{-- @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Group Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="group"  class="form-control form-select select2" name="group_id">
                                        <option value="">Select group</option>
                                        {{-- @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Session Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select name="session_id" class="form-control form-select select2">
                                        <option value=""> Select Session</option>
                                        @foreach ($sessions as $session)
                                        <option value="{{ $session->id }}">{{ @$session->start_year }} - {{ @$session->end_year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Subject Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="subject"  class="form-control form-select select2" name="subject_id">
                                        <option value="">Select subject</option>
                                        {{-- @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Lession Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="lession"  class="form-control form-select select2" name="lession_id">
                                        <option value="">Select lession</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Page: </b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="page_number" value="{{ old('page_number') }}" class="form-control" placeholder="Enter Page" required>
                                </div>
                            </div>

                        </div>

                        <div class="row" id="menudropdown">
                            <label class="form-control-label"><span class="tx-danger"></span></label>
                            <div class="col-sm-9 mg-t-10">
                                <br>
                                <input type="radio" id="yes" name="sub_banner" value="1" checked>
                                <label for="image">Video </label>
                                <input style="margin-left:28px;" type="radio" id="no" name="sub_banner" value="2" >
                                <label for="video">Video Url</label>
                            </div>
                        </div>

                        <div class="row mt-3" id="menuimage">
                            <label class="form-control-label">Video: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10">
                                {{-- <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                    <input type="file" name="video" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div> --}}
                                    <input type="file" accept="video/*" name="video" class="form-control">
                            </div>
                        </div><!-- row -->

                        <div class="row mt-3" id="menuvideo" style="display: none">
                            {{-- <div class="col-sm-4">
                                <label class="form-control-label">Video Thumbnail: <span class="tx-danger">*</span></label>
                                <div class="col-sm-9 mg-t-10">
                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                        <input type="file" name="video_thumbnail" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-sm-12">
                                <label class="form-control-label">Video Url: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10">
                                    <input type="text" name="video_url" class="form-control" placeholder="Enter Video Link">
                                </div>
                            </div>

                        </div>    

                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label class="form-control-label"><b>Details </b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea id="summernote" name="details">{{ old('details') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.daily_class.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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

@section('script')


<script>
    $(document).ready(function() {
        $('.multipleSelect2Search').select2();
    });
    $(document).ready(function() {
        $('.multipleSelectSearch').select2();
    });
    
</script>

<script>
    $('document').ready(function () {
      $("input[name=sub_banner]:radio").change(function () {
      var data = $(this).val();
      if (data == 1) {
        $('#menuimage').show();
        $('#menuvideo').hide();

      } else {
        $('#menuvideo').show();
        $('#menuimage').hide();
      }
    });
    });
</script>

@endsection
