@section('title')
    Admin - Add Driver
@endsection

@extends('Backend.layouts.layouts')
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
            <a class="breadcrumb-item" href="{{route('admin.ambulance.index')}}"> <i class="icon ion-reply text-22"></i> All Drivers</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Driver</h6>
               {{-- validate start  --}}
               @if(session()->has('error_message'))
               <div class="alert alert-danger">{{ session()->get('error_message') }}</div>
               @endif
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.ambulance.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-sm-12 mb-3" >
                                <label class="form-control-label">Driver Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg") }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">First Name: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" value="{{ old('fname') }}">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Last Name: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" value="{{ old('lname') }}">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Mobile Number: </label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                <input value="{{ old('mobile') }}" type="number" name="mobile" class="form-control" placeholder="Enter Mobile Number">
                                </div>
                            </div>
                            
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Email: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('email') }}" type="email" name="email" class="form-control" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Driver License:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input value="{{ old('driver_license') }}" type="text" name="driver_license" class="form-control" placeholder="Enter Driver License">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Driver Experience:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="exprience" class="form-control" placeholder="Enter Driver Experience">
                            </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <label class="form-control-label">Address:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input value="{{ old('address') }}" type="text" name="address" class="form-control" placeholder="Enter address Name">
                            </div>
                            </div>
                            

                        </div>

                        <div class="row mt-4">
                            {{-- <div class="col-sm-4">
                                <label class="form-control-label">Loction:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input value="{{ old('loction') }}" type="text" name="loction" class="form-control" placeholder="Enter Loction Name">
                            </div>
                            </div> --}}

                            
                            {{-- <div class="col-sm-4">
                                <label class="form-control-label">Ambulance Category: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control" name="ambulance_category">
                                        <option value="">Select Ambulance Category</option>
                                        <option @if(old('ambulance_category') == 'icu')selected @endif value="icu">ICU</option>
                                        <option @if(old('ambulance_category') == 'ac')selected @endif value="ac">AC</option>
                                        <option @if(old('ambulance_category') == 'non_ac')selected @endif value="non_ac">NON AC</option>
                                        <option @if(old('ambulance_category') == 'air')selected @endif value="air">AIR</option>

                                    </select>
                                </div>
                            </div> --}}
                            {{-- <div class="col-sm-4">
                                <label class="form-control-label">Ambulance Name:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input value="{{ old('ambulance_name') }}" type="text" name="ambulance_name" class="form-control" placeholder="Enter Ambulance Name">
                                </div>
                            </div> --}}

                        </div>

                        {{-- <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Ambulance Image: <span class="tx-danger"></span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                    <input type="file" name="ambulance_image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Ambulance Fee:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input value="{{ old('ambulance_fee') }}" type="number" name="ambulance_fee" class="form-control" placeholder="Enter Ambulance Fee">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Service Hours:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input value="{{ old('service_hours') }}" type="text" name="service_hours" class="form-control" placeholder="Enter Service Hours">
                            </div>
                            </div>


                        </div> --}}

                        {{-- <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Video Thumbnail: <span class="tx-danger"></span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                    <input type="file" name="video_thumbnail" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <label class="form-control-label">Video File Link: <span class="tx-danger"></span></label>
                                <input type="text" name="video_link" class="form-control" placeholder="Enter Video File Link">
                            </div>

                        </div> --}}

                        {{-- <div class="row mt-4">
                            <div class="col-sm-4">
                            <label class="form-control-label">Continent: </label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select id="continent"  class="form-control" name="continent_id" id="phar_cat">
                                    <option value="">Select Continents</option>
                                    @foreach ($continents as $continent)
                                    <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <label class="form-control-label">Country:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select  class="form-control" name="country_id" id="country">
                                    <option value="">Select Country</option>
                                  </select>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">State: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="state_id" id="state">
                                        <option value="">Select State</option>
                                      </select>
                                </div>
                                </div>
                        </div> --}}

                        {{-- <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">City: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="city_id" id="city">
                                    <option value="">Select City</option>
                                    </select>
                                </div>
                        </div> --}}

                        {{-- <div class="col-sm-4">
                            <label class="form-control-label">Post:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select  class="form-control" name="thana_id" id="post">
                            <option value="">Select Post</option>
                            </select>
                            </div>
                        </div> --}}

                        {{-- <div class="col-sm-4">
                            <label class="form-control-label">Union:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                              <select  class="form-control" name="union_id" id="union">
                                <option value="">Select Union</option>
                              </select>
                            </div>
                        </div> --}}

                        {{-- <div class="col-sm-4">
                            <label class="form-control-label">Word Name:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select  class="form-control" name="word_id" id="word">
                                    <option value="">Select Word</option>
                                </select>
                            </div>
                        </div> --}}




                        </div>
                        <div class="row mt-4">
                            {{-- <div class="col-sm-6">
                                <label class="form-control-label">Ambulance Short Description :</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea name="details" id="summernote" class="form-control" placeholder="Enter Short Description">{{ old('details') }}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-control-label">Driver Exprience :</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea name="exprience" id="summernote_two" class="form-control" placeholder="Enter Driver Exprience ">{{ old('exprience') }}</textarea>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label">About The Driver:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea name="driver_about" id="summernote_three" class="form-control" placeholder="Enter About The Driver">{{ old('driver_about') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.hospital.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
    {{-- doctor_schedule --}}
@endsection


@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>

<script>
    $('body').on("change",'#continent',function(){
     let id = $(this).val();
     if(id != ""){
        getCountry(id,"country");
     }

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

   let id = $(this).val();
   if(id != ""){
   getState(id,"state");
   }

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
   $('body').on("change",'#state',function(){
       let id = $(this).val();
       if(id != ""){
           getCity(id,"city");
       }

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

   $('body').on("change",'#city',function(){
       let id = $(this).val();
       if(id != ""){
           getPost(id,"post");
       }

   });
   function getPost(id,outid){
       let url = '{{ url("/get/thana/") }}/' + id;
       axios.get(url)
           .then(res => {
               console.log(res);
           $('#'+outid).empty();
               let html = '';
               html += '<option value="">Select Post</option>'
               res.data.forEach(element => {
                   html += "<option value=" + element.id + ">" + element.name + "</option>"
               });


               $('#'+outid).append(html);
               $('#'+outid).val("").change();
       });

   }
   $('body').on("change",'#post',function(){
       let id = $(this).val();
       if(id != ""){
           getUnion(id,"union");
       }

   });
   function getUnion(id,outid){
       let url = '{{ url("/get/union/") }}/' + id;
       axios.get(url)
           .then(res => {
               console.log(res);
           $('#'+outid).empty();
               let html = '';
               html += '<option value="">Select Union</option>'
               res.data.forEach(element => {
                   html += "<option value=" + element.id + ">" + element.name + "</option>"
               });


               $('#'+outid).append(html);
               $('#'+outid).val("").change();
       });

   }
   $('body').on("change",'#union',function(){
       let id = $(this).val();
       if(id != ""){
           getWord(id,"word");
       }

   });
   function getWord(id,outid){
       let url = '{{ url("/get/word/") }}/' + id;
       axios.get(url)
           .then(res => {
               console.log(res);
           $('#'+outid).empty();
               let html = '';
               html += '<option value="">Select Word</option>'
               res.data.forEach(element => {
                   html += "<option value=" + element.id + ">" + element.name + "</option>"
               });


               $('#'+outid).append(html);
               $('#'+outid).val("").change();
       });

   }
</script>

{{-- <script>

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

  $('body').on("change",'#thana',function(){
      console.log("this");
      let id = $(this).val();
      getUnion(id,"union");
  });
  function getUnion(id,outid){
      let url = '{{ url("/get/union/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
            let html = '';
            html += '<option value="">Select Union</option>'
            res.data.forEach(element => {
                html += "<option value=" + element.id + ">" + element.name + "</option>"
            });


            $('#'+outid).append(html);
            $('#'+outid).val("").change();
      });

  }
  $('body').on("change",'#city',function(){
      console.log("this");
      let id = $(this).val();
      getword(id,"thana");
  });
  function getword(id,outid){
      let url = '{{ url("/get/thana/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
            let html = '';
            html += '<option value="">Select Post</option>'
            res.data.forEach(element => {
                html += "<option value=" + element.id + ">" + element.name + "</option>"
            });


            $('#'+outid).append(html);
            $('#'+outid).val("").change();
      });

  }
}

</script> --}}
@endsection
