@extends('backend.master')

@section('title', 'All Course')

<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"/>


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">



      <div class="p-2">

        <div class="br-section-wrapper">

            <div class="br-pagetitle">
                <i class="fa-duotone fa-cart-shopping"></i>
                <div>
                  <h4>View All Sales</h4>
                  <p class="mg-b-0">Manage all Sales </p>
                </div>
            </div>


      <div class="row">
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-dark">From</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="min" name="min" placeholder="mm/dd/yyyy">
                </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-dark">To</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="max" name="max" placeholder="mm/dd/yyyy">
                </div>
            </div>
          </div>
      </div>

          <div class="table-responsive">
            <table id="datatable-buttons printDiv" class="table nowrap">
              <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Image</th>
                  <th scope="col">Total Price</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Quantity</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cartData as $i=>$data)
                <tr>
                    <td>{{ $i+1 }}</td>
                  <td>{{$data->name}}</td>
                  <td><img src="{{ asset('video/'.$data->file)}}" alt="" height="50" width="50"></td>
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

      <center>
        <button class="btn btn-primary mt-2" onclick="print()">Print</button>
    </center>


</div>


<script src="https://code.jquery.com/jquery-3.6.3.js"></script>

<script>

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

