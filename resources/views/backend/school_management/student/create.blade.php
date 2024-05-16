@section('title')
    Admin - Add New Degree
@endsection
@extends('Backend.layouts.layouts')
@section('style')
<style>
  .hidden {
      display: none;
  }
</style>
@endsection

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.school_student.index')}}"> <i class="icon ion-reply text-22"></i> All Student</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Student</h6>
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

                    <form action="{{ route('admin.school_student.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                      <div class="row ">
                          <div class="col-sm-4" >
                              <label class="form-control-label">Student Image: <span class="tx-danger">*</span></label>
                              <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                  <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg") }}" alt="">
                                  <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                              </div>
                          </div>
                      </div>

                      <div class="row mt-4">

                          <div class="col-sm-4">
                          <label class=" form-control-label">Academic Year: <span class="tx-danger">*</span></label>
                          <select class="form-control" name="academic_year_id" >
                              <option value="">Select Academic Year</option>
                              @foreach ($academic_years as $year)
                              <option value="{{ $year->id }}">{{ $year->year }}</option>
                              @endforeach
                          </select>
                          </div>

                          <div class="col-sm-4">
                          <label class=" form-control-label">Session: <span class="tx-danger">*</span></label>
                          <select class="form-control" name="session_id" >
                              <option value="">Select Session</option>
                              @foreach ($sessions as $session)
                              <option value="{{ $session->id }}">{{ @$session->start_year->year }} - {{ @$session->end_year->year }}</option>
                              @endforeach
                          </select>
                          </div>

                          <div class="col-sm-4">
                              <label class=" form-control-label">Class: <span class="tx-danger">*</span></label>
                              <select class="form-control class_fee" name="class_id" id="class">
                                  <option value="">Select Class</option>
                                  @foreach ($classes as $class)
                                  <option value="{{ $class->id }}">{{ $class->name }}</option>
                                  @endforeach
                              </select>
                          </div>
  

                          <div class="col-sm-4 mt-3">
                            <label class=" form-control-label">Group: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="group_id" id="group">
                                <option value="">Select Group</option>
                                {{-- @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach --}}
                            </select>
                          </div>

                          <div class="col-sm-4 mt-3">
                          <label class=" form-control-label">Section: <span class="tx-danger">*</span></label>
                          <select class="form-control" name="section_id" id="section">
                              <option value="">Select Section</option>
                              {{-- @foreach ($sections as $section)
                              <option value="{{ $section->id }}">{{ $section->name }}</option>
                              @endforeach --}}
                          </select>
                          </div>

                          <div class="col-sm-4 mt-3">
                            <label class=" form-control-label">Fees: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="fee_id" id="fee">
                                <option value="">Select Fee</option>
                                {{-- @foreach ($fees as $fee)
                                <option value="{{ $fee->id }}">{{ $fee->fee_amount }}</option>
                                @endforeach --}}
                            </select>
                          </div>
                          <hr class="mt-3">
                          <h4>Student Information</h4>
                          {{-- </div>

                          <hr style="border: 5px">
                          <div class="row"> --}}

                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Student Name: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="text" name="student_name" class="form-control" placeholder="Enter Student Name" value="{{ old('student_name') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Date of Birth: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="date" name="dob" class="form-control" placeholder="Enter Student Age" value="{{ old('dob') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Student Phone: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="text" name="student_phone" class="form-control" placeholder="Enter Student Phone Num" value="{{ old('student_phone') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Student Email: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="email" name="student_email" class="form-control" placeholder="Enter Student Email" value="{{ old('student_email') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Student NID/Birth Certificate: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="text" name="student_nid" class="form-control" placeholder="Enter NID/Birth Certificate" value="{{ old('student_nid') }}" required>
                              </div>
                          </div>

                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Father Name : <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="text" name="father_name" class="form-control" placeholder="Enter Father Name" value="{{ old('father_name') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Father Occupation : <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="text" name="father_occupation" class="form-control" placeholder="Enter Father Occupation" value="{{ old('father_occupation') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Father Phone : <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="text" name="father_phone" class="form-control" placeholder="Enter Father Phone Number" value="{{ old('father_phone') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Father NID : <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="text" name="father_nid" class="form-control" placeholder="Enter Father NID" value="{{ old('father_nid') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Mother Name : <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="text" name="mother_name" class="form-control" placeholder="Enter Mother Name" value="{{ old('mother_name') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Mother Occupation : <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="text" name="mother_occupation" class="form-control" placeholder="Enter Mother Occupation" value="{{ old('mother_occupation') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Mother Phone : <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="text" name="mother_phone" class="form-control" placeholder="Enter Mother Phone Number" value="{{ old('mother_phone') }}" required>
                              </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                              <label class="form-control-label">Yearly Income : <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                              <input type="number" name="yearly_income" class="form-control" placeholder="Enter Yearly Income" value="{{ old('yearly_income') }}" required>
                              </div>
                          </div>

                          <hr class="mt-3">
                          <h4>Present Address</h4>
                          <div class="col-sm-4 mt-3">
                              <label class=" form-control-label">Continent Name:<span class="tx-danger">*</span></label>
                              <select id="continent"  class="form-control" name="present_continent_id" >
                                  <option value="">Select Continent</option>
                                  @foreach ($continents as $continent)
                                  <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                                  @endforeach
                              </select>
                          </div>
  
                              <div class="col-sm-4 mt-3">
                                 <label class=" form-control-label">Country Name:<span class="tx-danger">*</span></label>
                                <select  class="form-control" name="present_country_id" id="country" >
                                    <option value="">Select Country</option>
                                </select>
                              </div>
  
                              <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">State Name:<span class="tx-danger">*</span></label>
                                <select  class="form-control state" name="present_state_id" id="state" >
                                    <option value="">Select State</option>
                                </select>
                              </div>
  
                              <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">City Name:<span class="tx-danger">*</span></label>
                                <select  class="form-control" name="present_city_id" id="city" >
                                    <option value="">Select State</option>
                                </select>
                              </div>

                     
                              <div class="col-sm-8 mt-3">
                                  <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                  <div class="mg-t-10 mg-sm-t-0">
                                  <input type="text" name="present_address" class="form-control" placeholder="Enter Present Address" value="{{ old('present_address') }}" >
                                  </div>
                              </div>

                              <hr class="mt-3">
                              <h4>Permanent Address</h4>
                              <div class="col-sm-4 mt-3">
                                  <label class=" form-control-label">Continent Name:<span class="tx-danger">*</span></label>
                                  <select id="continent1"  class="form-control" name="permanent_continent_id" >
                                      <option value="">Select Continent</option>
                                      @foreach ($continents as $continent)
                                      <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
  
                              <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">Country Name:<span class="tx-danger">*</span></label>
                                <select  class="form-control" name="permanent_country_id" id="country1" >
                                    <option value="">Select Country</option>
                                </select>
                              </div>
  
                              <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">State Name:<span class="tx-danger">*</span></label>
                                <select  class="form-control" name="permanent_state_id" id="state1" >
                                    <option value="">Select State</option>
                                </select>
                              </div>
  
                              <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">City Name:<span class="tx-danger">*</span></label>
                                <select  class="form-control" name="permanent_city_id" id="city1" >
                                    <option value="">Select State</option>
                                </select>
                              </div>

                              <div class="col-sm-8 mt-3">
                                  <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                  <div class="mg-t-10 mg-sm-t-0">
                                  <input type="text" name="parmanent_address" class="form-control" placeholder="Enter Parmanent Address" value="{{ old('parmanent_address') }}" >
                                  </div>
                              </div>

                                <hr class="mt-3">

                                {{-- @if (Auth::check())
                                    @else --}}
                                    <div class="col-sm-4">
                                        <label class="form-control-label">Login Password: <span class="tx-danger">*</span></label>
                                        <div class="mg-t-10 mg-sm-t-0">
                                        <input type="password" name="password" class="form-control" placeholder="Enter Login Password" required>
                                        </div>
                                    </div>
                                {{-- @endif --}}
                          


                                <div class="col-sm-4 mt-3">
                                    <label class="form-control-label">New Student: </label>
                                    <div class="mg-t-10 mg-sm-t-0">
                                        <input type="checkbox" name="pre_school" value="1">
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label class="form-control-label">Pre School: </label>
                                    <div class="mg-t-10 mg-sm-t-0">
                                        <input type="checkbox" name="pre_school" value="1" id="showInputs">
                                    </div>
                                </div>

                                  <div id="inputs" class="hidden">
                                      <div class="row">
                                          <div class="col-sm-4 mt-3">
                                              <label class="form-control-label">Pre School Name: <span class="tx-danger">*</span></label>
                                              <div class="mg-t-10 mg-sm-t-0">
                                              <input type="text" name="pre_school_name" class="form-control" placeholder="Enter Pre School Name" value="{{ old('studentpre_school_name_nid') }}" >
                                              </div>
                                          </div>

                                          <div class="col-sm-4 mt-3">
                                              <label class=" form-control-label">Pre Class: <span class="tx-danger">*</span></label>
                                              <select class="form-control" name="pre_class_id">
                                                  <option value="">Select Class</option>
                                                  @foreach ($classes as $class)
                                                  <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                  @endforeach
                                              </select>
                                          </div>

                                          <div class="col-sm-4 mt-3">
                                              <label class="form-control-label">Roll Number: <span class="tx-danger">*</span></label>
                                              <div class="mg-t-10 mg-sm-t-0">
                                              <input type="text" name="pre_roll_number" class="form-control" placeholder="Enter Pre Class Roll" value="{{ old('pre_roll_number') }}" >
                                              </div>
                                          </div>

                                          <div class="col-sm-12 mt-3">
                                              <label class="form-control-label">Pre School Address: <span class="tx-danger">*</span></label>
                                              <div class="mg-t-10 mg-sm-t-0">
                                              <input type="text" name="pre_school_address" class="form-control" placeholder="Enter Pre School Address" value="{{ old('pre_school_address') }}" >
                                              </div>
                                          </div>
                                          {{-- <div class="col-sm-4 mt-3">
                                              <label class="form-control-label">Certificate: <span class="tx-danger">*</span></label>
                                              <div class="mg-t-10 mg-sm-t-0">
                                              <input type="file" name="certificate" class="form-control">
                                              </div>
                                          </div> --}}



                                          <div class="mg-t-10 mg-sm-t-0 add-data-content">
                                              {{-- @if(auth()->user()->certificate->count() == 0) --}}
                                              <div class="d-flex align-items-center mt-2 row">
                                                  <div class="col-md-7">
                                                      <label class="form-control-label"><b>Certificate Name:</b></label>
                                                      <div class="d-flex  align-items-center select-add-section " >
                                                          <input type="text" name="certificates_name[]" value="{{ old('$certificates_name') }}" class=" form-control" placeholder="Certificate Name">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <label class="form-control-label"><b>Certificate File:</b></label>
                                                      <div class="d-flex  align-items-center select-add-section">
                                                          <input type="file" name="certificates_file[]" accept="image/jpeg,image/gif,image/png,application/pdf" value="{{ old('$certificates_file') }}" class=" form-control">
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="col-md-1">
                                                      <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                  </div>
                                              </div>
                                              {{-- @else
                                              @foreach (auth()->user()->certificate as $k=>$item)
                                              <div class="d-flex align-items-center mt-2 row">
                                                  <div class="col-md-7">
                                                      <label class="form-control-label"><b>Certificate Name:</b></label>
                                                      <div class="d-flex  align-items-center select-add-section " >
                                                          <input type="text" name="old_certificates_name[{{ $item->id }}]" value="{{ $item->certificates_name }}" class=" form-control" placeholder="Certificate Name">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                      <label class="form-control-label"><b>Certificate File:</b></label>
                                                      <div class="d-flex  align-items-center select-add-section">
                                                          <input type="file" accept="image/jpeg,image/gif,image/png,application/pdf" name="old_certificates_file[{{ $item->id }}]"  value="{{ $item->certificates_file }}" class=" form-control">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-1">
                                                      <label class="form-control-label"><b>View:</b></label>
                                                      <div class="d-flex  align-items-center select-add-section">
                                                          <a class="btn btn-primary"  data-toggle="modal" data-target="#certificateModal{{ $k }}"> &nbsp;<i class="fa-solid fa-eye"></i></a>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-1">
                                                      @if($k == auth()->user()->certificate->count() - 1)
                                                      <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                      @else
                                                      <a audio_file_id="{{ $item->id }}" href="javascript:void(0)" class="minus-btn-data-old-audio px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                                      @endif
                                                  </div>
                                              </div>
              
              
              
                                              <!-- Modal -->
                                              <div class="modal fade" id="certificateModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                      <h5 class="modal-title" id="audioModalLabel" style="color: black">{{ $item->certificates_name }}</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          @if ($item->extension == 'pdf')
                                                              <iframe src="{{ $item->certificates_file_show  }}" width="100%" height="500"></iframe>
                                                          @else
                                                          <img src="{{ $item->certificates_file_show  }}" alt="image" style="height: 300px; width:450px">
                                                          @endif
                                                      </div>
                                                      <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                  </div>
                                                  </div>
                                              </div>
              
              
                                              @endforeach 
                                              @endif --}}
                                          </div>
                                      </div>
                                  </div>

                      </div>

              
                      <div class="row mt-3">
                        <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                          <a href="{{route('admin.school_student.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>



<script>

    //Audio Contents start
    $(document).ready(function() {
            $(document).on('click','#plus-btn-data-content',function(){

                var myvar = '<div class="d-flex align-items-center mt-2 row">'+
    '                                            <div class="col-md-7">'+
    '                                                <label class="form-control-label"><b>Certificate Name:</b></label>'+
    '                                                <div class="d-flex  align-items-center select-add-section " >'+
    '                                                    <input type="text" name="certificates_name[]" value="{{ old('$certificates_name') }}" class=" form-control" placeholder="Certificate Name">'+
    '                                                </div>'+
    '                                            </div>'+
    '                                            <div class="col-md-4">'+
    '                                                <label class="form-control-label"><b>Certificate File:</b></label>'+
    '                                                <div class="d-flex  align-items-center select-add-section">'+
    '                                                    <input type="file"  name="certificates_file[]" accept="image/jpeg,image/gif,image/png,application/pdf" value="{{ old('$certificates_file') }}" class=" form-control">'+
    '                                                </div>'+
    '                                            </div>'+
    '                                            <div class="col-md-1">'+
    '                                             <a href="javascript:void(0)" class="minus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
    '                                            </div>'+
    '                                        </div>';


    $('.add-data-content').prepend(myvar);
                //console.log();
            });

            $(document).on('click','.minus-btn-data-content',function(){
                $(this).parent().parent().remove();
            });


        });
        $(document).on('click','.minus-btn-data-old-audio',function(){
            console.log(this);
             $(this).parent().parent().parent().append('<input type="hidden" name="delete_certificates_file[]" value="'+$(this).attr('audio_file_id')+'">');
             $(this).parent().parent().remove();
        });

    //Audio Contents end
    </script>











<script>

$('body').on("change",'#class',function(){
      let id = $(this).val();
       console.log(id);
       schoolSection(id,"section");
  });

  function schoolSection(id,outid){
      let url = '{{ url("get/school_section/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
              let html = '';
              html += '<option value="">Select Section</option>'
              res.data.forEach(element => {
                  html += "<option value=" + element.id + ">" + element.name + "</option>"
              });


              $('#'+outid).append(html);
              $('#'+outid).val("").change();
          });
  }



$('body').on("change",'#class',function(){
      let id = $(this).val();
       console.log(id);
      getGroup(id,"group");
  });

  function getGroup(id,outid){
      let url = '{{ url("get/group/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
              let html = '';
              html += '<option value="">Select Group</option>'
              res.data.forEach(element => {
                  html += "<option value=" + element.id + ">" + element.name + "</option>"
              });


              $('#'+outid).append(html);
              $('#'+outid).val("").change();
          });
  }

$('body').on("change",'.class_fee',function(){
      let id = $(this).val();
       console.log(id);
       getFees(id,"fee");
  });

  function getFees(id,outid){
      let url = '{{ url("get/fee_management/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
              let html = '';
              html += '<option value="">Select Fee</option>'
              res.data.forEach(element => {
                  html += "<option value=" + element.id + ">" + element.fee.particular_name +" "+"("+ element.fee_amount+ ")" + "</option>"
              });


              $('#'+outid).append(html);
              $('#'+outid).val("").change();
          });
  }






//present Address
  $('body').on("change",'#continent',function(){
      let id = $(this).val();
      getCountry(id,"country");
  });

  function getCountry(id,outid){
      let url = '{{ url("get/country/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
              let html = '';
              html += '<option value="">Select Country</option>'
              res.data.forEach(element => {
                  html += "<option value=" + element.id + ">" + element.name + "</option>"
              });


              $('#'+outid).append(html);
              $('#'+outid).val("").change();
          });
  }


  $('body').on("change",'#country',function(){
      console.log("this");
      let id = $(this).val();
      getState(id,"state");
  });
  function getState(id,outid){
      let url = '{{ url("/get/state/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
            let html = '';
            html += '<option value="">Select State</option>'
            res.data.forEach(element => {
                html += "<option value=" + element.id + ">" + element.name + "</option>"
            });


            $('#'+outid).append(html);
            $('#'+outid).val("").change();
  });


  $('body').on("change",'.state',function(){
      console.log("this");
      let id = $(this).val();
      getCity(id,"city");
  });
  function getCity(id,outid){
      let url = '{{ url("/get/city/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
            let html = '';
            html += '<option value="">Select City</option>'
            res.data.forEach(element => {
                html += "<option value=" + element.id + ">" + element.name + "</option>"
            });


            $('#'+outid).append(html);
            $('#'+outid).val("").change();
      });

  }
}

