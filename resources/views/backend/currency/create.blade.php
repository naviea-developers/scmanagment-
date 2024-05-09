@section('title')
    Admin - Add New Currency
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.manage_currency')}}"> <i class="icon ion-reply text-22"></i> All Currency</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Currency</h6>
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

                    <form action="{{ route('admin.stor_currency') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Currency Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="currency_name" class="form-control" placeholder="Enter currency name (USD)" value="{{ old('currency_name') }}" required>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Currency Icon: <span class="tx-danger">*</span></label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                <input value="{{ old('currency_icon') }}" type="text" name="currency_icon" class="form-control" placeholder="Enter currency icon ($)" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Currency Position: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                 <select  class="form-control" name="currency_position" required>
                                    <option value="">Select Position</option>
                                    <option  value="left">Left</option>
                                    <option  value="right">Right</option>
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class=" form-control-label">Thousands Separator:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                 <select  class="form-control" name="thousands_separator" required>
                                    <option value="">Select Separator</option>
                                    <option  value="comma">Comma ( , )</option>
                                    <option  value="point">Point ( . )</option>
                                    <option  value="space">Space (  )</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-4">
                                <label class=" form-control-label">Decimal Separator:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                 <select  class="form-control" name="decimal_separator" required>
                                    <option value="">Select Separator</option>
                                    <option  value="comma">Comma ( , )</option>
                                    <option  value="point">Point ( . )</option>
                                    <option  value="space">Space (  )</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class=" form-control-label">Decimal Digit:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                 <select  class="form-control" name="decimal_digit" required>
                                    <option value="">Select Separator</option>
                                    <option  value="0">Digit ( 0 )</option>
                                    <option  value="1">Digit ( 1 )</option>
                                    <option  value="2">Digit ( 2 )</option>
                                    <option  value="3">Digit ( 3 )</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <label class=" form-control-label">Exchange Rate:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ old('exchange_rate') }}" type="text" name="exchange_rate" class="form-control" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                              <label class=" form-control-label">
                                 <input type="checkbox" name="status" value="1">
                                  Is Defualt
                              </label>
                            </div>


                            
                        </div>

                        
                       

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.manage_currency')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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

