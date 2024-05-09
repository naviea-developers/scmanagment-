@extends('user.layouts.master-layout')
@section('head')
@section('title','- My Packages')
@endsection
@section('main_content')

    <div class="right_section">
        <div>
            <h4><b>My Package</b></h4>
        </div>
    </div>

    <div style="overflow-x:auto;">
        <table class="table table-striped mt-3" style="min-width: 800px;">
            <thead >
            <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
                <th scope="col">Sl</th>
                <th scope="col">Package Name</th>
                <th scope="col">Price</th>
                <th scope="col">Create</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Order Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @if (count($my_package) > 0)
                @foreach ($my_package as $package)

                <tr>
                <td>{{ $i++ }}</td>

                <td>{{  $package->package->name ?? ''}}</td>
                <td>{{  format_price($package->amount) ?? ''}}</td>
                <td>{{  $package->created_at->format('d-m-Y') }}</td>
                <td>
                    @if($package->order->payment_status == "paid")
                    Paid
                 @elseif($package->order->payment_status == "unpaid")
                    Unpaid
                 @endif
                    {{-- {{  $package->order->payment_status ?? ''}} --}}
                </td>
                <td>
                    @if($package->order->status == "new")
                        New
                        @elseif($package->order->status == "process")
                        Process
                        @elseif($package->order->status == "delivered")
                            Delivered
                        @elseif($package->order->status == "cancel")
                            Cancel
                    @endif

                <td>
                    &nbsp;
                    <a href="{{ route('frontend.subscribe_details') }}" target="_blank"><i class="fa-duotone fa fa-eye"></i></a>
                    &nbsp;
                </td>
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
