@extends('user.layouts.master-layout')
@section('head')
@section('title','- Update withdrawal')
@endsection
@section('main_content')

<div class=" mb-3">
    {{-- <div class="row">
        <div class="col-md-6">
            <h4><b>Withdrawal</b></h4>
        </div>
        <div class="col-md-4">
            <a href="" class="btn btn-primary"><i class="fa fa-solid fa-download"></i>Add New</a>
        </div>
    </div> --}}

    <div class="row">

        <div class="col-md-8">
            <div class="card card-body shadow" style="overflow-x:auto; margin-right:10px">
                <div class="row">
                    <div class="col-md-9">
                        <h4><b>Withdrawal</b></h4>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('frontend.manage_withdrawal', auth()->user()->id) }}" class="btn btn-primary start-end"><i class="fa-solid fa-backward"></i> Go to list</a>
                    </div>
                </div>

                <hr>

                 {{-- success message start --}}
                 @if(session()->has('message'))
                 <div class="alert alert-danger">
                 {{session()->get('message')}}
                 </div>
                 <script>
                     setTimeout(function(){
                         $('.alert.alert-danger').hide();
                     }, 3000);
                 </script>
                 @endif
                 {{-- success message start --}}
                 

<form action="{{ route('frontend.update_withdrawal', $withdrawal->id) }}" method="post">
    @csrf
<div class="card card-body shadow">
                <div class="col-md-12">
                    <label class="mb-2">Amount($) <span style="color: red" >*</span></label>
                    <input type="text" class="form-control  mb-2 " value="{{ $withdrawal->amount }}"  name="amount"  placeholder="Enter Amount" required/>
                </div>
                <div class="col-md-12">
                    <label class="mb-2">Fee($) <span style="color: red" >*</span></label>
                    <input type="text" disabled class="form-control  mb-2 " value="{{ $w_fee->withdrawal_fee }}" name="fee"/>
                    <input type="hidden" class="form-control  mb-2 " value="{{ $w_fee->withdrawal_fee }}" name="fee"/>
                </div>
                <div class="col-md-12">
                    <label class="mb-2">Payment Method</label>
                    {{-- <input type="text" class="form-control  mb-2 " disabled value="{{ auth()->user()->bank_name }}" name="bank_name"  placeholder="Bank Name"/>
                    <input type="hidden" class="form-control  mb-2 " value="{{ auth()->user()->bank_name }}" name="bank_name"  placeholder="Bank Name"/> --}}
                
                    <select class="form-select form-control" name="payment_method" required>
                        <option value="">select Method</option>
                        <option @if ($withdrawal->payment_method == 0) Selected @endif value="0"> Bank Transaction </option>
                        <option  @if ($withdrawal->payment_method == 1) Selected @endif value="1" >PayPal</option>
                    </select>
                
                </div>
                <div class="col-md-12 mt-3">
                    <label class="mb-2">Note:</label>
                    <textarea type="text" class="form-control  mb-2 " name="note"  placeholder="You can add a note, if you have!">{{ $withdrawal->note }}</textarea>
                </div>
                <div class="col-md-12 mt-3">
                   <button type="submit" class="btn btn-primary">Withdraw</button>
                </div>

            </div>
            </form>

            </div>
        </div>

        <div class="col-md-4 ">
            <div class=" rounded " style="background-color: var(--seller_frontend_color); color:var(--seller_text_color); margin-left:-11px">
                <div class="" style="padding: 10px">
                    <h6 class="mt-3">Current Balance</h6>
                    <h1 >${{ auth()->user()->current_balance }}</h1>
                </div>
            </div>
            <div class="rounded mt-3" style="background-color: var(--seller_frontend_color); color:var(--seller_text_color); margin-left:-11px">
                <div style="padding: 10px" >
                    <h6 class="mt-3 mb-4"><b>You will receive money through the bank information below</b></h6>
                    <p><b>Bank Name:</b> {{ $bank->bank_name }}</p>
                    <p><b>Bank Code/IFSC:</b> {{ $bank->bank_code_ifsc }}</p>
                    <p><b>Account Number:</b> {{ $bank->bank_account_number }}</p>
                    <p><b>Account Holder Name:</b> {{ $bank->bank_ac_holder_name }}</p>
                    <p><b>PayPal ID:</b> {{ $bank->paypal_id_num }}</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script>
    $(document).ready(function() {
    $(".delete-button").click(function() {
        $("#delete-modal").show();
        $("#product_id").val($(this).attr('productId'))

    });
    $("#confirm-no").click(function() {
        $("#delete-modal").hide();
    });
    $("#confirm-yes").click(function() {
        $("#delete-modal").hide();
    });
});

</script>


@endsection