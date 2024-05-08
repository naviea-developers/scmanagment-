<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Add Special Offer Tagline</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


        <div class="br-mainpanel">

            <div class="bodyTitle">
                <i class="fa-duotone fa-house-chimney"></i>
                <span>Add Special Offer Tagline</span>
            </div>

            <div class="card">
                <form action="insertOffersTagline" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12 mb-3">
                        <label for="">Title *</label>
                        <select name="title" id="" class="form-control">
                            @foreach ($specialoffer as $sf)
                                <option value="{{ $sf->id }}">{{ $sf->title }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-12 mb-3">
                        <label for="">Category *</label>
                        <select name="category" id="" class="form-control">
                            @foreach ($category as $sf)
                                <option value="{{ $sf->id }}">{{ $sf->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="">Sub-category *</label>
                        <select name="Subcategory" id="" class="form-control">
                            @foreach ($subcategory as $scf)
                                <option value="{{ $scf->id }}">{{ $scf->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-12 mb-3">
                        <div class="col-12">
                            <label for="">Image *</label>
                        </div>
                        <img src="" id="imagePreview" class="mb-3" style="width:200px">
                        <input type="file" class="form-control" id="addImage" name="img" required accept="image/*">
                    </div>

                    <button class="btn btn-info">
                        Add Offer
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
