<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Add new Bus</title>
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
            <i class="fa-duotone fa-bus"></i>
            Add New Bus
        </div>

        <div class="card p-4">

            <form action="uploadBus" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <img src="" alt="" id="blah" style="max-width: 200px;">
                    </div>
                    <div class="col-md-6">
                        <label for="">Bus Logo/Image</label>
                        <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" accept="image/*" name="logo" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Bus Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Bus Model</label>
                        <input type="text" name="model" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Bus Coach</label>
                        <select name="class" class="form-control" required>
                            <option value="ac">AC</option>
                            <option value="non ac">Non Ac</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">From</label>
                        <input type="text" name="form" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">To</label>
                        <input type="text" name="to" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">Date </label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Price </label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">Description </label>
                        <textarea class="form-control" name="description" id="editor"></textarea>
                    </div>
                    <button class="btn btn-primary" style="margin: 0 auto;">Add Now</button>

                </div>
            </form>

        </div>
    </div>


    @include('inc.js')
  </body>
</html>
