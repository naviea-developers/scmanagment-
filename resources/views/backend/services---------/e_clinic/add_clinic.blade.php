@section('title')
    Admin - Add New Clinic
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
            <a class="breadcrumb-item" href="{{route('admin.e_clinic.index')}}"> <i class="icon ion-reply text-22"></i> All Clinic</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Clinic</h6>
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

                    <form action="{{ route('admin.e_clinic.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label class="form-control-label">Clinic Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg") }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-4">
                            <label class="form-control-label">Continent Name : <span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select id="continent"  class="form-control" name="continent_id">
                                    <option value="">Select Continents</option>
                                    @foreach ($continents as $continent)
                                    <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <label class="form-control-label">Country Name : <span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select  class="form-control" name="country_id" id="country">
                                    <option value="">Select Country</option>
                                    {{-- @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach --}}
                                  </select>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">State Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="state_id" id="state">
                                        <option value="">Select State</option>
                                        {{-- @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach --}}
                                      </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">City Name:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="city_id" id="city">
                                        <option value="">Select City</option>
                                        {{-- @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Post Office Name:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="post" id="post">
                                        <option value="">Select Post Office</option>
                                        {{-- @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Union Name:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="union" id="union">
                                        <option value="">Select Union</option>
                                        {{-- @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Word Name:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="word" id="word">
                                        <option value="">Select Word</option>
                                        {{-- @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Clinic Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Clinic Name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                    <input type="number" name="mobile" class="form-control" placeholder="Enter Mobile Number" value="{{ old('mobile') }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="address" class="form-control" placeholder="Enter Address"  value="{{ old('address') }}">
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.lab.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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

@endsection


