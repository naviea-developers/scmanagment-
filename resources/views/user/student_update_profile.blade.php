@extends('user.layouts.master-layout')
@section('head')
@section('title','- Update Profile')

@endsection
@section('main_content')

@php
    $student = App\Models\Admission::where('user_id', auth()->user()->id)->first();
@endphp

    <div class="container py-2" >
        <div class="card card-body shadow" style="background-color: var(--seller_background_color);">
            <div class="col-md-12">
                <div class="right_section">
                    <div>
                        <h4 style="color:var(--seller_text_color)">Edit Profile</h4>
                    </div>
                </div>


                <form action="{{ route('student.profile_info_update', auth()->user()->id) }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    
                        <div class="row ">
                            <div class="col-sm-4">
                                <label class="form-control-label">Student Image:</label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $student->image_show }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">


                            <hr class="mt-3">
                            
                            <input type="hidden" name="student_id_number" value="{{ $student->student_id_number }}"/>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Student Name: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="student_name" class="form-control" placeholder="Enter Student Name" value="{{ $student->student_name }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Date of Birth: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="date" name="dob" class="form-control" placeholder="Enter Student Age" value="{{ $student->dob }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Student Phone: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="student_phone" class="form-control" placeholder="Enter Student Phone Num" value="{{ $student->student_phone }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Student Email: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="email" name="student_email" class="form-control" placeholder="Enter Student Email" value="{{ $student->student_email }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Student NID/Birth Certificate: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="student_nid" class="form-control" placeholder="Enter NID/Birth Certificate" value="{{ $student->student_nid }}" required>
                                </div>
                            </div>



                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">Blood Group: </label>
                                <select class="form-control" name="blood_group" >
                                    <option value="">Select Blood Group</option>
                                    <option @if ($student->blood_group == 'o+') Selected @endif value="o+">O Positive (O+)</option>
                                    <option @if ($student->blood_group == 'o-') Selected @endif value="o-">O Negative (O-)</option>
                                    <option @if ($student->blood_group == 'a+') Selected @endif value="a+">A Positive (A+)</option>
                                    <option @if ($student->blood_group == 'a-') Selected @endif value="a-">A Negative (A-)</option>
                                    <option @if ($student->blood_group == 'b+') Selected @endif value="b+">B Positive (B+)</option>
                                    <option @if ($student->blood_group == 'b-') Selected @endif value="b-">B Negative (B-)</option>
                                    <option @if ($student->blood_group == 'ab+') Selected @endif value="ab+">AB Positive (AB+)</option>
                                    <option @if ($student->blood_group == 'ab-') Selected @endif value="ab-">AB Negative (AB-)</option>
                                </select>
                            </div>


                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Father Name : </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="father_name" class="form-control" placeholder="Enter Father Name" value="{{ $student->father_name }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Father Occupation : </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="father_occupation" class="form-control" placeholder="Enter Father Occupation" value="{{ $student->father_occupation }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Father Phone : </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="father_phone" class="form-control" placeholder="Enter Father Phone Number" value="{{ $student->father_phone }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Father NID : </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="father_nid" class="form-control" placeholder="Enter Father NID" value="{{ $student->father_nid }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Mother Name : </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="mother_name" class="form-control" placeholder="Enter Mother Name" value="{{ $student->mother_name }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Mother Occupation : </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="mother_occupation" class="form-control" placeholder="Enter Mother Occupation" value="{{$student->mother_occupation }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Mother Phone : </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="mother_phone" class="form-control" placeholder="Enter Mother Phone Number" value="{{$student->mother_phone }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label">Yearly Income : </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" name="yearly_income" class="form-control" placeholder="Enter Yearly Income" value="{{$student->yearly_income }}" required>
                                </div>
                            </div>




                            <hr class="mt-3">
                            <h4>Present Address</h4>
                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">Continent Name:</label>
                                <select id="continent"  class="form-control" name="present_continent_id" >
                                    <option value="">Select Continent</option>
                                    @foreach ($continents as $continent)
                                    <option @if ($continent->id == $student->present_continent_id) Selected @endif value="{{ $continent->id }}">{{ $continent->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">Country Name:</label>
                                <select  class="form-control" name="present_country_id" id="country" >
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                    <option @if ($country->id == $student->present_country_id) Selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">State Name:</label>
                                <select  class="form-control state" name="present_state_id" id="state" >
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                    <option @if ($state->id == $student->present_state_id) Selected @endif value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">City Name:</label>
                                <select  class="form-control" name="present_city_id" id="city" >
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                    <option @if ($city->id == $student->present_city_id) Selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>


            
                            <div class="col-sm-8 mt-3">
                                <label class="form-control-label">Address: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="present_address" class="form-control" placeholder="Enter Present Address" value="{{ $student->present_address }}" >
                                </div>
                            </div>




                            <hr class="mt-3">
                            <h4>Permanent Address</h4>
                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">Continent Name:</label>
                                <select id="continent1"  class="form-control" name="permanent_continent_id" >
                                    <option value="">Select Continent</option>
                                    @foreach ($continents as $continent)
                                    <option @if ($continent->id == $student->permanent_continent_id) Selected @endif value="{{ $continent->id }}">{{ $continent->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">Country Name:</label>
                                <select  class="form-control" name="permanent_country_id" id="country1" >
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                    <option @if ($country->id == $student->permanent_country_id) Selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">State Name:</label>
                                <select  class="form-control" name="permanent_state_id" id="state1" >
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                    <option @if ($state->id == $student->permanent_state_id) Selected @endif value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class=" form-control-label">City Name:</label>
                                <select  class="form-control" name="permanent_city_id" id="city1" >
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                    <option @if ($city->id == $student->permanent_city_id) Selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-8 mt-3">
                                <label class="form-control-label">Address: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="parmanent_address" class="form-control" placeholder="Enter Parmanent Address" value="{{ $student->parmanent_address }}" >
                                </div>
                            </div>


                            <hr class="mt-3">

                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Reason (Why you want to update your profile?): </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea type="text" name="reason" rows="5" class="form-control" placeholder="Enter your Reason here." ></textarea>
                                </div>
                            </div>
                                    
                        </div>

                
                        <div class="row mt-3">
                            <hr>
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                <a href="{{url('/')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                                <button type="submit" class="btn btn-info ">Submit Request</button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection


@section('script')


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
}

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
    }
    
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
    
    
</script>



<script>
    $(document).on('change','.upload-img',function(){
       var files = $(this).get(0).files;
       var reader = new FileReader();
       reader.readAsDataURL(files[0]);
       var arg=this;
       reader.addEventListener("load", function(e) {
           var image = e.target.result;
           $(arg).parent().find('.display-upload-img').attr('src', image);
       });
   });
</script>

@endsection
