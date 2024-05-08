<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Add new Hotel</title>
    <style>
        .col-md-6 , .col-md-12{
            margin-bottom: 20px;
        }
        #imgLoad img {
            margin: 5px;
            border: 1px solid #000;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


    <div class="br-mainpanel">
        <div class="bodyTitle">
            <i class="fa-duotone fa-hotel"></i>
            Add New Hotel
        </div>

        <div class="card p-4">

            <form action="uploadHotel" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Hotel Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Hotel Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Check-in Time</label>
                        <input type="time" name="checkin" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Check-out Time </label>
                        <input type="time" name="checkout" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Number of Rooms</label>
                        <input type="number" min="0" value="0" name="number_of_room" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Room Capacity</label>
                        <input type="number" min="0" value="0" name="room_capacity" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Price </label>
                        <input type="number" name="price" min="0" value="00" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Photos </label>
                        <input type="file" id="photos" name="photos[]" class="form-control" required multiple accept="image/*">
                    </div>
                    <div class="col-md-12">
                        <label for="">Hotel Type </label>
                        <input type="text" name="type" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">Description </label>
                        <textarea name="description" id="editor" name="description" cols="30" rows="10"></textarea>
                    </div>

                </div>

                <div class="row">
                    <div id="imgLoad"></div>
                </div>

                <center>
                    <button class="btn btn-primary" style="margin: 0 auto;">Add Now</button>
                </center>

            </form>

        </div>
    </div>


    @include('inc.js')
    <script>

function previewImages() {

    $('#imgLoad').empty();

var preview = document.querySelector('#imgLoad');

if (this.files) {
  [].forEach.call(this.files, readAndPreview);
}

function readAndPreview(file) {

  // Make sure `file.name` matches our extensions criteria
  if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
    return alert(file.name + " is not an image");
  } // else...

  var reader = new FileReader();

  reader.addEventListener("load", function() {
    var image = new Image();
    image.height = 100;
    image.title  = file.name;
    image.src    = this.result;
    preview.appendChild(image);
  });

  reader.readAsDataURL(file);

}

}

document.querySelector('#photos').addEventListener("change", previewImages);
    </script>
  </body>
</html>
