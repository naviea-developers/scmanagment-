@extends('backend.master')

@section('title', 'All Course')

<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"/>
    

<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-chalkboard-user"></i>
        <div>
          <h4>View All Courses</h4>
          <p class="mg-b-0">Manage all Course for student</p>
        </div>
      </div>

      <div class="p-5">

        <div class="br-section-wrapper">
          <br>

      <div class="col-sm-6">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label text-dark">From</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="min" name="min" placeholder="mm/dd/yyyy">
            </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label text-dark">To</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="max" name="max" placeholder="mm/dd/yyyy">
            </div>
        </div>
      </div>
      <br>
          <div class="table-responsive">
            <table id="datatable-buttons" class="table nowrap ">
              <thead>
                <tr>
                  <th scope="col">User Name</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Image</th>
                  <th scope="col">Total Price</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Quantity</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cartData as $data)
                <tr>
                  <td>{{$data->userId}}</td>
                  <td>{{$data->name}}</td>
                  <td><img src="{{ asset('video/'.$data->file)}}" alt="" height="100" width="100"></td>
                  <td>{{$data->total_price}}</td>
                  <td>{{$data->discount_price}}</td>
                  <td>{{$data->quantity}}</td>
                </tr>
                @endforeach
              </tbody>
            <table>
          </div> 

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

</script>

@stop

