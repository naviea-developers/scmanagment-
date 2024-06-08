@section('title')
    Admin - Home Content Setup
@endsection

@extends('Backend.layouts.layouts')
@section('head')

@endsection
@section('style')
<style>
    .select2-selection__rendered {
    line-height: 40px !important;
}
.select2-container .select2-selection--single {
    height: 45px !important;
}
.select2-selection__arrow {
    height: 44px !important;
}
form label{
    color: #111;
    font-weight: 500;
}
</style>

@endsection
@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Home Content Setup</h6>

                {{-- success message start --}}
                @if(session()->has('message'))
                <div class="alert alert-success">
                {{session()->get('message')}}
                </div>
                <script>
                    setTimeout(function(){
                        $('.alert.alert-success').hide();
                    }, 3000);
                </script>
                @endif
                {{-- success message start --}}

            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    {{-- <form action="{{ route('backend.home_content.update') }}" method="post" enctype="multipart/form-data">
                        @csrf --}}






                    <!-- Main content -->




                    <div class="row ">




                        <div class="card card-body bg-light col-md-12 ">
                          <div class="card-header " data-toggle="collapse" data-target="#collapseContent">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Banner Section</h5>
                            
                            

                          </div>
                          <div class="collapse" id="collapseContent">
                            <div class="card-body ">

                            <form action="{{ route('backend.home_banner_section.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mt-4 mb-4">
                                    <label class="col-sm-2 mt-4 form-control-label">Banner Image: <span class="tx-danger"></span></label>
                                    <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                            <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->banner_image_show}}" alt="">
                                                <input type="file" name="banner_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                                style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                        </div>
                                    </div>
        
                                    <div class="col-sm-5 mt-4">
                                        <label class=" form-control-label">Banner Video:<span class="tx-danger"></span></label>
                                        <div class="mg-t-10 mg-sm-t-0">
                                        <input type="file" class="form-control" name="banner_video" value="{{ $home_content->banner_video }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-1 mt-4">
                                        <label class="form-control-label"><b>Play:</b></label>
                                        <div class="d-flex  align-items-center select-add-section">
                                            <a class="btn btn-primary"  data-toggle="modal" data-target="#videoModal"> &nbsp;<i class="fa fa-solid fa-play" style="color: white"></i></a>
                                        </div>
                                    </div>


                                    <!-- Modal -->
                                    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="videoModalLabel">Banner Video</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <!-- Embed your video here -->
                                            {{-- <iframe width="100%" height="315" src="{{ $item->video_file }}" frameborder="0" allowfullscreen></iframe> --}}
                                            <video controls height="350px" width="460px">
                                                <source src="{{ $home_content->banner_video_show }}" type="video/mp4" autoplay >
                                            </video>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>


                                    <hr>
                                </div>
        
                                <div class="row mt-4 mb-4">
                                    <div class="col-sm-12">
                                        <label class=" form-control-label">Banner Text:<span class="tx-danger"></span></label>
                                        <div class="mg-t-10 mg-sm-t-0">
                                        <textarea  type="text" name="banner_text" id="summernote" class="form-control" placeholder="Enter Banner Text">{{ $home_content->banner_text ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
        
                                @if($faqs->count() == 0)
        
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>
                                        <div class="mg-t-10 mg-sm-t-0">
                                        <input  value="" type="text" name="home_content_ques[]" class="form-control" placeholder="Enter Question">
                                        </div>
                                    </div>
                                    <div class="col-sm-7 d-flex align-items-center ">
                                        <div style="width: 97%;">
                                            <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text"  value="" name="home_content_ans[]" class="form-control" placeholder="Enter Answer ">
                                            </div>
                                        </div>
                                        <div>
                                            <label class=" form-control-label"></label>
                                            <a id="plus-btn-data-question" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div><!-- row -->
        
        
                                @else
                                <div class="add-question-data-show">
                                    @foreach ($faqs as $k=>$faq)
                                    <div class="row">
                                        <div class="col-sm-5 mt-3">
                                            <label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input  type="text" value="{{ $faq->question }}" name="home_content_old_ques[{{ $faq->id }}]" class="form-control" placeholder="Enter Question">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 mt-3 d-flex align-items-center ">
                                            <div style="width: 97%;">
                                                <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                <input value="{{ $faq->answer }}" type="text"   name="home_content_old_ans[{{ $faq->id }}]" class="form-control" placeholder="Enter Answer ">
                                                </div>
                                            </div>
                                            <div>
                                                <label class=" form-control-label"></label>
                                                @if($k==0)
                                                <a id="plus-btn-data-question" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                @else
                                                <a faq_id="{{ $faq->id }}" href="javascript:void(0)" class="minus-btn-question-old-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                                @endif
                                            </div>
        
                                        </div>
                                    </div><!-- row -->
                                    @endforeach
                                </div>
                                @endif

                                <div class="row mt-4">
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                      <button type="submit" class="btn btn-info ">Save</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                          </div>
                        </div>

                        <div class="card card-body bg-light col-md-12 mt-3">
                            <div class="card-header" data-toggle="collapse" data-target="#university_location_section">
                              <h5 class="card-title"><i class="fa fa-solid fa-plus"></i>Home Class List Section</h5>
                            </div>
                            <div class="collapse" id="university_location_section">
                              <form action="{{ route('backend.home_location_section.update') }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="card-body">
                                  
                                    {{-- university Location start --}}

                                    <div class="row mt-4">
                                        <div class="col-sm-12 ">
                                            <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->university_location_title ?? '' }}" name="university_location_title" class="form-control" placeholder="Enter Location Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <label class="form-control-label">Class List:</label>
                                            <div class="mg-t-10 mg-sm-t-0 add-data-class-list">
                                                @if($Home_content_class_lists->count() == 0)
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="d-flex align-items-center select-add-section p-2" style="width: 50%;">
                                                        <select  class="form-control form-select" name="class_id[]">
                                                            <option value="0">Select class</option>
                                                            @foreach ($classs as $class)
                                                            <option value="{{ @$class->id }}">{{ @$class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
        
                                                    <a id="plus-btn-data-class-list" href="javascript:void(0)" class="plus-btn-data-class-listpx-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                </div>
                                                @else
                                                @foreach ($Home_content_class_lists as $k=>$class_list)
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="d-flex align-items-center select-add-section p-2" style="width: 50%;">
                                                        <select  class="form-control form-select" name="old_class_id[{{ $class_list->id }}]">
                                                            <option value="0">Select class</option>
                                                            @foreach ($classs as $class)
                                                            <option @if ($class->id == $class_list->class_id) Selected @endif value="{{ @$class->id }}">{{ @$class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @if($k == $Home_content_class_lists->count() - 1)
                                                <a id="plus-btn-data-class-list" href="javascript:void(0)" class="plus-btn-data-class-list px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                 @else
                                                 <a class_list_id="{{ $class_list->id }}" href="javascript:void(0)" class="minus-btn-data-old-class-list px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                                 @endif
        
        
                                                </div>
                                                @endforeach
                                                @endif
        
                                            </div>
        
                                        </div>
                                    </div><!-- row -->





                                    {{-- <label class=" form-control-label mt-4">Location:<span class="tx-danger"></span></label>
                                    <div class="col-sm-12 mt-3"  style="border: 1px solid;padding:10px">
                                        <div class="mg-t-10 mg-sm-t-0 add-data-content">
                                            @if($home_content_locations->count() == 0)
                                                <div class="d-flex align-items-center mt-2 row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label"><b>Type:</b></label>
                                                        <div class="d-flex  align-items-center" >
                                                            <select  class="form-control on-click-u-lo-type"  name="type_loction_id[]">
                                                                <option value="">select type</option>
                                                                <option value="1">Continent</option>
                                                                <option value="2">Country</option>
                                                                <option value="3">State</option>
                                                                <option value="4">City</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="form-control-label"><b>Locatioin:</b></label>
                                                        <div class="d-flex  align-items-center">
                                                            <select  class="form-control" id="location" name="location_id[]">
                                                                <option value="">Select Location</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                </div>
                                            @else
                                              @foreach ($home_content_locations as $k=>$home_content_location)
                                                <div class="d-flex align-items-center mt-2 row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label"><b>Type:</b></label>
                                                        <div class="d-flex  align-items-center" >
                                                            <select  class="form-control on-click-u-lo-type"  name="old_type_loction_id[{{ $home_content_location->id }}]">
                                                                <option value="">select type</option>
                                                                @if ($home_content_location->type_loction_id == "1")
                                                                    <option @if ($home_content_location->type_loction_id == "1") Selected @endif  value="1">Continent</option>
                                                                 @elseif ($home_content_location->type_loction_id == "2")
                                                                    <option @if ($home_content_location->type_loction_id == "2") Selected @endif value="2">Country</option>
                                                                @elseif ($home_content_location->type_loction_id == "3")
                                                                    <option @if ($home_content_location->type_loction_id == "3") Selected @endif value="3">State</option>
                                                                @elseif ($home_content_location->type_loction_id == "4")
                                                                    <option @if ($home_content_location->type_loction_id == "4") Selected @endif value="4">City</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="form-control-label"><b>Locatioin:</b></label>
                                                        <div class="d-flex  align-items-center">
                                                            <select  class="form-control" id="" name="old_location_id[{{ $home_content_location->id }}]">
                                                                <option value="">Select Location</option>
                                                                @if ($home_content_location->type_loction_id == "1")
                                                                    @foreach ( $continents as $continent)
                                                                    <option @if($continent->id == $home_content_location->location_id)  Selected @endif  value="{{ $continent->id}}" >{{ $continent->name }}</option>
                                                                    @endforeach
                                                                @elseif ($home_content_location->type_loction_id == "2")
                                                                    @foreach ( $countrys as $country)
                                                                    <option @if($country->id == $home_content_location->location_id)  Selected @endif  value="{{ $country->id}}" >{{ $country->name }}</option>
                                                                    @endforeach
                                                                @elseif ($home_content_location->type_loction_id == "3")
                                                                    @foreach ( $states as $state)
                                                                    <option @if($state->id == $home_content_location->location_id)  Selected @endif  value="{{ $state->id}}" >{{ $state->name }}</option>
                                                                    @endforeach
                                                                @elseif ($home_content_location->type_loction_id == "4")
                                                                    @foreach ( $citys as $city)
                                                                    <option @if($city->id == $home_content_location->location_id)  Selected @endif  value="{{ $city->id}}" >{{ $city->name }}</option>
                                                                    @endforeach                                    
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @if($k == $home_content_locations->count() - 1)
                                                    <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                    @else
                                                    <a home_content_location_id="{{ $home_content_location->id }}" href="javascript:void(0)" class="minus-btn-data-old-audio px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                                    @endif          
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div> --}}
                                    {{-- loctaion End --}}
                                  
                                </div>
                                  
                                  <div class="row mt-4">
                                      <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                        <button type="submit" class="btn btn-info ">Save</button>
                                      </div>
                                  </div>
                              </form>
                              </div>
                        </div>
                         


                        {{-- <div class="card card-body bg-light col-md-12 mt-3">
                            <div class="card-header" data-toggle="collapse" data-target="#collapseContent_university">
                              <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> University Section</h5>
                            </div>
                            <div class="collapse" id="collapseContent_university">
                              <form action="{{ route('backend.home_university_section.update') }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="card-body">
                                  
                                      <div class="row mt-4">
                                          <div class="col-sm-12 ">
                                              <label class=" form-control-label">University Title:<span class="tx-danger"></span></label>
                                              <div class="mg-t-10 mg-sm-t-0">
                                              <input type="text" value="{{ $home_content->university_title ?? '' }}" name="sub_banner_title" class="form-control" placeholder="Enter Title 1">
                                              </div>
                                          </div>
              
              
                                          <label class="col-sm-3 mt-4 form-control-label">Background Image: <span class="tx-danger"></span></label>
                                          <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                                              <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                                  <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->university_image_show}}" alt="">
                                                      <input type="file" name="university_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                                      style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                              </div>
                                          </div>
                                          
              
                                          
                                          </div>
                                      
                                      </div>
                                  
                                  <div class="row mt-4">
                                      <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                        <button type="submit" class="btn btn-info ">Save</button>
                                      </div>
                                  </div>
                              </form>
                              </div>
                        </div> --}}


                        {{-- <div class="card card-body bg-light col-md-12 mt-3">
                          <div class="card-header" data-toggle="collapse" data-target="#collapseContent_2">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Sub Banner Section</h5>
                          </div>
                          <div class="collapse" id="collapseContent_2">
                            <form action="{{ route('backend.home_sub_banner_section.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                
                                    <div class="row mt-4">
                                        <div class="col-sm-12 ">
                                            <label class=" form-control-label">Sub Banner Title:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->sub_banner_title ?? '' }}" name="sub_banner_title" class="form-control" placeholder="Enter Title 1">
                                            </div>
                                        </div>
            
            
                                        <label class="col-sm-3 mt-4 form-control-label">Sub Banner Background Image: <span class="tx-danger"></span></label>
                                        <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                                <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->sub_banner_image_show}}" alt="">
                                                    <input type="file" name="sub_banner_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                                    style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                            </div>
                                        </div>
                                        <label class="col-sm-3 mt-4 form-control-label">Sub Banner Video Thumbnail: <span class="tx-danger"></span></label>
                                        <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                                <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->sub_banner_thumbnail_show }}" alt="">
                                                    <input type="file" name="sub_banner_thumbnail" class="form-control upload-img" placeholder="Enter Activity Image"
                                                    style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                            </div>
                                        </div>
            
                                        <div class="col-sm-12 mt-4">
                                            <label class=" form-control-label">Sub Banner Video URL:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" class="col-sm-12 form-control" name="sub_banner_video" value="{{ $home_content->sub_banner_video }}"/>
                                            </div>
                                        </div>
                                        </div>
                                    
                                    </div>
                                
                                <div class="row mt-4">
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                      <button type="submit" class="btn btn-info ">Save</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div> --}}
                      

                        
                        {{-- <div class="card card-body bg-light col-md-12 mt-3">
                          <div class="card-header" data-toggle="collapse" data-target="#collapseContent_3">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Course Section</h5>
                          </div>
                          <div class="collapse" id="collapseContent_3">
                            
                            <div class="card-body">
                                <form action="{{ route('backend.home_course_section.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-sm-12 ">
                                            <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->course_title }}" name="course_title" class="form-control" placeholder="Enter Title 1">
                                            </div>
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mt-4">
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                        <button type="submit" class="btn btn-info ">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div> --}}

                        {{-- <div class="card card-body bg-light col-md-12 mt-3">
                          <div class="card-header" data-toggle="collapse" data-target="#collapseContent_4">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Partner Section</h5>
                          </div>
                          <div class="collapse" id="collapseContent_4">
                            <div class="card-body">
                                <form action="{{ route('backend.home_partner_section.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-sm-12 ">
                                            <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->partner_title }}" name="partner_title" class="form-control" placeholder="Enter Title 1">
                                            </div>
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mt-4">
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                        <button type="submit" class="btn btn-info ">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div> --}}

                        {{-- <div class="card card-body bg-light col-md-12 mt-3">
                          <div class="card-header" data-toggle="collapse" data-target="#collapseContent_5">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Learn Anything Section</h5>
                          </div>
                          <div class="collapse" id="collapseContent_5">
                            <form action="{{ route('backend.home_learn_section.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="card-body">
                                <div class="row mt-4">
                                    <div class="col-sm-3 ">
                                        <label>Image: <span class="tx-danger"></span></label>
                                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                            <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->learn_image_show }}" alt="">
                                                <input type="file" name="learn_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                                style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 mt-4">
                                        <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                        <div class="mg-t-10 mg-sm-t-0">
                                        <textarea type="text" name="learn_title" id="summernote_one" class="form-control" placeholder="Enter Title">{{ $home_content->learn_title }}</textarea>
                                        </div>
                                    </div>
                                </div>
        
                                @if($learn_texts->count() == 0)
        
                                <div class="mt-4">
                                    <div class="col-sm-12 show-add-tagline-data">
                                        <div class="d-flex mt-3">
                                            <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                                <div class="row mt-3">
                                                    <label class="col-sm-2 mt-3">Title</label>
                                                    <div class="col-sm-10">
                                                        <input  value="" type="text" name="title[]" class="form-control" placeholder="Enter Title">
                                                    </div>
                                                    <label class="col-sm-2 mt-3">URL</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <input  value="" type="text" name="url[]" class="form-control" placeholder="Enter URL">
                                                    </div>
                                                    <label class="col-sm-2 mt-3">Description</label>
                                                    <div class="col-sm-10 mt-2">
                                                        <textarea  value="" type="text" name="description[]" class="form-control" placeholder="Enter Short Description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <a id="plus-btn-data-tagline" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div><!-- row -->
                                <hr/>
        
        
                                @else
                                <div class="add-question-data-show">
                                   
                                    <div class="mt-4">
                                        <div class="col-sm-12 show-add-tagline-data">
                                            @foreach ($learn_texts as $k=>$learn_text)
                                            <div class="d-flex mt-3">
                                                <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                                    <div class="row mt-3">
                                                        <label class="col-sm-2 mt-3">Title</label>
                                                        <div class="col-sm-10">
                                                            <input  value="{{ $learn_text->title }}" type="text" name="title_old[{{ $learn_text->id }}]" class="form-control" placeholder="Enter Title">
                                                        </div>
                                                        <label class="col-sm-2 mt-3">URL</label>
                                                        <div class="col-sm-10 mt-2">
                                                            <input  value="{{ $learn_text->url }}" type="text" name="url_old[{{ $learn_text->id }}]" class="form-control" placeholder="Enter URL">
                                                        </div>
                                                        <label class="col-sm-2 mt-3">Description</label>
                                                        <div class="col-sm-10 mt-2">
                                                            <textarea type="text" name="description_old[{{ $learn_text->id }}]" class="form-control" placeholder="Enter Short Description">{{ $learn_text->description }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class=" form-control-label"></label>
                                                @if($k==0)
                                                <a id="plus-btn-data-tagline" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                @else
                                                <a learn_id="{{ $learn_text->id }}" href="javascript:void(0)" class="minus-btn-learn-old-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div><!-- row -->
                                    
                                </div>
                                @endif

                                <div class="row mt-4">
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                      <button type="submit" class="btn btn-info ">Save</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                          </div>
                        </div> --}}




                        <div class="card card-body bg-light col-md-12 mt-3">
                            <div class="card-header" data-toggle="collapse" data-target="#collapseContent_founder">
                              <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Founder Section</h5>
                            </div>
                            <div class="collapse" id="collapseContent_founder">
                              <div class="card-body">
                                  <form action="{{ route('backend.home_founder_section.update') }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <div class="row mt-4">
                                          <div class="col-sm-12 ">
                                              <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                              <div class="mg-t-10 mg-sm-t-0">
                                              <input type="text" value="{{ $home_content->founder_title }}" name="founder_title" class="form-control" placeholder="Enter Title 1">
                                              </div>
                                          </div>
                                      </div><!-- row -->
  
                                      <div class="row mt-4">
                                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                          <button type="submit" class="btn btn-info ">Save</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                            </div>
                          </div>










                          <div class="card card-body bg-light col-md-12 mt-3">
                            <div class="card-header" data-toggle="collapse" data-target="#collapseContent_blog">
                              <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Blog Section</h5>
                            </div>
                            <div class="collapse" id="collapseContent_blog">
                              <div class="card-body">
                                  <form action="{{ route('backend.home_blog_section.update') }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <div class="row mt-4">
                                          <div class="col-sm-12 ">
                                              <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                              <div class="mg-t-10 mg-sm-t-0">
                                              <input type="text" value="{{ $home_content->blog_title }}" name="blog_title" class="form-control" placeholder="Enter Title 1">
                                              </div>
                                          </div>
                                      </div><!-- row -->
  
                                      <div class="row mt-4">
                                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                          <button type="submit" class="btn btn-info ">Save</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                            </div>
                          </div>







                          <div class="card card-body bg-light col-md-12 mt-3">
                            <div class="card-header" data-toggle="collapse" data-target="#collapseContent_teacher">
                              <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Teacher Section</h5>
                            </div>
                            <div class="collapse" id="collapseContent_teacher">
                              <div class="card-body">
                                  <form action="{{ route('backend.home_teacher_section.update') }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <div class="row mt-4">
                                          <div class="col-sm-12 ">
                                              <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                              <div class="mg-t-10 mg-sm-t-0">
                                              <input type="text" value="{{ $home_content->teacher_title }}" name="teacher_title" class="form-control" placeholder="Enter Title 1">
                                              </div>
                                          </div>
                                      </div><!-- row -->
  
                                      <div class="row mt-4">
                                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                          <button type="submit" class="btn btn-info ">Save</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                            </div>
                          </div>










                          <div class="card card-body bg-light col-md-12 mt-3">
                            <div class="card-header" data-toggle="collapse" data-target="#collapseContent_topper">
                              <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Topper Student Section</h5>
                            </div>
                            <div class="collapse" id="collapseContent_topper">
                              <div class="card-body">
                                  <form action="{{ route('backend.home_topper_section.update') }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <div class="row mt-4">
                                          <div class="col-sm-12 ">
                                              <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                              <div class="mg-t-10 mg-sm-t-0">
                                              <input type="text" value="{{ $home_content->topper_title }}" name="topper_title" class="form-control" placeholder="Enter Title 1">
                                              </div>
                                          </div>
                                      </div><!-- row -->
  
                                      <div class="row mt-4">
                                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                          <button type="submit" class="btn btn-info ">Save</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                            </div>
                          </div>


















                        {{-- <div class="card card-body bg-light col-md-12 mt-3">
                          <div class="card-header" data-toggle="collapse" data-target="#collapseContent_6">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Media Partner Section</h5>
                          </div>
                          <div class="collapse" id="collapseContent_6">
                            <div class="card-body">
                                <form action="{{ route('backend.home_media_partner_section.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-sm-12 ">
                                            <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->client_title }}" name="client_title" class="form-control" placeholder="Enter Title 1">
                                            </div>
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mt-4">
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                        <button type="submit" class="btn btn-info ">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div> --}}

                        <div class="card card-body bg-light col-md-12 mt-3">
                          <div class="card-header" data-toggle="collapse" data-target="#collapseContent_7">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Counting Section</h5>
                          </div>
                          <div class="collapse" id="collapseContent_7">
                            <div class="card-body">
                                <form action="{{ route('backend.home_counting_section.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-sm-12 ">
                                            <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->counting_title }}" name="counting_title" class="form-control" placeholder="Enter Title 1">
                                            </div>
                                        </div>
            
                                        <div class="col-sm-6 mt-3">
                                            <label class=" form-control-label">Text 1:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->count_text_1 }}" name="count_text_1" class="form-control" placeholder="Enter Text 1">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <label class=" form-control-label">Count Number 1:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->count_num_1 }}" name="count_num_1" class="form-control" placeholder="Enter Number 1">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <label class=" form-control-label">Text 2:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->count_text_2 }}" name="count_text_2" class="form-control" placeholder="Enter Text 2">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <label class=" form-control-label">Count Number 2:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->count_num_2 }}" name="count_num_2" class="form-control" placeholder="Enter Number 2">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <label class=" form-control-label">Text 3:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->count_text_3 }}" name="count_text_3" class="form-control" placeholder="Enter Text 3">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <label class=" form-control-label">Count Number 3:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->count_num_3 }}" name="count_num_3" class="form-control" placeholder="Enter Number 3">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <label class=" form-control-label">Text 4:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->count_text_4 }}" name="count_text_4" class="form-control" placeholder="Enter Text 4">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <label class=" form-control-label">Count Number 4:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->count_num_4 }}" name="count_num_4" class="form-control" placeholder="Enter Number 4">
                                            </div>
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mt-4">
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                        <button type="submit" class="btn btn-info ">Save</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                          </div>
                        </div>

                        <div class="card card-body bg-light col-md-12 mt-3">
                          <div class="card-header" data-toggle="collapse" data-target="#collapseContent_8">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Testimonials Section</h5>
                          </div>
                          <div class="collapse" id="collapseContent_8">
                            <form action="{{ route('backend.home_testimonials_section.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    
                                        <div class="row mt-4">
                                            <div class="col-sm-6 ">
                                                <label class=" form-control-label">Title 1:<span class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" value="{{ $home_content->review_title1 }}" name="review_title1" class="form-control" placeholder="Enter Title 1">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <label class=" form-control-label">Title 2:<span class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" value="{{ $home_content->review_title2 }}" name="review_title2" class="form-control" placeholder="Enter Title 1">
                                                </div>
                                            </div>
                                        </div><!-- row -->
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                    <button type="submit" class="btn btn-info ">Save</button>
                                    </div>
                                </div>
                            </form>

                          </div>
                        </div>

                        {{-- <div class="card card-body bg-light col-md-12 mt-3">
                          <div class="card-header" data-toggle="collapse" data-target="#collapseContent_9">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Package Section</h5>
                          </div>
                          <div class="collapse" id="collapseContent_9">
                            <form action="{{ route('backend.home_package_section.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row mt-4">
                                        <div class="col-sm-12 ">
                                            <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->package_title }}" name="package_title" class="form-control" placeholder="Enter Title 1">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                            <label class=" form-control-label">Package Discount Text:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->package_text }}" name="package_text" class="form-control" placeholder="Enter Discount Text">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-4">
                                            <label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->package_btn }}" name="package_btn" class="form-control" placeholder="Enter Button Text">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 mt-4">
                                            <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->package_btn_url }}" name="package_btn_url" class="form-control" placeholder="Enter Button URL">
                                            </div>
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mt-4">
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                        <button type="submit" class="btn btn-info ">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div> --}}
                        

                        
                        <div class="card card-body bg-light col-md-12 mt-3">
                          <div class="card-header" data-toggle="collapse" data-target="#collapseContent_10">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Question Section</h5>
                          </div>
                          <div class="collapse" id="collapseContent_10">
                            <form action="{{ route('backend.home_question_section.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row mt-4">


                                        <div class="col-sm-3 ">
                                            <label>Image: <span class="tx-danger"></span></label>
                                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                                <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->question_image_show }}" alt="">
                                                    <input type="file" name="question_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                                    style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                            </div>
                                        </div>
            
            
                                        <div class="col-sm-12 mt-4">
                                            <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->question_title }}" name="question_title" class="form-control" placeholder="Enter Title 1">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                            <label class=" form-control-label">Short Description:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <textarea type="text" name="ques_short_des" class="form-control" placeholder="Enter Title 1">{{ $home_content->ques_short_des }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-4">
                                            <label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->question_button_text }}" name="question_button_text" class="form-control" placeholder="Enter Title 1">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-4">
                                            <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->question_button_url }}" name="question_button_url" class="form-control" placeholder="Enter Title 1">
                                            </div>
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mt-4">
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                        <button type="submit" class="btn btn-info ">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                       

                        <div class="card card-body bg-light col-md-12 mt-3">
                          <div class="card-header" data-toggle="collapse" data-target="#collapseContent_11">
                            <h5 class="card-title"><i class="fa fa-solid fa-plus"></i> Register Page Section</h5>
                          </div>
                          <div class="collapse" id="collapseContent_11">
                            <div class="card-body">
                                <form action="{{ route('backend.home_register_section.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-sm-3 ">
                                            <label>Image: <span class="tx-danger"></span></label>
                                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                                <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->register_image_show }}" alt="">
                                                    <input type="file" name="register_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                                    style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                            </div>
                                        </div>
            
            
                                        <div class="col-sm-12 mt-4">
                                            <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <input type="text" value="{{ $home_content->register_title }}" name="register_title" class="form-control" placeholder="Enter Title 1">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                            <label class=" form-control-label">Short Description:<span class="tx-danger"></span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                            <textarea type="text" name="register_des" class="form-control" placeholder="Enter Short Description">{{ $home_content->register_des }}</textarea>
                                            </div>
                                        </div>
                                        
                                    </div><!-- row -->

                                    <div class="row mt-4">
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                        <button type="submit" class="btn btn-info ">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>


                    </div>


















