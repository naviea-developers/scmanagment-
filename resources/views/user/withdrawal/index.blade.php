@extends('user.layouts.master-layout')
@section('head')
@section('title','- Withdrawal')
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
                        @php
                            $user_balance= \App\Models\User::where('id', auth()->user()->id)->first();
                        @endphp
                    <div class="col-md-9">
                        <h4><b>Withdrawal</b></h4>
                    </div>
                    {{-- current_balance --}}
                    @if ($user_balance->current_balance > 5)
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('frontend.create_withdrawal') }}" class="btn btn-primary start-end"><i class="fa-solid fa-plus"></i> Add New</a>
                    </div>
                    @else
                    <div class="col-md-3">
                        <a href="javascript:void(0)" class="btn btn-primary start-end"><i class="fa-solid fa-plus"></i> Add New</a>
                        
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <p class="start-end" style="color:red"><b>&nbsp; Minimum withdrawal balance 5</b></p>
                    </div>
                    @endif
                </div>

                
                
                    {{-- success message start --}}
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                    {{session()->get('message')}}
                    </div>
                    <script>
                        setTimeout(function(){
                            $('.alert.alert-success').hide();
                        }, 3000);
                    </script>
                    @endif
                    {{-- success message start --}}

                <table class="table table-striped  col-md-9" >
                    <thead >
                    <tr class="" style="background-color: var(--seller_frontend_color); color:var(--seller_text_color)">
                        <th scope="col">Sl</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Fee</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @if (count($withdrawals) > 0)
                        @foreach ($withdrawals as $k=> $order)
                            
                        <tr>
                        <td>{{ $i++ }}</td>
                        
                        <td>${{  $order->amount ?? ''}}</td>
                        <td>${{  $order->fee ?? ''}}</td>
                        <td>{{  $order->created_at->format('d-m-Y') }}</td>
                        <td>@if ($order->status == 0)
                            Processing
                        @elseif ($order->status == 1)
                            Complete
                        @elseif ($order->status == 2)
                            Cancel
                        @endif</td>
                        {{-- <td>{{  $order->order->payment_status ?? ''}}</td> --}}
                        <td>
                            @if ($order->status == 1)
                            &nbsp;
                            <a href="#" data-toggle="modal" data-target="#order_details{{ $k }}"><i class="fa-duotone fa fa-eye"></i></a>
                            
                            @elseif ($order->status == 2)
                            &nbsp;
                            <a href="#" data-toggle="modal" data-target="#order_details{{ $k }}"><i class="fa-duotone fa fa-eye"></i></a>

                            @else
                            &nbsp;
                            <a href="#" data-toggle="modal" data-target="#order_details{{ $k }}"><i class="fa-duotone fa fa-eye"></i></a>
                            &nbsp;
                            <a href="{{ route('frontend.edit_withdrawal',$order->id) }}"><i class="fa-duotone fa fa-edit"></i></a>
                            &nbsp;
                            @endif
                        </td>



                        <div class="modal fade" id="order_details{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                {{-- <h5 class="modal-title" id="audioModalLabel">{{ $order->title }}</h5> --}}
                                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
                                    {{-- <span aria-hidden="true">&times;</span> --}}
                                </button>
                                </div>
                                <div class="modal-body">
                                <!-- Embed your audio here -->
                                    <h6><b>Amount:</b> {{ $order->amount }}</h6>
                                    <h6><b>Fee:</b> {{ $order->fee }}</h6>
                                    <h6><b>Payment Method:</b> @if ($order->payment_method == 0)
                                        Bank Transaction
                                        @elseif ($order->payment_method == 1)
                                        PayPal
                                        @endif
                                    </h6>
                                    <h6><b>Date:</b> {{  $order->created_at->format('d-m-Y') }}</h6>
                                    <h6><b>Transaction ID:</b> {{  $order->transaction_id }}</h6>
                                    <h6><b>Status:</b> @if ($order->status == 0)
                                        Processing
                                        @elseif ($order->status == 1)
                                            Complete
                                        @elseif ($order->status == 2)
                                            Cancel
                                        @endif
                                    </h6>
                                    <h6><b>Note:</b> {{  $order->note }}</h6>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>


                        @endforeach
                        @endif
                    </tbody>
            </table>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class=" rounded " style="background-color: var(--seller_frontend_color); color:var(--seller_text_color); margin-left:-11px">
                <div class="" style="padding: 10px">
                    <h6 class="mt-3"><b>Current Balance</b></h6>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection