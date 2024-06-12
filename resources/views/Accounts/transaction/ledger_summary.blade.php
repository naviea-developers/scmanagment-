@extends('Backend.layouts.layouts')
@section('title')
Ledger Summary
@endsection

@section('style')
<style>
    .select2-container .select2-selection--single {
        background-color: #fff;
        border: 1px solid #aaa;
        border-radius: 4px;
        height: 44px!important;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 44px;
    }
    .select2-container .select2-selection--single .select2-selection__arrow {
        height: 44px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }
    .select2-container .select2-selection--single .select2-selection__arrow b {
        border-color: #888 transparent transparent transparent;
        border-style: solid;
        border-width: 5px 4px 0 4px;
        height: 0;
        left: 50%;
        margin-left: -4px;
        margin-top: -2px;
        position: absolute;
        top: 50%;
        width: 0;
    }
    label{
        font-size: 1.2rem;
    }
</style>
@endsection
@section('main_contain')
<div class="br-mainpanel">
    <div class="br-section-wrapper mt-1 pt-1">
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
                                <h3 class="card-title m-0">Ledger Summary</h3>
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
                                <div class="col-md-4">
                                     <label for="">Account</label>
                                    <select id="account" name="ledger_account_id" class="form-control">
                                        <option value="">Select Account</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                                </div>
                            </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <div></div>
                                <div class="d-flex">

                                    <form action="{{ route('ledger_summary_pdf') }}" method="GET">
                                        <input type="hidden" value="{{ $from_date }}" name="p_from_date" class="p_from_date">
                                        <input type="hidden" value="{{ $to_date }}" name="p_to_date" class="p_to_date">
                                        <input type="hidden" value="{{ $account_id }}" name="p_account" class="p_account">
                                        <button type="submit" class="btn btn-primary px-4 ms-2">PDF</button>
                                    </form>
                                    <form action="{{ route('ledger_summary_print') }}" method="GET">
                                        <input type="hidden" value="{{ $from_date }}" name="p_from_date" class="p_from_date">
                                        <input type="hidden" value="{{ $to_date }}" name="p_to_date" class="p_to_date">
                                        <input type="hidden" value="{{ $account_id }}" name="p_account" class="p_account">
                                        <button type="submit" class="btn btn-success px-4 ms-2">Print</button>
                                    </form>
                                    <form action="{{ route('ledger_summary_excel') }}" method="GET">
                                        <input type="hidden" value="{{ $from_date }}" name="p_from_date" class="p_from_date">
                                        <input type="hidden" value="{{ $to_date }}" name="p_to_date" class="p_to_date">
                                        <input type="hidden" value="{{ $account_id }}" name="p_account" class="p_account">
                                        <button type="submit" class="btn btn-info px-4 ms-2">Excel</button>
                                    </form>
                                    {{-- <form action="{{ route('test_excel') }}" method="GET">

                                        <button type="submit" class="btn btn-info px-4 ms-2">Test Excel</button>
                                    </form> --}}

                                </div>
                            </div>
                            <!-- /.card-header -->
                            @if($transactions->count() > 0)
                            <div class="card-body">
                                <div class="" style="text-align: center;padding:0 20px;">
                                    <label for="">Ledger Sheet - ( {{ $account->title }} )</label>
                                </div>
                                <table style="border: 1px solid #dee2e6!important;" id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reference No.</th>
                                        <th>Account Name</th>
                                        <th>Transaction Type</th>
                                        <th>Reason</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; $total_dr=0; $total_cr=0;@endphp
                                    @foreach($transactions as $transaction)
                                    <tr>
                                        @if($transaction->type == "credit")
                                        @php
                                        $total_cr += $transaction->amount;
                                        @endphp

                                        @else
                                        @php
                                             $total_dr += $transaction->amount;
                                        @endphp

                                        @endif
                                        <td>{{$i}}</td>
                                        @if($transaction->sub_type == "Expense")
                                        <td>{{$transaction->expense?->reference_no}}</td>
                                        @else
                                        <td>-</td>
                                        @endif
                                        <td>{{$transaction->account?->title}}</td>
                                        <td>{{$transaction->sub_type}}</td>
                                        <td>{{$transaction->reason}}</td>
                                        <td>{{ $transaction->type == "debit" ? ( 'BDT '.round($transaction->amount,2)) : '-' }}</td>
                                        <td>{{ $transaction->type == "credit" ? ( 'BDT '.round($transaction->amount,2)) : '-' }}</td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="5">Total</td>
                                        <td>{{ 'BDT '.round( $total_dr,2) }}</td>
                                        <td>{{ 'BDT '.round( $total_cr,2) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            @endif
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
$(document).ready(function(){
    $(".fl_datepicker").flatpickr();
    $('.from_date').on('change',function(){
        $('.p_form_date').val(this.value);
    });
    $('.to_date').on('change',function(){
        $('.p_to_date').val(this.value);
    });
    $('#account').select2({
        theme: "bootstrap-5",
        placeholder: 'Select Account',
        width:'100%',
        dropdownAutoWidth : true,
        containerCssClass: 'select-sm',
        ajax: {
            url: '{{route('select2.accounts')}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    value: $.trim(params.term),
                };
            },
            processResults: function (response) {
                console.log(response);
                return {
                    results: response
                };
            },
            cache: true
        }
    }).on('select2:select', function (e) {
        var data = e.params.data;
        $('.p_account').val(data.id);

    });
    @if(request()->ledger_account_id)
        @php
            $account = \App\Models\Account\AccountHead::find(request()->ledger_account_id);
        @endphp
        @if($account)
            var account_option = new Option("{{ $account->title }}","{{ $account->id }}", true, true);
            $('#account').append(account_option).trigger('change');
        @endif
    @endif
    //  $('#dataTable').dataTable();
});
</script>
@endsection
