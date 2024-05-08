@extends('backend.master')

@section('title', 'All Course')


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">




        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Cart</h4>
                      <p class="mg-b-0">Manage all Cart Product</p>
                    </div>
                </div>

                <br>

                <input type="text" placeholder="Search Data" id="myInput">

                <table class="table" id="dataTable">
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
                            <td><img src="{{ asset('video/'.$data->file)}}" alt="" height="50" width="50"></td>
                            <td>{{$data->total_price}}</td>
                            <td>{{$data->discount_price}}</td>
                            <td>{{$data->quantity}}</td>

                          </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>

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

@stop
