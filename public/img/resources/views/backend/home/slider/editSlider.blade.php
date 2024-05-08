<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Edit Brand</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


        <div class="br-mainpanel">

            <div class="bodyTitle">
                <i class="fa-duotone fa-house-chimney"></i>
                <span>Edit Brand</span>
            </div>

            <div class="card">
                <form action="updateBrand" method="post" enctype="multipart/form-data">
                    @csrf

                    @foreach ($brand as $b)

                        <div class="col-12 mb-3">
                            <label for="">Category Name *</label>
                            <select name="catagoryId" id="" class="form-control">
                                @foreach ($category as $Mcat)
                                    <option @if ($Mcat->id == $b->category)
                                        selected
                                    @endif  value="{{ $Mcat->id }}">{{ $Mcat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="">Brand Name *</label>
                            <input type="text" class="form-control" name="brandName" required value="{{ $b->name }}">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="">Brand Logo *</label>
                            <br>
                            <img src="{{ $b->img }}" alt="" style="width: 300px">
                            <input type="file" class="form-control" name="img" value="{{ $b->name }}">
                        </div>


                        <input type="hidden" name="catId" value="{{ $b->id }}">

                    @endforeach

                    <button class="btn btn-info">
                        Update Category
                    </button>

                </form>
            </div>

        </div>

    @include('inc.js')
  </body>
</html>
