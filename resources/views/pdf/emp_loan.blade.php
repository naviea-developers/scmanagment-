<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Reports</title>
      <style type="text/css">
        *,
        *:after,
        *:before {
          box-sizing: inherit;
          font-family: Open Sans, sans-serif !important;
        }

        html {
          box-sizing: border-box;
          font-family: Open Sans, sans-serif !important;
        }

        body {
          font-size: 15px;
          font-weight: 300;
          letter-spacing: 0.01em;
          line-height: 1.6;
          color: #2c2c2c;
          font-family: Open Sans, sans-serif !important;
        }

        p{
          margin: 0;
          padding: 0;
          display: block;
        }

        table {
          border-spacing: 0;
          width: 100%;
        }

        .content-wrapper, .content{
          width: 100%;
          height: 100%;
          overflow: hidden;
        }

        .invoice-header-left{
          width: 50%;
          margin: 0;
          padding: 0;
          float: left;
        }

        .invoice-header-right{
          width: 50%;
          margin: 0;
          padding: 0;
          float: left;
          text-align: right;
        }

        .invoice-logo{
          width: 100%;
          margin-bottom: 50px;
          overflow: hidden;
        }

        .product-details{
          width: 100%;
          margin-top: 30px;
          margin-bottom: 15px;
          overflow: hidden;
        }

        .table{
          height: 100%;
          width: 100%;
          margin: 0;
          padding: 0;
        }

        .table tr th, .table tr td{
          text-align: center;
          padding: 5px;
          border: 1px solid #ddd;
          font-size: 12px;
          vertical-align: middle;
        }

        .table.table-borderless tr th, .table.table-borderless tr td{
          border: none;
          vertical-align: middle;
        }

        .product-image{
          width: 50px;
          height: 40px;
          margin: 0;
          padding: 0;
        }

        .footer{
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          text-align: center;
        }
      </style>
    </head>
    <body>
        <div class="content-wrapper">
            <div class="content">
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
                <div class="product-details">
                    <table class="table" cellspacing="0" width="100%">
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
                </div><!--/.product-details-->
            </div><!--/.content-->
        </div><!--/.content-wrapper-->
    </body>
</html>
