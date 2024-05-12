@extends('Frontend.layouts.master-layout')
@section('title','- Admission')
@section('head')

@endsection
@section('main_contend')
<style>
    .hidden {
        display: none;
    }
</style>
<br>
<br>
<br>
<div class="py-5">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row mx-0 align-items-center border-md rounded-3">
                    
                    <div class="col-md-12 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5" style="background: #117873; color:white">
                        <h3 class="text-center">School Admission</h3>
                         
                        <form action="{{ route('frontend.student_admission.store') }}" class="myform" id="learner_myform" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
                                <select class="form-control" name="class_id">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label">Group: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="group_id" >
                                <option value="">Select Group</option>
                                @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label">Section: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="section_id" >
                                <option value="">Select Section</option>
                                @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
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
                                <select  class="form-control" name="present_state_id" id="state" >
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



















                        @if (Auth::check())
                            @else
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Login Password: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="password" name="password" class="form-control" placeholder="Enter Login Password" required>
                                </div>
                            </div>
                        @endif
                            


                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Pre School: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="checkbox" name="pre_school" id="showInputs">
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


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('Frontend.layouts.parts.news-letter')

@endsection



@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>

<script>
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