{{-- 
                        <h2>Banner Section</h2>
                        


                        <div class="row mt-4 mb-4">
                            <label class="col-sm-3 mt-4 form-control-label">Banner Image: <span class="tx-danger"></span></label>
                            <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->banner_image_show}}" alt="">
                                        <input type="file" name="banner_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>

                            <div class="col-sm-6 mt-4">
                                <label class=" form-control-label">Banner Video:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="file" name="banner_video" value="{{ $home_content->banner_video }}"/>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Banner Text:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text" name="banner_text" id="summernote" class="form-control" placeholder="Enter Banner Text">{{ $home_content->banner_text ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>

                        @if($faqs->count() == 0)

                        <div class="row">
                            <div class="col-sm-5">
                                <label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input  value="" type="text" name="home_content_ques[]" class="form-control" placeholder="Enter Question">
                                </div>
                            </div>
                            <div class="col-sm-7 d-flex align-items-center ">
                                <div style="width: 97%;">
                                    <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>
                                    <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text"  value="" name="home_content_ans[]" class="form-control" placeholder="Enter Answer ">
                                    </div>
                                </div>
                                <div>
                                    <label class=" form-control-label"></label>
                                    <a id="plus-btn-data-question" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div><!-- row -->


                        @else
                        <div class="add-question-data-show">
                            @foreach ($faqs as $k=>$faq)
                            <div class="row">
                                <div class="col-sm-5 mt-3">
                                    <label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>
                                    <div class="mg-t-10 mg-sm-t-0">
                                    <input  type="text" value="{{ $faq->question }}" name="home_content_old_ques[{{ $faq->id }}]" class="form-control" placeholder="Enter Question">
                                    </div>
                                </div>
                                <div class="col-sm-7 mt-3 d-flex align-items-center ">
                                    <div style="width: 97%;">
                                        <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>
                                        <div class="mg-t-10 mg-sm-t-0">
                                        <input value="{{ $faq->answer }}" type="text"   name="home_content_old_ans[{{ $faq->id }}]" class="form-control" placeholder="Enter Answer ">
                                        </div>
                                    </div>
                                    <div>
                                        <label class=" form-control-label"></label>
                                        @if($k==0)
                                        <a id="plus-btn-data-question" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                        @else
                                        <a faq_id="{{ $faq->id }}" href="javascript:void(0)" class="minus-btn-question-old-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                        @endif
                                    </div>

                                </div>
                            </div><!-- row -->
                            @endforeach
                        </div>
                        @endif
                        <hr/>


                        <h2>Sub Banner Section</h2>
                        <div class="row mt-4">
                            <div class="col-sm-12 ">
                                <label class=" form-control-label">Sub Banner Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->sub_banner_title ?? '' }}" name="sub_banner_title" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>


                            <label class="col-sm-3 mt-4 form-control-label">Sub Banner Background Image: <span class="tx-danger"></span></label>
                            <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->sub_banner_image_show}}" alt="">
                                        <input type="file" name="sub_banner_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                            <label class="col-sm-3 mt-4 form-control-label">Sub Banner Video Thumbnail: <span class="tx-danger"></span></label>
                            <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->sub_banner_thumbnail_show }}" alt="">
                                        <input type="file" name="sub_banner_thumbnail" class="form-control upload-img" placeholder="Enter Activity Image"
                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>

                            <div class="col-sm-12 mt-4">
                                <label class=" form-control-label">Sub Banner Video URL:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" class="col-sm-12 form-control" name="sub_banner_video" value="{{ $home_content->sub_banner_video }}"/>
                                </div>
                            </div>
                        </div>
                        <hr/>


                        <h2>Course Section</h2>
                        <div class="row mt-4">
                            <div class="col-sm-12 ">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->course_title }}" name="course_title" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>
                        </div><!-- row -->
                        <hr/>

                        <h2>Partner Section</h2>
                        <div class="row mt-4">
                            <div class="col-sm-12 ">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->partner_title }}" name="partner_title" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>
                        </div><!-- row -->
                        <hr/>


                        <h2>Learn Anything Section</h2>
                        <div class="row mt-4">
                            <div class="col-sm-3 ">
                                <label>Image: <span class="tx-danger"></span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->learn_image_show }}" alt="">
                                        <input type="file" name="learn_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 mt-4">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea type="text" name="learn_title" id="summernote" class="form-control" placeholder="Enter Title">{{ $home_content->learn_title }}</textarea>
                                </div>
                            </div>
                        </div>

                        @if($learn_texts->count() == 0)

                        <div class="mt-4">
                            <div class="col-sm-12 show-add-tagline-data">
                                <div class="d-flex mt-3">
                                    <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                        <div class="row mt-3">
                                            <label class="col-sm-2 mt-3">Title</label>
                                            <div class="col-sm-10">
                                                <input  value="" type="text" name="title[]" class="form-control" placeholder="Enter Title">
                                            </div>
                                            <label class="col-sm-2 mt-3">URL</label>
                                            <div class="col-sm-10 mt-2">
                                                <input  value="" type="text" name="url[]" class="form-control" placeholder="Enter URL">
                                            </div>
                                            <label class="col-sm-2 mt-3">Description</label>
                                            <div class="col-sm-10 mt-2">
                                                <textarea  value="" type="text" name="description[]" class="form-control" placeholder="Enter Short Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <a id="plus-btn-data-tagline" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div><!-- row -->
                        <hr/>


                        @else
                        <div class="add-question-data-show">
                           
                            <div class="mt-4">
                                <div class="col-sm-12 show-add-tagline-data">
                                    @foreach ($learn_texts as $k=>$learn_text)
                                    <div class="d-flex mt-3">
                                        <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                            <div class="row mt-3">
                                                <label class="col-sm-2 mt-3">Title</label>
                                                <div class="col-sm-10">
                                                    <input  value="{{ $learn_text->title }}" type="text" name="title_old[{{ $learn_text->id }}]" class="form-control" placeholder="Enter Title">
                                                </div>
                                                <label class="col-sm-2 mt-3">URL</label>
                                                <div class="col-sm-10 mt-2">
                                                    <input  value="{{ $learn_text->url }}" type="text" name="url_old[{{ $learn_text->id }}]" class="form-control" placeholder="Enter URL">
                                                </div>
                                                <label class="col-sm-2 mt-3">Description</label>
                                                <div class="col-sm-10 mt-2">
                                                    <textarea type="text" name="description_old[{{ $learn_text->id }}]" class="form-control" placeholder="Enter Short Description">{{ $learn_text->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <label class=" form-control-label"></label>
                                        @if($k==0)
                                        <a id="plus-btn-data-tagline" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                        @else
                                        <a learn_id="{{ $learn_text->id }}" href="javascript:void(0)" class="minus-btn-learn-old-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div><!-- row -->
                            
                        </div>
                        @endif
                        <hr/>

                        <h2 class="mt-4">Media Partner Section</h2>
                        <div class="row mt-4">


                            <div class="col-sm-12 ">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->client_title }}" name="client_title" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>
                        </div><!-- row -->
                        <hr/>

                        <h2>Counting Section</h2>
                        <div class="row mt-4">
                            <div class="col-sm-12 ">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->counting_title }}" name="counting_title" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>

                            <div class="col-sm-6 mt-3">
                                <label class=" form-control-label">Text 1:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->count_text_1 }}" name="count_text_1" class="form-control" placeholder="Enter Text 1">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class=" form-control-label">Count Number 1:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->count_num_1 }}" name="count_num_1" class="form-control" placeholder="Enter Number 1">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class=" form-control-label">Text 2:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->count_text_2 }}" name="count_text_2" class="form-control" placeholder="Enter Text 2">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class=" form-control-label">Count Number 2:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->count_num_2 }}" name="count_num_2" class="form-control" placeholder="Enter Number 2">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class=" form-control-label">Text 3:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->count_text_3 }}" name="count_text_3" class="form-control" placeholder="Enter Text 3">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class=" form-control-label">Count Number 3:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->count_num_3 }}" name="count_num_3" class="form-control" placeholder="Enter Number 3">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class=" form-control-label">Text 4:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->count_text_4 }}" name="count_text_4" class="form-control" placeholder="Enter Text 4">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class=" form-control-label">Count Number 4:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->count_num_4 }}" name="count_num_4" class="form-control" placeholder="Enter Number 4">
                                </div>
                            </div>


                        </div><!-- row -->
                        <hr/>

                        <h2>Testimonials Section</h2>
                        <div class="row mt-4">


                            <div class="col-sm-6 ">
                                <label class=" form-control-label">Title 1:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->review_title1 }}" name="review_title1" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <label class=" form-control-label">Title 2:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->review_title2 }}" name="review_title2" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>
                        </div><!-- row -->
                        <hr/>

                        <h2>Package Section</h2>
                        <div class="row mt-4">
                            <div class="col-sm-12 ">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->package_title }}" name="package_title" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <label class=" form-control-label">Package Discount Text:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->package_text }}" name="package_text" class="form-control" placeholder="Enter Discount Text">
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->package_btn }}" name="package_btn" class="form-control" placeholder="Enter Button Text">
                                </div>
                            </div>
                            <div class="col-sm-8 mt-4">
                                <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->package_btn_url }}" name="package_btn_url" class="form-control" placeholder="Enter Button URL">
                                </div>
                            </div>
                        </div><!-- row -->
                        <hr/>


                        <h2>Question Section</h2>
                        <div class="row mt-4">


                            <div class="col-sm-3 ">
                                <label>Image: <span class="tx-danger"></span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->question_image_show }}" alt="">
                                        <input type="file" name="question_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>


                            <div class="col-sm-12 mt-4">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->question_title }}" name="question_title" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <label class=" form-control-label">Short Description:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea type="text" name="ques_short_des" class="form-control" placeholder="Enter Title 1">{{ $home_content->ques_short_des }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->question_button_text }}" name="question_button_text" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->question_button_url }}" name="question_button_url" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>
                        </div><!-- row -->
                        <hr/>





                        <h2>Register Page Section</h2>
                        <div class="row mt-4">
                            <div class="col-sm-3 ">
                                <label>Image: <span class="tx-danger"></span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $home_content->register_image_show }}" alt="">
                                        <input type="file" name="register_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>


                            <div class="col-sm-12 mt-4">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $home_content->register_title }}" name="register_title" class="form-control" placeholder="Enter Title 1">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <label class=" form-control-label">Short Description:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea type="text" name="register_des" class="form-control" placeholder="Enter Short Description">{{ $home_content->register_des }}</textarea>
                                </div>
                            </div>
                            
                        </div><!-- row -->
                        <hr/>









                        <div class="row mt-4">
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                              <button type="submit" class="btn btn-info ">Save</button>
                            </div>
                        </div>

                    </form> --}}

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    



