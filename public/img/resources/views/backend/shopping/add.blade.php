<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Add new Product</title>
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
            Add New Product
        </div>

        <div class="card p-4">

            <form action="{{ route('uploadProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <label for="">Product Name</label>
                        <input required type="text" class="form-control" name="name">
                    </div>

                    <div class="col-md-6">
                        <label for="">Price </label>
                        <input required type="text" class="form-control" name="price">
                    </div>

                    <div class="col-md-6">
                        <label for="">Brand </label>
                        <input required type="text" class="form-control" name="brand">
                    </div>

                    <div class="col-md-6">
                        <label for="">Quantity</label>
                        <input type="number" name="qnty" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for=""> Tag </label>
                        <input required id="tag-input1" type="text" class="form-control">
                        <input id="tags" type="hidden" name="tag">
                    </div>

                    <div class="col-md-6">
                        <label for=""> Category / Type </label>
                        <input type="text" name="type" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label for="">Short Description</label>
                        <input type="text" name="srtDes" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label for="">Long Description</label>
                        <textarea name="longDsc" id="editor" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="">Delivery Charge</label>
                        <input type="number" name="deliverCharge" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="">Single Image (Logo)</label>
                        <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" accept="image/*" name="logo" required>
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
