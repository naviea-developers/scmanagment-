<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Manage Product</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')



    <div class="br-mainpanel">
        <div class="bodyTitle">
            <i class="fa-duotone fa-boxes-packing"></i>
            Manage Product
        </div>

        <div class="card p-4">

            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-6">
                    <a href="addProduct" class="btn btn-primary btn-sm float-right">
                        <i class="fa-regular fa-plus"></i> Add  </a>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Image Gallery</th>
                    <th scope="col">Price</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Short Description</th>
                    <th scope="col">Long Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Delevery Charge</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($shopping as $i=>$sp)

                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td><img src="{{ asset($sp->img) }}" alt="" style="width: 50px;height: 50px;object-fit: cover;"></td>
                            <td>{{ $sp->title }}</td>
                            <td>{{ $sp->imgGallery }}</td>
                            <td>{{ $sp->price }}</td>
                            <td>{{ $sp->brand }}</td>
                            <td>{{ $sp->rating }}</td>
                            <td>{{ substr($sp->shortdesc, 0, 50) }}...</td>
                            <td>{!! substr($sp->longdesc, 0, 50) !!}...</td>
                            <td>{{ $sp->qnt }}</td>
                            <td>{{ $sp->delevery_crg }}</td>
                            <td>
                                <a href="editProduct/{{ $sp->id }}">
                                 <i class="fa-duotone fa-pen-to-square"></i>
                                </a>
                                |
                                <a href="deleteProduct/{{ $sp->id }}">
                                    <i class="fa-duotone fa-trash-can"></i>
                                 </a>
                            </td>
                        </tr>


                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

    @include('inc.js')
  </body>
</html>
