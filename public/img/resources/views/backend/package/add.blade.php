<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Add new Package</title>
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
            <i class="fa-duotone fa-box-open-full"></i>
            Add New Package
        </div>

        <div class="card p-4">

            <form action="uploadPackage" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <img src="" alt="" id="blah" style="max-width: 200px;">
                    </div>
                    <div class="col-md-6">
                        <label for="">Banner</label>
                        <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" accept="image/*" name="logo" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Package Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label for="">Package Details</label>
                        <textarea name="details" id="editor" cols="30" rows="10"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="">Duration</label>
                        <input type="text" name="duration" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Date </label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control" required min="0">
                    </div>

                    <button class="btn btn-primary" style="margin: 0 auto;">Add Now</button>

                </div>
            </form>

        </div>
    </div>


    @include('inc.js')
  </body>
</html>
