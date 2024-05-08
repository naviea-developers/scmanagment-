<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Category</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


        <div class="br-mainpanel">

            <div class="bodyTitle">
                <i class="fa-duotone fa-house-chimney"></i>
                <span>Add Brand</span>
            </div>

            <div class="card">
                <form action="insertBrand" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 mb-3">
                        <label for="">Brand Name *</label>
                        <input type="text" class="form-control" name="brandName" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="">Category * </label>

                        <select name="catagoryId" class="form-control" required>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-12 mb-3">
                        <label for="">Image *</label>
                        <input type="file" class="form-control" name="img" required accept="image/*">
                    </div>

                    <button class="btn btn-info">
                        Add Category
                    </button>

                    <a href="" class="btn btn-danger" style="float: right;">
                        Go Back
                    </a>

                </form>
            </div>

        </div>

    @include('inc.js')
  </body>
</html>
