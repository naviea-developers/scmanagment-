<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Loan Report Print</title>
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
                            <h4 style="padding: 0;margin:0;margin-bottom:10px;">Employee Loan Report</h4>
                            <Strong>Date : {{  $from_date . ' to ' . $to_date }}</Strong>
                            <br>
                        </div>

                        <table class="table table-flush mt-3" id="report-dataTable">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                <th>Date</th>
                                <th>Payment Method</th>
                                <th>Bank Account</th>
                                <th>Type</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php
                                    $debit=0;
                                    $credit=0;
                                    $balance=0;
                                @endphp
                                @foreach($reports as $key=>$report)
                                    @php
                                        $dr=0;
                                        $cr=0;
                                        if( $report->type == "Loan"){
                                            $dr=$report->amount;
                                            $debit+=$report->amount;
                                            $balance=$balance+$debit;
                                        }else{
                                            $cr=$report->amount;
                                            $credit+=$report->amount;
                                            $balance=$balance-$credit;
                                        }
                                    @endphp
                                    <tr>


                                        <td>{{ $report->employee?->name }}</td>
                                        <td>{{ date('Y-m-d',strtotime($report->loan_date)) }}</td>
                                        <td>{{ $report?->method?->name}}</td>
                                        <td>{{ $report?->bank_account?->account_name}}</td>
                                        <td>{{ $report->type }}</td>
                                        <td>{{ 'BDT'.' '.round($dr,2) }}</td>
                                        <td>{{ 'BDT'.' '.round($cr,2) }}</td>
                                        <td>{{ 'BDT'.' '.round($balance,2) }}</td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">Total</td>
                                    <td>{{ 'BDT'.' '.round($debit,2) }}</td>
                                    <td>{{ 'BDT'.' '.round($credit,2) }}</td>
                                    <td>{{ 'BDT'.' '.round($balance,2) }}</td>
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
