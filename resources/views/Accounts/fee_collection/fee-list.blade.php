

<input name="fee_t_amount" class="fee_t_amount" type="hidden" value="0">
<table class="table table-border mt-4" style="border: 1px solid #e7e7e7;">
    <tr>
        <td>#</td>
        <td>Fee Name</td>
        <td>Fee Amount</td>
        <td>Paid Satus</td>
    </tr>
    @foreach($fees as $fee_m)
        <tr>
            <td>
                <div class="form-check">
                <input type="checkbox" class="form-check-input fee_checkbox" data-fee="{{$fee_m->fee_amount}}" name="fees[{{$fee_m->id}}]" value="{{$fee_m->fee_amount}}" id="fee_list{{$fee_m->id}}">
                </div>
            </td>
            <td>{{$fee_m->fee?->particular_name}}</td>
            <td>{{$fee_m->fee_amount}}</td>
            <td>{{$fee_m->fee_amount}}</td>
        </tr>
    @endforeach
<table>