@section('title')
    Admin - Add New Department
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('department.index')}}"> <i class="icon ion-reply text-22"></i> All Service</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Service</h6>
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

                    <form action="{{ route('admin.service.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-sm-4">
                                <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                        <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class=" form-control-label">Service Name: <span class="tx-danger">*</span></label>

                                <input value="{{ old('name') }}" type="text" name="name" class="form-control" placeholder="Enter Partner Name" required>

                            </div>
                            <div class="col-sm-4">
                                <label class=" form-control-label">Type: <span class="tx-danger">*</span></label>

                                <Select name="is_type" class="form-control service-type">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </Select>

                            </div>
                            <div class="col-sm-4 type-show-hide">
                                <label class=" form-control-label">Group: <span class="tx-danger">*</span></label>

                                <Select name="no_type_is_group" class="form-control service-group">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </Select>

                            </div>


                        </div><!-- row -->
                        <div class="type_group_section mt-3" style="display: none;">
                            <h3>Service Item:</h3>
                            <div class="type_group_add_show">
                            <div class="d-flex">
                                <div style="border: 1px solid;padding: 10px;width:97%;">
                                    <input type="text" name="no_group_type_name[]" class="form-control" placeholder="Enter Type Name">
                                    <div class="group-no-type-item-container d-flex mt-3">
                                        <div class="group-no-type-item" style="border: 1px solid;padding: 10px;width:97%;">

                                            <input type="text" name="no_type_group[]" class="form-control" placeholder="Enter group Name">
                                            <hr>
                                            <div class="no-type-group-item-add-show">
                                                <div class="d-flex mt-3">
                                                    <div style="width:90%">
                                                        <input type="text" name="group_item[]" class="form-control" placeholder="Enter Item Name">
                                                    </div>
                                                    <div class="">
                                                        <input type="text" name="group_amount[]" class="form-control ml-2" placeholder="Enter Amount">
                                                    </div>

                                                    <a href="javascript:void(0)" class="plus-btn-data-type-group-item px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>


                                        </div>
                                        <a id="plus-btn-data-no-type-group" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                                <a id="plus-btn-data-type_group_section" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                            </div>

                            </div>
                        </div>
                        <div class="row mt-3 service-no-type-group-item" style="display: none;">
                            <h3>Service Item:</h3>
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 no-type-group-add-show">
                                <div class="group-no-type-item-container d-flex">
                                    <div class="group-no-type-item" style="border: 1px solid;padding: 10px;width:97%;">

                                        <input type="text" name="no_type_group[]" class="form-control" placeholder="Enter group Name">
                                        <hr>
                                        <div class="no-type-group-item-add-show">
                                            <div class="d-flex mt-3">
                                                <div style="width:90%">
                                                    <input type="text" name="group_item[]" class="form-control" placeholder="Enter Item Name">
                                                </div>
                                                <div class="">
                                                    <input type="text" name="group_amount[]" class="form-control ml-2" placeholder="Enter Amount">
                                                </div>

                                                <a href="javascript:void(0)" class="plus-btn-data-no-type-group-item px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>


                                    </div>
                                    <a id="plus-btn-data-no-type-group" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 service-no-type--no-group-item">
                            <h3>Service Item:</h3>
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 no-type-no-group-add-show">
                                <div class="d-flex">
                                    <div style="width:90%">
                                        <input type="text" name="no_group_item[]" class="form-control" placeholder="Enter Item Name">
                                    </div>
                                    <div class="">
                                        <input type="text" name="no_group_amount[]" class="form-control ml-2" placeholder="Enter Amount">
                                    </div>
                                     <a id="plus-btn-no_type_no_group_item" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>

                            </div>
                        </div>



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
    $(document).on('change','.service-type',function(){

        if(this.value == 0){
            $('.type-show-hide').show();
            if($('.service-group').val() == 0){
                $('.service-no-type--no-group-item').show();
                $('.service-no-type-group-item').hide();
            }else{
                $('.service-no-type-group-item').show();
                $('.service-no-type--no-group-item').hide();
            }
            $('.type_group_section').hide();
        }else{
            $('.type_group_section').show();
            $('.type-show-hide').hide();
            $('.service-no-type-group-item').hide();
            $('.service-no-type--no-group-item').hide();
        }

    });
    $(document).on('change','.service-group',function(){
        if(this.value == 0){
            $('.service-no-type--no-group-item').show();
            $('.service-no-type-group-item').hide();
        }else{
            $('.service-no-type-group-item').show();
            $('.service-no-type--no-group-item').hide();
        }
    });
    $(document).on('click','#plus-btn-no_type_no_group_item',function(){


        var myvar = '<div class="d-flex mb-3">'+
        '                                    <div style="width:90%">'+
        '                                        <input type="text" name="no_group_item[]" class="form-control" placeholder="Enter Item Name">'+
        '                                    </div>'+
        '                                    <div class="">'+
        '                                        <input type="text" name="no_group_amount[]" class="form-control ml-2" placeholder="Enter Amount">'+
        '                                    </div>'+
        '<a href="javascript:void(0)" class="minus-btn-data-no-type-no-group-item px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                                </div>';



        $('.no-type-no-group-add-show').prepend(myvar);
    });
    $(document).on('click','.minus-btn-data-no-type-no-group-item',function(){
        $(this).parent().remove();
    });
    $(document).on('click','#plus-btn-data-no-type-group',function(){



        var myvar = '<div class="group-no-type-item-container d-flex mb-3">'+
        '                                    <div class="group-no-type-item" style="border: 1px solid;padding: 10px;width:97%;">'+
        ''+
        '                                        <input type="text" name="no_type_group[]" class="form-control" placeholder="Enter group Name">'+
        '                                        <hr>'+
        '                                        <div class="no-type-group-item-add-show">'+
        '                                            <div class="d-flex mt-3">'+
        '                                                <div style="width:90%">'+
        '                                                    <input type="text" name="group_item[]" class="form-control" placeholder="Enter Item Name">'+
        '                                                </div>'+
        '                                                <div class="">'+
        '                                                    <input type="text" name="group_amount[]" class="form-control ml-2" placeholder="Enter Amount">'+
        '                                                </div>'+
        ''+
        '                                                <a href="javascript:void(0)" class="plus-btn-data-no-type-group-item px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>'+
        '                                            </div>'+
        '                                        </div>'+
        ''+
        ''+
        '                                    </div>'+
        '<a href="javascript:void(0)" class="minus-btn-data-no-type-group px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                                </div>';





        $('.no-type-group-add-show').prepend(myvar);
    });
    $(document).on('click','.minus-btn-data-no-type-group',function(){
        $(this).parent().remove();
    });
    $(document).on('click','.plus-btn-data-no-type-group-item',function(){


        var myvar = '<div class="d-flex mt-3">'+
        '                                                <div style="width:90%">'+
        '                                                    <input type="text" name="group_item[]" class="form-control" placeholder="Enter Item Name">'+
        '                                                </div>'+
        '                                                <div class="">'+
        '                                                    <input type="text" name="group_amount[]" class="form-control ml-2" placeholder="Enter Amount">'+
        '                                                </div>'+
        ''+
        '<a href="javascript:void(0)" class="minus-btn-data-no-type-group-item px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                                            </div>';



        $(this).parent().parent().prepend(myvar);
    });
    $(document).on('click','.minus-btn-data-no-type-group-item',function(){
        $(this).parent().remove();
    });
    $(document).on('click','#plus-btn-data-type_group_section',function(){


var myvar = '<div class="d-flex mb-3">'+
'                                <div style="border: 1px solid;padding: 10px;width:97%;">'+
'                                    <input type="text" name="no_group_type_name[]" class="form-control" placeholder="Enter Type Name">'+
'                                    <div class="group-no-type-item-container d-flex mt-3">'+
'                                        <div class="group-no-type-item" style="border: 1px solid;padding: 10px;width:97%;">'+
''+
'                                            <input type="text" name="no_type_group[]" class="form-control" placeholder="Enter group Name">'+
'                                            <hr>'+
'                                            <div class="no-type-group-item-add-show">'+
'                                                <div class="d-flex mt-3">'+
'                                                    <div style="width:90%">'+
'                                                        <input type="text" name="group_item[]" class="form-control" placeholder="Enter Item Name">'+
'                                                    </div>'+
'                                                    <div class="">'+
'                                                        <input type="text" name="group_amount[]" class="form-control ml-2" placeholder="Enter Amount">'+
'                                                    </div>'+
''+
'                                                    <a href="javascript:void(0)" class="plus-btn-data-no-type-group-item px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>'+
'                                                </div>'+
'                                            </div>'+
''+
''+
'                                        </div>'+
'                                        <a id="plus-btn-data-no-type-group" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>'+
'                                    </div>'+
'                                </div>'+
'<a href="javascript:void(0)" class="minus-btn-data-type_group_section px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                            </div>';



        $(this).parent().parent().prepend(myvar);
    });
    $(document).on('click','.minus-btn-data-type_group_section',function(){
        $(this).parent().remove();
    });
    $(document).on('click','.plus-btn-data-type-group',function(){

    })
</script>
@endsection

