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
                <span>Edit Ads</span>
            </div>

            <div class="card">
                <form action="updateAds" method="post" enctype="multipart/form-data">
                    @csrf

                    @foreach ($ads as $b)

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
                            <label for="">Sub Category Name *</label>
                            <select name="SubcatagoryId" id="" class="form-control">
                                @foreach ($subcategory as $Scat)
                                    <option @if ($Scat->id == $b->Subcategory)
                                        selected
                                    @endif  value="{{ $Scat->id }}">{{ $Scat->name }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="col-12 mb-3">
                            <label for="">Brand Image *</label>
                            <br>
                            <img src="{{ $b->img }}" alt="" style="width: 300px">
                            <input type="file" accept="image/*" class="form-control" name="img" value="{{ $b->img }}">
                        </div>


                        <input type="hidden" name="adsId" value="{{ $b->id }}">

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
