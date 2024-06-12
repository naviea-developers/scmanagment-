<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salary Report Print</title>
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
                            <h4 style="padding: 0;margin:0;margin-bottom:10px;">Salary Report</h4>
                            <Strong>Date : {{  $from_date . ' to ' . $to_date }}</Strong>
                            <br>
                        </div>

                        <table class="table table-flush mt-3" id="report-dataTable">
                            <thead>
                                <tr>
                                     <th>Month</th>
                                    <th>Employee Name</th>
                                    {{-- <th>Employee Id</th> --}}
                                    <th>Net Salary</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t_nets=0;
                                    $t_paids=0;
                                    $t_dues=0;
                                @endphp
                                @foreach($reports as $key=>$report)
                                    @php
                                        $t_nets+= $report->netSalary;
                                        $t_paids+= $report->paidSalary;
                                        $t_dues+= $report->due_amount;
                                    @endphp
                                    <tr>
                                        @php
                                        $month = date("M,Y",strtotime($report->month.'-01'))
                                        @endphp
                                        <td>{{ $month }}</td>

                                        <td>{{ $report->employee?->name }}</td>
                                        {{-- <td>{{ $report->employee?->employee_id }}</td> --}}
                                        <td>{{ 'BDT ' }}{{round($report->netSalary,2)}}</td>
                                        <td>{{ 'BDT ' }}{{round($report->paidSalary,2)}}</td>
                                        <td>{{ 'BDT ' }}{{round($report->due_amount,2)}}</td>
                                        <td>
                                            @if($report->payment_status == 0)
                                                <div class="badge bg-danger">Due</div>
                                            @elseif($report->payment_status == 1)
                                                <div class="badge bg-secondary">Partial</div>
                                            @else
                                                <div class="badge bg-primary">Paid</div>
                                            @endif
                                        </td>


                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td>{{ 'BDT ' }}{{ round($t_nets,2) }}</td>
                                    <td>{{ 'BDT ' }}{{ round($t_paids,2) }}</td>
                                    <td>{{ 'BDT ' }}{{ round($t_dues,2) }}</td>
                                    <td></td>
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
