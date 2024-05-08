<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Edit Special Offer</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


        <div class="br-mainpanel">

            <div class="bodyTitle">
                <i class="fa-duotone fa-house-chimney"></i>
                <span>Edit Special Offer</span>
            </div>

            <div class="card">
                <form action="updateOffers" method="post" enctype="multipart/form-data">
                    @csrf

                    @foreach ($specialoffer as $s)

                        <div class="col-12 mb-3">
                            <label for="">Title *</label>
                            <input type="text" class="form-control" name="title" id="" value="{{ $s->title }}">
                        </div>


                        <div class="col-12 mb-3">
                            <label for="">Priority *</label>
                            <input type="number" class="form-control" name="priority" id="" value="{{ $s->priority }}">
                        </div>


                        <div class="col-12 mb-3">
                            <label for="">Image *</label>
                            <div class="col-12">
                                <img src="{{ $s->img }}" id="imagePreview" class="mb-3" style="width:200px">
                            </div>

                            <input type="file" class="form-control" id="addImage" name="img" accept="image/*">
                        </div>

                        <input type="hidden" name="offerId" value="{{ $s->id }}">

                    @endforeach

                    <button class="btn btn-info">
                        Update Offer
                    </button>

                    <a href="" class="btn btn-danger" style="float: right;">
                        Go Back
                    </a>

                </form>
            </div>

        </div>

    @include('inc.js')

   <script>
     $('#addImage').on('change' ,  function(){
        imagePreview.src=URL.createObjectURL(event.target.files[0]);
    })
   </script>
  </body>
</html>
