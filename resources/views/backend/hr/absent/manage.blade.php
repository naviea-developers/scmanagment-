@extends('Backend.layouts.layouts')

@section('title', 'Manage Absent')


@section('main_contain')

<div class="br-mainpanel">

          <div class="br-section-wrapper">

                <div class="text-center mb-4">
                    <h1 class="">Manage Absent</h1>
                    <br>
                </div>

              <input type="text" placeholder="Search Data" id="myInput">
                @if($viewAll->count() == 0)
              <a href="{{ route('addAbsent') }}" class="btn btn-info btn-sm float-right">Add Absent</a>
                @endif
                  <br>
                  <br>
                <table class="table table-striped" id="dataTable">
                  <thead>
                    <tr>
                      <th scope="col">SL</th>
                      <th scope="col">First</th>
                      <th scope="col">Other</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="dataTable" >

                      <tr>
                      @foreach ($viewAll as $i=>$data)
                        <tr>
                          <th scope="row">{{ $i+1 }}</th>
                          <th scope="row">{{$data->first}}</th>
                          <th scope="row">{{$data->other}}</th>
                          <td>
                              <a class="btn text-info" href="{{ url('editAbsent') }}/{{ $data->id }}">
                                  <i class="icon ion-compose tx-28"></i>
                              </a>
                              {{-- <a class="btn text-danger bg-white" href="{{ url('deleteAbsent') }}/{{ $data->id }}" >
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
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dataTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/alfrcr/paginathing/dist/paginathing.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function ($) {
    const listElement = $('.list-group');

    for (let i = 1; i <= 1500; i++) {
      listElement.append('<li class="list-group-item"> Item ' + i + '</li>');
    }

    listElement.paginathing({
      perPage: 5,
      limitPagination: 9,
      containerClass: 'panel-footer mt-4',
      pageNumbers: true,
      ulClass: 'pagination flex-wrap justify-content-center',
    })

    $('.table tbody').paginathing({
      perPage: 10,
      insertAfter: '.table',
    //   pageNumbers: true,
      ulClass: 'pagination flex-wrap justify-content-center'
    });
  });
</script>
<!-- </div> -->
@stop