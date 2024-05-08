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

      <div class="br-section-wrapper">

        <div class="br-pagetitle">
            <i class="fa-duotone fa-chalkboard-user"></i>
            <div>
              <h4>All Classes Report</h4>
              <p class="mg-b-0">View all Classes Report</p>
            </div>
          </div>

        <div class="col-md-6" style="padding: 0px;">
            <input type="text" id="myInput" onkeyup="myFunction()"
            placeholder="Search for names.." class="form-control">
        </div>
        <div class="table-responsive" id="printDiv" style="border: 1px dotted black; text-align: center; padding: 5px; width: 100%;margin-top:10px;">
          <table id="myTable" class="table nowrap ">
            <thead>
              <tr>
                <th>SN</th>
                <th>Batch Name</th>
                <th>Class Duration</th>
                <th>Class Start</th>
                <th>Class End</th>
                <th>Weekly</th>
                <th>Number of Student</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($classreport as $i=>$cls)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $cls->batch_name }}</td>
                        <td>{{ $cls->class_duration }}</td>
                        <td>{{ $cls->class_start }}</td>
                        <td>{{ $cls->class_end }}</td>
                        <td>{{ $cls->weekly }}</td>
                        <td>
                            @php
                                $student = DB::table('student_infos')
                                ->where('class' , $cls->batch_id)
                                ->get();
                                echo count($student);
                            @endphp
                        </td>
                    </tr>
                @endforeach
            </tbody>

          </table>
        </div>
        <center>
            <button class="btn btn-primary mt-2" onclick="print()">Print</button>
        </center>

      </div>

    </div>
</div>



<script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }


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
