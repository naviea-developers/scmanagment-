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
                <span>Add Sub Category</span>
            </div>

            <div class="card">



                <form action="insertSubCategory" method="post" method="post" enctype="multipart/form-data">@csrf

                    <div class="col-12 mb-3">
                        <label for="">Select Category  *</label>

                        <select name="catagoryId" id="" class="form-control" required>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="col-12 mb-3">
                        <label for="">Sub Category Name *</label>

                        <input type="text" class="form-control" name="SubCategoryName" required>

                    </div>

                    <div class="col-12 mb-3">
                        <label for="">Sub Category Image *</label>
                        <input type="file" name="img" id="" class="form-control">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="">Sub Category Description *</label>
                        <textarea name="SubcatDesc" id="editor" cols="30" rows="10"></textarea>
                    </div>


                    <button class="btn btn-primary" type="submit">
                        Add Sub Category
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