</script>


<script>
    //permanent Address
      $('body').on("change",'#continent1',function(){
          let id = $(this).val();
          getCountry(id,"country1");
      });
    
      function getCountry(id,outid){
          let url = '{{ url("get/country/") }}/' + id;
          axios.get(url)
              .then(res => {
                  console.log(res);
              $('#'+outid).empty();
                  let html = '';
                  html += '<option value="">Select Country</option>'
                  res.data.forEach(element => {
                      html += "<option value=" + element.id + ">" + element.name + "</option>"
                  });
    
    
                  $('#'+outid).append(html);
                  $('#'+outid).val("").change();
              });
      }
    
    
      $('body').on("change",'#country1',function(){
          console.log("this");
          let id = $(this).val();
          getState(id,"state1");
      });
      function getState(id,outid){
          let url = '{{ url("/get/state/") }}/' + id;
          axios.get(url)
              .then(res => {
                  console.log(res);
              $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select State</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });
    
    
                $('#'+outid).append(html);
                $('#'+outid).val("").change();
      });
    
    
      $('body').on("change",'#state1',function(){
          console.log("this");
          let id = $(this).val();
          getCity(id,"city1");
      });
      function getCity(id,outid){
          let url = '{{ url("/get/city/") }}/' + id;
          axios.get(url)
              .then(res => {
                  console.log(res);
              $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select City</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });
    
    
                $('#'+outid).append(html);
                $('#'+outid).val("").change();
          });
    
      }
    }
    
</script>



<script>
    const checkbox = document.getElementById('showInputs');
    const inputsDiv = document.getElementById('inputs');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            inputsDiv.classList.remove('hidden');
        } else {
            inputsDiv.classList.add('hidden');
        }
    });
</script>
@endsection