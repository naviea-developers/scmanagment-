<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ledger Summary Print</title>
    <style>
        table{
            width: 100%;
            margin-bottom: 1rem;
            vertical-align: top;
            border-color: #dee2e6;
            caption-side: bottom;
            border-collapse: collapse;
        }
        tbody, td, tfoot, th, thead, tr {
            border: 1px;
            border-color: inherit;
            border-style: solid;
        }
    </style>
    <script>
    window.print();
    window.onafterprint = back;

    function back() {
        window.close();
        window.history.back();
    }
</script>
</head>
<body>
<div class="row justify-content-center" id="printableArea">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                    <div class="account-main-title mb-5">
                        <div class="" style="text-align: center">
                             @php
                                $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
                                if($results){
                                    $dataObj = json_decode($results->option_value);
                                    $data['school_name'] = $dataObj->school_name ?? '';
                                    $data['phone1'] = $dataObj->phone1 ?? '';
                                    $data['phone2'] = $dataObj->phone2 ?? '';
                                    $data['website'] = $dataObj->website ?? '';
                                    $data['email'] = $dataObj->email ?? '';
                                    $data['address'] = $dataObj->address ?? '';
                                    $data['eiin_number'] = $dataObj->eiin_number ?? '';
                                    $data['school_logo'] = $dataObj->school_logo ?? '';
                                    $data['principal_signature'] = $dataObj->principal_signature ?? '';
                                    $data['national_father'] = $dataObj->national_father ?? '';
                                }else{
                                    $data['school_name'] = "";
                                    $data['phone1'] = "";
                                    $data['phone2'] = "";
                                    $data['email'] = "";
                                    $data['website'] = "";
                                    $data['address'] = "";
                                    $data['eiin_number'] = "";
                                    $data['school_logo'] = "";
                                    $data['principal_signature'] = "";
                                    $data['national_father'] = "";
                                }
                            @endphp
                            <h3 style="padding: 0;margin:0;">{{$data['school_name'] }}</h3>
                            <h3 style="padding: 0;margin:0;">{{  $data['phone1'] }}</h3>
                            <h3 style="padding: 0;margin:0;">{{ $data['email'] }}</h3>
                            <h3 style="padding: 0;margin:0;">{{ $data['address'] }}</h3>
                            <h4 style="padding: 0;margin:0;margin-bottom:10px;">Ledger Summary</h4>
                            <Strong>Date : {{  $from_date . ' to ' . $to_date }}</Strong>
                            <br>
                        </div>

                        <table class="table table-flush mt-3" id="report-dataTable">
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
                                    <td>{{ $transaction->type == "debit" ? ('BDT'.' '.round($transaction->amount,2)) : '-' }}</td>
                                    <td>{{ $transaction->type == "credit" ? ('BDT'.' '.round($transaction->amount,2)) : '-' }}</td>
                                </tr>
                                @php $i++; @endphp
                                @endforeach
                                <tr>
                                    <td colspan="5">Total</td>
                                    <td>{{ 'BDT ' }}{{ round( $total_dr,2) }}</td>
                                    <td>{{ 'BDT ' }}{{ round( $total_cr,2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
