<div class="row" style="font-size:15px;">
    <div class="col-md-6">
        <b>Slip No. : </b> {{$fee_collection->slip_no}}
    </div>
    <div class="col-md-6">
        <b>Date : </b> {{date('Y-m-d',strtotime($fee_collection->pay_date))}}
    </div>
    <div class="col-md-6">
        <b>Session. : </b> {{$fee_collection->session?->start_year.'-'.$fee_collection->session?->end_year}}
    </div>
    <div class="col-md-6">
        <b>Class. : </b> {{$fee_collection->s_class?->name}}
    </div>
    <div class="col-md-6">
        <b>Section. : </b> {{$fee_collection->section?->name}}
    </div>
    
</div>
<h2 class=" mt-4">Fee List</h2>
<table class="table" style="border: 1px solid #e7e7e7;">
    <tr>
        <th>Sl.</th>
        <th>Fee Name</th>
        <th>Amount</th>
    </tr>
    @php
        $total=0;
    @endphp
    @foreach($fee_collection->items as $k=>$item)
        <tr>
            <td>{{$k+1}}</td>
            <td>{{$item->fee?->particular_name}}</td>
            <td>{{$item->fee_amount}}</td>
        </tr>
        @php
            $total +=$item->fee_amount;
        @endphp
    @endforeach
    <tr>
        <td colspan="2">Total</td>
        <td>{{$total}}</td>
    </tr>
</table>