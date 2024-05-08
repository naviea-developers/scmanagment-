@extends('backend.master')

@section('title', 'Manage Payment Method')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="row">
                    <div class="col-md-6">
                        <h2>
                            <b>
                                Manage Payment Method
                            </b>
                        </h2>
                    </div>

                    <div class="col-md-6" style="text-align: right;">
                        <a href="/addPaymentMethod" class="btn btn-primary btn-sm">Add payment Method</a>
                    </div>
                </div>

                <table class="table mt-3">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mehtod Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($payment_accept as $i=>$pay)
                            <tr>
                                <th scope="row">{{ $i+1 }}</th>
                                <td>{{ $pay->title }}</td>
                                <td>
                                    <img src="{{ asset('payment_method/').'/'.$pay->src }}" style="width:50px;height:50px;object-fit:cover;" alt="">
                                </td>

                                <td>
                                    <a href="/deletePaymentMethod/{{ $pay->id }}"><i class="fa-duotone fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                  </table>
            </div>


        </div>



</div>
@stop