@endsection
@section('script')

<script>

    //Course Contents start
$(document).ready(function() {
        $(document).on('click','#plus-btn-data-class-list',function(){



var myvar = '<div class="d-flex align-items-center mt-2">'+
''+
'                                     <div class="d-flex align-items-center select-add-section p-2" style="width: 50%;">'+
    '                                                        <select  class="form-control form-select"  name="class_id[]">'+
    '                                                            <option value="">select class</option>'+
'                                                                @foreach ($classs as $class)'+
'                                                                <option value="{{ @$class->id }}">{{ @$class->name }}</option>'+
  '                                                              @endforeach'+
    '                                                        </select>'+
'                                    </div>'+
''+
''+
'                                   <a href="javascript:void(0)" class="minus-btn-data-class-list px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';


$('.add-data-class-list').prepend(myvar);
            //console.log();
        });

        $(document).on('click','.minus-btn-data-class-list',function(){
            $(this).parent().remove();
        });

        $(document).on('click','.minus-btn-data-old-class-list',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_class[]" value="'+$(this).attr('class_list_id')+'">');
            $(this).parent().remove();
        });


    });











    //University Loction start
    $(document).ready(function() {
            $(document).on('click','#plus-btn-data-content',function(){
    
                    
    var myvar = '<div class="d-flex align-items-center mt-2 row">'+
    '                                                <div class="col-md-6">'+
    '                                                    <label class="form-control-label"><b>Type:</b></label>'+
    '                                                    <div class="d-flex  align-items-center" >'+
    '                                                        <select  class="form-control on-click-u-lo-type"  name="type_loction_id[]">'+
    '                                                            <option value="">select type</option>'+
    '                                                            <option value="1">Continent</option>'+
    '                                                            <option value="2">Country</option>'+
    '                                                            <option value="3">State</option>'+
    '                                                            <option value="4">City</option>'+
    '                                                        </select>'+
    '                                                    </div>'+
    '                                                </div>'+
    '                                                <div class="col-md-5">'+
    '                                                    <label class="form-control-label"><b>Locatioin:</b></label>'+
    '                                                    <div class="d-flex  align-items-center">'+
    '                                                        <select  class="form-control" id="location" name="location_id[]">'+
    '                                                            <option value="">Select Location</option>'+
    '                                                        </select>'+
    '                                                    </div>'+
    '                                                </div>'+
    '                                                 <a href="javascript:void(0)" class="minus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
    '                                            </div>';
        
    
        
        $('.add-data-content').prepend(myvar);
                    //console.log();
                });
        
                $(document).on('click','.minus-btn-data-content',function(){
                    $(this).parent().remove();
                });
        
        
            });
    
    
            $(document).on('click','.minus-btn-data-old-audio',function(){
                console.log(this);
                 $(this).parent().parent().append('<input type="hidden" name="delete_home_content_location[]" value="'+$(this).attr('home_content_location_id')+'">');
                $(this).parent().remove();
            });
        
        //University Location end
    
     
            $('body').on("click",'.on-click-u-lo-type',function(){
                let id = $(this).val();
                console.log(id);
                getLocation(id,"location");
            });
    
            function getLocation(id,outid){
                let url = '{{ url("/get_location_u/") }}/' + id;
                axios.get(url)
                    .then(res => {
                        console.log(res);
                    $('#'+outid).empty();
                        let html = '';
                        html += '<option value="">Select location</option>'
                        res.data.forEach(element => {
                            html += "<option value=" + element.id + ">" + element.name + "</option>"
                        });
    
    
                        $('#'+outid).append(html);
                        $('#'+outid).val("").change();
                    });
            }
    
    
    
    
        // ambulance category ajax
        // $('body').on("click",'.on-click-u-lo-type',function(){
        //     let id = $(this).val();
        //     let url = '{{ url("get-ambulances-by-cat/") }}/' + id;
        //     axios.get(url)
        //     .then(res => {
        //         $('.show-amblanc-ajax-data').html(res.data);
        //         console.log(res);
        //     });
    
        // });
        </script>
    




