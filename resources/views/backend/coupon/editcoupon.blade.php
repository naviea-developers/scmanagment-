@extends('backend.master')

@section('title', 'Add Courses')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-person-chalkboard"></i>
        <div>
          <h4>Add Coupon</h4>
          <p class="mg-b-0">Add the information of Coupon</p>
        </div>
      </div><!-- d-flex -->


        <div class="p-5">

            <div class="br-section-wrapper">
                @foreach($editCoupon as $coupon)

                <form action="{{ route('updateCoupon',['id' => $coupon->id]) }}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Coupon code :</label>
                        <input type="text" name="code" value="{{ $coupon->code }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Discount :</label>
                        <input type="text" name="discount" value="{{ $coupon->discount }}" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="">Discount Type :</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio1"
                            value="Fixed" {{ $coupon->type == "Fixed" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Fixed</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2"
                             value="Percentage"{{ $coupon->type == "Percentage" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Percentage</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Status : </label>
                            <select name="status" id="" class="form-select">
                                <option value="">-----Select Status-------</option>
                                <option value="1" @if($coupon->status == '1') selected @endif>Active</option>
                                <option value="0" @if($coupon->status == '0') selected @endif>Inactive</option>
                            </select>
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-info"
                    style="width:30%;margin:0 auto; margin-top:30px;">
                    Update Coupon</button>
                </div>
                </form>

                @endforeach
            </div>

        </div>


<script src="js/custom/addTeacherForClass.js"></script>
</div>
@stop
