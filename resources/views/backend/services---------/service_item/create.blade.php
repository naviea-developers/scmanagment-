@section('title')
    Admin - Add New {{ $service->name }} - SErvice Item
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('department.index')}}"> <i class="icon ion-reply text-22"></i> All {{ $service->name }} - Service Item</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New {{ $service->name }} - Service Item</h6>
               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-8 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.service.item.store',$service->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Service Type: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select name="type">
                                    <option value="">Select Type</option>
                                    @foreach ($service->types as $type)
                                     <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Item Name: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input value="{{ old('name') }}" type="text" name="name" class="form-control" placeholder="Enter Item Name" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Gender Type: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select name="gender_type">
                                    <option value="0">No</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Pre Amount: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input value="{{ old('pre_amount') }}" type="text" name="pre_amount" class="form-control" placeholder="Enter Pre Amount" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Amount: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input value="{{ old('amount') }}" type="text" name="amount" class="form-control" placeholder="Enter Amount tk" required>
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
</script>
@endsection

