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
                <span>Add Category</span>
            </div>

            <div class="card">
                <form action="insertCategory" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 mb-3">
                        <label for="">View Priority *</label>
                        <input type="number" class="form-control" name="priority" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="">Category Name * </label>
                        <input type="text" class="form-control" name="CategoryName" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="">Category Description *</label>
                       <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="">Image *</label>
                        <input type="file" class="form-control" name="img" required accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-info">
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
