@extends('user.layouts.master-layout')
@section('head')
@section('title','- My Orders')
@endsection
@section('main_content')

    <div class="right_section">
        <div>
            <h4 style="color: var(--seller_text_color)"><b>My Course List</b></h4>
        </div>
    </div>

    <div style="overflow-x:auto;">
        <table class="table table-striped mt-3" style="min-width: 800px;">
            <thead >
            <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
                {{-- <th scope="col">Sl</th>
                <th scope="col">Course Name</th>
                <th scope="col">Teacher Name</th>
                <th scope="col">Price</th>
                <th scope="col">Create</th>
                <th scope="col">Payment Status</th>

                --}}
                <th scope="col">SL</th>
                <th scope="col">Teacher/Seller Name</th>
                {{-- <th scope="col">Course Name</th> --}}
                <th scope="col">Course Name / Ebook Title</th>
                <th scope="col">Type</th>
                <th scope="col">Fee</th>
                <th scope="col">discount</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @if (count($my_orders) > 0)
                @foreach ($my_orders as $order)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>
                      @if ($order->cart_type=='course')
                      {{ @$order->course->teacher->name }}
                      @elseif($order->cart_type=='ebook')
                      {{ @$order->ebook->user->name }}
                      @endif
                    </td>

                    <td>
                      @if ($order->cart_type=='course')
                      {{ @$order->course->name }}
                      @elseif($order->cart_type=='ebook')
                      {{ @$order->ebook->title }}
                      @endif
                      {{-- {{ @$cart->course->name }} --}}
                     </td>
                     <td>
                      @if ($order->cart_type=='course')
                        Course
                      @elseif($order->cart_type=='ebook')
                        Ebook
                      @endif
                      {{-- {{ $cart->cart_type }} --}}
                     </td>
                    <td>
                      @if ($order->cart_type=='course')
                      {{ format_price(@$order->course->fee) }}
                      @elseif($order->cart_type=='ebook')
                      {{ format_price(@$order->ebook->fee) }}
                      @endif
                      {{-- {{ format_price(@$cart->course->fee) }} --}}
                   </td>
                    <td>{{ format_price(@$order->amount) }}</td>

                    <td>
                        @if ($order->cart_type=='course')
                        &nbsp;
                        <a href="{{ route('frontend.course.details',$order->course->id) }}" target="_blank"><i class="fa-duotone fa fa-eye"></i></a>
                        &nbsp;
                        @elseif($order->cart_type=='ebook')
                        <a href="{{ route('frontend.ebook_details',$order->ebook->id) }}" target="_blank"><i class="fa-duotone fa fa-eye"></i></a>
                        @endif
                    </td>
                  </tr>
                {{-- <td>{{  @$order->course->name ?? ''}}</td>
                <td>{{  @$order->course->teacher->name ?? ''}}</td>
                <td>{{ format_price( @$order->amount) ?? ''}}</td>
                <td>{{  @$order->created_at->format('d-m-Y') }}</td>
                <td>{{  @$order->order->payment_status ?? ''}}</td> --}}
                {{-- <td>{{  $order->order_status }}</td> --}}


                @endforeach
                @endif
            </tbody>
      </table>
    </div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script>
    $(document).ready(function() {
    $(".delete-button").click(function() {
        $("#delete-modal").show();
        $("#product_id").val($(this).attr('productId'))

    });
    $("#confirm-no").click(function() {
        $("#delete-modal").hide();
    });
    $("#confirm-yes").click(function() {
        $("#delete-modal").hide();
    });
});

</script>


@endsection
