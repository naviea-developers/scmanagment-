@section('title')
Manage Payroll
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

<div class="br-mainpanel">

  <div class="br-section-wrapper">

    <div class="text-center">
        <h1 class="">Manage Payroll</h1>
        <br>
    </div>


    @if($viewAll->count() == 0)
      <a href="{{ route('addPayroll') }}" class="btn btn-info btn-sm float-right">Add Payroll</a>
    @endif

    <br>
    <br>
    <table class="table cell-border" id="tablePayrollSetup">
      <thead>
        <tr>
          <th scope="col">SL</th>
          <th scope="col">House Rent (%)</th>
          <th scope="col">Medical Cost (%)</th>
          <th scope="col">Transport Costt (%)</th>
          <th scope="col">Tax (%)</th>
          <th scope="col">Provident Fund (%)</th>

          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>


          @foreach ($viewAll as $i=>$data)
            <tr>
              <th scope="row">{{ $i+1 }}</th>
              <th scope="row">{{$data->house_rent}}</th>
              <th scope="row">{{$data->medical_cost}}</th>
              <th scope="row">{{$data->transport_cost}}</th>
              <th scope="row">{{$data->tax}}</th>
              <th scope="row">{{$data->provident_fund}}</th>

              <td>
                  <a class="btn btn-primary" href="{{ url('editPayroll') }}/{{ $data->id }}">
                        <i class="fa fa-edit"></i>
                  </a>
                  {{-- <a class="btn text-danger bg-white" href="{{ url('deletePayroll') }}/{{ $data->id }}" style="color: #000">
                      <i class="icon ion-trash-a tx-28"></i>
                  </a> --}}
              </td>
            </tr>
          @endforeach



      </tbody>
    </table>
  </div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){
  $('#tablePayrollSetup').DataTable({
    "searching":false,
    "paging":   false,
        "ordering": false,
        "info":     false,
    "dom": 'rtip'
  });
});
</script>

<!-- </div> -->
@endsection
