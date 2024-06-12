@section('title')
Manage OVertime
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')
  <div class="br-mainpanel">
    <div class="br-section-wrapper">

          <div class="text-center">
              <h1 class="">Manage Overtime</h1>
              <br>
          </div>


          @if($viewAll->count() == 0)
        <a href="{{ route('addOvertime') }}" class="btn btn-primary float-right">Add Overtime</a>
          @endif
            <br>
            <br>
          <table class="table table-striped" id="dataTable">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Hour</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody >

                <tr>
                @foreach ($viewAll as $i=>$data)
                  <tr>
                    <th scope="row">{{ $i+1 }}</th>
                    <th scope="row">{{$data->hour}}</th>
                    <th scope="row">{{$data->amount}}</th>
                    <td>
                        <a href="{{ url('editOvertime') }}/{{ $data->id }}" class="btn btn-primary">
                              <i class="fa fa-edit"></i>
                        </a>
                        {{-- <a href="{{ url('deleteOvertime') }}/{{ $data->id }}" class="btn text-danger bg-white">
                              <i class="icon ion-trash-a tx-28"></i>
                        </a> --}}
                    </td>
                  </tr>
                @endforeach

                </tr>

            </tbody>
          </table>
    </div>
  </div>
@endsection
@section('script')
      <script>
$(document).ready(function(){

});
</script>

@endsection
