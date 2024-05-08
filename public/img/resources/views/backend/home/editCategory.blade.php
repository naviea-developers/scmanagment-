<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Edit Category</title>
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
                <form action="updateCategory" method="post" enctype="multipart/form-data">
                    @csrf

                    @foreach ($category as $cat)

                        <div class="col-12 mb-3">
                            <label for="">View Priority *</label>
                            <input type="number" class="form-control" name="priority" required value="{{ $cat->Priority }}">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="">Category Name * </label>
                            <input type="text" class="form-control" name="CategoryName" required value="{{ $cat->name }}">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="">Category Description *</label>
                            <textarea name="catDesc" id="" rows="5" required class="form-control">{{ $cat->description }}</textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <img src="{{ $cat->img }}" style="width:250px;"><br>
                            <label for="">Image *</label>
                            <input type="file" class="form-control" name="img" accept="image/*">
                        </div>

                        <input type="hidden" name="catId" value="{{ $cat->id }}">

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
