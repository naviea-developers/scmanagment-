@extends('user.layouts.master-layout')
@section('head')
@section('title','- My Courses')
@endsection
@section('main_content')

    <div class="right_section">
        <div>
            <h4><b>My Course</b></h4>
        </div>
    </div>

    <div style="overflow-x:auto;">
        <table class="table table-striped mt-3" style="min-width: 800px;">
            <thead >
            <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
                <th scope="col">Sl</th>
                <th scope="col">Course Name</th>
                <th scope="col">Instructor</th>
                <th scope="col">Price</th>
                <th scope="col">Create</th>
                <th scope="col">Payment Status</th>
                {{-- <th scope="col">Order Status</th> --}}
                <th scope="col">Action</th>
            </tr>
            </thead>
            {{-- <tbody>
                @php
                    $i = 1;
                @endphp
                @if (count($my_orders) > 0)
                @foreach ($my_orders as $order)
                    
                <tr>
                <td>{{ $i++ }}</td>
                
                <td>{{  $order->course->name ?? ''}}</td>
                <td>{{  $order->course->teacher->name ?? ''}}</td>
                <td>{{  $order->order->total_amount ?? ''}}</td>
                <td>{{  $order->created_at->format('d-m-Y') }}</td>
                <td>{{  $order->order->payment_status ?? ''}}</td>
                <td>
                    &nbsp;
                    <a href="{{ route('frontend.course.details',$order->course->id) }}" target="_blank"><i class="fa-duotone fa fa-eye"></i></a>
                    &nbsp;
                </td>
                @endforeach
                @endif
            </tbody> --}}
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