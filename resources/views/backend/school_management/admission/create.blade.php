@section('title')
    Admin - Add New Admission
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')
<style>
    .hidden {
        display: none;
    }
</style>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.admission.index')}}"> <i class="icon ion-reply text-22"></i> All Admissions</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Admission</h6>
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

                    <form action="{{ route('admin.admission.store') }}" method="post" enctype="multipart/form-data">
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

                            {{-- <div class="col-sm-4">
                                <label class=" form-control-label">Class: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="class_id" id="class">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
    

                            {{-- <div class="col-sm-4 mt-3">
                            <label class=" form-control-label">Group: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="group_id" id="group">
                                <option value="">Select Group</option>
                                @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                            </div> --}}

                            {{-- <div class="col-sm-4 mt-3">
                            <label class=" form-control-label">Section: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="section_id" id="section">
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            </div> --}}

                            <div class="col-sm-4">
                                <label class="form-control-label">Class: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="class_id" id="class">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Group: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="group_id" id="group">
                                    <option value="">Select Group</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Section: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="section_id" id="section">
                                    <option value="">Select Section</option>
                                </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label">Fees: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="fee_id" >
                                <option value="">Select Fee</option>
                                @foreach ($fees as $fee)
                                <option value="{{ $fee->id }}">{{ $fee->fee_amount }}</option>
                                @endforeach
                            </select>
                            </div>

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
                                <label class="form-control-label">Age: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="number" name="age" class="form-control" placeholder="Enter Student Age" value="{{ old('age') }}" required>
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

                       
                            <div class="col-sm-6 mt-3">
                                <label class="form-control-label">Present Address: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="present_address" class="form-control" placeholder="Enter Present Address" value="{{ old('present_address') }}" >
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <label class="form-control-label">Parmanent Address: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="parmanent_address" class="form-control" placeholder="Enter Parmanent Address" value="{{ old('parmanent_address') }}" >
                                </div>
                            </div>


                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Login Password: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="password" name="password" class="form-control" placeholder="Enter Login Password" required>
                                </div>
                            </div>

                            {{-- <div class="col-sm-4">
                            <label class=" form-control-label">Continent Name:</label>
                            <select id="continent"  class="form-control" name="continent_id" id="phar_cat" >
                                <option value="">Select Continent</option>
                                @foreach ($continents as $continent)
                                <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                                @endforeach
                            </select>
                            </div> --}}

                            {{-- <div class="col-sm-4">
                            <label class=" form-control-label">Country Name:</label>
                            <select  class="form-control" name="country_id" id="country" >
                                <option value="">Select Country</option>
                                </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label">State Name:</label>
                            <select  class="form-control" name="state_id" id="state" >
                                <option value="">Select State</option>
                                </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label">City Name:</label>
                            <select  class="form-control" name="city_id" id="city" >
                                <option value="">Select State</option>
                                </select>
                            </div> --}}

                        
                           

                       

                            {{-- <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Accommodation: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea type="text" name="accommodation" class="form-control" id="summernote_three" placeholder="Enter admissions process" ></textarea>
                            </div>
                            </div>
                            
                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Admissions Process: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea type="text" name="admissions_process" class="form-control" id="summernote_two" placeholder="Enter admissions process" ></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">About: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea type="text" name="about" class="form-control" id="summernote" placeholder="Enter About" ></textarea>
                                </div>

                            </div> --}}






                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Pre School: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="checkbox" id="showInputs">
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
                                        <label class="form-control-label">Role Number: <span class="tx-danger">*</span></label>
                                        <div class="mg-t-10 mg-sm-t-0">
                                        <input type="text" name="pre_roll_number" class="form-control" placeholder="Enter Pre Class Roll" value="{{ old('pre_roll_number') }}" >
                                        </div>
                                    </div>

                                    <div class="col-sm-4 mt-3">
                                        <label class="form-control-label">Pre School Address: <span class="tx-danger">*</span></label>
                                        <div class="mg-t-10 mg-sm-t-0">
                                        <input type="text" name="pre_school_address" class="form-control" placeholder="Enter Pre School Address" value="{{ old('pre_school_address') }}" >
                                        </div>
                                    </div>

                                </div>
                            </div>









            </div>

                
                        <div class="row mt-3">
                            <hr>
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.teacher.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
     $(document).ready(function() {
        $('#class').change(function() {
            var class_id = $(this).val();
            console.log(class_id);
            if(class_id) {
                $.ajax({
                    type: "GET",
                    url: "/get-groups/" + class_id,
                    success: function(data) {
                        $('#group').html(data);
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "/get-sections/" + class_id,
                    success: function(data) {
                        $('#section').html(data);
                    }
                });
            } else {
                $('#group').html('<option value="">Select Group</option>');
                $('#section').html('<option value="">Select Section</option>');
            }
        });
    });
//class axios start
// $('body').on("change",'#class',function(){
//       let id = $(this).val();
//       getGroup(id,"group");
//   });

//   function getGroup(id,outid){
//       let url = '{{ url("get/group/") }}/' + id;
//       axios.get(url)
//           .then(res => {
//               console.log(res);
//           $('#'+outid).empty();
//               let html = '';
//               html += '<option value="">Select Group</option>'
//               res.data.forEach(element => {
//                   html += "<option value=" + element.id + ">" + element.name + "</option>"
//               });
              

//               $('#'+outid).append(html);
//               $('#'+outid).val("").change();
//           });
//   }


//   $('body').on("change",'#country',function(){
//       console.log("this");
//       let id = $(this).val();
//       getState(id,"state");
//   });




//class axios end









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


  $('body').on("change",'#state',function(){
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