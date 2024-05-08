<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Manage Bus</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')



    <div class="br-mainpanel">
        <div class="bodyTitle">
            <i class="fa-duotone fa-bus"></i>
            Bus Booking
        </div>

        <div class="card p-4">

            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-6">
                    <a href="addBus" class="btn btn-primary btn-sm float-right">
                        <i class="fa-regular fa-plus"></i> Add  </a>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bus logo</th>
                    <th scope="col">Bus Name</th>
                    <th scope="col">Bus Model</th>
                    <th scope="col">Coach</th>
                    <th scope="col">Form</th>
                    <th scope="col">To</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($bus as $i=>$a)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                <img src="{{ $a->img }}" alt="" style="height: 60px;width:60px">
                            </td>
                            <td>{{ $a->name }}</td>
                            <td>{{ $a->model }}</td>
                            <td>{{ $a->coach }}</td>
                            <td>{{ $a->form }}</td>
                            <td>{{ $a->to }}</td>
                            <td>{{ $a->price }}</td>
                            <td>
                                <a href="deletebus/{{ $a->id }}">
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
