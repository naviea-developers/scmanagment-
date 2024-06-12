<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profit & Loss Print</title>
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
                            <h4 style="padding: 0;margin:0;margin-bottom:10px;">Profit & Loss</h4>
                            <Strong>Date : {{  $from_date . ' to ' . $to_date }}</Strong>
                            <br>
                        </div>

                        <table class="table table-flush mt-3" id="report-dataTable">
                            <thead>
                                <tr>
                                    <th>Account Name</th>
                                    <th>Account Code</th>
                                    <th>Type</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; $total_dr=0; $total_cr=0; @endphp
                                @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->account_name}}</td>
                                    <td>{{$transaction->account_code}}</td>
                                    <td>{{ $transaction->type == 4 ? "Income" : 'Expense' }}</td>
                                    @if($transaction->type == 4)
                                    @php
                                        $total_cr += $transaction->b_acount
                                    @endphp
                                    <td> -- </td>
                                    <td>{{ 'BDT '.round($transaction->b_acount,2) }}</td>
                                    @else
                                    @php
                                        $total_dr += $transaction->b_acount
                                    @endphp
                                    <td>{{  'BDT '.round($transaction->b_acount,2) }}</td>
                                    <td> -- </td>
                                    @endif
                                </tr>

                                @endforeach
                                @foreach($direct_tans as $transaction)
                                <tr>
                                    <td>{{$transaction->account_name}}</td>
                                    <td>{{$transaction->account_code}}</td>
                                    <td>{{ $transaction->type == 6 ? "Expense" : 'Income' }}</td>
                                    @if($transaction->type == 6)
                                        @php
                                            $total_dr += $transaction->b_acount
                                        @endphp
                                        <td>{{  'BDT '.round($transaction->b_acount,2) }}</td>
                                        <td> -- </td>
                                    @else
                                        @php
                                            $total_cr += $transaction->b_acount
                                        @endphp
                                        <td> -- </td>
                                        <td>{{ 'BDT '.round($transaction->b_acount,2) }}</td>
                                    @endif
                                </tr>

                                @endforeach
                               
                                @if($indirect_tans->count() > 0)

                                @foreach($indirect_tans as $transaction)
                                <tr>
                                    <td>{{$transaction->account_name}}</td>
                                    <td>{{$transaction->account_code}}</td>
                                    <td>{{ $transaction->type == 7 ? "Expense" : 'Income' }}</td>
                                    @if($transaction->type == 7)
                                        @php
                                            $total_dr += $transaction->b_acount
                                        @endphp
                                        <td>{{  'BDT '.round($transaction->b_acount,2) }}</td>
                                        <td> -- </td>
                                    @else
                                        @php
                                            $total_cr += $transaction->b_acount
                                        @endphp
                                        <td> -- </td>
                                        <td>{{ 'BDT '.round($transaction->b_acount,2) }}</td>
                                    @endif
                                </tr>

                                @endforeach
                                @endif
                                <tr>
                                    <td colspan="3"><strong>Total Expense</strong></td>
                                    <td><strong>{{ 'BDT '.round( $total_dr,2) }}</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Total Income</strong></td>
                                    <td></td>
                                    <td><strong>{{ 'BDT '.round( $total_cr,2) }}</strong></td>
                                </tr>
                                @if($total_dr > $total_cr)
                                <tr>
                                    <td colspan="3"><strong>Net Loss</strong></td>
                                    <td><strong>{{ 'BDT '.round($total_dr - $total_cr,2) }}</strong></td>
                                    <td></td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="3"><strong>Net Profit</strong></td>
                                    <td></td>
                                    <td><strong>{{ 'BDT '.round($total_cr - $total_dr,2) }}</strong></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
