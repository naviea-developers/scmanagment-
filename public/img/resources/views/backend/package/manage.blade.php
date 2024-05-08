<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Manage Package</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')



    <div class="br-mainpanel">
        <div class="bodyTitle">
            <i class="fa-duotone fa-box-open-full"></i>
            Manage Package
        </div>

        <div class="card p-4">

            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-6">
                    <a href="addPackage" class="btn btn-primary btn-sm float-right">
                        <i class="fa-regular fa-plus"></i> Add  </a>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Banner</th>
                    <th scope="col">Package Name</th>
                    <th scope="col">Package Details</th>
                    <th scope="col">Location</th>
                    <th scope="col">duration</th>
                    <th scope="col">date</th>
                    <th scope="col">price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($package as $i=>$pk)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td><img src="{{ $pk->img }}" style="width: 50px;height: 50px;object-fit: cover;" alt=""></td>
                            <td>{{ $pk->title }}</td>
                            <td>{!! substr($pk->details, 0, 30) !!}</td>
                            <td>{{ $pk->location }}</td>
                            <td>{{ $pk->duration }}</td>
                            <td>{{ $pk->date }}</td>
                            <td>{{ $pk->price }}</td>
                            <td>
                                <a href="editPackage/{{ $pk->id }}"><i class="fa-duotone fa-pen-to-square"></i></a> |
                                <a href="deletePackage/{{ $pk->id }}"><i class="fa-duotone fa-trash-can"></i></a>
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
