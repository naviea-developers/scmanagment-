@section('title')
    Admin - Application Invoice
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')
<br>
<br>
<br>
<br>
    <div class=" container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10">
            <div class=" col-md-12">
              <div class="card card-body ">
                <div class="row d-flex align-items-baseline">
                  <div class="col-xl-9">
                    <p style="color: #7e8d9f;font-size: 20px;"> Application ID >> <strong>: {{ @$orderdetails->application_code }}</strong></p>
                  </div>
                  <div class="col-xl-3 float-end">
                    <a  href="{{ route('admin.application_order_print',$orderdetails->id) }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                        class="fas fa-print text-primary"></i> Print</a>
                    {{-- <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                        class="far fa-file-pdf text-danger"></i> Export</a> --}}
                  </div>
                  <hr>
                </div>
                @php
                    $title = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
                @endphp
    
                <div class="container">
                  <div class="col-md-12">
                    <div class="text-center">
                      {{-- <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i> --}}
                      <h1 class="pt-0">{{ $title->company_name }}</h1>
                    </div>
    
                  </div>
    
    
                  <div class="row">
                    <div class="col-xl-7">
                      <ul class="list-unstyled">
                        <li class="text-muted">Student ID : <span style="color:#5d9fc5 ;">{{ @$orderdetails->student->id }}</span></li>
                        <li class="text-muted">Student Name : <span style="color:#5d9fc5 ;">{{ @$orderdetails->student->name }}</span></li>
                        <li class="text-muted">Email : <span style="color:#5d9fc5 ;">{{ @$orderdetails->student->email }}</span></li>
                        <li class="text-muted">Phone Number : <span style="color:#5d9fc5 ;">{{ @$orderdetails->student->mobile  }}</span></li>
                        <li class="text-muted">Address : <span style="color:#5d9fc5 ;">{{ @$orderdetails->student->address  }}</span></li>
    
                      </ul>
                    </div>
                    <div class="col-xl-5">
                      <p class="text-muted">Invoice</p>
                      <ul class="list-unstyled">
                        {{-- <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                            class="fw-bold">ID : </span>{{ @$orderdetails->student->id }}</li> --}}
                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                            class="fw-bold">Creation Date: </span> {{date('d,F,Y',strtotime(@$orderdetails->created_at ))}}</li>
                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                            class="me-1 fw-bold">Payment Status : </span><span class="badge bg-warning text-black fw-bold">{{ @$orderdetails->payment_method }}</span></li>
    
                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                            class="me-1 fw-bold">Status : </span><span class="badge bg-warning text-black fw-bold">
                              @if($orderdetails->status == 0)
                              Application Start
                           @elseif($orderdetails->status == 1)
                              Processing
                           @elseif($orderdetails->status == 2)
                              Approval
                           @elseif($orderdetails->status == 3)
                              Cancel
                           @endif
    
                            </li>
                      </ul>
                    </div>
                  </div>
    
                  <div class="row my-2 mx-1 justify-content-center">
                    <table class="table table-striped table-borderless">
                      <thead style="background-color:#84B0CA ;" class="text-white">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Program Name</th>
                            <th scope="col">University Name</th>
                            <th scope="col">Appliction Fee</th>
    
    
    
                          {{-- <th scope="col">SL</th>
                          <th scope="col">Teacher Name</th>
                          <th scope="col">Course Name</th>
                          <th scope="col">Course Fee</th>
                          <th scope="col">Course discount</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i=1;
                        @endphp
    
                        @foreach ($orderdetails->carts as $cart)
                           <tr>
                              <th scope="row">{{ $i++ }}</th>  
    
                              <td>{{ @$cart->course->name}}</td>
                              <td>{{ @$cart->course->university->name}}</td>
                              <td>{{ @$orderdetails->application_fee}}</td>
                              {{-- <td>{{ format_price(@$cart->amount) }}</td> --}}
                            </tr>
                          @endforeach
                        {{-- <tr>
                          <th scope="row">{{ $i++ }}</th>
                          <td>{{ @$cart->course->teacher->name }}</td>
                          <td>{{ @$cart->course->name }}</td>
                          <td>{{ @$cart->course->fee }}</td>
                          <td>{{ @$cart->amount }}</td>
                        </tr> --}}
                        {{-- @endforeach --}}
                      </tbody>
    
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-xl-7">
                      {{-- <p class="ms-3">Add additional notes and payment information</p> --}}
                      {{-- <p class="">Note: {{ $orderdetails->order_note }}</p> --}}
    
                    </div>
                    <div class="col-xl-5">
                      <ul class="list-unstyled">
                        {{-- <li class="text-muted ms-3"><span class="text-black me-4">SubTotal </span> : {{ format_price($orderdetails->sub_total) }}</li> --}}
                        {{-- <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$111</li> --}}
                      </ul>
                      {{-- <p class="text-black float-start"><span class="text-black me-3"> Total Amount </span><span
                          style="font-size: 25px;">: {{ format_price($orderdetails->total_amount) }}</span></p> --}}
                    </div>
                  </div>
                  <hr>
                  {{-- <div class="row">
                    <div class="col-xl-10">
                      <p>Thank you for your purchase</p>
                    </div>
                    <div class="col-xl-2">
                      <button type="button" class="btn btn-primary text-capitalize"
                        style="background-color:#60bdf3 ;">Pay Now</button>
                    </div>
                  </div>
                 <hr> --}}
                
    
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


      <br>


@endsection
