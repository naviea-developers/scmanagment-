@section('title')
    Admin - E-clinic Service Image & Banner
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.e_clinic_service.index')}}"> <i class="icon ion-reply text-22"></i> All E-clinic Service</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> E-Clinic Service Image & Banner</h6>
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

                    <form action="{{ route('admin.e_clinic_service.banner_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Service HeaderLine Image</h3>
                        <label class="col-sm-3 form-control-label">Image: <span class="tx-danger">*</span></label>
                         <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                            <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{$service->image_show}}" alt="">
                            <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                        </div>
                        <h3 class="mt-5">E-Clinic Service Banner</h3>
                        <div class="row mt-3 service-group-package-section">
                            <div class="col-sm-6">

                                <div class="row mt-3">
                                    <label class="col-sm-3 form-control-label">Banner 1: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                            <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $serviceType->banner1_show }}" alt="">
                                            <input type="file" name="banner1" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row mt-3">
                                    <label class="col-sm-3 form-control-label">Banner 2: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                            <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $serviceType->banner2_show }}" alt="">
                                            <input type="file" name="banner2" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row mt-3">
                                    <label class="col-sm-3 form-control-label">Banner Text 1: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <input value="{{ old('banner_text1') }}" type="text" name="banner_text1" class="form-control" placeholder="Enter Banner Text 1 " value="{{ $serviceType->banner_text1 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row mt-3">
                                    <label class="col-sm-3 form-control-label">Banner Text 2: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <input value="{{ old('banner_text2') }}" type="text" name="banner_text2" class="form-control" placeholder="Enter Banner Text 2 " value="{{ $serviceType->banner_text2 }}">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-5">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.e_clinic_service.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
    $(document).on('change','.service_type',function(){
        if(this.value == 1){
            $('.service-no-group-package-section').show();
            $('.service-group-package-section').hide();
        }else{
            $('.service-group-package-section').show();
            $('.service-no-group-package-section').hide();
        }
    });
    $(document).on('click','.plus-btn-_no_group_package_item',function(){

        var myvar = '<div class="d-flex mb-3">'+
        '                                    <div style="width:70%">'+
        '                                        <input type="text" name="no_group_package[]" class="form-control" placeholder="Enter Package Name">'+
        '                                    </div>'+
        '                                    <div class="ml-2">'+
        '                                        <input type="text" name="no_group_price[]" class="form-control " placeholder="Enter Price">'+
        '                                    </div>'+
        '                                    <div class="ml-2">'+
        '                                        <input type="text" name="no_group_pre_price[]" class="form-control " placeholder="Enter Pre Price">'+
        '                                    </div>'+
        '<a href="javascript:void(0)" class="minus-btn_no_group_package_item px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                                </div>';
        $(this).parent().parent().prepend(myvar);

    });
    $(document).on('click','.minus-btn_no_group_package_item',function(){
         $(this).parent().remove();
    });
    var group_count = 1;
    $(document).on('click','.plus-btn-group-package',function(){

        var myvar = '<div class="group-no-type-item-container d-flex mb-3">'+
        '                                    <div class="group-no-type-item" style="border: 1px solid;padding: 10px;width:97%;">'+
        ''+
        '                                        <input type="text" name="group[]" class="form-control" placeholder="Enter group Name">'+
        '                                        <hr>'+
        '                                        <div class="no-type-group-item-add-show">'+
        '                                            <div class="d-flex mt-3">'+
        '                                                <div style="width:70%">'+
        '                                                    <input type="text" name="group_package['+group_count+'][]" class="form-control" placeholder="Enter Package Name">'+
        '                                                </div>'+
        '                                                <div class="ml-2">'+
        '                                                    <input type="text" name="group_price['+group_count+'][]" class="form-control" placeholder="Enter Price">'+
        '                                                </div>'+
        '                                                 <div class="ml-2">'+
        '                                                    <input type="text" name="group_pre_price['+group_count+'][]" class="form-control " placeholder="Enter Pre Price">'+
        '                                                </div>'+
        '                                                <a href="javascript:void(0)" class="plus-btn-group-package-item px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>'+
        '                                            </div>'+
        '                                        </div>'+
        ''+
        ''+
        '                                    </div>'+
        '<a href="javascript:void(0)" class="minus-btn-group-package px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                                </div>';

        $(this).parent().parent().prepend(myvar);
    });
    $(document).on('click','.minus-btn-group-package',function(){
         $(this).parent().remove();
    });
    $(document).on('click','.plus-btn-group-package-item',function(){

        var myvar = '<div class="d-flex mt-3">'+
        '                                                <div style="width:70%">'+
        '                                                    <input type="text" name="group_item[]" class="form-control" placeholder="Enter Package Name">'+
        '                                                </div>'+
        '                                                <div class="ml-2">'+
        '                                                    <input type="text" name="group_price[]" class="form-control" placeholder="Enter Price">'+
        '                                                </div>'+
        '                                                 <div class="ml-2">'+
        '                                                    <input type="text" name="group_pre_price[]" class="form-control " placeholder="Enter Pre Price">'+
        '                                                </div>'+
        '<a href="javascript:void(0)" class="minus-btn-group-package-item px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                                            </div>';
        $(this).parent().parent().prepend(myvar);

    });
    $(document).on('click','.minus-btn-group-package-item',function(){
         $(this).parent().remove();
    });
</script>
@endsection

