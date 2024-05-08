@extends('backend.master')

@section('title', 'Add Courses')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                      <h4>Add Coupon</h4>
                      <p class="mg-b-0">Add the information of Coupon</p>
                    </div>
                  </div>


                <form action="{{ route('storeCoupon') }}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Coupon code :</label>
                        <input type="text" name="code" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="">Discount :</label>
                        <input type="text" name="discount" class="form-control" required>
                    </div>

                    <div class="col-md-3">
                        <label for="">Discount Type :</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Fixed">
                            <label class="form-check-label" for="inlineRadio1">Fixed</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Percentage">
                            <label class="form-check-label" for="inlineRadio2">Percentage</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Status : </label>
                            <select name="status" id="" class="form-select">
                                <option value="">-----Select Status-------</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-info"
                    style="width:30%;margin:0 auto; margin-top:30px;">
                    Add Coupon</button>
                </div>
                </form>
            </div>

        </div>


<script src="js/custom/addTeacherForClass.js"></script>
</div>
@stop