<script>
    $(document).ready(function() {height: 150

            /*** summernote editor two ***/
            $('#summernote_three').summernote({
                height: 150
            })
            $('#summernote_one').summernote({
                height: 150
            })

        });
    $('#plus-btn-data-question').on('click',function(){

        var out = '<div class="row">'+
                 '<div class="col-sm-5 mt-3">'+
                 '<label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>'+
                 '<div class="mg-t-10 mg-sm-t-0">'+
                    '<input  value="" type="text" name="home_content_ques[]" class="form-control" placeholder="Enter Question">'+
                    '</div></div>'+
                    ' <div class="col-sm-7 mt-3 d-flex align-items-center ">'+
                    '<div style="width: 97%;">'+
                        ' <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>'+
                        ' <div class="mg-t-10 mg-sm-t-0">'+
                        '<input type="text"  value="" name="home_content_ans[]" class="form-control" placeholder="Enter Answer ">'+
                        '</div>'+
                        '</div><div>'+
                            '<label class=" form-control-label"></label>'+
                            '<a href="javascript:void(0)" class="minus-btn-question-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
                            '</div></div></div>';

                            console.log(out);
        $('.add-question-data-show').append(out);

    });
    $(document).on('click','.minus-btn-question-data',function(){
        $(this).parent().parent().parent().remove();
    });
     $(document).on('click','.minus-btn-question-old-data',function(){

        $(this).parent().parent().parent().parent().append("<input type='hidden' name='old_delete_faq_data[]' value='"+$(this).attr('faq_id')+"'>");
        $(this).parent().parent().parent().remove();
    });








    $('#plus-btn-data-tagline').on('click',function(){

        var myvar = '<div class="d-flex mt-3">'+
'                                    <div class="" style="border: 1px solid;padding:10px;width: 97%;">'+
'                                        <div class="row mt-3">'+
'                                            <label class="col-sm-2 mt-3">Title</label>'+
'                                            <div class="col-sm-10">'+
'                                                <input  value="" type="text" name="title[]" class="form-control" placeholder="Enter Title">'+
'                                            </div>'+
'                                            <label class="col-sm-2 mt-3">URL</label>'+
'                                            <div class="col-sm-10 mt-2">'+
'                                                <input  value="" type="text" name="url[]" class="form-control" placeholder="Enter URL">'+
'                                            </div>'+
'                                            <label class="col-sm-2 mt-3">Description</label>'+
'                                            <div class="col-sm-10 mt-2">'+
'                                                <textarea  value="" type="text" name="description[]" class="form-control" placeholder="Enter Short Description"></textarea>'+
'                                           </div>'+
'                                     </div>'+
'                                  </div>'+
'                                   <a href="javascript:void(0)" class="minus-btn-data-tagline px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                               </div>';

    $('.show-add-tagline-data').append(myvar);
    tagline++;
    $(this).focus();
    });
    $(document).on('click','.minus-btn-data-tagline',function(){
        $(this).parent().parent().remove();
    });

    $(document).on('click','.minus-btn-learn-old-data',function(){

    $(this).parent().parent().parent().parent().append("<input type='hidden' name='old_delete_learn_data[]' value='"+$(this).attr('learn_id')+"'>");
    $(this).parent().parent().parent().remove();
    });

</script>

@endsection
