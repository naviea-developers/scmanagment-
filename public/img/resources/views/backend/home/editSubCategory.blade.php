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
                <form action="updateSubCategory" method="post" enctype="multipart/form-data">
                    @csrf

                    @foreach ($subcategory as $Scat)

                        <div class="col-12 mb-3">
                            <label for="">Category Name * </label>

                            <select name="catagoryId" id="" class="form-control">
                                @foreach ($category as $Mcat)
                                    <option @if ($Mcat->id == $Scat->mainCategory)
                                        selected
                                    @endif  value="{{ $Mcat->id }}">{{ $Mcat->name }}</option>
                                @endforeach
                            </select>


                        </div>


                        <div class="col-12 mb-3">
                            <label for="">Sub Category Name * </label>
                            <input type="text" class="form-control" name="SubCategoryName" required value="{{ $Scat->name }}">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="">Category Description *</label>
                            <textarea name="SubcatDesc" id="" rows="5" required class="form-control">{{ $Scat->description }}</textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <img src="{{ $Scat->img }}" style="width:250px;"><br>
                            <label for="">Image *</label>
                            <input type="file" class="form-control" name="img" accept="image/*">
                        </div>

                        <input type="hidden" name="catId" value="{{ $Scat->id }}">

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
