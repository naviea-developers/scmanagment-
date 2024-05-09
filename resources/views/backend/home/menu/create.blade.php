@section('title')
    Admin - Add New Category
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.manage_menu')}}"> <i class="icon ion-reply text-22"></i> All Menus</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Menu</h6>
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

                    <form action="{{ route('admin.stor_menu') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <label class="col-sm-3 form-control-label">Menu Type: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <select  class="form-control" name="menu_type" id="type" onchange="showCourseFields()" required>
                                <option  value="header_menu">Header Menu</option>
                                <option  value="footer_menu">Footer Menu</option>
                            </select>
                            </div>
                        </div>


                        <div class="row">
                          <label class="col-sm-3 form-control-label mt-3">Menu Name : <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                          <input value="{{ old('name') }}" type="text" name="name" class="form-control" placeholder="Enter menu name" >
                          {{-- <textarea value="{{ old('name') }}" id="summernote" type="text" name="name" class="form-control" placeholder="Enter menu name" ></textarea> --}}
                          </div>
                      </div><!-- row -->
                      <div class="row">
                          <label class="col-sm-3 form-control-label mt-3">Menu Position : <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                          <input value="{{ old('position') }}" type="number" name="position" class="form-control" placeholder="Enter position" >
                          </div>
                      </div><!-- row -->


                      <div class="row">
                          <label class="col-sm-3 form-control-label ">Page URL : <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <select  class="form-control" name="url">
                              <option value="">Select Page</option>
                              <option value="about">about page</option>
                              <option value="learner">learnar page</option>
                              <option value="instructor">instructor page</option>
                              <option value="contact">contact page</option>
                              <option value="library">library page</option>
                              <option value="event-list">event page</option>
                              <option value="blogs">blogs page</option>
                              <option value="maestro-class">master course page</option>
                              <option value="e-book-list">e-book</option>
                              <option value="e-book-audio-list">e-book-audio</option>
                              <option value="e-book-video-list">e-book-video</option>
                              <option value="course_list">admission</option>

                              <option value="faqs">faq</option>
                              <option value="privacy-policy">privacy policy</option>
                              <option value="refund-policy">refund policy</option>
                              <option value="terms-conditions">terms & conditions</option>
                          </select>
                          </div>
                      </div><!-- row -->


                          <div id="generalCourseFields" class="courseFields">

                          </div>


                          <div id="masterCourseFields" class="courseFields" style="display: none;">

                                        {{-- <div class="row">
                                            <label class="col-sm-3 form-control-label mt-3">Menu Name : <span class="tx-danger">*</span></label>
                                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                                            <input value="{{ old('name') }}" type="text" name="name" class="form-control" placeholder="Enter menu name" >
                                            </div>
                                        </div><!-- row -->
                                        <div class="row">
                                            <label class="col-sm-3 form-control-label mt-3">Menu Position : <span class="tx-danger">*</span></label>
                                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                                            <input value="{{ old('position') }}" type="number" name="position" class="form-control" placeholder="Enter position" >
                                            </div>
                                        </div><!-- row -->


                                        <div class="row">
                                            <label class="col-sm-3 form-control-label ">Page URL : <span class="tx-danger">*</span></label>
                                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                                              <select  class="form-control" name="url">
                                                <option value="">Select Page</option>
                                                <option value="about">about page</option>
                                                <option value="learner">learnar page</option>
                                                <option value="instructor">instructor page</option>
                                                <option value="contact">contact page</option>
                                                <option value="library">library page</option>
                                                <option value="event-list">event page</option>
                                                <option value="blogs">blogs page</option>
                                                <option value="maestro-class">master course page</option>

                                                <option value="faqs">faqs page</option>
                                                <option value="privacy-policy">privacy policy page</option>
                                                <option value="refund-policy">refund policy page</option>
                                                <option value="terms-conditions">terms conditions page</option>
                                            </select>
                                            </div>
                                        </div><!-- row --> --}}


                                          <div class="row">
                                            <label class="col-sm-3 form-control-label mt-3">Column Number : <span class="tx-danger">*</span></label>
                                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                                              <select  class="form-control" name="column_num">
                                                <option value="">Select Column</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            </div>
                                          </div><!-- row -->
                          </div>



                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.manage_menu')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
    function showCourseFields() {
      var generalCourseFields = document.getElementById("generalCourseFields");
      var masterCourseFields = document.getElementById("masterCourseFields");
      var selectedValue = document.getElementById("type").value;

      if (selectedValue === "header_menu") {
        generalCourseFields.style.display = "block";
        masterCourseFields.style.display = "none";
      } else {
        generalCourseFields.style.display = "none";
        masterCourseFields.style.display = "block";
      }
    }
  </script>
@endsection
