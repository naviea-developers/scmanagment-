@extends('backend.master')

@section('title', 'View Teacher')

<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"/>

<link rel="stylesheet" href="{{ URL::asset('css/custom/viewTeacher.css') }}">


@section('content')

<div class="br-mainpanel">

  <div class="p-2">

    <div class="br-section-wrapper" id="printDiv">

        <div class="br-pagetitle">
            <i class="fa-duotone fa-chalkboard-user"></i>
            <div>
              <h4>View All Teachers</h4>
              <p class="mg-b-0">All Teachers details</p>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label text-dark">From</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="min" name="min" placeholder="mm/dd/yyyy">
                    </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label text-dark">To</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="max" name="max" placeholder="mm/dd/yyyy">
                    </div>
                </div>
              </div>
          </div>


  <br>

              <div class="table-responsive">
                <table id="datatable-buttons" class="table nowrap ">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Subject</th>
                              <th>Experience</th>
                              <th>Degree</th>
                          </tr>
                      </thead>
                      <tbody class="refarel_table">
                          @php
                              $classTeachers = DB::table('class_wise_teacher')->get();
                              $teachers = DB::table('teacher_info')->get();
                              $users = DB::table('user')->get();
                          @endphp
                          @foreach ($teachers as $item)
                              <tr>
                                  <td>{{ $item ->id}}</td>
                                  <td>
                                      @foreach ($users as $user)
                                          @if ($user->id == $item->userid)
                                              {{ $user->name }}
                                          @endif
                                      @endforeach
                                  </td>
                                  <td>{{ $item->sub}}</td>
                                  <td>
                                      {{-- @foreach ($classTeachers as $classTeacher)
                                          @if ($classTeacher->teacher_id == $item->id)
                                              {{ $classTeacher->subject_id}}
                                          @endif
                                      @endforeach --}}
                                      {{ $item->exp }}
                                  </td>
                                  <td>{{ $item->edu_deg }}</td>

                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              <br>
              <center>
                <button class="btn btn-primary" onclick="print()">
                    Print
                  </button>
              </center>
          </div>
      </div>
  </div>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script>
  $(document).ready(function() {
    var minDate, maxDate;
      $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
          var min = minDate.val();
          var max = maxDate.val();
          var date = new Date( data[9] );
          if (
              ( min === null && max === null ) || ( min === null && max >= date ) || ( min <= date   && max === null ) || ( min <= date   && max >= date )
          ) {
              return true;
          }
          return false;
        }
      );
    minDate = new DateTime($('#min'), {
        format: 'YYYY-MM-DD'
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY-MM-DD'
    });
    var table = $('#datatable-buttons').DataTable({
      "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        //debugger;
        var index = iDisplayIndexFull + 1;
        $("td:first", nRow).html(index);
        return nRow;
      },
    });
    table.buttons().container().appendTo($('#exp_buttons'))
    //Date Filter
    $('#min, #max').on('change', function () {
        table.draw();
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
