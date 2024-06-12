@section('title')
Manage Late Roll
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

  <div class="br-mainpanel">

    <div class="br-section-wrapper">

      <div class="text-center">
        <h1 class="">Manage Late Roll</h1>
        <br>
      </div>


      @if($viewAll->count() == 0)
        <a href="{{ route('addLateRoll') }}" class="btn btn-primary float-right">Add Late Roll</a>
      @endif
      <br>
      <br>
      <table class="table table-striped" id="dataTable">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Late</th>
            <th scope="col">Absent</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            <tr>
            @foreach ($viewAll as $i=>$data)
              <tr>
                <th scope="row">{{ $i+1 }}</th>
                <th scope="row">{{$data->late}}</th>
                <th scope="row">{{$data->absent}}</th>
                <td>
                    <a href="{{ url('editLateRoll') }}/{{ $data->id }}" class="btn btn-primary">
                          <i class="fa fa-edit"></i>
                    </a>
                    {{-- <a href="{{ url('deleteLateRoll') }}/{{ $data->id }}" class="btn text-danger bg-white">
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
  <script>
  </script>

<!-- </div> -->
@stop
