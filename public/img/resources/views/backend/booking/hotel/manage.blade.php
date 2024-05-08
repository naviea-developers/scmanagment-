<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <style>

        #loadHotelPhotos0 {
            display: flexbox;
        }

        #loadHotelPhotos .column {
            display: flex;
            width: 50px;
            height: 50px;
            margin: 5px;
            border: 1px solid #000;
        }
        #loadHotelPhotos img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
        }

        #expandedImg {
            margin: 0 auto;
            width: 250px;
            display: block;
            max-height: 250px;
        }

    </style>
    <title>Manage Hotel</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')



    <div class="br-mainpanel">
        <div class="bodyTitle">
            <i class="fa-duotone fa-hotel"></i>
            Hotel Booking
        </div>

        <div class="card p-4">

            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-6">
                    <a href="addHotel" class="btn btn-primary btn-sm float-right">
                        <i class="fa-regular fa-plus"></i> Add  </a>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Number of Room</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-out</th>
                    <th scope="col">Person Capacity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($hotel as $i=>$h)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                {{ $h->name }}
                            </td>
                            <td>
                                {{ $h->address }}
                            </td>
                            <td>
                                <button type="button" onclick="getphoto({{ $h->gallery_id }})" class="btn-info btn-sm" style="border: none;"><i class="fa-solid fa-image"></i></button>
                            </td>
                            <td>
                                {{ $h->num_of_room }}
                            </td>
                            <td>
                                {{ date("g:iA", strtotime($h->checkin)) }}
                            </td>
                            <td>
                                {{ date("g:iA", strtotime($h->checkout)) }}
                            </td>
                            <td>
                                {{ $h->room_capacity }}
                            </td>
                            <td>
                                {{ $h->price }}
                            </td>
                            <td>
                                {{ $h->type }}
                            </td>
                            <td>
                                {!! substr($h->description, 0, 50) !!}
                            </td>

                            <td>
                                <a href="editHotel/{{ $h->id }}">
                                    <i class="fa-duotone fa-file-pen"></i>
                                </a> &nbsp;
                                |
                                &nbsp;
                                <a href="deleteHotel/{{ $h->id }}">
                                    <i class="fa-duotone fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
<!-- Button trigger modal -->
<button type="button" style="display: none;" data-toggle="modal" data-target="#exampleModal" id="ViewPhoto"></button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hotel Photo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <img id="expandedImg">
            <div class="row" id="loadHotelPhotos"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
        </div>
    </div>






    @include('inc.js')

    <script>
        function getphoto(e){


            $.ajax({
                type: "get",
                url: 'getHotelPhotos',
                data: {"id": e},
                success: function(response){
                    $('#ViewPhoto').click();
                    $('#loadHotelPhotos').html(response);
                }
            });

        }



function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
    </script>



  </body>
</html>
