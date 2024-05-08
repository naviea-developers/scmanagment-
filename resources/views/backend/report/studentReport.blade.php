@extends('backend.master')

@section('title', 'Total Student\'s')

<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"/>


<link rel="stylesheet" href="{{ URL::asset('css/custom/allStudent.css') }}">


@section('content')


  <div class="br-mainpanel">


    <div class="p-2">

      <div class="br-section-wrapper" id="printDiv">

        <div class="br-pagetitle">
            <i class="fa-duotone fa-chalkboard-user"></i>
            <div>
              <h4>View All Students</h4>
              <p class="mg-b-0">View all Course for students</p>
            </div>
          </div>

        <input type="text" id="myInput" placeholder="Search">

        <div class="table-responsive">

          <table id="dataTable" class="table">

            <thead>
              <tr>
                <th>SN</th>
                <th>Student ID</th>
                <th>Image</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Institute Name</th>
                <th>Roll Number</th>
                <th>Attendence</th>
                <th>Date</th>
              </tr>
            </thead>

            @foreach ($user as $i=>$ui)
                @php
                    $attTime = 0;
                @endphp
            <tbody>
              <tr>

              <td>{{ $i+1 }}</td>
              <td>{{ $ui->userId }}</td>
              <td><img src="{{ url('/backend/profile_picture') }}/@if(!empty($ui->img)){{ $ui->img }}@else/dft/user.png
                @endif" alt="" height="50" width="50" ></td>
              <td>{{ $ui->name }}</td>
              <td>{{ $ui->class }}</td>
              <td>{{ $ui->institute }}</td>
              <td>{{ $ui->roll }}</td>
              <td>
                @foreach ($attendance as $att)
                    @if ($att->userid == $ui->userId)
                        @php
                        $attTime++;
                            $pers = $attTime * 100 /30 ;
                        @endphp
                    @endif
                @endforeach

                @if ($attTime > 0)
                    {{ $pers }}% ({{ $attTime }} Day's)
                @endif

              </td>
              <td>
                {{ $ui->roll }}
              </td>
              </tr>
            </tbody>

            @endforeach

          </table>
        </div>

        <button onclick="print()">Print</button>

      </div>

    </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/alfrcr/paginathing/dist/paginathing.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#dataTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    function print(){
        var mywindow = window.open();
        var content = document.getElementById("printDiv").innerHTML;
        var realContent = document.body.innerHTML;
        mywindow.document.write(content);
        mywindow.document.close();
        mywindow.focus();
        mywindow.print();
        document.body.innerHTML = realContent;
        mywindow.close();
        return true;
    }
</script>
@stop
