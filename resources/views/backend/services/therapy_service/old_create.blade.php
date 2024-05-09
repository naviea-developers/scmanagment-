@section('title')
    Admin - Add New Therapy Service
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.therapy_service.index')}}"> <i class="icon ion-reply text-22"></i> All Therapy Service</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Therapy Service</h6>
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

                    <form action="{{ route('admin.nurse_service.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <h2>Home Care Package:</h2>
                            {{-- <label class="col-sm-3 form-control-label">Service Type: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select name="type" class="form-control service_type">
                                    <option value="">Select Type</option>
                                    <option value="1">On Call Package</option>
                                    <option value="2">Home Care Package</option>
                                </select>
                            </div> --}}
                        </div>

                        <div class="row mt-3 service-group-package-section">

                            {{-- <h3 class="mt-3">Service Packages:</h3> --}}
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 no-type-group-add-show">
                                <div class="group-no-type-item-container d-flex">
                                    <div class="group-no-type-item" style="border: 1px solid;padding: 10px;width:97%;">
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <select class="form-control" name="group[]">
                                                    <option value="">Select Group</option>
                                                    @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>


                                        <hr>
                                        <div class="no-type-group-item-add-show">
                                            <div class="d-flex mt-3">
                                                <div style="width:70%">
                                                    <input type="text" name="group_package[0][]" class="form-control" placeholder="Enter Package Name">
                                                </div>
                                                <div class="ml-2">
                                                    <input type="text" name="group_price[0][]" class="form-control" placeholder="Enter Price">
                                                </div>
                                                 <div class="ml-2">
                                                    <input type="text" name="group_pre_price[0][]" class="form-control " placeholder="Enter Pre Price">
                                                </div>
                                                <a pack_id="0" href="javascript:void(0)" class="plus-btn-group-package-item px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>


                                    </div>
                                    <a href="javascript:void(0)" class="plus-btn-group-package px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Item Name: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" class="form-control" placeholder="Enter Item Name" required>
                            </div>
                        </div> --}}
                        {{-- <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Gender Type: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select name="gender_type">
                                    <option value="0">No</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Pre Amount: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input type="text" name="pre_amount" class="form-control" placeholder="Enter Pre Amount" required>
                            </div>
                        </div> --}}
                        {{-- <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Amount: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input type="text" name="amount" class="form-control" placeholder="Enter Amount tk" required>
                            </div>
                        </div> --}}
                        {{-- <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Position: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input type="number" name="position" class="form-control" placeholder="Enter Position" required>
                            </div>
                        </div><!-- row --> --}}


                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('department.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
        '<a pack_id="'+group_count+'" href="javascript:void(0)" class="plus-btn-group-package-item px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>'+
        '                                            </div>'+
        '                                        </div>'+
        ''+
        ''+
        '                                    </div>'+
        '<a href="javascript:void(0)" class="minus-btn-group-package px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                                </div>';

        $(this).parent().parent().prepend(myvar);
        group_count++;
    });
    $(document).on('click','.minus-btn-group-package',function(){
         $(this).parent().remove();
    });
    $(document).on('click','.plus-btn-group-package-item',function(){
        let add_count= $(this).attr('pack_id');
        var myvar = '<div class="d-flex mt-3">'+
        '                                                <div style="width:70%">'+
        '                                                    <input type="text" name="group_package['+add_count+'][]" class="form-control" placeholder="Enter Package Name">'+
        '                                                </div>'+
        '                                                <div class="ml-2">'+
        '                                                    <input type="text" name="group_price['+add_count+'][]" class="form-control" placeholder="Enter Price">'+
        '                                                </div>'+
        '                                                 <div class="ml-2">'+
        '                                                    <input type="text" name="group_pre_price['+add_count+'][]" class="form-control " placeholder="Enter Pre Price">'+
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

