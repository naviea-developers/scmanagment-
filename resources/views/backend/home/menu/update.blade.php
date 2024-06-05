@section('title')
    Admin - Edit Menu
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
            <h6 class="br-section-label text-center mb-4">Update Menu</h6>
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

                  <form action="{{ route('admin.update_menu', $menu->id) }}" method="post" enctype="multipart/form-data">
                    @csrf


                        <div class="row">
                          <label class="col-sm-3 form-control-label">Menu Type: <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                          <select  class="form-control" name="menu_type" id="type" onchange="showCourseFields()" required>
                              <option @if ($menu->type == 'header_menu') Selected @endif value="header_menu">Header Menu</option>
                              <option @if ($menu->type == 'footer_menu') Selected @endif value="footer_menu">Footer Menu</option>
                          </select>
                          </div>
                      </div>



                        <div class="row">
                          <label class="col-sm-3 form-control-label mt-3">Menu Name : <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                          <input value="{{ $menu->name }}" type="text" name="name" class="form-control" placeholder="Enter menu name" required>
                          {{-- <textarea type="text" name="name" id="summernote" class="form-control" placeholder="Enter menu name" required>{{ $menu->name }}</textarea> --}}
                          </div>
                      </div><!-- row -->
                      <div class="row">
                          <label class="col-sm-3 form-control-label mt-3">Menu Position : <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                          <input value="{{ $menu->position }}" type="number" name="position" class="form-control" placeholder="Enter position" required>
                          </div>
                      </div><!-- row -->

                    <div class="row">
                        <label class="col-sm-3 form-control-label ">Page URL : <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                          <select  class="form-control" name="url">
                            <option value="">Select Page</option>
                            <option @if ($menu->url == 'about') Selected @endif  value="about">about page</option>
                            <option @if ($menu->url == 'learner') Selected @endif value="learner">student page</option>
                            <option @if ($menu->url == 'instructor') Selected @endif value="instructor">teacher page</option>
                            <option @if ($menu->url == 'contact') Selected @endif value="contact">contact page</option>
                            <option @if ($menu->url == 'library') Selected @endif value="library">library page</option>
                            <option @if ($menu->url == 'event-list') Selected @endif value="event-list">event page</option>
                            <option @if ($menu->url == 'blogs') Selected @endif value="blogs">blogs page</option>
                            {{-- <option @if ($menu->url == 'maestro-class') Selected @endif value="maestro-class">master course page</option> --}}
                            <option @if ($menu->url == 'e-book-list') Selected @endif value="e-book-list">e-book</option>
                            <option @if ($menu->url == 'e-book-audio-list') Selected @endif value="e-book-audio-list">e-book-audio</option>
                            <option @if ($menu->url == 'daily-class-video-list') Selected @endif value="daily-class-video-list">daily-class-video-list</option>
                            <option @if ($menu->url == 'gallery-list') Selected @endif value="gallery-list">gallery</option>
                            <option @if ($menu->url == 'notice-list') Selected @endif value="notice-list">Notice</option>
                            {{-- <option @if ($menu->url == 'course_list') Selected @endif value="course_list">admission</option> --}}

                            <option @if ($menu->url == 'faqs') Selected @endif value="faqs">faqs page</option>
                            <option @if ($menu->url == 'privacy-policy') Selected @endif value="privacy-policy">privacy policy page</option>
                            <option @if ($menu->url == 'refund-policy') Selected @endif value="refund-policy">refund policy page</option>
                            <option @if ($menu->url == 'terms-conditions') Selected @endif value="terms-conditions">terms conditions page</option>
                        </select>
                        </div>
                    </div><!-- row -->



                    <div id="generalCourseFields" class="courseFields" @if ($menu->type != 'header_menu') style="display:none;" @endif>



                    </div>





                    <div id="masterCourseFields" class="courseFields" @if ($menu->type != 'footer_menu') style="display:none;" @endif>

                      {{-- <div class="row">
                        <label class="col-sm-3 form-control-label mt-3">Menu Name : <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                        <input value="{{ $menu->name }}" type="text" name="name" class="form-control" placeholder="Enter menu name" required>
                        </div>
                    </div><!-- row -->
                    <div class="row">
                        <label class="col-sm-3 form-control-label mt-3">Menu Position : <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                        <input value="{{ $menu->position }}" type="number" name="position" class="form-control" placeholder="Enter position" required>
                        </div>
                    </div><!-- row -->

                    <div class="row">
                        <label class="col-sm-3 form-control-label ">Page URL : <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                          <select  class="form-control" name="url">
                            <option value="">Select Page</option>
                            <option @if ($menu->url == 'about') Selected @endif  value="about">about page</option>
                            <option @if ($menu->url == 'learner') Selected @endif value="learner">learnar page</option>
                            <option @if ($menu->url == 'instructor') Selected @endif value="instructor">instructor page</option>
                            <option @if ($menu->url == 'contact') Selected @endif value="contact">contact page</option>
                            <option @if ($menu->url == 'library') Selected @endif value="library">library page</option>
                            <option @if ($menu->url == 'event-list') Selected @endif value="event-list">event page</option>
                            <option @if ($menu->url == 'blogs') Selected @endif value="blogs">blogs page</option>
                            <option @if ($menu->url == 'maestro-class') Selected @endif value="maestro-class">master course page</option>
                        </select>
                        </div>
                    </div><!-- row --> --}}

                    <div class="row">
                      <label class="col-sm-3 form-control-label mt-3">Column Number : <span class="tx-danger">*</span></label>
                      <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                        <select  class="form-control" name="column_num">
                          <option value="">Select Column</option>
                          <option @if ($menu->column_num == '1') Selected @endif value="1">1</option>
                          <option @if ($menu->column_num == '2') Selected @endif value="2">2</option>
                          <option @if ($menu->column_num == '3') Selected @endif value="3">3</option>
                      </select>
                      </div>
                    </div><!

                    </div>























                  {{-- <div class="row">
                    <label class="col-sm-3 form-control-label mt-3">Menu Name : <span class="tx-danger">*</span></label>
                    <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                    <input value="{{ $menu->name }}" type="text" name="name" class="form-control" placeholder="Enter menu name" required>
                    </div>
                </div><!-- row -->
                <div class="row">
                    <label class="col-sm-3 form-control-label mt-3">Menu Position : <span class="tx-danger">*</span></label>
                    <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                    <input value="{{ $menu->position }}" type="number" name="position" class="form-control" placeholder="Enter position" required>
                    </div>
                </div><!-- row -->

                <div class="row">
                    <label class="col-sm-3 form-control-label ">Page URL : <span class="tx-danger">*</span></label>
                    <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                      <select  class="form-control" name="url">
                        <option value="">Select Page</option>
                        <option @if ($menu->url == 'about') Selected @endif  value="about">about page</option>
                        <option @if ($menu->url == 'learner') Selected @endif value="learner">learnar page</option>
                        <option @if ($menu->url == 'instructor') Selected @endif value="instructor">instructor page</option>
                        <option @if ($menu->url == 'contact') Selected @endif value="contact">contact page</option>
                        <option @if ($menu->url == 'library') Selected @endif value="library">library page</option>
                        <option @if ($menu->url == 'event-list') Selected @endif value="event-list">event page</option>
                        <option @if ($menu->url == 'blogs') Selected @endif value="blogs">blogs page</option>
                        <option @if ($menu->url == 'maestro-class') Selected @endif value="maestro-class">master course page</option>

                        <option @if ($menu->url == 'faqs') Selected @endif value="faqs">faqs page</option>
                        <option @if ($menu->url == 'privacy-policy') Selected @endif value="privacy-policy">privacy policy page</option>
                        <option @if ($menu->url == 'refund-policy') Selected @endif value="refund-policy">refund policy page</option>
                        <option @if ($menu->url == 'terms-conditions') Selected @endif value="terms-conditions">terms conditions page</option>
                    </select>
                    </div>
                </div><!-- row -->



                                      <div id="generalCourseFields" class="courseFields" @if ($menu->type != 'header_menu') style="display:none;" @endif>



                                      </div>





                                      <div id="masterCourseFields" class="courseFields" @if ($menu->type != 'footer_menu') style="display:none;" @endif>
                                                  <div class="row">
                                                    <label class="col-sm-3 form-control-label mt-3">Column Number : <span class="tx-danger">*</span></label>
                                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                                                      <select  class="form-control" name="column_num">
                                                        <option value="">Select Column</option>
                                                        <option @if ($menu->column_num == '1') Selected @endif value="1">1</option>
                                                        <option @if ($menu->column_num == '2') Selected @endif value="2">2</option>
                                                        <option @if ($menu->column_num == '3') Selected @endif value="3">3</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                      </div>

                  <div class="row mt-4">
                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                      <a href="{{route('admin.manage_menu')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                      <button type="submit" class="btn btn-info ">Update</button>
                    </div>
                  </div> --}}
                    </div>
                  <div class="row mt-4">
                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                      <a href="{{route('admin.manage_menu')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
