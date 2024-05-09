@section('title')
    Admin - Currency Edit
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.manage_currency')}}"> <i class="icon ion-reply text-22"></i> All Currency List</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update currency Profile</h6>
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

                    <form action="{{ route('admin.update_currency', $currency->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @csrf

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Currency Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="currency_name" class="form-control" placeholder="Enter currency name (USD)" value="{{ $currency->currency_name }}" required>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Currency Icon: <span class="tx-danger">*</span></label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                <input value="{{ $currency->currency_icon }}" type="text" name="currency_icon" class="form-control" placeholder="Enter currency icon" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Currency Position: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                 <select  class="form-control" name="currency_position" required>
                                    <option value="">Select Position</option>
                                    <option @if ($currency->currency_position == 'left') Selected @endif  value="left">Left</option>
                                    <option  @if ($currency->currency_position == 'right') Selected @endif value="right">Right</option>
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
                                    <option @if ($currency->thousands_separator == 'comma') Selected @endif value="comma">Comma ( , )</option>
                                    <option @if ($currency->thousands_separator == 'point') Selected @endif value="point">Point ( . )</option>
                                    <option @if ($currency->thousands_separator == 'space') Selected @endif value="space">Space (  )</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-4">
                                <label class=" form-control-label">Decimal Separator:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                 <select  class="form-control" name="decimal_separator" required>
                                    <option value="">Select Separator</option>
                                    <option @if ($currency->decimal_separator == 'comma') Selected @endif value="comma">Comma ( , )</option>
                                    <option @if ($currency->decimal_separator == 'point') Selected @endif value="point">Point ( . )</option>
                                    <option @if ($currency->decimal_separator == 'space') Selected @endif value="space">Space (  )</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class=" form-control-label">Decimal Digit:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                 <select  class="form-control" name="decimal_digit" required>
                                    <option value="">Select Separator</option>
                                    <option @if ($currency->decimal_digit == '0') Selected @endif value="0">Digit ( 0 )</option>
                                    <option @if ($currency->decimal_digit == '1') Selected @endif value="1">Digit ( 1 )</option>
                                    <option @if ($currency->decimal_digit == '2') Selected @endif value="2">Digit ( 2 )</option>
                                    <option @if ($currency->decimal_digit == '3') Selected @endif value="3">Digit ( 3 )</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <label class=" form-control-label">Exchange Rate:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input value="{{ $currency->exchange_rate }}" type="text" name="exchange_rate" class="form-control" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                              <label class=" form-control-label">
                                 <input @if ($currency->is_default == '1') Checked @endif type="checkbox" name="is_default" value="1">
                                  Is Defualt
                              </label>
                            </div>


                            
                        </div>

                        
                       

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.manage_currency')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update</button>
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
