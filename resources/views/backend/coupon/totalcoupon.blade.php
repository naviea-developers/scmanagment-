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
                      <h4>View All Coupon</h4>
                      <p class="mg-b-0">Manage all Coupon</p>
                    </div>
                  </div>

                    <a href="{{ route('addCoupon') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add Coupon
                    </a>
                    <br>

                    <input type="text" name="" id="myInput" placeholder="Search">

                <table class="table" id="dataTable">
                    <thead>
                      <tr>
                        <th scope="col">Coupon Code</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Discount Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                         @foreach ($coupon as $coupon)
                        <tr>
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->discount}}</td>
                            <td>{{$coupon->type}}</td>
                            <td>{{$coupon->status}}</td>
                            <td>
                                <a href="editCoupon/{{$coupon->id}}"><i class="fa-solid fa-edit btn btn-sm btn-success"></i></a>
                                <a href="deleteCoupon/{{ $coupon->id }}"><i class="fa-solid fa-trash btn btn-sm  btn-danger"></i></a>
                            </td>
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
