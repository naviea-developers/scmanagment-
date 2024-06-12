<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Leave Print</title>
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
                            <h4 style="padding: 0;margin:0;margin-bottom:10px;">Employee Leave Report</h4>
                            <Strong>Date : {{  $from_date . ' to ' . $to_date }}</Strong>
                            <br>
                        </div>

                        <table class="table table-flush mt-3" id="report-dataTable">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>Leave Part</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Day</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php $day=0; @endphp
                                @foreach($reports as $key=>$report)

                                    <tr>
                                        <td>{{ $report->employee?->name }}</td>
                                        <td>{{$report->leaveTypeID}}</td>
                                        <td>{{$report->leavePartID}}</td>
                                        <td>{{date('F j, Y',strtotime($report->fromDate))}}</td>
                                        <td>{{date('F j, Y',strtotime($report->toDate))}}</td>
                                        <td>{{$report->leaveDay}}</td>
                                        <td>
                                            @if($report->status==0)
                                                <span style="font-weight: bold;">Pending</span>
                                            @elseif($report->status==1)
                                            <span style="font-weight: bold;">Approved</span>
                                            @php $day+=$report->leaveDay; @endphp
                                            @else
                                            <span style="color:red;font-weight: bold;">Reject</span>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
