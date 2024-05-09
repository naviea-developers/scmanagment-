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

                    <form action="{{ route('admin.service.update',$service->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                         {{ method_field('PATCH') }}
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Image: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{$service->image_show}}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div><!-- row -->
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Service Name: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input type="text" value="{{ $service->name }}" name="name" class="form-control" placeholder="Enter Partner Name" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Service Type: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="d-flex">
                                    <input type="text" name="type[]" class="form-control" placeholder="Enter Type Name">
                                     <a id="plus-btn-data-type" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>

                            </div>
                        </div>
                        <div class="add-type-show">

                        </div>
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Service Item Group: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="d-flex">
                                    <input type="text" name="group[]" class="form-control" placeholder="Enter group Name">
                                     <a id="plus-btn-data-group" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>

                            </div>
                        </div>
                        <div class="add-group-show">

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
    $(document).on('click','#plus-btn-data-type',function(){

        var myvar = '<div class="row mt-3">'+
        '                            <label class="col-sm-3 form-control-label"></label>'+
        '                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">'+
        '                                <div class="d-flex">'+
        '                                    <input type="text" name="type[]" class="form-control" placeholder="Enter Type Name">'+
        '<a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                                </div>'+
        ''+
        '                            </div>'+
        '                        </div>';

        $('.add-type-show').append(myvar);
    });
    $(document).on('click','.minus-btn-data',function(){
        $(this).parent().parent().parent().remove();
    });
     $(document).on('click','#plus-btn-data-group',function(){

        var myvar = '<div class="row mt-3">'+
        '                            <label class="col-sm-3 form-control-label"></label>'+
        '                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">'+
        '                                <div class="d-flex">'+
        '                                    <input type="text" name="group[]" class="form-control" placeholder="Enter Group Name">'+
        '<a href="javascript:void(0)" class="minus-btn-data-group px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                                </div>'+
        ''+
        '                            </div>'+
        '                        </div>';

        $('.add-group-show').append(myvar);
    });
    $(document).on('click','.minus-btn-data-group',function(){
        $(this).parent().parent().parent().remove();
    });
</script>
@endsection

