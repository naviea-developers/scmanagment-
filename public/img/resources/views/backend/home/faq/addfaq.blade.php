<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('inc.css')
    <title>Add FAQ</title>
  </head>

  <body>
    @include('inc.left')
    @include('inc.nav')
    @include('inc.right')


        <div class="br-mainpanel">

            <div class="bodyTitle">
                <i class="fa-duotone fa-house-chimney"></i>
                <span>Add FAQ</span>
            </div>

            <div class="card">
                <form action="insertFaq" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 mb-3">
                        <label for="">Question * </label>

                        <input type="text" name="faqQue" class="form-control">

                    </div>

                    <div class="col-12 mb-3">
                        <label for="">Answer *</label>

                        <textarea name="faqans" id="" cols="30" rows="10" class="form-control resize-none"></textarea>

                    </div>

                    <button class="btn btn-info">
                        Add FAQ
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
