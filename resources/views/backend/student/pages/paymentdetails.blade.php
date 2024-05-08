@extends('backend.student.master')

<style>
    .Paycard {
        height: auto;
        width: 500px;
        background: #fff;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        padding: 20px;
        border-radius: 5px;
    }
</style>

@section('content')


    <div class="Paycard">
        <h1>Payment Details</h1>

        <form action="/addPayment" method="post">

            @php
                $holder = '';
                $cardnumber = '';
                $date = '';
                $cvc = '';
            @endphp


            @foreach ($paymet as $item)
                @php
                    $holder = $item->cardholder;
                    $cardnumber = $item->cardnumber;
                    $date = $item->date;
                    $cvc = $item->cvc;
                @endphp
            @endforeach

            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="">Card Holder</label>
                    <input type="text" class="form-control" name="holder" value="{{ $holder }}">
                </div>

                <div class="col-12">
                    <label for="">Card Number *</label>
                    <input type="text" class="form-control" name="number" value="{{ $cardnumber }}">
                </div>


                <div class="col-6">
                    <label for="">Month *</label>
                    <input type="text" class="form-control" name="month" value="{{ $date }}">
                </div>


                <div class="col-6">
                    <label for="">CVC * </label>
                    <input type="text" class="form-control" name="cvc" value="{{ $cvc }}">
                </div>

                <div class="col-12">
                    <br>
                    <center><button class="btn btn-primary">Save Change</button></center>
                </div>

            </div>
        </form>

    </div>

@endsection
