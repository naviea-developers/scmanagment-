@section('title')
    Admin - Update Clinic Service
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.e_clinic_service.index')}}"> <i class="icon ion-reply text-22"></i> All Clinic Service</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Update Clinic Service</h6>
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

                    <form action="{{ route('admin.e_clinic_service.update',$service_item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Service Type: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="type"  class="form-control" name="type">
                                        {{-- <option value="">Select Continents</option> --}}
                                        <option @if($service_item->g_type == 0) selected @endif value="0">General</option>
                                        <option @if($service_item->g_type == 1) selected @endif value="1">Lab</option>
                                    </select>
                                </div>
                            </div>
                            @if($service_item->g_type == 1)
                            <div class="col-sm-4 lab-show" @if($service_item->g_type != 1) style="display: none;" @endif>
                                <label class="form-control-label">Continent Name : <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="continent"  class="form-control" name="continent_id">
                                        <option value="">Select Continents</option>
                                        @foreach ($continents as $continent)
                                        <option @if($service_item->clinic->continent_id == $continent->id) selected @endif value="{{ $continent->id }}">{{ $continent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" @if($service_item->g_type != 1) style="display: none;" @endif>
                                <label class="form-control-label">Country Name : <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="country_id" id="country">
                                        <option value="">Select Country</option>
                                        @foreach ($service_item->clinic->continent->countries as $country)
                                        <option @if($service_item->clinic->country_id == $country->id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" @if($service_item->g_type != 1) style="display: none;" @endif>
                                <label class="form-control-label">State Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="state_id" id="state">
                                        <option value="">Select State</option>
                                        @foreach ($service_item->clinic->country->states as $state)
                                        <option @if($service_item->clinic->state_id == $state->id) selected @endif value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" @if($service_item->g_type != 1) style="display: none;" @endif>
                                <label class="form-control-label">City:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="city_id" id="city">
                                        <option value="">Select City</option>
                                        @foreach ($service_item->clinic->state->cities as $city)
                                        <option @if($service_item->clinic->city_id == $city->id) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" @if($service_item->g_type != 1) style="display: none;" @endif>
                                <label class="form-control-label">Post:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="post" id="post">
                                        <option value="">Select Post</option>
                                        @foreach ($service_item->clinic->city->thanas as $thana)
                                        <option @if($service_item->clinic->thana_id == $thana->id) selected @endif value="{{ $thana->id }}">{{ $thana->name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" @if($service_item->g_type != 1) style="display: none;" @endif>
                                <label class="form-control-label">Union:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="union" id="union">
                                        <option value="">Select Union</option>
                                        @foreach ($service_item->clinic->thana->unions as $union)
                                        <option @if($service_item->clinic->union_id == $union->id) selected @endif value="{{ $union->id }}">{{ $union->name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" @if($service_item->g_type != 1) style="display: none;" @endif>
                                <label class="form-control-label">Word:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="word" id="word">
                                        <option value="">Select Word</option>
                                        @foreach ($service_item->clinic->union->words as $word)
                                        <option @if($service_item->clinic->word_id == $word->id) selected @endif value="{{ $word->id }}">{{ $word->name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" @if($service_item->g_type != 1) style="display: none;" @endif>
                                <label class="form-control-label">Clinic:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="clinic" id="clinic">
                                        <option value="">Select Lab</option>
                                        @foreach ($service_item->clinic->word->clinics as $clinic)
                                        <option @if($service_item->clinic_id == $clinic->id) selected @endif value="{{ $clinic->id }}">{{ $clinic->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @else
                            <div class="col-sm-4 lab-show" style="display: none;">
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
                            <div class="col-sm-4 lab-show" style="display: none;">
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
                            <div class="col-sm-4 lab-show" style="display: none;">
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
                            <div class="col-sm-4 lab-show" style="display: none;">
                                <label class="form-control-label">City:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="city_id" id="city">
                                        <option value="">Select City</option>
                                        {{-- @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach --}}
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" style="display: none;">
                                <label class="form-control-label">Post Office:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="post" id="post">
                                        <option value="">Select Post Office</option>
                                        {{-- @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach --}}
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" style="display: none;">
                                <label class="form-control-label">Union:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="union" id="union">
                                        <option value="">Select Union</option>
                                        {{-- @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach --}}
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" style="display: none;">
                                <label class="form-control-label">Word:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="word" id="word">
                                        <option value="">Select Word</option>
                                        {{-- @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach --}}
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4 lab-show" style="display: none;">
                                <label class="form-control-label">Clinic:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select  class="form-control" name="clinic" id="clinic">
                                        <option value="">Select Clinic</option>
                                        {{-- @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach --}}
                                        </select>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="">Service Name</label>
                                  <input value="{{ $service_item->name }}" type="text" name="name" class="form-control" placeholder="Enter Service Name">
                            </div>

                            <div class="col-md-6">
                                <label for="">Service Price</label>
                                  <input value="{{ $service_item->price }}" type="text" name="price" class="form-control" placeholder="Enter Service Price">
                            </div>
                            <div class="col-md-6">
                                <label for="">Service Pre Price</label>
                                  <input value="{{ $service_item->pre_price }}" type="text" name="pre_price" class="form-control" placeholder="Enter Service Pre Price">
                            </div>


                        </div>
                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.burn_service.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
$('#type').on('change',function(){
    let val = $(this).val();
    console.log(val)
    if(val == 0){
        $('.lab-show').hide();
    }else if(val == 1){
        $('.lab-show').show();
    }
});
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
  $('body').on("change",'#state',function(){
    //   console.log("this");
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
    $('body').on("change",'#word',function(){
        var id = $(this).val();
        let url = '{{ url("admin/get/clinic_by_word/") }}/' + id;
        axios.get(url)
            .then(res => {
            $('#clinic').empty();
            let html = '';
            html += '<option value="">Select Clinic</option>';
            res.data.forEach(element => {
                html += "<option value=" + element.id + ">" + element.name + "</option>"
            });


            $('#clinic').html(html);
            $('#clinic').val("").change();
        });
    });
</script>
@endsection

