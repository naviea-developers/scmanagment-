@section('title')
    Admin - Add New State
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('state.index')}}"> <i class="icon ion-reply text-22"></i> All States</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New State</h6>
            {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button>
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
            {{-- success message End --}}
            
            
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

                    <form action="{{ route('state.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        
                        
                        <div class="row mt-3" id="menuimage">
                            <label class="col-sm-3 form-control-label">State Image: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                        <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                    </div>
                            </div>
                        </div><!-- row -->

                      <div class="row mt-4">
                          <label class="col-sm-3 form-control-label">Continent Name: <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <select id="continent"  class="form-control" name="continent_id" id="phar_cat" required>
                              <option value="">Select Continent</option>
                              @foreach ($continents as $continent)
                              <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      </div><!-- row -->

                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Country Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <select  class="form-control" name="country_id" id="country" required>
                            <option value="">Select Country</option>
                            {{-- @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach --}}
                          </select>
                        </div>
                      </div><!-- row -->

                          <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">State Name: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <input type="text" name="name" class="form-control" placeholder="Enter state Name" required>
                        </div>
                        </div><!-- row -->
                        

                    
                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('state.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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


    $('body').on("change",'#continent',function(){
        let id = $(this).val();
        getCountry(id,"country");
    });
    $('body').on("change",'#phar_cat',function(){
        console.log("this");
        let id = $(this).val();
        getCountry(id,"phar_subCat");
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

<!--- End ajax Sub Category Get Script-------->
</script>
@endsection