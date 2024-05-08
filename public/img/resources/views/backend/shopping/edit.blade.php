<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Edit Product</title>
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
            <i class="fa-duotone fa-boxes-packing"></i>
            Edit Product
        </div>

        <div class="card p-4">

            <form action="{{ route('updateProduct') }}" method="post" enctype="multipart/form-data">
                @csrf

                @foreach ($shopping as $sp)
                <div class="row">
                    <input type="hidden" name="id" value="{{ $sp->id }}">
                    <div class="col-md-6">
                        <label for="">Product Name</label>
                        <input required type="text" class="form-control" name="name" value="{{ $sp->title }}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Price </label>
                        <input required type="text" class="form-control" name="price" value="{{ $sp->price }}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Brand </label>
                        <input required type="text" class="form-control" name="brand"  value="{{ $sp->brand }}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Quantity</label>
                        <input type="number" name="qnty" class="form-control" value="{{ $sp->qnt }}">
                    </div>

                    <div class="col-md-12">
                        <label for="">Short Description</label>
                        <input type="text" name="srtDes" class="form-control" value="{{ $sp->shortdesc }}">
                    </div>

                    <div class="col-md-12">
                        <label for="">Long Description</label>
                        <textarea name="longDsc" id="editor" class="form-control">{{ $sp->longdesc }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="">Delivery Charge</label>
                        <input type="number" name="deliverCharge" class="form-control" value="{{ $sp->delevery_crg }}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Single Image (Logo)</label>
                        <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" accept="image/*" name="logo">
                    </div>

                    <div class="col-md-6">
                        <label for="">Multiple Image</label>
                        <input type="file" name="productImgs[]" multiple class="form-control">
                    </div>

                    <div class="col-md-12">
                        <img src="" style="width: 150px" id="blah" alt="">
                    </div>

                    <div class="col-md-12">
                        <center>
                            <button class="btn btn-primary btn-sm">Update Now</button>
                        </center>
                    </div>
                </div>
                @endforeach

            </form>

        </div>
    </div>


    @include('inc.js')
  </body>
</html>
