<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Manage Coupon</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')



    <div class="br-mainpanel">
        <div class="bodyTitle">
            <i class="fa-duotone fa-ticket"></i>
            Manage Coupon
        </div>

        <div class="card p-4">

            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-6">
                    <a href="addCoupon" class="btn btn-primary btn-sm float-right">
                        <i class="fa-regular fa-plus"></i> Add  </a>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Code</th>
                    <th scope="col">Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($coupon as $i=>$cpn)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $cpn->title }}</td>
                            <td>{{ $cpn->code }}</td>
                            <td>{{ $cpn->type }}</td>
                            <td>{{ $cpn->amount }}</td>
                            <td>
                                <a href="editCoupon/{{ $cpn->id }}">
                                 <i class="fa-duotone fa-pen-to-square"></i>
                                </a>
                                |
                                <a href="deleteCoupon/{{ $cpn->id }}">
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
