@extends('Backend.layouts.layouts')
@section('title')
Balance Sheet
@endsection

@section('style')
<style>
    label{
        font-size: 1.2rem;
    }
</style>
@endsection
@section('main_contain')
<div class="br-mainpanel">
    <div class="br-section-wrapper">

    <!-- Main content -->
    <section class="content-head">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Balance Sheet</h3>
                            </div>
                            <form action="">
                            <div class="row p-3">
                                <div class="col-md-4">
                                    <label for="">From Date</label>
                                    <input type="text" name="from_date" value="{{ $from_date }}" class="form-control fl_datepicker">
                                </div>
                                <div class="col-md-4">
                                    <label for="">To Date</label>
                                    <input type="text" name="to_date" value="{{ $to_date }}" class="form-control fl_datepicker">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                                </div>
                            </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <div></div>
                                <div class="d-flex">

                                    <form action="{{ route('balance_sheet_pdf') }}" method="GET">
                                        <input type="hidden" value="{{ $from_date }}" name="p_from_date" class="p_from_date">
                                        <input type="hidden" value="{{ $to_date }}" name="p_to_date" class="p_to_date">
                                        <button type="submit" class="btn btn-primary px-4 ms-2">PDF</button>
                                    </form>
                                    <form action="{{ route('balance_sheet_print') }}" method="GET">
                                        <input type="hidden" value="{{ $from_date }}" name="p_from_date" class="p_from_date">
                                        <input type="hidden" value="{{ $to_date }}" name="p_to_date" class="p_to_date">
                                        <button type="submit" class="btn btn-success px-4 ms-2">Print</button>
                                    </form>
                                    <form action="{{ route('balance_sheet_excel') }}" method="GET">
                                        <input type="hidden" value="{{ $from_date }}" name="p_from_date" class="p_from_date">
                                        <input type="hidden" value="{{ $to_date }}" name="p_to_date" class="p_to_date">
                                        <button type="submit" class="btn btn-info px-4 ms-2">Excel</button>
                                    </form>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>

                                        <th>Asset</th>
                                        <th>Ammount</th>
                                        <th>Liability & Equity</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php $total_a=0;  $total_l=0;@endphp
                                        @foreach($transactions as $transaction)
                                        <tr>
                                        @if($transaction->type == 1)
                                        @php
                                            $total_a += $transaction->b_acount;
                                        @endphp
                                            <td>{{$transaction->account_name}}</td>
                                            <td>{{'BDT '.round($transaction->b_acount,2)}}</td>
                                            <td></td>
                                            <td></td>
                                        @else
                                        @php
                                            $total_l += $transaction->b_acount;
                                        @endphp
                                        <td></td>
                                            <td></td>
                                            <td>{{$transaction->account_name}}</td>
                                            <td>{{'BDT '.round($transaction->b_acount,2)}}</td>
                                        @endif


                                        </tr>

                                        @endforeach
                                        <tr>
                                            <td><b>Total</b></td>
                                            <td><b>{{ 'BDT '.round($total_a,2) }}</b></td>
                                            <td></td>
                                            <td><b>{{ 'BDT '.round($total_l,2) }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
</div>

@endsection
@section('script')
<script>
$(".fl_datepicker").flatpickr();
$('.from_date').on('change',function(){
    $('.p_form_date').val(this.value);
});
$('.to_date').on('change',function(){
    $('.p_to_date').val(this.value);
});
</script>
@endsection
