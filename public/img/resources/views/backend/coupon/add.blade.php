<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Add new Coupon</title>
    <style>
        .col-md-6 , .col-md-12{
            margin-bottom: 20px;
        }
    </style>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


    <div class="br-mainpanel">
        <div class="bodyTitle">
            <i class="fa-duotone fa-ticket"></i>
            Add New Coupon
        </div>

        <div class="card p-4">

            <form action="{{ route('uploadCoupon') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <label for="">Coupon Title</label>
                        <input required type="text" class="form-control" name="title">
                    </div>

                    <div class="col-md-6">
                        <label for="">Coupon Code</label>
                        <input required type="text" class="form-control" name="code">
                    </div>

                    <div class="col-md-6">
                        <label for="">Coupon Type</label>
                        <select required name="type" id="" class="form-control">
                            <option value="persent">Persent (%)</option>
                            <option value="fixed">Fixed</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="">Coupon Amount</label>
                        <input type="text" required class="form-control" name="amount">
                    </div>

                    <div class="col-md-12">
                        <center>
                            <button class="btn btn-primary btn-sm">Add Now</button>
                        </center>
                    </div>
                </div>
            </form>

        </div>
    </div>


    @include('inc.js')
  </body>
</html>
