@section('title')
    Admin - Add New Coupon
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.coupon.index')}}"> <i class="icon ion-reply text-22"></i> All coupon</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New coupon</h6>
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

                    <form action="{{ route('admin.coupon.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Coupon Code: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ old('code') }}" type="text" name="code" class="form-control" placeholder="Enter coupon" required>
                            </div>
                        </div><!-- row -->

                        <div class="row">
                            <label class="col-sm-3 form-control-label ">Type : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                              <select  class="form-control" name="type">
                                <option value="">Select type</option>
                                <option value="0">Percent</option>
                                <option value="1">Fixed</option>
                            </select>
                            </div>
                        </div><!-- row -->

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Amount : <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ old('amount') }}" type="number" name="amount" class="form-control" placeholder="Enter Amount" required>
                            </div>
                        </div><!-- row -->


                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.coupon.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
